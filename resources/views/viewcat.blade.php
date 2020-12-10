@extends('viewdef')
@section('content')
    <div class="border rounded my-4 p-3 container bg-light">
        <div class="title text-center my-2">
            <h1>{{$data_categoryflower}}</h1>
        </div>

        <div class="row my-3">
        @foreach($data_categoryflower as $catflow)
        <div class="card mx-auto my-auto" style="width: 15rem;">
            <img class="card-img-top" src="{{asset('upload/category/' . $catflow->categoryimage)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">{{$catflow->categoryname}}</h5>
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
