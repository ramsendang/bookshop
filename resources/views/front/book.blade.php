@extends ('layouts.front')
@section('title','Book')
@section ('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="item_title">BOOK'S</h4>
        </div>
    </div>
    <div class="row p-2">
        <div class="col d-flex justify-content-around flex-wrap">
            @foreach($book as $books)
            <div class="card mb-2 card_container" style="width:18rem; min-height:360px;">
                <img src="{{ asset('storage/images')}}/{{$books->cover_image}}" class="img-fluid card_image" alt="cover_image">
                <div class="card-body card_body">
                    <a href="/book/{{$books->id}}">
                        <h4>Book Title: {{$books->title}}</h4>
                    </a>
                    <p class="card-text">
                        by {{$books->author}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{$book->links()}}
        </div>
    </div>
</div>

@endsection