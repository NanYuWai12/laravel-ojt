@extends('posts.layout')

<div class="create">
    @section('content')
        <div class="row mb-3">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="text-center">Edit Post</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="title" value="{{ $post->title ?? old('title') }}" class="form-control"
                            placeholder="title">
                        @error('title')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>Category:</strong>
                        <select name="category_id" class="block w-full mt-1 rounded-md form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @selected($category->id == $post->category_id)>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>Body:</strong>
                        <textarea class="form-control" rows="3" name="body" placeholder="Body">{{ old('body', $post->body) }}</textarea>
                        @error('body')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="url" id="image" class="form-control" placeholder="image">
                        <img src="{{ asset('storage/images/' . $post->image->url) }}" width="300px" id="preview-image">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
