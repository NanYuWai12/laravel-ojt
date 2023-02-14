@extends('posts.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center">Laravel CRUD OJT</h2>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form action="{{route('posts.index')}}" method="GET" class="d-flex" role="search">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request()->get('search') }}" />
        <button class="btn btn-outline-success" type="submit">
          Search
        </button>
      </form>
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Body</th>
            <th>Category</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><img src="{{asset('storage/images/'. $post->image->url) }}" width="100px"></td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection