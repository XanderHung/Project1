@extends('viewdef')

@section('content')
<div class="border rounded my-4 p-3 container bg-light">
    <div class="col-sm-offset-2 col-sm-20 well-sm">
        <h2>Change Password</h2>
    </div>
        <form class="form-horizontal" action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-5" for="email">E-mail address</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" for="password">Old Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" for="password">New Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password_confirmation">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" for="password">Confirm New Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password_confirmation">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </div>
        </form>
    </div>
@endsection
