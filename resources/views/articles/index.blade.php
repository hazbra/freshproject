@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                @foreach($articles as $article)
                    <h2><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></h2>
                    <h3>{{ $article->excerpt }}</h3>

                    <p><img src="/images/banner.jpg" alt="" class="image image-full"/></p>

                @endforeach
            </div>
        </div>

@endsection
