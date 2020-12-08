@extends('viewdef')

@section('content')
<div class="row col-md-12 text-center">
    <div class="col">
        <h1>Welcome To Flowelto Shop</h1>
        <h3>The best Flower Shop in Binus University</h3>
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
