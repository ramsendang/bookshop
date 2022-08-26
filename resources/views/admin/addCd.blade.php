@extends('layouts.back')
@section('title','Add CD')
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
                <form action="/admin/cd/add" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" id="formGroupExampleInput" placeholder="Book Title" value="{{Auth::User()->id}}"> 
                    </div>
                    <div class="form-group">
                        <label for="title">CD Title</label>
                        <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="CD Title" value="{{old('title')}}">
                    </div>
                    @error('title')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="author">CD creator</label>
                        <input type="text" name="author" class="form-control" id="formGroupExampleInput" placeholder="Cd creator" value="{{old('author')}}">
                    </div>
                    @error('author')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="formGroupExampleInput" placeholder="price" value="{{old('price')}}">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="playlength">Playlength</label>
                        <input type="text" name="playlength" class="form-control" id="formGroupExampleInput" placeholder="playlength" value="{{old('playlength')}}">
                    </div>
                    @error('numpages')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" name="cover_image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Book</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
