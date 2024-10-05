@extends('frontend.layout')


@section('blog')
    <h1 style="text-align: center; margin-top: 30px;" class="text-center mb-4">Chào mừng đến với Blog của tôi!</h1>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-8">

                @foreach ($posts as $post)
                    <div class="card mb-4">
                        @php
                            $image = empty($post->image) ? 'image_product_default.png' : $post->image;
                        @endphp
                        <img class="featured__item__pic set-bg" data-setbg="{{ asset('images') . '/' . $image }}">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->name }}</h2>
                            <p class="card-text">
                                {{ $post->des }}
                            </p>
                            <a href="#" class="btn btn-primary">Đọc tiếp</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ $post->datetime }}</small>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Về tôi</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Đây là phần giới thiệu về bản thân hoặc blog của bạn.
                            Bạn có thể viết một đoạn ngắn gọn ở đây.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
