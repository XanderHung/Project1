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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
<div class="container">


    <div class="container mt-3 rounded">
        <div class="border rounded mx-2 my-2 p-3 bg-light">
            <div class="title text-center my-2">
                    <h1>Edit Category</h1>
            </div>

            <form action={{url('/updatecategory/'.$selcat->categoryid)}} method="POST" enctype="multipart/form-data" class="form-horizontal my-5">
                @csrf
                <div class="row">
                        <div class="col-md-4">
                        <img class="img-thumbnail rounded mx-auto d-block" src="{{asset('upload/category/' . $selcat->categoryimage)}}" alt="Card image cap">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-sm-7" for="catname">Category Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="catname" placeholder="Category Name" name="categoryname" value="{{$selcat->categoryname}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-7" for="catimage">Category Image</label>
                                <div class="col-sm-12">
                                    <input name="categoryimage" type="file" class="form-control-file" id="catimage">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>

            </form>
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

