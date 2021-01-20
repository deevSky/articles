@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <img class="card-img-top" src="{{ asset('images/' . $article->image) }}"
             alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"> {{  ucfirst($article->title) }}</h5>
            <p class="card-text"> {{  ucfirst($article->description) }}</p>
            <p class="card-text"> {{  $article->full_description }}</p>
            <hr>
            {{-- Like section--}}
            <button type="button" class="btn btn-light like" id="{{ $article->id }}" onClick="likeArticle(this.id)"
                    data-action="{{ route('like_article', $article) }}">Like &#10084;
            </button>
            <button class="btn btn-light like-count">{{ $article->like_count }}</button>

            {{--Tag section--}}
            @if($tags)
                <ul>
                    @foreach($tags as $tag)
                        <li>{{ $tag->name }}</li>
                    @endforeach
                </ul>
            @endif

            {{-- Comment form--}}
            <form method="post" action="{{ route('add-comment') }}" class="mt-3">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Add comment</label>
                    <input type="text" class="form-control" id="topic" name="topic"
                           value="{{old('topic')}}" placeholder="Comment is about">
                    <p class="topic-alert" style="color: red"></p>
                </div>

                <div class="form-group">
                    <textarea class="form-control" id="body" rows="3" name="body" placeholder="Type here"></textarea>
                    <p class="body-alert" style="color: red"></p>
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" id="{{ $article->id }}" hidden name="article_id"
                           value="{{ $article->id }}">
                </div>

                <button type="button" id="{{'comment-' . $article->id }}" onClick="commentArticle(this.id)"
                        data-action="{{ route('add-comment', $article) }}" class="btn btn-primary">Submit
                </button>
            </form>

            @if($comments)
                <div class="list-group mt-3 comment-list">
                    @foreach($comments as $comment)
                        <div id="{{'comment_' . $comment->id }}" class="alert alert-dark alert-dismissible fade show"
                             role="alert">
                            <strong>{{ ucfirst($comment->topic) . ' | ' }}</strong> {{ $comment->body }}
                        </div>
                    @endforeach
                </div>
            @endif

            <p class="card-text">
                <small class="text-muted">Seen </small>
                <small data-id="{{ $article->id }}" class="text-muted views"
                       data-action="{{ route('page-view', $article) }}">{{ $article->view_count }}</small>
            </p>
        </div>
    </div>
@endsection

@section('script')
    <script>
        setTimeout(function () {
            $.ajax({
                type: "POST",
                url: document.getElementsByClassName('views')[0].getAttribute('data-action'),
                data: {
                    "_token": "{{ csrf_token() }}",
                    "article_id": document.getElementsByClassName('views')[0].getAttribute('data-id')
                },
                success: function (response) {
                    $('.views').text(response.new_count);
                }
            });
        }, 3000);

        function commentArticle(article_id) {
            let body = $('#body').val();
            let topic = $('#topic').val();

            if(!topic){
                $('.topic-alert').text('Topic is required')
                $('.body-alert').text('Body is required')
            }

            if(!body){
                $('.body-alert').text('Body is required')
            }

            $.ajax({
                type: "POST",
                url: document.getElementById(article_id).getAttribute('data-action'),
                data: {
                    "_token": "{{ csrf_token() }}",
                    "article_id": article_id,
                    'topic': topic,
                    'body': body
                },
                success: function (response) {
                    $('.comment-list').prepend("<div class='alert alert-dark alert-dismissible fade show' role='alert'> " +
                        "<strong>" + response.topic + '  |  ' + "</strong>" + response.body + "</div>");
                    $('#body').val('');
                    $('#topic').val('');
                    $('.topic-alert').text('')
                    $('.body-alert').text('')
                }
            });
        };
    </script>
@endsection
