@extends('viewdef')

@section('content')
<div class="container">
    <div class="title text-center my-2">
            <h1>Edit Category</h1>
    </div>

    
    <form class="form-horizontal my-5">

            <div class="form-group">
                <label class="control-label col-sm-2" for="catname">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="catname" placeholder="Category Name">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="catimage">Category Image</label>
                <div class="col-sm-10">
                    <input name="categoryimage" type="file" class="form-control-file" id="catimage">
                </div>
            </div>
    </form>
    
    
</div>


@endsection
