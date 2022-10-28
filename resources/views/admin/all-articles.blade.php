@extends('admin.layout.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Articles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if(session('error'))
	<div class="alert alert-block alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>
	<i class="ace-icon fa fa-check red"></i>
    {{session('error')}}

</div>
@endif
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Articles</h3>

        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 20%">Article Name</th>
                      <th style="width: 30%">Description</th>
                      <th style="width: 20%">Tags</th>
                      <th style="width: 30%">Image</th>
                      <th style="width: 20%">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($articles as $value)
                  <tr>
                      <td>
                        <a>{{ $value->name }}</a>
                      </td>
                      <td>{{ $value->descriptions }}</td>
                      <td>{{ $value->tags }}</td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                @php
								if(!empty($value->featured_image) ){
                                    if(strpos($value->featured_image, "https://") !== false){
                                        $imgpath = $value->featured_image;
                                    }else{
                                        $imgg = json_decode($value->featured_image, true);
									    $imgpath = "/images/$value->id/$imgg[0]";
                                    }
								}
                                @endphp
                                  <img alt="Avatar" class="table-avatar pkimg" src="{{ $imgpath }}">
                              </li>
                          </ul>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="edit-article/{{ $value->id }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="delete-article/{{ $value->id }}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
@endsection
<style>
.pkimg{
    border-radius: inherit !important;
    width: 9.5rem !important;
}
</style>