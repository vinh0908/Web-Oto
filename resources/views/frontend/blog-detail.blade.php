@extends('frontend.layout')

@section('blog-detail')
    @php
        $postId = request()->route('id');
        $post = \App\Models\Post::find($postId);
    @endphp

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <article class="article">
                    <h1 class="article-title">{{ $post->name }}</h1>
                    @php
                        $image = empty($post->image) ? 'image_product_default.png' : $post->image;
                    @endphp
                    <img class="featured__item__pic" src="{{ asset('images') . '/' . $image }}" alt="{{ $post->name }}">
                    <div class="author">Tên bài: <span>{{ $post->name }}</span></div>
                    <div class="date">Ngày đăng: <span>{{ $post->datetime }}</span></div>
                    <div class="article-content">
                        <p>{{ $post->des }}</p>
                        <a href="https://www.example.com" target="_blank">Xem thêm thông tin tại đây</a>
                        <ul>
                            <li>Điểm 1</li>
                            <li>Điểm 2</li>
                            <li>Điểm 3</li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
