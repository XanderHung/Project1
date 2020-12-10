@extends('viewdef')

@section('content')
<div class="container">
    

    <div class="container mt-3 rounded">
        <div class="border rounded mx-2 my-2 p-3 bg-light">
            <div class="title text-center my-2">
                    <h1>Edit Category</h1>
            </div>

            <form class="form-horizontal my-5">
                    <div class="row">
                        <div class="col-md-4">
                        <img class="rounded mx-auto d-block" src="{{asset('upload/category/' . $category->categoryimage)}}" alt="Card image cap">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-sm-7" for="catname">Category Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="catname" placeholder="Category Name">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="control-label col-sm-7" for="catimage">Category Image</label>
                                <div class="col-sm-12">
                                    <input name="categoryimage" type="file" class="form-control-file" id="catimage">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    
            </form>
        </div>
    </div>
    
    
    
</div>


@endsection
