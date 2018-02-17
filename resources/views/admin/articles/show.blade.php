@extends('layouts.admin')

@section('title',  'Article: ' . $article->title )

@section('content')

    <article class="card mb-5">
        <div class="card-header">
            <h3><a href="{{route('admin.articles.show', $article->id)}}">{{$article->title}}</a></h3>
            @if($article->updated_at != $article->created_at)
                <p>updated at: {{$article->created_at}}</p>
            @endif
            <p>by {{$article->author->name}} on {{$article->created_at}}</p>
        </div>
        <div class="card-body">
            {{($article->content)}}
        </div>
    </article>

@endsection
