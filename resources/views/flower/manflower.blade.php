@extends('viewdef')
@section('category')
    @foreach($category as $cat)
            <a class="dropdown-item" href="/manflower/{{$cat->categoryname}}">{{$cat->categoryname}}</a>
    @endforeach
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="border rounded my-4 p-3 container bg-light">
        <div class="title text-center my-2">
            <h1>{{$selcat->categoryname}}</h1>
        </div>
        <form action="/searchman/{{$selcat->categoryid}}" method="get" enctype="multipart/form-data" class="form-inline">
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
                <div class="card mx-auto my-2" style="width: 15rem;">
                    <img class="card-img-top" src="{{asset('upload/flower/' . $catflow->flowerimage)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-center"><a href="/detflower/{{$catflow->flowerid}}">{{$catflow->flowername}}</a></h5>
                        <div class="text-center">
                            <a href="/editflower/{{$catflow->flowerid}}" class="btn btn-primary">Update</a>
                            <a href="/delflower/{{$catflow->flowerid}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
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
