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
        <div class="title text-center my-2">
            <h1>{{$selcat->categoryname}}</h1>
        </div>

        <div class="row my-3">
        @foreach($flower as $catflow)
            @if($catflow->categoryid === $selcat->categoryid)
        <div class="card mx-auto my-auto" style="width: 15rem;">
        <a href="/detailflower/{{$catflow->flowerid}}" class="card-title text-center">    
        <img class="card-img-top" style="max-height: 15rem;" src="{{asset('upload/flower/' . $catflow->flowerimage)}}" alt="Card image cap">
            <div class="card-body text-center">
                <div class="text-center">
                    <p>{{$catflow->flowername}}<br>{{$catflow->price}}</p>
                </div>
            </div>
        </a>
        </div>
                @endif
            @endforeach
        </div>

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
                    <a class="dropdown-item" href="/viewcart">My Cart</a>
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
