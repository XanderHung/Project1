@extends('viewdef')

@section('content')
    <div class="container">
        @foreach($data_categoryflower as $catflow)
            <div class="rounded mx-auto d-block"><img src="{{asset('upload/category/' . $catflow->categoryimage)}}"></div>
        @endforeach
    </div>
@endsection