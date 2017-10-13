@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <table class="table">
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th><a href="/users/{{$user->id}}">{{$user->name}}</a></th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
