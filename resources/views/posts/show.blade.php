@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="trouble">TRAVEL DIARY</h2>
        <div class="col-sm">
        <hr>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-5 my-auto">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('storage/' . $post->image) }}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('storage/' . $post->image1) }}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('storage/' . $post->image2) }}" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('storage/' . $post->image3) }}" alt="Fourth slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('storage/' . $post->image4) }}" alt="Fifth slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                        </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title"><h5 class="card-title">{{ $post->title }}</h5></a></h5>
                            <sm class="card-date">{{ $post->date1 }}&nbsp;〜&nbsp;{{ $post->date2 }}</sm>
                            <br>
                            <br>
                            <p class="card-category">by&nbsp;<a href="{{ route('users.show', $post->user_id)}}">{{ $post->user_name }}</a>
                            <br>
                            <br>
                            <sm>国 : {{ $post->country }}</sm>
                            &nbsp;
                            <sm>都市 : {{ $post->city }}</sm>
                            <hr>
                            <p>{{ $post->diary }}</p>
                    <hr>
                    <small>投稿日時：{{ $post->created_at }}</small> 
                    <br>
                    <br>
                    <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('comments.store') }}" method="POST">
                        {{csrf_field()}}
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <label>コメント</label>
                                <textarea class="form-control" rows="3" name="body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">コメントする</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        @foreach ((array)$post->comments as $comment)
                        <div class="card mt-3">
                            <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                            <div class="card-body">
                                <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                                <p class="card-text">内容：{{ $comment->body }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                <br>
                <br>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary btn-sm">編集</a>
                <a href="{{ url('/posts') }}" class="btn btn-secondary btn-sm">BACK</a>
                </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>  


@endsection