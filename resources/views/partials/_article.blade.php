<div class="panel panel-default">
    <div class="panel-heading">{{$article->title}}</div>
    <div class="panel-body">
        {!! $article->body !!}
    </div>
    <div class="panel-footer">
        <strong>Автор:</strong> {{$article->user->name}} ({{$article->created_at->diffForHumans()}})
    </div>
</div>