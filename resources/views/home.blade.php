@extends('viewdef')
@section('category')
    @foreach($category as $cat)
        @if(\Illuminate\Support\Facades\Auth::guest() || $user->roleid == 'User')
        <a class="dropdown-item" href="/viewcategory/{{$cat->categoryname}}">{{$cat->categoryname}}</a>
        @else
            <a class="dropdown-item" href="/manflower/{{$cat->categoryname}}">{{$cat->categoryname}}</a>
            @endif
    @endforeach
@endsection
@section('content')
<div class="row col-md-12 text-center">
    <div class="col md-3">
        <h1>Welcome To Flowelto Shop</h1>
        <h3>The best Flower Shop in Binus University</h3>
        <div class="border rounded my-4 p-3 container bg-light">
            <div class="row my-3">
                @foreach($category as $catflow)
                    <div class="card mx-auto my-auto" style="width: 15rem;">
                        <a href="viewcategory/{{$catflow->categoryname}}">
                        <img class="card-img-top" src="{{asset('upload/category/' . $catflow->categoryimage)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$catflow->categoryname}}</h5>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
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
                        <a class="dropdown-item" href="/viewcat">Change Password</a>
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
