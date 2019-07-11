@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper" style=" margin-left: 210px;margin-right: -300px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể Loại
                        <small>{{$category->name}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category->products as $book)
                        <tr class="odd gradeX" align="center">
                            <td>{{$book->id}}</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->price}}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="admin/product/edit/{{$book->id}}">Edit</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#page-wrapper -->
@endsection