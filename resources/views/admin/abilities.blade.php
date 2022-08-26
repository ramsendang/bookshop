@extends('layouts.back')
@section('title', 'Ability')
@section('content')
<div class="row h-100 table-responsive">
    <div class="col">
        <h2>Ability Master</h2>
        <form action="/admin/abilities/add" method="get">
            @csrf
            <button type="submit" class="btn-primary">add ability</button>
        </form>
        <table class="table table-hover p-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">label</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ability as $abilities)
                <tr>
                    <th scope="row">{{$abilities->id}}</th>
                    <td>{{$abilities->name}}</td>
                    <td>{{$abilities->label}}</td>
                    <td>
                        <form action="/admin/abilities/edit/{{$abilities->id}}" method="get">
                            @csrf 
                            <button type="submit" class="btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/abilities/delete/{{$abilities->id}}" method="post">
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
