@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($weekly as $day=>$value)
                    <h1>{{$day}}</h1>
                    @foreach($value as $category=>$articles)
                        <h2>{{$category}}</h2>
                        @each('partials._article', $articles, 'article')
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection
