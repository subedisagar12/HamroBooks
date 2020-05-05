@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Book') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('book.store')}}" enctype='multipart/form-data'>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name of Book') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name"  required  autofocus>

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control " name="author"  required >

                               
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="pub" class="col-md-4 col-form-label text-md-right">{{ __('Publication') }}</label>

                            <div class="col-md-6">
                                <input id="pub" type="text" class="form-control " name="publication"  required >

                               
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="ed" class="col-md-4 col-form-label text-md-right">{{ __('Edition') }}</label>

                            <div class="col-md-6">
                                <input id="ed" type="text" class="form-control " name="edition"  required >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control " name="price"  required >
                            </div>
                        </div>

                    <!-- Categoty Form -->
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                            <select class="custom-select" name="category">
                                <option selected>Choose Category</option>
                                    @foreach($categories as $category)
                                       <option value="{{$category->name}}"> {{$category->name}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Cover Image') }}</label>

                            <div class="col-md-6">
                                <div class="custom-file" id='image'>
                                    <input type="file" class="custom-file-input" id="customFile" name='image'>
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                           
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                        <button class="btn btn-primary btn-block" type="submit">Add to Sales</button>
                        </div>
                        <div class="col-sm-2"></div>
                                
                            
                        </div>
                        
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
