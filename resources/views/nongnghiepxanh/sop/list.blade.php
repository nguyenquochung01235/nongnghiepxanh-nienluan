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
    <section class="sop-category-feature grid grid--12">

        <article class="article grid--span-4">
            <a href="/sop/detail/{{$sop[0]->sop_id}}" class="article__link"><img src="{{ $sop[0]->sop_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/sop/detail/{{$sop[0]->sop_id}}" class="article__link ">{{$sop[0]->sop_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Bệnh Hại</a>
                </div>
                <div class="article__intro mota">
                    {!! $sop[0]->sop_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/sop/detail/{{$sop[1]->sop_id}}" class="article__link"><img src="{{ $sop[1]->sop_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/sop/detail/{{$sop[1]->sop_id}}" class="article__link ">{{$sop[1]->sop_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">Bệnh Hại</a>
                </div>
                <div class="article__intro mota">
                    {!! $sop[1]->sop_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/sop/detail/{{$sop[2]->sop_id}}" class="article__link"><img src="{{ $sop[2]->sop_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/sop/detail/{{$sop[2]->sop_id}}" class="article__link ">{{$sop[2]->sop_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">Bệnh Hại</a>
                </div>
                <div class="article__intro mota">
                    {!! $sop[2]->sop_description !!}
                </div>
            </div>
        </article>

    </section>
    <section class="article-list grid grid--12 grid--no-gap">
        @foreach($sop as $key => $data)
        <article class="article article--medium grid--span-7">
            <a href="/sop/detail/{{$data->sop_id}}" class="article__link"><img src="{{ $data->sop_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/sop/detail/{{$data->sop_id}}" class="article__link ">{{$data->sop_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Bệnh Hại</a>
                </div>
                <div class="article__intro mota">
                    {!! $data->sop_description !!}
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