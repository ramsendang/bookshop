@extends('layouts.back')
@section('title','AdminPannel')
@section('content')
<div class="row h-100 table-responsive">
    <div class="col">
        <h2>Book Master</h2>
        <form action="/admin/book/add" method="get">
            @csrf
            <button type="submit" class="btn-primary">Add book</button>
        </form>

        <div class="table-responsive-sm">
            <table class="table table-hover">
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
                    @foreach($book as $books)
                    <tr>
                        <th scope="row">{{$books->id}}</th>
                        <td>{{$books->title}}</td>
                        <td>{{$books->author}}</td>
                        <td>{{$books->price}}</td>
                        <td>{{$books->numpages}}</td>
                        <td>{{$books->cover_image}}</td>
                        <td>
                            <form action="/admin/book/edit/{{$books->id}}" method="get">
                                @csrf 
                                <button type="submit" class="btn-primary">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="/admin/book/delete/{{$books->id}}" method="post">
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
        <!-- book pagination  -->
        <div class="row p-2">
            <div class="col">
                <div class="container">
                    {{$book->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
