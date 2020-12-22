@extends('viewdef')
@section('category')
    @foreach($category as $cat)
        @if(\Illuminate\Support\Facades\Auth::guest() || $user->rolename == 'User')
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
        <form action="/searchview/{{$selcat->categoryid}}" method="get" enctype="multipart/form-data" class="form-inline">
            @csrf
                <div class="form-group mx-sm-3 mb-2">
                    <select class="form-control" name="searchtype">
                        <option value="flowername">Name</option>
                        <option value="price">Price</option>
                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Search" name="searchname">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="row my-3">
        @foreach($flower as $catflow)
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
            @endforeach

        </div>
        <div class="">
            {{ $flower->links() }}
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
                    <a class="dropdown-item" href="/history">Transaction History</a>
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
