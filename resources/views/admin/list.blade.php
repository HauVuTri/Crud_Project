@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper" style=" margin-left: 210px>
    <div class=" container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <h1 class="page-header">Books
                <small>Danh sách</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        @include('admin.layout.messages')
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên</th>
                <th>Tác giả</th>
                <th>Thời gian tạo</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr class="odd gradeX" align="center">
                    <td><a href="admin/category/{{$book->id}}">{{$book->id}}</a></td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->writer}}</td>
                    <td>{{$book->created_at}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="books/{{$book->id}}/edit">Edit</a>
                    </td>
                    <td>
                        {!! Form::open(['action' => ['BookController@destroy',$book->id],'method'=>'post']) !!}
                        {{Form::submit('Delete',['class'=>'fa fa-pencil fa-fw'])}}
                        {{Form::hidden('_method','DELETE')}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection