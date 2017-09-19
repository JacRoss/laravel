@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <form action="#" method="post">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="categories">Выберите категорию</label>
                                <select class="form-control" name="category" id="categories">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date-local-input" class="col-2 col-form-label">Дата</label>
                                <div class="col-10">
                                    <input class="form-control" name="date" type="datetime-local" value="2011-08-19"
                                           id="date-local-input">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">Списать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
