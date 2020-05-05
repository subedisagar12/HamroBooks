<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

         <!-- Scripts -->
    <script
			  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
			  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
			  crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


    <!-- Styles -->
        <style>

        *{
            font-family: 'Open Sans', sans-serif;
        }
        .navbar{
            /* background:#232B2B; */
            background:transparent;
        }

        /* .navbar:hover{
            background:#232B2B;
            opacity:0.5;
            transition:background linear 0.5s;
        } */

        .navbar a{
            color:white;
        }

        .navbar a:hover{
            color:#FF0065;
            transition:color ease-out 0.3s;
        }

        .navbar-brand{
            font-family:samarkan;
            font-size:25px;
        }

        
            .header{
                background:url('/img/header.jpg');
                background-size:cover;
                background-position:top;
                width:100%;
                height:35rem;
            }

            .flex{
                width:100%;
                height:35rem;
            }

            .form-control{
                background:transparent;
                color:white;
            }

            .form-control:focus{
                background:transparent;
                color:white;
                border-color:gray;
                box-shadow:none;
            }

            .form-control::placeholder{
                color:white;
                
            }

           .input-group-append .btn{
               color:black;
               background:#D7D7DB;
           }

           .input-group-append .btn:hover{
            background:#FF0065;
            transition:background linear 0.5s;
           }

           .section-header{
            border-bottom:1px solid #dbdbdb;
           
            }

            .section-header h2{
	        font-size:25px;
            }

            .section-header h2 .btn{
                background:#FF0065;
                color:white;
                border-radius:15px;
            }

            .section-header h2 .btn:hover{
                opacity:0.8;
            }

            .card-img-top img{
                width:100%;
                height:15rem;
            }

            .book-title{
                font-weight: bold;
                font-stretch: expanded;
                font-size:15px;
            }

            .card-title a{
                color:black;
                text-decoration:none;
            }

            .card-title a:hover{
                color:#FF0065;
                transition:color ease-out 0.2s;
            }

            .book-author{
                color:#FF0065;
                font-style: italic;
                font-size:14px;
            }

            .book-price {
                font-weight: 700;
                font-size: 14px;
                }

            .card-btn{
                background:#ffffff;
                color:black;
                border:1px solid black;
                border-radius:12px;
            }

            .card-btn:hover{
                background:#FF0065;
                color:white;
                border:1px solid white;
                transition-property: background, color, border ;
                transition-duration:0.6s;
                transition-timing-function:ease-out;
            }

            .card-deck .card:hover{
                background:#F2F2F2;
            }

            #sell-here{
                width:100%;
                height:16rem;
                background:url('/img/sell1.jpg');
                background-size:cover;
                background-position:bottom ;
            }

            #sell-here h2{
                color:white;
                font-weight:1000;
                
            }

            .sell-here-btn{
                background:#ffffff;
                color:black;
                
                border-radius:12px;
            }

            .sell-here-btn:hover{
                background:#FF0065;
                color:white;
                
                transition-property: background, color ;
                transition-duration:0.6s;
                transition-timing-function:ease-out;
            }

            .greyish{
                background:#F2F2F2;
            }
            /*           
          .header img{
              width:100%;
              height:100%;
          } */
            </style>

    </head>
    <body>

        <header class="header">
            <!-- <img src="{{asset('img/header1.jpg')}}" alt=""> -->
            
            <nav class="navbar navbar-expand-sm ">
            <div class="container">
                <a href="" class="navbar-brand">HamroBooks</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    @if(Route::has('login'))
                    @auth
                        <li class="nav-item"><a href="{{url('/home')}}" class="nav-link">Dashboard</a></li>

                        @else
                        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-heart-o"></i></a></li>
                        <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
                        @if(Route::has('register'))
                        <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Register</a></li>
                        @endif
                        
                    @endauth

                    @endif
                    
                </ul>
                </div>
            </div>
                
            </nav>

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

    <!-- Sell Here Section -->

    <section id="sell-here" class="my-4 py-5 ">
    <h2 class="text-center pb-3">
            Do you want to sell your books?
          </h2>
    <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4 px-5">
          
    <a href="/home" class="sell-here-btn btn btn-block">Sell Here</a>
          </div>
          <div class="col-sm-4"></div>
    </div>
        
    </div>
   
          
    </section>


