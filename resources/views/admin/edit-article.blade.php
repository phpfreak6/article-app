@extends('admin.layout.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Article</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if(session('success'))
	<div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>
	<i class="ace-icon fa fa-check green"></i>
    {{session('success')}}

</div>
@endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Article</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('updateArticle')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Article Name</label>
                    <input required name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{ $articles->name }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea id="inputDescription" name="descriptions" class="form-control" rows="4">{{ $articles->descriptions }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    @php
					$path = $articles->featured_image;
					if(strpos($path, "https://") !== false){
						$imgscr = $articles->featured_image;
					}else{
						if (file_exists( "images/".$articles->id."/".$path)){
							$imgscr = "/images/".$articles->id."/".$path;
						}
					}
					@endphp
					<img src="{{$imgscr}}" id="cropbox" class="img" style="width:250px;">

                  </div>
                    <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="articleimage" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <input type="hidden" name="updateid" value="{{$articles->id}}">
              </form>
            </div>
            <!-- /.card -->


          </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        </div>
    </section>
@endsection