@extends('viewdef')
@section('category')
    @foreach($category as $cat)
        <a class="dropdown-item" href="/viewcategory/{{$cat->categoryname}}">{{$cat->categoryname}}</a>
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
            <a href="/detailflower/{{$catflow->flowername}}">
            <img class="card-img-top" src="{{asset('upload/flower/' . $catflow->flowerimage)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">{{$catflow->flowername}}</h5>
                <div class="text-center">
                    <a href="/editflow/{{$catflow->flowerid}}" class="btn btn-primary">Update</a>
                    <a href="/delflower/{{$catflow->flowerid}}" class="btn btn-danger">Delete</a>
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
