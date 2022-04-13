@extends('nongnghiepxanh.main')

@section('nongnghiep')

<main>
    <section class="cover s-mainnew">
        <div class="author author--vertical">
            <div class="avatar avatar--large">
                <img src="{{$listForum[0]->user->user_avatar}}" alt="avt" />
            </div>
            <div class="author__info">
                <span class="author__name">{{$listForum[0]->user->user_name}}</span>
            </div>
        </div>
        <div class="cover__quantity-post">Số bài đăng: <span>40</span></div>
    </section>
    <section class="article-list container container--small">
        @foreach($listForum as $key => $data)
        <article class="article article--medium article--admin">
            <a href="#123" class="article__link"><img src="{{$data->forum_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/forum/detail/{{$data->forum_id}}" class="article__link title-cut-2 ">{{$data->forum_title}}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Diễn Đàng</a>
                </div>
                <div class="article__intro mota1">
                {!!$data->forum_content!!}
                </div>
            </div>
            <div class="article__modal">
                <button class="btn btn--primary btn--medium btn--round">
                    <a href="/forum/detail/{{$data->forum_id}}"><i class="fas fa-eye"></i></a>
                </button>
                <button class="btn btn--cancel btn--medium btn--round">
                    <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn--error btn--medium btn--round">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </article>
        @endforeach
    </section>
    <div class="more">
        <button class="btn btn--medium btn--primary btn--round" title="Xem thêm">
            <i class="fas fa-arrow-down"></i>
        </button>
    </div>
</main>

@endsection