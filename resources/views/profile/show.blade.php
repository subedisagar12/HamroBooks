@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row"> 
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        @include('layouts.message')
        <form>

        <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="name" value="{{$user->name}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->email}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="number" class="col-sm-2 col-form-label">Contact Number</label>
                <div class="col-sm-10">
                <input type="email" readonly class="form-control-plaintext" id="number" value="{{$user->phone}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="preferred_contact" class="col-sm-2 col-form-label">Preferred Contact</label>
                <div class="col-sm-10">
                <input type="email" readonly class="form-control-plaintext" id="number" value="{{$user->preferred_contact}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="preferred_contact" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="email" readonly class="form-control-plaintext" id="number" value="{{$user->password}}">
                </div>
            </div>
            
            <a href="{{route('home')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>

            <a href="{{route('profile.edit',$user->id)}}" class="btn btn-dark"><i class="fa fa-edit"> </i> Edit Profile</a>
        </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
@endsection