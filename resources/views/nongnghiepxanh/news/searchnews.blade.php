@extends('nongnghiepxanh.main')

@section('nongnghiep')
<main class="container s-mainnew">
    <div>
        <h4 class="heading">
            <a href="#" class="heading__link link link--bold">
            <i class="fas fa-search"></i>
                {{$title}}
            </a>
        </h4>
    </div>
    <section class="article-list grid grid--12 grid--no-gap">
        @foreach($listNews as $key => $data)
        <article class="article article--medium grid--span-7">
            <a href="/news/detail/{{$data->news_id}}" class="article__link"><img src="{{ $data->news_img}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/news/detail/{{$data->news_id}}" class="article__link title-cut">{{$data->news_title }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <div class="article__intro mota">
                    {!! $data->news_content !!}
                </div>
            </div>
        </article>
        @endforeach

    </section>
    <div class="grid grid--12">
        <div class="more grid--span-7">
            <button class="btn btn--medium btn--primary btn--round" title="Xem thêm">
                <i class="fas fa-arrow-down"></i>
            </button>
        </div>
    </div>
</main>
@endsection