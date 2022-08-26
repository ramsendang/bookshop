@extends ('layouts.front')
@section('title','CD')
@section ('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="item_title">CD'S</h4>
        </div>
    </div>
    <div class="row p-2">
        <div class="col d-flex justify-content-around flex-wrap">
            @foreach($cd as $cds)
            <div class="card mb-2 card_container" style="width:18rem; min-height:360px;">
                <img src="{{ asset('storage/images')}}/{{$cds->cover_image}}" class="img-fluid card_image" alt="cover_image">
                <div class="card-body card_body">
                    <a href="/cd/{{$cds->id}}">
                        <h4>Book Title: {{$cds->title}}</h4>
                    </a>
                    <p class="card-text">
                        by {{$cds->author}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{$cd->links()}}
        </div>
    </div>
</div>

@endsection