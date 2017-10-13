@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Управление пользователем: <strong>{{$user->name}}}</strong>
                    </div>
                    <form action="#" method="post">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="roles">Выберите группу</label>
                                <select class="form-control" name="role" id="roles">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date-local-input" class="col-2 col-form-label">Дата</label>
                                <div class="col-10">
                                    <input class="form-control" name="expire_in" type="datetime-local" value="2011-08-19"
                                           id="date-local-input">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">Подписать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
