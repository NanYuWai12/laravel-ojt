@extends('products.layout')
<div class="create">
@section('content')
<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-center">Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
     
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name') }}" placeholder="Name">
                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror   
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" rows="3" cols="50" name="detail" placeholder="Detail">
                {{ old('detail') }}
            </textarea>
                @error('detail')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="image">
                @error('image')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
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