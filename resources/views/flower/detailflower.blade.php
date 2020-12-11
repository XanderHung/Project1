@extends('viewdef')
@section('category')
    @foreach($category as $cat)
        <a class="dropdown-item" href="/viewcategory/{{$cat->categoryname}}">{{$cat->categoryname}}</a>
    @endforeach
@endsection
@section('content')

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
                    <a class="dropdown-item" href="/viewcat">Change Password</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            @else
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/addflower">Add Flower</a>
                    <a class="dropdown-item" href="/mancat">Manage Category</a>
                    <a class="dropdown-item" href="/viewcat">Change Password</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            @endif
        </li>
    @endif
@endsection

