@extends('viewdef')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-20 well-sm">
        <h2>Register</h2>
    </div>
        <form class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-sm-2" for="username">Username</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">E-mail address</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Confirm-Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck">
                    Remember me
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="gender">Gender</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label><input type="radio" name="optradio">Male</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="optradio">Female</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="address">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" placeholder="Address">
                    </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                    <div class="divider well-sm"></div>
                        <a class="dropdown-item" href="#">Forgot password?</a>
                    </div>
                </div>
            </div>
        </form>
@endsection