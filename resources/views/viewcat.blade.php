@extends('viewdef')

@section('content')
    <div class="container">
        @foreach($data_categoryflower as $catflow)
            <tr>
                <td>{{$catflow->categoryid}}</td>
                <td>{{$catflow->categoryname}}</td>
                <td>{{$catflow->categoryimage}}</td>
            </tr>
        @endforeach
    </div>
@endsection