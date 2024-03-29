@extends('nongnghiepxanh.main')

@section('nongnghiep')
<main class="container s-mainnew">
    <div>
        <h4 class="heading">
            <a href="#" class="heading__link link link--bold">
                <i class="link__icon fas fa-tree "></i>
                {{$title}}
            </a>
        </h4>
    </div>
    <section class="fertilizer-category-feature grid grid--12">

        <article class="article grid--span-4">
            <a href="/fertilizer/detail/{{$fertilizer[0]->fertilizer_id}}" class="article__link"><img src="{{ $fertilizer[0]->fertilizer_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/fertilizer/detail/{{$fertilizer[0]->fertilizer_id}}" class="article__link ">{{$fertilizer[0]->fertilizer_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">{{$fertilizer[0]->category_fertilizer->category_fertilizer}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $fertilizer[0]->fertilizer_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/fertilizer/detail/{{$fertilizer[1]->fertilizer_id}}" class="article__link"><img src="{{ $fertilizer[1]->fertilizer_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/fertilizer/detail/{{$fertilizer[1]->fertilizer_id}}" class="article__link ">{{$fertilizer[1]->fertilizer_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">{{$fertilizer[1]->category_fertilizer->category_fertilizer}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $fertilizer[1]->fertilizer_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/fertilizer/detail/{{$fertilizer[2]->fertilizer_id}}" class="article__link"><img src="{{ $fertilizer[2]->fertilizer_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/fertilizer/detail/{{$fertilizer[2]->fertilizer_id}}" class="article__link ">{{$fertilizer[2]->fertilizer_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">{{$fertilizer[2]->category_fertilizer->category_fertilizer}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $fertilizer[2]->fertilizer_description !!}
                </div>
            </div>
        </article>

    </section>
    <section class="article-list grid grid--12 grid--no-gap">
        @foreach($fertilizer as $key => $data)
        <article class="article article--medium grid--span-7">
            <a href="/fertilizer/detail/{{$data->fertilizer_id}}" class="article__link"><img src="{{ $data->fertilizer_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/fertilizer/detail/{{$data->fertilizer_id}}" class="article__link ">{{$data->fertilizer_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">{{$data->category_fertilizer->category_fertilizer}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $data->fertilizer_description !!}
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