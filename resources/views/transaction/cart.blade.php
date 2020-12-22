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
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                  <div class="mask waves-effect waves-light">
                  <img class="card mx-auto my-auto" style="width: 15rem;" src="{{asset('upload/flower/'.$details['photo'])}}">
                    <div class="mask rgba-black-slight waves-effect waves-light"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
                <div class="con">
                <div class="d-flex justify-content-between">
                  <div>
                      <h5>{{ $details['name'] }}</h5>
                  </div>
                  <div>
                    <div class="def-number-input number-input safari_only mb-0 w-100">
                      <input id="quantity" class="quantity" min="0" name="quantity" value="{{ $details['quantity'] }}" type="number">
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                        {{ $details['quantity'] }}
                    </small>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="mb-0"><span><strong>Rp{{ $details['price'] * $details['quantity']}},-</strong></span></p>
                  <div class="form-group">
                      <button class="btn btn-success update" data-id="{{$id}}">Update</button>
                  </div>
                </div>
              </div>

            </div>
          </div>
          @endforeach
                @endif

        </div>
      </div>
        <div class="container col-sm-auto mt-2">
            <a href="/checkout"><button class="btn btn-success btn-lg btn-block">Checkout</button></a>
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

@section('script')
    <script>
        $(document).ready(function () {
            $(".update").click(function (e) {
                e.preventDefault();
                var x = $(this);
                $.ajax({
                    url:"{{url('/updatecart')}}",
                    method: 'patch',
                    data: { _token: '{{csrf_token()}}',id: x.attr("data-id"),quantity: x.parents(".con").find(".quantity").val()},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection

