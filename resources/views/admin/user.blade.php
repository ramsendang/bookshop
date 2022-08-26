@extends('layouts.back')
@section('title','AdminPannel')
@section('content')
<div class="row h-100 table-responsive">
    <div class="col">
        <h2>User Master</h2>
        <table class="table table-hover p-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">asign role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $users)
                <tr>
                    <th scope="row">{{$users->id}}</th>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>
                        <form action="/admin/user/assignRole/{{$users->id}}" method="get">
                            @csrf 
                            <button type="submit" class="btn-primary">asign role</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col">
                {{$user->links()}}
            </div>
        </div>
    </div>
</div>  

@endsection
