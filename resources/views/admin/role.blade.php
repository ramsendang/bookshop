@extends('layouts.back')
@section('title','AdminPannel')
@section('content')
<div class="row h-100 table-responsive">
    <div class="col">
        <h2>Role Master</h2>
        <form action="/admin/role/add" method="get">
            @csrf
            <button type="submit" class="btn-primary">add role</button>
        </form>
        <table class="table table-hover p-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">label</th>
                    <th scope="col">Update</th>
                    <th scope="col">Add ability</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($role as $roles)
                <tr>
                    <th scope="row">{{$roles->id}}</th>
                    <td>{{$roles->name}}</td>
                    <td>{{$roles->label}}</td>
                    <td>
                        <form action="/admin/role/edit/{{$roles->id}}" method="get">
                            @csrf 
                            <button type="submit" class="btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/role/assignAbility/{{$roles->id}}" mehod="get">
                        @csrf
                            <button type="submit" class="btn-primary">Asign Ability</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/role/delete/{{$roles->id}}" method="post">
                        @csrf
                        @method('delete')
                            <button type="submit" class="btn-danger">X</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> 


@endsection
