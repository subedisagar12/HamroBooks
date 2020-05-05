@extends('layouts.app')

@section('content')
<section id="detail" class="mt-4">
    <div class="container">
    
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <img src="/storage/book_images/{{$book->cover_img}}" alt="" class="detail-img mb-2">
                    <h6 class="book-title text-center">{{$book->name}}</h6>
                    <div class="card mt-3 shadow extra">
                      <div class="card-body p-4 text-center">
                        <h5 class="mb-3">Rs. {{$book->price}}</h5>
                        <button class="btn btn-block "> <i class="fa fa-heart-o"></i> Add to favorites</button>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">

                  <!-- General detail -->
                  <div class="card general_detail shadow">

                    

                    <div class="card-body">
                        <table width="100%">
                          
                          <tr>
                          <td class="card-header" colspan="2">General Details</td>
                          </tr>
                          <tr>
                         
                            <td>Ad id:</td>
                            <td>{{$book->id}}</td>
                          </tr>

                          <tr>
                            <td>Ad Views </td>
                            <td>234</td>
                          </tr>

                          <tr>
                            <td>Ad Posted on: </td>
                            <td> {{$book->created_at->format('Y-m-d')}}</td>
                          </tr>
                        </table>
                    </div>
                  </div>
                  
                    

                  <!-- Seller Info -->
                  <div class="card seller info mt-4 shadow">

                    

                    <div class="card-body">
                        <table width="100%">
                        <tr>
                          <td class="card-header" colspan="2">Seller Details</td>
                          </tr>
                          <tr>
                            <td>Sold By:</td>
                            <td>{{$user->name}}</td>
                          </tr>

                          <tr>
                            <td>Preferred Contact: </td>
                            <td>{{ucfirst($user->preferred_contact)}}</td>
                          </tr>

                          <tr>
                            <td>Contact Info: </td>
                            @if($user->preferred_contact=='email')
                            <td>{{$user->email}}</td>
                            @else
                            <td>{{$user->phone}}</td>
                            @endif
                          </tr>

                          <tr>
                            <td>Address: </td>
                            <td>Balkumari, Gwarko</td>
                          </tr>
                        </table>
                    </div>
                  </div>


                  <!-- Books Detail -->
                  <div class="card seller info mt-4 shadow">


                    <div class="card-body">
                        <table width="100%">
                        <tr>
                          <td class="card-header" colspan="2">Book Details</td>
                          </tr>
                          <tr>
                            <td>Name:</td>
                            <td>{{$book->name}}</td>
                          </tr>

                          <tr>
                            <td>Author: </td>
                            <td>{{$book->author}}</td>
                          </tr>

                          <tr>
                            <td>Edition: </td>
                            <td>{{$book->edition}}</td>
                          </tr>

                          <tr>
                            <td>Publication: </td>
                            <td>{{$book->publication}}</td>
                          </tr>

                          <tr>
                            <td>Category: </td>
                            <td>{{$book->category->name}}</td>
                          </tr>

                          <tr>
                            <td>Price:</td>
                            <td>Rs. {{$book->price}}</td>
                          </tr>
                        </table>
                    </div>
                  </div>
                </div>

                <!-- More from section -->
                <div class="col-lg-3 more-from ">
                  <div class="container">
                    <ul class="list-group">
                    <li class="list-group-item active">Categories</li>
                    @foreach($categories as $category)
                      <a href="{{url('category',$category->id)}}"  class="list-group-item d-flex justify-content-between align-items-center list-group-item-action pr-2">
                        {{$category->name}}
                        <span class="badge badge-primary badge-pill ">{{count($category->Books)}}</span>
                      </a>
                    @endforeach
                    </ul>
                  </div>

                </div>
            </div>
        </div>
    
</div>
</section>


<!-- Similar Books Section -->
<section class="show my-5 greyish">
          <div class="container">
            <div class="section-header">
                <h2 class="pt-5 pb-3">Similar Book</h2>
            </div>

            <div class="section-body my-4">
                <div class="card-deck pb-5">
                @foreach($books as $book)
               
                <a href="{{url('/book',$book->id)}}" class="book-show">
                <div class="card">
                    <div class="card-img-top"><img src="/storage/book_images/{{$book->cover_img}}" alt=""></div>

                    <div class="card-body">
                                    <h3 class=" card-title book-title text-truncate"><a href="{{url('/book',$book->id)}}">{{$book->name}}</a></h3>
                                    <h3 class="book-author text-truncate"><span>{{$book->author}}</span></h3>
                                    <h3 class="book-price text-truncate pb-2"><span>Rs. {{$book->price}}/-</span></h3>

                                    <button class="btn card-btn btn-block btn-sm  "><i class="fa fa-heart-o"></i> Favorites</button>
                                </div>
                </div>
                </a>
               
              
                   
                
            @endforeach
            
                </div>
            </div>
          </div>
            
         
</section>

@endsection