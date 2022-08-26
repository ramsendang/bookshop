@extends('layouts.back')
@section('title','Edit Ability')
@section('content')

<div class="row w-100">
    <div class="col">
        <div class="row p-2">
            <div class="col">
                <form action="/back/ability" method="get">
                    @csrf
                    <button class="btn-primary">Back</button>
                </form>
            </div>
        </div>
        <div class="row p-2">
            <div class="col">
                <form action="/admin/abilities/edit/{{$ability->id}}" method="post">
                @csrf
                @method('put')
                    <div class="form-group">
                        <label for="title">Ability Name</label>
                        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Role Name" value="{{$ability->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="author">Ability label</label>
                        <input type="text" name="label" class="form-control" id="formGroupExampleInput" placeholder="Role Lable" value="{{$ability->label}}">
                    </div>
                    @error('label')
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">edit Ability</button>
                </form>
            </div>
        </div>
    
    </div>
</div> 

@endsection
