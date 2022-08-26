@extends('layouts.back')
@section('title','Edit Role')
@section('content')
<div class="row w-100">
    <div class="col">
        <div class="row p-2">
            <div class="col">
                <form action="/back/role" method="get">
                @csrf
                    <button class="btn-primary">Back</button>
                </form>
            </div>
        </div>
        <div class="row p-2">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h2>Edit Role</h2>
                    </div>
                </div>
                <form action="/admin/role/edit/{{$role->id}}" method="post">
                @csrf
                @method('put')
                    <div class="form-group">
                        <label for="title">Ability Name</label>
                        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Role Name" value="{{$role->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="author">Ability label</label>
                        <input type="text" name="label" class="form-control" id="formGroupExampleInput" placeholder="Role Lable" value="{{$role->label}}">
                    </div>
                    @error('label')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">edit role</button>
                </form>
            </div>
        </div>
    
    </div>
</div> 
@endsection