<!-- Recently Added Section -->

          <section id="recently-added" class="show my-5">
            <div class="container">
                <div class="section-header">
                    <h2 class="py-3">Recently Added Books</h2>
                    
                </div>

                <!-- Section Body -->

                <div class="section-body my-4">
                    <div class="card-deck">
                        @foreach($books->take(5) as $book)
                        <a href="{{route('book.show',$book->id)}}" class="book-show">
                            <div class="card">
                            <!-- Card Image -->
                                <div class="card-img-top"><img src="/storage/book_images/{{$book->cover_img}}" alt=""></div>

                                <!-- Card-body -->
                                <div class="card-body">
                                    <h3 class=" card-title book-title text-truncate"><a href="{{url('/book',$book->id)}}">{{$book->name}}</a></h3>
                                    <h3 class="book-author text-truncate"><span>{{$book->author}}</span></h3>
                                    <h3 class="book-price text-truncate pb-2"><span>Rs. {{$book->price}}/-</span></h3>

                                    <button class="btn card-btn btn-block btn-sm "><i class="fa fa-heart-o"></i> Favorites</button>
                                </div>
                            </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
          </section>


<!-- Category Section -->

@foreach($filter_cat as $category)
@if($loop->iteration %2==0)
<section class="show my-4">
          <div class="container">
            <div class="section-header">
                <h2 class="py-3">{{$category->name}}
                    <span class="float-right"><a class="btn btn-sm" href="{{url('category',$category->id)}}">View More</a></span>
                </h2>

               
            </div>

            <div class="section-body my-4">
                <div class="card-deck pb-3">
                @foreach($books as $book)
                @if($book->category_id==$category->id && $counter< 5)
                <a href="{{url('/book',$book->id)}}" class="book-show">
                <div class="card">
                    <div class="card-img-top"><img src="/storage/book_images/{{$book->cover_img}}" alt=""></div>

                    <div class="card-body">
                                    <h3 class=" card-title book-title text-truncate"><a href="{{url('/book',$book->id)}}">{{$book->name}}</a></h3>
                                    <h3 class="book-author text-truncate"><span>{{$book->author}}</span></h3>
                                    <h3 class="book-price text-truncate pb-2"><span>Rs. {{$book->price}}/-</span></h3>

                                    <button class="btn card-btn btn-block btn-sm "><i class="fa fa-heart-o"></i> Favorites</button>
                                </div>
                </div>
                </a>
                <div class="d-none">{{$counter=$counter+1}}</div>
                    <!-- <h1>{{$category->name}}</h1>
                    <h3>{{$book->name}}</h3> -->
                @endif
            @endforeach
            <div class="d-none">{{$counter=0}}</div>
                </div>
            </div>
          </div>
            
         
</section>

@else
<section class="show my-4 greyish">
          <div class="container">
            <div class="section-header">
                <h2 class="pt-5 pb-3">{{$category->name}}
                <span class="float-right"><a class="btn btn-sm" href="{{url('category',$category->id)}}">View More</a></span>
                </h2>
            </div>

            <div class="section-body my-4">
                <div class="card-deck pb-5">
                @foreach($books as $book)
                @if($book->category_id==$category->id && $counter< 5)
                <a href="{{url('/book',$book->id)}}" class="book-show">
                <div class="card">
                    <div class="card-img-top"><img src="/storage/book_images/{{$book->cover_img}}" alt=""></div>

                    <div class="card-body">
                                    <h3 class=" card-title book-title text-truncate"><a href="{{url('/book',$book->id)}}">{{$book->name}}</a></h3>
                                    <h3 class="book-author text-truncate"><span>{{$book->author}}</span></h3>
                                    <h3 class="book-price text-truncate pb-2"><span>Rs. {{$book->price}}/-</span></h3>

                                    <button class="btn card-btn btn-block btn-sm "><i class="fa fa-heart-o"></i> Favorites</button>
                                </div>
                </div>
                </a>
               
               <div class="d-none">{{$counter=$counter+1}}</div>
                    <!-- <h1>{{$category->name}}</h1>
                    <h3>{{$book->name}}</h3> -->
                @endif
            @endforeach
            <div class="d-none">{{$counter=0}}</div>
                </div>
            </div>
          </div>
            
         
</section>

@endif
@endforeach








        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    HamroBooks
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Course Books</a>
                    <a href="https://laracasts.com">Novel</a>
                    <a href="https://laravel-news.com">Science Fiction</a>
                    <a href="https://blog.laravel.com">Autobiography</a>
                    <a href="https://nova.laravel.com">Technology</a>
                    
                </div>
            </div>
        </div> -->
    </body>
</html>
