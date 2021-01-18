@extends('layouts.app')

@section('content')
    <div class='row'>
        @foreach($articles as $article)
            <div class='col-md-4 m-auto'>
                <div class='card mt-3' style='width: 18rem;'>
                    <img class='card-img-top'
                         src='{{ asset('images/' . $article->image) }}'
                         alt='Card image cap'>
                    <div class='card-body'>
                        <h5 class='card-title'>
                            {{  $article->title }}
                        </h5>
                        <a href="/articles/{{ $article->id }}" class='btn btn-dark btn-sm'>Show</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class='row'>
        <div class='col-md-2 mt-5 m-auto text-center'>
            {{ $articles->links() }}
        </div>
    </div>
@endsection
