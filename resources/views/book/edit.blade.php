@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('layouts.message')
            <div class="card">
                <div class="card-header">{{ __('Edit Book') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('book.update',$book->id)}}" enctype='multipart/form-data'>
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name of Book') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name"  required  autofocus value="{{$book->name}}">

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control " name="author"  required value="{{$book->author}}">

                               
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="pub" class="col-md-4 col-form-label text-md-right">{{ __('Publication') }}</label>

                            <div class="col-md-6">
                                <input id="pub" type="text" class="form-control " name="publication"  required value="{{$book->publication}}">

                               
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="ed" class="col-md-4 col-form-label text-md-right">{{ __('Edition') }}</label>

                            <div class="col-md-6">
                                <input id="ed" type="text" class="form-control " name="edition"  required value="{{$book->edition}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control " name="price"  required value="{{$book->price}}">
                            </div>
                        </div>

                    <!-- Categoty Form -->
                    <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                            <select class="custom-select" name="category">
                                <option selected>{{$book->category->name}}</option>
                                    @foreach($categories as $category)
                                    @if($category->name != $book->category->name)
                                       <option value="{{$category->name}}"> {{$category->name}}</option>
                                    @endif
                                    @endforeach
                            </select>
                            </div>
                        </div>

                        
                        

                        

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Cover Image') }}</label>

                            <div class="col-md-6">
                               <img src="/storage/book_images/{{$book->cover_img}}"  class="dash-img">

                               <div class="custom-file" id='image'>
                                    <input type="file" name='image'>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                           
                                <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                            
                                <div class="form-check">
                               
                                @if($book->isSold==true)
                                    <input class="form-check-input" type="checkbox"  id="isSold" name='isSold' checked>
                                    <label class="form-check-label" for="isSold">
                                    Mark as Sold
                                    </label>

                                    @else
                                    <input class="form-check-input" type="checkbox"  id="isSold" name='isSold'>
                                    <label class="form-check-label" for="isSold">
                                    Mark as Sold
                                    </label>
                                @endif
                                    
                                </div>
                               
                            </div>
                                <div class="col-sm-2"></div>
                                
                            
                        </div>


                        <div class="form-group row">
                           
                                <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <button class="btn btn-primary btn-block" type="submit">Save and Add</button>
                            </div>
                            <div class="col-sm-2"></div>
                                
                            
                        </div>
                        
            </form>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
