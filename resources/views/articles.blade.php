@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @each('partials._article', $articles, 'article')
            </div>
        </div>
    </div>
@endsection
