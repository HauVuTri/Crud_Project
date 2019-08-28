@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    @include('admin.layout.messages')
                    <form action="{{action('BookController@store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Please Enter Book Name"/>
                        </div>
                        <div class="form-group">
                            <label>Người viết</label>
                            <input type='text' class="form-control" name="writer" placeholder="Please Enter Writter"/>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm Books</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection