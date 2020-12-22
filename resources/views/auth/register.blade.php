@extends('viewdef')
@section('category')
    @foreach($category as $cat)
            <a class="dropdown-item" href="/viewflower/{{$cat->categoryname}}">{{$cat->categoryname}}</a>
    @endforeach
@endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-warning">
            {{$errors->first()}}
        </div>
    @endif
<div class="container">
    <div class="col-sm-offset-2 col-sm-20 well-sm">
        <h2>Register</h2>
    </div>
        <form class="form-horizontal" action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="username">Username</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">E-mail address</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Confirm-Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password_confirmation">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="gender">Gender</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label><input type="radio" name="gender" value="Male">Male</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="gender" value="Female">Female</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="dob">Date of Birth</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="mm/dd/yyyy">
                    </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="address">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" rows="2" placeholder="address" name="address">
                    </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
@endsection

