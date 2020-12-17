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
<!--Section: Block Content-->


  <!--Grid row-->
  <div class="container mt-3 rounded">
        <div class="row">

    <!--Grid column-->
    <div class="rounded col-md-12 mx-2 my-2 p-3 bg-light">

      <!-- Card -->
      <div class="card wish-list mb-3">
        <div class="card-body">

        <h5 class="mb-4">Cart (<span>{{ count((array) session('cart')) }}</span> items)</h5>
          @foreach(session('cart') as $id => $details)
          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                  <div class="mask waves-effect waves-light">
                  <img class="card mx-auto my-auto" style="width: 15rem;" src="{{asset('upload/flower/'.$details['photo']) }}">
                    <div class="mask rgba-black-slight waves-effect waves-light"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
            
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5>{{ $details['name'] }}</h5>
                  </div>
                  <div>
                    <div class="def-number-input number-input safari_only mb-0 w-100">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                      <input class="quantity" min="0" name="quantity" value="{{ $details['quantity'] }}" type="number">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                    {{ $details['quantity'] }}
                    </small>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <a href="/removeitemcart/{{ $details['name'] }}" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                  </div>
                  <p class="mb-0"><span><strong>Rp{{ $details['price'] * $details['quantity']}},-</strong></span></p>
                </div>
              </div>
             
            </div>
          </div>
          @endforeach
        </div>
      </div>
        <div class="container col-sm-auto mt-2">
            <button type="submit" class="btn btn-success btn-lg btn-block">Checkout</button>
        </div>
    </div>
  </div>
  

<!--Section: Block Content-->
    <!-- <div class="container mt-3 rounded">
        <div class="border rounded mx-2 my-2 p-3 bg-light">
            <div class="title text-center my-2">
                <h1>Edit Category</h1>
            </div>
            <form>
                @foreach(session('cart') as $id => $details)
                
                    <div class="row mt-2 cart-detail">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img class="card mx-auto my-auto" style="width: 15rem;" src="{{asset('upload/flower/'.$details['photo']) }}">
                            </div>
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-product">
                                <p>{{ $details['name'] }}</p>
                                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                <div class="mt-2 col-lg-5 col-sm-5 col-5">
                                    <button type="submit" class="btn btn-danger btn-block">Remove</button>
                                </div>
                            </div>
                    </div>
                
                @endforeach
                <div class="container col-md-auto mt-4">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Checkout</button>
                </div>
            </form>
        </div>
    </div> -->
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

