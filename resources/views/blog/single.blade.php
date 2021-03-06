@extends('layouts.no-sidebar')

@section('title',  $article->title)

@section('content')
    <div class="container py-4 mx-auto">

        @if($newerArticle = $article->newerArticle())
            <div class="fixed pin-l pin-t h-full ">
                <div class="flex items-center h-full">
                    <div class="p-4 bg-grey-light self-center">
                        <a href="{{$newerArticle->path()}}">@svg('light.arrow-left', 'fill-current h-8 w-8')</a></div>
                </div>
            </div>
        @endif

        @if($olderArticle = $article->olderArticle())
            <div class="fixed pin-r pin-t h-full flex content-center flex-wrap">
                <div class="flex items-center h-full">
                    <div class="p-4 bg-grey-light">
                        <a href="{{$olderArticle->path()}}">@svg('light.arrow-right', 'fill-current h-8 w-8')</a>
                    </div>
                </div>
            </div>
        @endif
        <div class="flex -mx-2">
            <main class="p-3 md:w-2/3 mx-auto">
                <article>
                    <header class="mb-4">
                        <div class="flex justify-between  mb-6">
                            <div class="text-grey ">{{$article->published_at->formatLocalized('%B %d,  %Y')}}</div>
                            <div class="flex text-grey">
                                <div class="pr-1">
                                    @svg('regular.clock', 'fill-current h-4 w-4')
                                </div>
                                <div class="font-bold tracking-wide text-grey uppercase">
                                    {{$article->readingTime() }} min read&nbsp;&nbsp;|&nbsp;&nbsp;
                                </div>
                                <div class="text-blue flex">
                                    <div class="pr-1">
                                        @svg('regular.comment','fill-current h-4 w-4')
                                    </div>
                                    <div class="font-bold tracking-wide uppercase">
                                        <a href="#">2 comments</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 class="font-condensed font-bold text-grey-dark text-5xl mb-4">{{$article->title}}</h1>
                        <div class="mb-4 pb-6 border-b-2 border-slate">
                            @foreach($article->tags as $tag)
                                <a href="{{route('tags.show', $tag->slug)}}">
                                    <span class="text-sm text-white bg-grey py-1 px-2 mr-2">{{$tag->name}}</span>
                                </a>
                            @endforeach
                        </div>
                        <div class="py-4 text-xl leading-normal font-serif">
                            {{$article->getExcerpt(30)}}
                        </div>
                        @if($article->image)
                            <img src="{{Storage::url($article->image->path)}}" class="w-full"/>
                        @endif
                    </header>
                    <div class="font-serif leading-loose mb-8">
                        {!! $article->content !!}
                    </div>

                    <footer>
                        <div class="mb-8 flex border-t-2 border-slate pt-8">
                            @if($article->author->image)
                                <img class="h-32 w-32  rounded-full mr-8"
                                     src="{{Storage::url($article->author->image->path)}}"
                                     alt="{{$article->author->image->alt}}"/>
                            @endif
                            <div class="self-center">
                                <h3>{{$article->author->name}}</h3>
                                <p>{{$article->author->description}}</p>
                            </div>
                        </div>
                        <div class="mb-8 border-t-2 border-slate pt-8">
                            @forelse($article->comments as $comment)
                                <div class="mb-4">
                                    <p class="mb-2">{{$comment->name}}
                                        on {{$comment->created_at->formatLocalized('%B %d,  %Y')}}</p>
                                    <p>{{$comment->content}}</p>
                                </div>
                            @empty
                                <p class="text-center">Write the first comment!</p>
                            @endforelse
                        </div>
                        <div class="mb-8 border-t-2 border-slate pt-8">
                            <form method="post" action="{{route('articles.comments.store', $article->slug)}}">
                                {{csrf_field()}}
                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" class="field" name="name" id="name"/>
                                </div>
                                <div class="mb-2">
                                    <label for="content">Content</label>
                                    <textarea class="field" name="content" id="content">
                                    </textarea>
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn">Save</button>
                                </div>
                            </form>
                        </div>

                    </footer>

                </article>
            </main>
        </div>
    </div>




@endsection
