@extends('viewdef')
@section('category')
    @foreach($category as $cat)
        <a class="dropdown-item" href="/viewcategory/{{$cat->categoryname}}">{{$cat->categoryname}}</a>
    @endforeach
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="title text-center my-2">
            <h1>Flower Category</h1>
        </div>

        <div class="row my-3">
            @foreach($category as $catflow)
                <div class="card mx-auto my-2" style="width: 15rem;">
                    <img class="card-img-top" src="{{asset('upload/category/' . $catflow->categoryimage)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$catflow->categoryname}}</h5>
                        <div class="text-center">
                            <a href="/editcat/{{$catflow->categoryid}}" class="btn btn-primary">Update</a>
                            <a href="/mancat/{{$catflow->categoryid}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
@section('userinfo')
    @foreach($user as $users)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$users->rolename}}
            </a>
            @if($users->rolename == 'User')
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/logout">Logout</a>
                    <a class="dropdown-item" href="/viewcat">View Category</a>
                </div>
            @else
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/logout">Logout</a>
                    <a class="dropdown-item" href="/mancat">Manage Category</a>
                    <a class="dropdown-item" href="/viewcat">View Category</a>
                </div>
            @endif

        </li>
    @endforeach
@endsection
