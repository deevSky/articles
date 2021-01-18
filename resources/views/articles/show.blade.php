@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <img class="card-img-top" style="height: 300px" src="{{ asset('images/' . $article->image) }}"
             alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"> {{  $article->title }}</h5>
            <p class="card-text"> {{  $article->description }}</p>

            {{-- like section--}}
            <button type="button" class="btn btn-light like" id="{{ $article->id }}" onClick="likeArticle(this.id)" data-action="{{ route('like_article', $article) }}">Like &#10084;</button>
            <button class="btn btn-light like-count">{{ $article->like_count }}</button>


            {{-- comment form--}}
            <form method="post" action="{{ route('add-comment') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Add comment</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="topic" placeholder="Comment is about">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Add your comment</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" id="{{ $article->id }}" hidden name="article_id"
                           value="{{ $article->id }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            @if($article->comments)
                <ul class="list-group mt-3">
                    @foreach($article->comments as $comment)
                        <li class="list-group-item">{{ $comment->topic . '-' . $comment->body }}</li>
                    @endforeach
                </ul>
            @endif

            <p class="card-text">
                <small class="text-muted">Seen {{ $article->view_count }}</small>
            </p>
        </div>
    </div>
@endsection

@section('script')

@endsection
