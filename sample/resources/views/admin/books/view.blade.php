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
                <h4 class="card-title">Book</h4>
                	<div class="form-group">
                		<label>Title:</label>
                		<h4>{{ $book->title }}</h4>
                	</div>
                	<div class="form-group">
                		<label>Author:</label>
                		<h4>{{ $book->author }}</h4>
                	</div>
                	<div class="form-group">
                		<label>Pages:</label>
                		<h4>{{ $book->pages }}</h4>
                	</div>
                	<div class="form-group">
                		<label>Date:</label>
                		<h4>{{ $book->date_published }}</h4>
                	</div>
                	<div class="form-group">
                		<label>Image:</label>
                		<div class="image">
                			<img style="100%" src="/{{ $book->img }}">
                		</div>
                	</div>
              </div>
            </div>
      	</div>
      </div>
  </div>
@endsection
