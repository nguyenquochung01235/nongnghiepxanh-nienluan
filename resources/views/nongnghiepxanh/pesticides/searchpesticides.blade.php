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
        @foreach($pesticides as $key => $data)
        <article class="article article--medium grid--span-7">
            <a href="/pesticides/detail/{{$data->pesticides_id}}" class="article__link"><img src="{{ $data->pesticides_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/pesticides/detail/{{$data->pesticides_id}}" class="article__link ">{{$data->pesticides_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link"> {{$data->category_pesticides->category_pesticides}}</a>
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