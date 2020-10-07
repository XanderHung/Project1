@extends('viewdef')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Image</th>
            </thead>
            <tbody>
            @foreach($data_categoryflower as $catflow)
            <tr>
                <td>{{$catflow->categoryname}}</td>
                <td><img src="{{asset('upload/category/' . $catflow->categoryimage)}}" alt="Image"></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection