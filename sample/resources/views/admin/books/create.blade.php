@extends('layouts.default')

@section('content')
	<div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> {{ $pagetitle }}
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
          </ul>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
        	 <div class="card">
              <div class="card-body">
                <h4 class="card-title">Add Books</h4>
                <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('books.store') }}">
                  @csrf
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                  </div>
                  <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" class="form-control" id="author" placeholder="Author">
                  </div>
                  <div class="form-group">
                    <label for="pages">Pages</label>
                    <input type="number" name="pages" class="form-control" id="pages" placeholder="Pages">
                  </div>
                  <div class="form-group">
                    <label for="pubdate">Published Date</label>
                    <input type="date" name="pubdate" class="form-control" id="pubdate" placeholder="pubdate">
                  </div>                   
                  <div class="form-group">
                    <label>File upload</label>
                    <div class="input-group col-xs-12">
                      <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
      	</div>
      </div>
  </div>
@endsection
