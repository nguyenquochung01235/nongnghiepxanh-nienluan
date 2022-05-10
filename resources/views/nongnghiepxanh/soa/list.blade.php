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
    <section class="soa-category-feature grid grid--12">

        <article class="article grid--span-4">
            <a href="/soa/detail/{{$soa[0]->soa_id}}" class="article__link"><img src="{{ $soa[0]->soa_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/soa/detail/{{$soa[0]->soa_id}}" class="article__link ">{{$soa[0]->soa_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Bệnh Hại</a>
                </div>
                <div class="article__intro mota">
                    {!! $soa[0]->soa_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/soa/detail/{{$soa[1]->soa_id}}" class="article__link"><img src="{{ $soa[1]->soa_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/soa/detail/{{$soa[1]->soa_id}}" class="article__link ">{{$soa[1]->soa_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">Bệnh Hại</a>
                </div>
                <div class="article__intro mota">
                    {!! $soa[1]->soa_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/soa/detail/{{$soa[2]->soa_id}}" class="article__link"><img src="{{ $soa[2]->soa_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/soa/detail/{{$soa[2]->soa_id}}" class="article__link ">{{$soa[2]->soa_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">Bệnh Hại</a>
                </div>
                <div class="article__intro mota">
                    {!! $soa[2]->soa_description !!}
                </div>
            </div>
        </article>

    </section>
    <section class="article-list grid grid--12 grid--no-gap">
        @foreach($soa as $key => $data)
        <article class="article article--medium grid--span-7">
            <a href="/soa/detail/{{$data->soa_id}}" class="article__link"><img src="{{ $data->soa_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/soa/detail/{{$data->soa_id}}" class="article__link ">{{$data->soa_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Cây Trồng</a>
                </div>
                <div class="article__intro mota">
                    {!! $data->soa_description !!}
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