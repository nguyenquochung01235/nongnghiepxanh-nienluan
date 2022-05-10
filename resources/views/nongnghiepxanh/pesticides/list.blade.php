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
    <section class="pesticides-category-feature grid grid--12">

        <article class="article grid--span-4">
            <a href="/pesticides/detail/{{$pesticides[0]->pesticides_id}}" class="article__link"><img src="{{ $pesticides[0]->pesticides_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/pesticides/detail/{{$pesticides[0]->pesticides_id}}" class="article__link ">{{$pesticides[0]->pesticides_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Bệnh Hại</a>
                    <a href="#" class="article__link link">{{$pesticides[0]->top->top_name}}</a>

                </div>
                <div class="article__intro mota">
                    {!! $pesticides[0]->pesticides_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/pesticides/detail/{{$pesticides[1]->pesticides_id}}" class="article__link"><img src="{{ $pesticides[1]->pesticides_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/pesticides/detail/{{$pesticides[1]->pesticides_id}}" class="article__link ">{{$pesticides[1]->pesticides_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Bệnh Hại</a>
                </div>
                <div class="article__intro mota">
                    {!! $pesticides[1]->pesticides_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/pesticides/detail/{{$pesticides[2]->pesticides_id}}" class="article__link"><img src="{{ $pesticides[2]->pesticides_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/pesticides/detail/{{$pesticides[2]->pesticides_id}}" class="article__link ">{{$pesticides[2]->pesticides_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Bệnh Hại</a>
                </div>
                <div class="article__intro mota">
                    {!! $pesticides[2]->pesticides_description !!}
                </div>
            </div>
        </article>

    </section>
    <section class="article-list grid grid--12 grid--no-gap">
        @foreach($pesticides as $key => $data)
        <article class="article article--medium grid--span-7">
            <a href="/pesticides/detail/{{$data->pesticides_id}}" class="article__link"><img src="{{ $data->pesticides_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/pesticides/detail/{{$data->pesticides_id}}" class="article__link ">{{$data->pesticides_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Bệnh Hại</a>
                </div>
                <div class="article__intro mota">
                    {!! $data->pesticides_description !!}
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