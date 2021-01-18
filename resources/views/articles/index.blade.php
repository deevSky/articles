@extends('layouts.app')

@section('content')
    <div class='row'>
        <div class="card-columns">
            @foreach($articles as $article)
                <div class="card">
                    <img class="card-img-top" src="{{ asset('images/' . $article->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <a class="text-decoration-none" href="{{ route('show-article', $article->slug) }}">
                            <h5 class="card-title">{{  $article->title }}</h5>
                        </a>
                        <p class="card-text">
                            {{  $article->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class='row'>
        <div class='m-auto'>
            {{ $articles->links() }}
        </div>
    </div>
@endsection
