@extends('viewdef')

@section('content')

    <div class="container mt-3 rounded">
        <div class="border rounded mx-2 my-2 p-3 bg-light">
        <form action="{{route('addcategory')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="catname">Category Name</label>
            <input name="categoryname" type="text" class="form-control" id="catname">
        </div>
        <div class="form-group">
            <label for="catimage">Category Image</label>
            <input name="categoryimage" type="file" class="form-control-file" id="catimage">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
