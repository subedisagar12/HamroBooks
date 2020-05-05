@extends('layouts.app')

@section('content')

<!-- Search Box -->
<section class="search-search">
<header>
<div class="flex d-flex flex-column justify-content-around">
                <div class="flex-item"></div>
                <div class="flex-item">
                    <div class="container">
                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-lg-3"></div>
                        <div class="col-sm-6 col-md-8 col-lg-6">
                        <form action="/search" method="post">
                            @csrf
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search by Title/Author/Publication" aria-label="Username" aria-describedby="basic-addon1" name="search">
                            <div class="input-group-append">
                                <button class="btn" type="submit" id="button-addon2"><i class="fa fa-search">  </i></button>
                            </div>
                            
                            </div>
                        </div>
                        </form>
                        <div class="col-sm-3 col-md-2 col-lg-3"></div>
                        </div>
                    </div>
                </div>
                <div class="flex-item"></div>
                <div class="flex-item"></div>
            </div>
</header>


    @if(count($books)==0)
        <h3>No Results of {{$query}}</h3>


        @else
        <section class="show mb-5 greyish">
          <div class="container">
            <div class="section-header">
                <h2 class="pt-5 pb-3">Results For " {{$query}} "</h2>
            </div>

            <div class="section-body my-4">
                <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-3 row-cols-lg-5 ">
                @foreach($books as $book)
                    <div class="col mb-4">
                    <a href="{{url('/book',$book->id)}}" class="book-show">
                        <div class="card">
                           <div class="card-img-top"><img src="/storage/book_images/{{$book->cover_img}}"></div> 
                            <div class="card-body">
                            <h3 class=" card-title book-title text-truncate"><a href="{{url('/book',$book->id)}}">{{$book->name}}</a></h3>
                                    <h3 class="book-author text-truncate"><span>{{$book->author}}</span></h3>
                                    <h3 class="book-price text-truncate pb-2"><span>Rs. {{$book->price}}/-</span></h3>

                                    <button class="btn card-btn btn-block btn-sm  "><i class="fa fa-heart-o"></i> Favorites</button>
                                
                            </div>
                        </div>
                    </a>
                    </div>
                    @endforeach
                </div>
            </div>     
            
         
</section>
    @endif

</section>

@endsection