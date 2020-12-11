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
    <div class="container mt-3 rounded">
        <div class="border rounded mx-2 my-2 p-3 bg-light">
        <div><h1 class="mb-4 d-flex justify-content-center">Add Flower</h1></div>
        <form action="/addflower" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <div class="mb-3">
                <label for="category">Category</label>
                    <select class="form-control" id="category" name="categoryid">
                        @foreach($category as $cat)
                        <option value="{{$cat->categoryid}}">{{$cat->categoryname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div class="form-group">
            <label for="flowername">Flower Name</label>
            <input name="flowername" type="text" class="form-control" id="flowername">
        </div>
        <div class="form-group">
            <label for="flowerprice">Flower Price</label>
            <input name="price" type="number" class="form-control" id="flowerprice" min="50000">
        </div>
        <div class="form-group">
            <label for="flowerprice">Description</label><br>
            <textarea rows="2" cols="50" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="flowerimage">Category Image</label>
            <input name="flowerimage" type="file" class="form-control-file" id="flowerimage">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
                    <a class="dropdown-item" href="/viewcat">Change Password</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            @endif
        </li>
    @endif
@endsection

