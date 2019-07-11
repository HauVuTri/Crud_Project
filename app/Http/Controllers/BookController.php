<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.list',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
            DB::beginTransaction();
            $this->validate($request,[
                'name'=>'required|min:2|max:100',
                'writer'=>'required|min:2|max:100',
            ]);
            $newBook = Book::create(
                [
                    'name' => $request->name,
                    'writer' => $request->writer,
                ]
            );
            DB::commit();
            return redirect()->back()->with('success','Thêm thành công Book');
        }

        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::find($id);
        return view('admin.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try{
            $oldData = Book::find($id);
            DB::beginTransaction();
            $this->validate($request,[
                'name'=>'required|min:2|max:100',
                'writer'=>'required|min:2|max:100',
            ]);
            $oldData->name = $request->name;
            $oldData->writer = $request->writer;
            $oldData->save();
            DB::commit();
            return redirect()->back()->with('success','Sửa thành công Book');
        }

        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try
        {
            DB::beginTransaction();
            $cur_book = Book::find($id);
            $cur_book->delete();
            DB::commit();
            return redirect()->back()->with('success','Xóa thành công');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }

    }
}
