@extends('viewdef')

@section('content')
    <div class="container">
        <div class="title text-center my-2">
            <h1>Flower Category</h1>
        </div>
        
        <div class="row my-3">
        @foreach($data_categoryflower as $catflow)
        <div class="card mx-auto my-2" style="width: 15rem;">
            <img class="card-img-top" src="{{asset('upload/category/' . $catflow->categoryimage)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">{{$catflow->categoryname}}</h5>
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="text-center">
                    <a href="/editcat/{{$catflow->categoryid}}" class="btn btn-primary">Update</a>
                    <a href="/delcat/{{$catflow->categoryid}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
            @endforeach
        </div>
       
    </div>
@endsection
