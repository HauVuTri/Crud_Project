@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Books
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    @include('admin.layout.messages')

                    {!! Form::open(['action' => ['BookController@update',$book->id],'method'=>'post']) !!}
                    <div class="form-group">
                        {{Form::label('Tên sách')}}
                        {{Form::text('name',$book->name,['class'=>'form-control','placeholder'=>'Nhap ten the loai'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('Tên tác giả')}}
                        {{Form::text('writer',$book->writer,['class'=>'form-control','placeholder'=>'Nhap ten the loai'])}}
                    </div>

                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                    {{Form::hidden('_method','PUT')}}
                    {!! Form::close() !!}

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection