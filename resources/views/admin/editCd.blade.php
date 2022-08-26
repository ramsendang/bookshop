@extends('layouts.back')
@section('title','Edit CD')
@section('content')
<div class="row w-100">
    <div class="col">
        <div class="row p-2">
            <div class="col">
                <form action="/back/cd" method="get">
                @csrf
                    <button class="btn-primary">Back</button>
                </form>
            </div>
        </div>
        <div class="row p-2">
            <div class="col">
                <form action="/admin/cd/edit/{{$cd->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method ('put')
                    <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" id="formGroupExampleInput" placeholder="Book Title" value="{{Auth::User()->id}}"> 
                    </div>
                    <div class="form-group">
                        <label for="title">Book Title</label>
                        <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Book Title" value="{{$cd->title}}">
                    </div>
                    @error('title')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="author">Book Author</label>
                        <input type="text" name="author" class="form-control" id="formGroupExampleInput" placeholder="Book Author" value="{{$cd->author}}">
                    </div>
                    @error('author')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="formGroupExampleInput" placeholder="price" value="{{$cd->price}}">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="numpages">Playlength</label>
                        <input type="text" name="playlength" class="form-control" id="formGroupExampleInput" placeholder="numpages" value="{{$cd->playlength}}">
                    </div>
                    @error('numpages')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" name="cover_image" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Book</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
