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

    <div class="container mt-3 rounded">
        <div class="border rounded mx-2 my-2 p-3 bg-light">
            <div class="row">
                    <div class="col-md-6">
                                    <img class="card mx-auto my-auto" style="width: 15rem;" src="{{asset('upload/flower/' . $flower->flowerimage)}}" alt="Card image cap">
                    </div>
                    <div class="col-md-6">
                        <div class="title text-left my-2">
                                <h4>{{$flower->flowername}}</h4>
                                <p class="text-success">Rp{{$flower->price}},-</p> <br>
                                <p class="text-muted">{{$flower->description}}</p>
                        </div>
                        @if($user->roleid == 1)
                        <form>
                        <div class="form-row align-items-center">
                            <div class="col-auto my-1">
                            <div class="custom-control">
                               <h5 class="text-left">Quantity</h5>
                            </div>
                            </div>
                            <div class="col-auto my-1">
                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>1</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            </div>
                            <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                        </form>
                        @endif
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

