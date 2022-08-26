@extends ('layouts.front')

@section('title','Home')

@section('content')


<!-- two column grid  -->
<div class="container">
    <!-- banner image  -->
    <div class="row image_banner">
        <div class="col position-relative banner_container">
            <img src="{{ asset('images/banner_image.jpg') }}" class="img-fluid custom_style_image" alt="cover_image">
            <div class="banner_text_container">
                <div class="banner_text">
                    <h2 class="text-white shadow-sm">We have more than 50,000 titles to choose from</h2>
                    <form action="">
                        <input type="submit" value="Explore Now">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <div class="row p-2">
                <div class="col">
                    <h4 class="item_title">LATEST BOOK'S</h4>
                </div>
            </div>

            <div class="row p-2">
                <div class="col">
                    @foreach($latestbook as $latestbooks)
                    <div class="card mb-2 shadow-sm card_container">
                        <img src="/storage/images/{{$latestbooks->cover_image}}" class="img-fluid card_image" alt="cover_image">
                        <div class="card-body card_body">
                            <a href="/book/{{$latestbooks->id}}" class="text-black">
                                <h4 class="card-heding">
                                    Book Name: {{$latestbooks->title}}
                                </h4>
                            </a>
                            <p>by {{$latestbooks->author}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <h4 class="item_title">LATEST CD'S</h4>
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <!-- single card  -->
                    @foreach($latestcd as $latestcds)
                    <div class="card mb-2 shadow-sm card_container">
                        <img src="/storage/images/{{$latestcds->cover_image}}" class="img-fluid card_image" alt="cover_image">
                        <div class="card-body card_body">
                            <a href="/cd/{{$latestcds->id}}" class="text-black">
                                <h4 class="card-heding">
                                     Name: {{$latestcds->title}}
                                </h4>
                            </a>
                            <p>by {{$latestcds->author}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>    
        <div class="col-lg-9 col-sm-12">
            <div class="row p-2">
                <div class="col">
                    <h4 class="item_title">BOOK's</h4>
                </div>
            </div>
            <div class="row p-2">
                <div class="col d-flex flex-wrap justify-content-around">
                    <!-- single card -->
                    @foreach($book as $books)
                    <div class="card mb-2 shadow-sm card_container" style="width:16rem">
                        <img src="/storage/images/{{$books->cover_image}}" class="img-fluid card_image" alt="cover_image">
                        <div class="card-body card_body">
                            <a href="/book/{{$books->id}}" class="text-black">
                                <h4 class="card-heding">
                                    {{$books->title}}
                                </h4>
                            </a>
                            <p>by {{$books->author}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row image_banner px-3">
                <div class="col position-relative banner_container_sub">
                    <img src="{{ asset('images/book_banner_sub.jpg') }}" class="img-fluid sub_banner_image" alt="cover_image">
                    <div class="banner_text_container">
                        <div class="banner_text">
                            <h2 class="text-white shadow-sm">Books Are the best learning material available</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <h4 class="item_title">CD's</h4>
                </div>
            </div>
            <div class="row p-2">
                <div class="col d-flex flex-wrap justify-content-around">
                    <!-- single card -->
                    @foreach($cd as $cds)
                    <div class="card mb-2 shadow-sm card_container" style="width:16rem">
                        <img src="/storage/images/{{$cds->cover_image}}" class="img-fluid card_image" alt="cover_image">
                        <div class="card-body card_body">
                            <a href="/cd/{{$cds->id}}" class="text-black">
                                <h4 class="card-heding">
                                    CD title: {{$cds->title}}
                                </h4>
                            </a>
                            <p>by {{$cds->author}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection