@extends('layouts.back')
@section('title','AdminPannel')
@section('content')
<div class="row h-100 table-responsive">
    <div class="col">
        <h2>CD Master</h2>
        <form action="/admin/cd/add" method="get">
        @csrf
            <button class="btn-primary">Add CD</button>
        </form>
        <table class="table table-hover p-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Price</th>
                    <th scope="col">Pages</th>
                    <th scope="col">Images</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cd as $cds)
                <tr>
                    <th scope="row">{{$cds->id}}</th>
                    <td>{{$cds->title}}</td>
                    <td>{{$cds->author}}</td>
                    <td>{{$cds->price}}</td>
                    <td>{{$cds->playlength}}</td>
                    <td>{{$cds->cover_image}}</td>
                    <td>
                        <form action="/admin/cd/edit/{{$cds->id}}" method="get">
                        @csrf
                            <button type="submit" class="btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/cd/delete/{{$cds->id}}" method="post">
                        @csrf 
                        @method('delete')
                            <button type="submit" class="btn-danger">X</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- book pagination  -->
        <div class="row p-2">
            <div class="col">
                <div class="container">
                    {{$cd->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
