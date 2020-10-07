@extends('viewdef')

@section('content')
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

@endsection
