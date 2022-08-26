@extends('layouts.back')
@section('title','Assign Role')
@section('content')
<div class="row w-100">
    <div class="col">
        <div class="row">
            <div class="col">
                <h2>Asign Role</h2>
            </div>
        </div>
        <div class="row p-2">
            <div class="col">
                <form action="/back/assignRole" method="get">
                    @csrf
                    <button class="btn-primary">Back</button>
                </form>
            </div>
        </div>
        <div class="row p-2">
            <div class="col">
                <form action="/admin/user/assignRole/{{$user->id}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="title">for {{$user->name}}</label>
                    </div>
                    <select name="role">
                    @foreach($role as $roles)
                    <option value="{{$roles->id}}">{{$roles->name}}</option>
                    @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Assign Role</button>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection
