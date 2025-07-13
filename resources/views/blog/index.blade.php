@extends('layouts.app')

@section('title', 'Blog')

@section('styles')
<style>
    .blog .row {
        display: flex;
        flex-wrap: wrap;
    }
    .blog__item {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .blog__item__text {
        flex-grow: 1;
    }
    .blog__item__pic {
        background-size: cover;
        background-position: center center;
    }
</style>
@endsection

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Blog</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                @forelse($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ $post->image ? asset('storage/' . $post->image) : asset('template/img/blog/blog-1.jpg') }}"></div>
                            <div class="blog__item__text">
                                <span><img src="{{ asset('template/img/icon/calendar.png') }}" alt=""> {{ optional($post->published_at)->format('d F Y') }}</span>
                                <h5>{{ $post->title }}</h5>
                                <a href="{{ route('blog.show', $post->slug) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <p>No blog posts found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection
