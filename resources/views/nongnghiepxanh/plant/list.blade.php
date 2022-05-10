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
    <section class="plant-category-feature grid grid--12">

        <article class="article grid--span-4">
            <a href="/plant/detail/{{$plant[0]->plant_id}}" class="article__link"><img src="{{ $plant[0]->plant_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/plant/detail/{{$plant[0]->plant_id}}" class="article__link ">{{$plant[0]->plant_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">{{$plant[0]->top->top_name}}</a>

                </div>
                <div class="article__intro mota">
                    {!! $plant[0]->plant_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/plant/detail/{{$plant[1]->plant_id}}" class="article__link"><img src="{{ $plant[1]->plant_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/plant/detail/{{$plant[1]->plant_id}}" class="article__link ">{{$plant[1]->plant_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">{{$plant[1]->top->top_name}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $plant[1]->plant_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/plant/detail/{{$plant[2]->plant_id}}" class="article__link"><img src="{{ $plant[2]->plant_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/plant/detail/{{$plant[2]->plant_id}}" class="article__link ">{{$plant[2]->plant_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">{{$plant[3]->top->top_name}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $plant[2]->plant_description !!}
                </div>
            </div>
        </article>

    </section>
    <section class="article-list grid grid--12 grid--no-gap">
        @foreach($plant as $key => $data)
        <article class="article article--medium grid--span-7">
            <a href="/plant/detail/{{$data->plant_id}}" class="article__link"><img src="{{ $data->plant_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/plant/detail/{{$data->plant_id}}" class="article__link ">{{$data->plant_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">{{$data->top->top_name}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $data->plant_description !!}
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