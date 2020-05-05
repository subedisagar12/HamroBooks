@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-8">
        @include('layouts.message')
            <div class="card">
                <div class="card-header">Dashboard
                    
                    <a href="{{route('category.create')}}" class="btn btn-info float-right">Create Category</a>
                    <a href="{{route('book.create')}}" class="btn btn-warning float-right mx-2">Sell Book</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if(count($books)==0)
                            <p class='lead'>No books added to sales!!</p>


                            @else
                    <ul class="all-ul">
                    @foreach($books as $book)
                            <!--single book start  1-->
                            <li class="single-book-li">
                                <div class="book-image">
                                    <a href="single-book.html" class="book-image-link">
                                        <img src="/storage/book_images/{{$book->cover_img}}" class="book-image-img"
                                            alt="Living in the Light: A guide to personal transformation"
                                            title="Living in the Light: A guide to personal transformation"
                                             />
                                    </a>
                                    <i class="fas fa-eye view"  onmouseover="this.style.zIndex=8"></i>
                                
                                </div>

                                <div class="book-info">
                                    <a href="single-book.html" class="book-name">
                                        <h5 class="book-name-head">
                                            {{$book->name}}
                                        </h5>
                                    </a>
                                    <ul class="all-ul">
                                        <li class="book-things-li">Rs. {{$book->price}}</li>
                                        <li class="book-things-li">-</li>
                                        <li class="book-things-li">Edition: {{$book->edition}}</li>
                                        <li class="book-things-li di-none">-</li>
                                        <li class="book-things-li di-none">Publication: {{$book->publication}}</li>
                                        <li class="book-things-li">-</li>
                                        <li class="book-things-li">Author: {{$book->author}}</li>
                                    </ul>
                                        <form action="{{route('book.destroy',$book->id)}}" class="form-inline" method='post'> 
                                            @csrf
                                            @method('delete')
                                            <div class="form-group">
                                                <button class="btn btn-sm  mx-2 dash-btn"> <a href="{{route('book.edit',$book->id)}}"> <i class="fa fa-edit"></i> Edit</a></button>
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-sm  mx-2 dash-btn" type="submit"> <i class="fa fa-trash"></i> Delete</button>
                                            </div>
                                        </form>
                                </div>
                            </li>
                        @endforeach    
                        </ul>
                        {{$books->links()}}
                        @endif
               

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
