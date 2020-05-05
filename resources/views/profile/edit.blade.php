@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{route('profile.update',$user->id)}}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" required value="{{$user->phone}}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Preferred Contact') }}</label>
                            <div class="col-md-6">
                            @if($user->preferred_contact=='phone')
                            <div class="form-check form-check-inline">
                                
                                <input class="form-check-input" type="radio" name="preferred_contact"  value="phone" id='phone' checked>
                                <label class="form-check-label" for="phone">Phone</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="preferred_contact"  value="email" id='email'>
                                <label class="form-check-label" for="email">Email</label>
                            </div>

                            @else
                            <div class="form-check form-check-inline">
                                
                                <input class="form-check-input" type="radio" name="preferred_contact"  value="phone" id='phone' >
                                <label class="form-check-label" for="phone">Phone</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="preferred_contact"  value="email" id='email' checked>
                                <label class="form-check-label" for="email">Email</label>
                            </div>
                            @endif
                            
                                <small>(This contact will be displayed in your ad.)</small>
                            </div>
                        </div>


                        

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info" >
                                    {{ __('Save') }}
                                </button>

                                <a href="{{route('password.request')}}" class="btn btn-danger">
                                    {{ __('Change Password') }}
                                </a>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
