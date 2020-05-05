@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('layouts.message')
            <div class="card">
                <div class="card-header">Add Categories</div>

                <div class="card-body">
                    <form method="POST" action="{{route('category.store')}}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="title"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            

                            
                        </div>

                       <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                    <button class="btn btn-primary btn-block" type="submit">Add Category</button>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            
                       </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
