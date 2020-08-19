@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                @forelse($articles as $article)
                    <h2><a href="{{ $article->path() }}">{{ $article->title }}</a></h2>
                    <h3>{{ $article->excerpt }}</h3>

                    <p><img src="/images/banner.jpg" alt="" class="image image-full"/></p>

                @empty
                    <p>No relevant articles yet</p>
                @endforelse

            </div>
        </div>

@endsection
