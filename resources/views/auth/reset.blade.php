@extends('viewdef')
@section('category')
    @foreach($category as $cat)
        @if(\Illuminate\Support\Facades\Auth::guest() || $user->roleid == 'User')
            <a class="dropdown-item" href="/viewflower/{{$cat->categoryname}}">{{$cat->categoryname}}</a>
        @else
            <a class="dropdown-item" href="/manflower/{{$cat->categoryname}}">{{$cat->categoryname}}</a>
        @endif
    @endforeach
@endsection
@section('content')
<div class="border rounded my-4 p-3 container bg-light">
    <div class="col-sm-offset-2 col-sm-20 well-sm">
        <h2>Change Password</h2>
    </div>
        <form class="form-horizontal" action="/editpass" method="POST" enctype="multipart/form-data">
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
                <input type="password" class="form-control" id="password" placeholder="Password" name="passwordold">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" for="password">New Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
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
@section('userinfo')
    @if(\Illuminate\Support\Facades\Auth::guest())
    @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$user->rolename}}
            </a>
            @if($user->rolename == 'User')
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/viewcat">My Cart</a>
                    <a class="dropdown-item" href="/viewcat">Transaction History</a>
                    <a class="dropdown-item" href="/editpass">Change Password</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            @else
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/addflower">Add Flower</a>
                    <a class="dropdown-item" href="/mancat">Manage Category</a>
                    <a class="dropdown-item" href="/editpass">Change Password</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            @endif
        </li>
    @endif
@endsection

