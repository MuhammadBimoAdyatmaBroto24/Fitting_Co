@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2>{{ $post->title }}</h2>
                        <ul>
                            <li>By {{ $post->author->name ?? 'Fitting.co Team' }}</li>
                            <li>{{ optional($post->published_at)->format('F d, Y') }}</li>
                            <li>{{ $post->comments->count() }} Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    @if ($post->image)
                    <div class="blog__details__pic">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                    </div>
                    @endif
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__text">
                            {!! $post->content !!}
                        </div>

                        <div class="blog__details__option">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__author">
                                        <div class="blog__details__author__pic">
                                            <img src="{{ asset('template/img/blog/details/blog-author.jpg') }}" alt="">
                                        </div>
                                        <div class="blog__details__author__text">
                                            <h5>{{ $post->author->name ?? 'Fitting.co Team' }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__tags">
                                        <a href="#">#Fashion</a>
                                        <a href="#">#Trending</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blog__details__btns">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    @if($previousPost)
                                    <a href="{{ route('blog.show', $previousPost->slug) }}" class="blog__details__btns__item">
                                        <p><span class="arrow_left"></span> Previous Post</p>
                                        <h5>{{ $previousPost->title }}</h5>
                                    </a>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    @if($nextPost)
                                    <a href="{{ route('blog.show', $nextPost->slug) }}" class="blog__details__btns__item blog__details__btns__item--next">
                                        <p>Next Post <span class="arrow_right"></span></p>
                                        <h5>{{ $nextPost->title }}</h5>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="blog__details__comment">
                            <h4>{{ $post->comments->count() }} Comments</h4>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @forelse($post->comments->whereNull('parent_id') as $comment)
                                <div class="comment-item mb-3" id="comment-{{ $comment->id }}">
                                    <p><strong>{{ $comment->name }}</strong> ({{ $comment->created_at->diffForHumans() }})</p>
                                    <p>{{ $comment->content }}</p>
                                    <a href="#comment-form" class="reply-btn" data-comment-id="{{ $comment->id }}">Reply</a>

                                    @foreach($comment->replies as $reply)
                                        <div class="comment-item mb-3 ml-5" id="comment-{{ $reply->id }}">
                                            <p><strong>{{ $reply->name }}</strong> ({{ $reply->created_at->diffForHumans() }})</p>
                                            <p>{{ $reply->content }}</p>
                                        </div>
                                    @endforeach
                                    <hr>
                                </div>
                            @empty
                                <p>No comments yet. Be the first to comment!</p>
                            @endforelse

                            <h4>Leave A Comment</h4>
                            <form action="{{ route('comments.store', $post->slug) }}" method="POST" id="comment-form">
                                @csrf
                                <input type="hidden" name="parent_id" id="parent_id" value="">
                                @guest
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                @endguest
                                <div class="col-lg-12 text-center">
                                    <textarea name="content" placeholder="Comment" required>{{ old('content') }}</textarea>
                                    <button type="submit" class="site-btn">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const commentId = this.dataset.commentId;
                document.getElementById('parent_id').value = commentId;
                document.querySelector('textarea[name="content"]').focus();
            });
        });
    });
</script>
@endsection
