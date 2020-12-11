@extends('viewdef')
@section('category')
    @foreach($category as $cat)
        <a class="dropdown-item" href="/viewcategory/{{$cat->categoryname}}">{{$cat->categoryname}}</a>
    @endforeach
@endsection
@section('content')
<div class="container">
    <div class="mt-5">
        <h2>Login</h2>
    </div>
    <div class="mt-3">
        <form class="needs-validation" action="/login" method="post" novalidate>
            @csrf
            <div class="form-group">
                <label class="control-label" for="email">E-mail address</label>
                <div>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="pwd">Password</label>
                <div>
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="password" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="form-group form-check">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="remember">
                    Remember me
                    </label>
            </div>
            <div class="form-group">
                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
    </div>
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection

