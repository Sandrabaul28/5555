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
      			<a href="{{ route('books.create') }}" class="btn btn-gradient-success btn-rounded btn-fw">Add Book</a>
        	</div>
    	</div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
        	<div class="card">
          <div class="card-body">
                <h4 class="card-title">LIST OF BOOKS</h4>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Pages</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($books as $book)
                        <tr>
                          <td>{{ $book->id }}</td>
                          <td>{{ $book->title }}</td>
                          <td>{{ $book->author }}</td>
                          <td>{{ $book->pages }}</td>
                          <td><a href="{{ route('books.view', ['id'=> $book->id]) }}">View</a></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="mt-4">{{ $books->links() }}</div>
              </div>
        	</div>

      	</div>
      </div>
  </div>
@endsection
