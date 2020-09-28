@extends('viewdef')

@section('content')
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" class="form-control" id="Catname">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" id="Catimage">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection