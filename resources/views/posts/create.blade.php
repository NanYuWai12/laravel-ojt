@extends('posts.layout')
<div class="create">
@section('content')
<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-center">Add New Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>
</div>
     
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Post Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Post Title" value="{{old('title')}}">
                @error('title')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Body:</strong>
                        <textarea type="text" name="body" class="form-control" rows="3" placeholder="Company Email">{{old('body')}}</textarea>
                        @error('body')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <select name="category_id" class="block w-full mt-1 rounded-md form-control">
                    <option value="" >Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="url" id="image" class="form-control @error('url') is-invalid @enderror" placeholder="image">
               @error('url')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 mb-2">
                    <img id="preview-image"
                     style="max-height: 250px;">
                </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endsection