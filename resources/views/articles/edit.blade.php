@extends('app')
@section('content')
    <h1>修改文章:{{ $article->title }}</h1>
    {!! Form::model($article,['url'=>'article/update']) !!}
    {!! Form::hidden('id',$article->id) !!}
    <div class="form-group">
        {!! Form::label('title','标题:') !!}
        {!! Form::text('title',$article->title,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content','正文:') !!}
        {!! Form::textarea('content',$article['content'],['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('published_at','发布日期') !!}
        {!! Form::input('date','published_at',date('Y-m-d',strtotime($article['published_at'])),['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tag_list','选择标签') !!}
        {!! Form::select('tag_list[]',$tags,null,['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('修改文章',['class'=>'btn btn-success form-control']) !!}
    </div>
        {!! Form::close() !!}
@endsection
