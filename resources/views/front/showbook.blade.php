@extends ('layouts.front')
@section('title','Book')
@section ('content')

<div class="container">
    <div class="row p-2">
        <div class="col d-flex justify-content-around flex-wrap">
            <div class="card mb-2">
                <img src="{{ asset('storage/images')}}/{{$book->cover_image}}" class="img-fluid" alt="cover_image">
                <div class="card-body">
                    <h4>Book Title: {{$book->title}}</h4>
                    <p class="card-text">
                        by {{$book->author}}
                    </p>
                    <p class="card-text">
                        No. of Pages: {{$book->numpages}}
                    </p>
                    <p>Price: Rs. {{$book->price}}</p>

                    <a href="" class="btn btn-primary"><i class="fa fa-shopping-cart">Add to cart</i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection