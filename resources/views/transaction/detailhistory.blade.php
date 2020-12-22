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
    <div class="card wish-list mb-3">
            <div class="container">
                <h2 class="text-center mt-4">Your Transaction at {{ $selhist->transactiondate }}</h2>

                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Flower Image</th>
                    <th scope="col">Flower Name</th>
                    <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                    <?php $i=0 ?>
                @foreach($item as $items)
                <tbody>
                    <tr>
                        <td><img class="card" style="width: 10rem; height:10rem;" src="{{asset('upload/flower/' . $items->flowerimage)}}" alt="Card image cap"></td>
                        <td>{{$items->flowername}}</td>
                        <td>{{$items->price * $items->quantity}}</td>
                        <?php $i += $items->price * $items->quantity ?>
                        </tr>
                    <tr>
                </tbody>
                @endforeach
                </table>
                <div class=" d-flex flex-row-reverse">Total Price : Rp. {!! $i !!},-</div>
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
