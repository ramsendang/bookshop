@extends ('layouts.front')
@section('title','Cd')
@section ('content')

<div class="container">
    <div class="row p-2">
        <div class="col d-flex justify-content-around flex-wrap">
            <div class="card mb-2">
                <img src="{{ asset('storage/images')}}/{{$cd->cover_image}}" class="img-fluid" alt="cover_image">
                <div class="card-body">
                    <h4>Cd Title: {{$cd->title}}</h4>
                    <p class="card-text">
                        by {{$cd->author}}
                    </p>
                    <p class="card-text">
                        Playlength: {{$cd->playlength}} minute.
                    </p>
                    <form action="">
                    <p>Price: Rs. {{$cd->price}}</p>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart">Add to cart</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection