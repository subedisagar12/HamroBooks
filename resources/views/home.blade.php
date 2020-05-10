@extends('layouts.app')

@section('content')
<section class="dashboard-show show greyish">
          <div class="container">
            <div class="section-header">
                <h2 class="pt-5 pb-3">Your Books
                <span class="float-right"><a class="btn  sell-btn" href="{{route('book.create')}}">Sell Book</a></span>
                </h2>
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
@endsection
