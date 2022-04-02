@extends('nongnghiepxanh.main')

@section('nongnghiep')

    <main class="s-mainnew container">
        <section class="featured news-section">
            <div class="featured__top grid">
                <article class="article article--big grid--span-3">
                    <a href="/news/detail/{{$hostNews[0]->news_id}}" class="article__link"><img src="{{ $hostNews[0]->news_img }}" alt="img" class="" /></a>
                    <div class="article__info">
                        <h2 class="article__heading">
                            <a href="/news/detail/{{$hostNews[0]->news_id}}" class="article__link">{{ $hostNews[0]->news_title }}</a>
                        </h2>
                        <div class="article__category">
                            <a href="" class="article__link link">{{ $hostNews[0]->categorynews->news_category }}</a>
                        </div>
                        <div class="article__intro mota">
                        {!!  $hostNews[0]->news_content  !!}
                        </div>
                    </div>
                </article>
                <article class="article">
                    <a href="#123" class="article__link"><img src="{{ $hostNews[1]->news_img }}" alt="img" class="article__img" /></a>
                    <div class="article__info">
                        <h2 class="article__heading">
                            <a href="#" class="article__link">{{$hostNews[1]->news_title}}</a>
                        </h2>
                        <div class="article__category">
                            <a href="#" class="article__link link">{{ $hostNews[1]->categorynews->news_category }}</a>
                        </div>
                        <div class="article__intro mota1">
                        {!!  $hostNews[1]->news_content  !!}
                        </div>
                    </div>
                </article>
            </div>
            <div class="featured__bottom grid">
                @foreach($hostNews2 as $key => $data)
                <article class="article">
                    <a href="" class="article__link"><img src="{{ $data->news_img}}" alt="img" class="article__img" /></a>
                    <div class="article__info">
                        <h2 class="article__heading">
                            <a href="#" class="article__link title-cut">{{$data->news_title}}</a>
                        </h2>
                        <div class="article__category">
                            <a href="#" class="article__link link">{{ $data->categorynews->news_category }}</a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </section>
        <section class="latest news-section grid grid--12 grid--no-gap">
        @foreach($hostNews3 as $key => $data)
            <article class="article article--medium grid--span-7">
                <a href="#123" class="article__link"><img src="{{ $data->news_img}}" alt="img" class="article__img" /></a>
                <div class="article__info">
                    <h2 class="article__heading">
                        <a href="#" class="article__link title-cut">{{$data->news_title }}</a>
                    </h2>
                    <div class="article__category">
                        <a href="#" class="article__link link">{{ $data->categorynews->news_category }}</a>
                    </div>
                    
                    <div class="article__intro mota">
                    {!! $data->news_content !!}
                    </div>
                   
                </div>
            </article>
            @endforeach
        </section>
        <section class="market news-section">
            <h4 class="heading">
                <a href="#" class="heading__link link link--bold">
                    <i class="fas fa-store-alt"></i>
                    Thị trường
                </a>
            </h4>
            <div class="grid grid--12">
                <article class="article grid--span-5">
                    <a href="#123" class="article__link"><img src="{{$marketHot1[0]->news_img}}" alt="img"  /></a>
                    <div class="article__info">
                        <h2 class="article__heading">
                            <a href="#" class="article__link title-cut-2">{{$marketHot1[0]->news_title}}</a>
                        </h2>
                        <div class="article__category">
                            <a href="#" class="article__link link">{{$marketHot1[0]->categorynews->news_category}}</a>
                        </div>
                    </div>
                </article>
                <article class="article grid--span-3">
                    <a href="#123" class="article__link"><img src="{{$marketHot1[1]->news_img}}" alt="img" class="article__img" /></a>
                    <div class="article__info">
                        <h2 class="article__heading article__heading--small">
                            <a href="#" class="article__link title-cut-2">{{$marketHot1[1]->news_title}}</a>
                        </h2>
                        <div class="article__category">
                            <a href="#" class="article__link link">{{$marketHot1[1]->categorynews->news_category}}</a>
                        </div>
                        <div class="article__intro mota">
                         {!! $marketHot1[1]->news_content !!}
                        </div>
                    </div>
                </article>
                <div class="market__list grid--span-4">
                    @foreach($marketHot2 as $key => $data)
                    <article class="article article--small">
                        <a href="#123" class="article__link"><img src="{{$data->news_img}}" alt="img" class="article__img" /></a>
                        <div class="article__info">
                            <h2 class="article__heading article__heading--small">
                                <a href="#" class="article__link title-cut-2">{{$data->news_title}}</a>
                            </h2>
                            <div class="article__category">
                                <a href="#" class="article__link link">{{$data->categorynews->news_category}}</a>
                            </div>
                        </div>
                    </article>
                   @endforeach
                </div>
            </div>
        </section>
        <section class="agriculturue news-section">
            <h4 class="heading">
                <a href="./category.html" class="heading__link link link--bold">
                    <i class="fas fa-tractor"></i>
                    Nông nghiệp 4.0
                </a>
            </h4>
            <div class="grid">
                @foreach($agriculturue as $key => $data)
                <article class="article">
                    <a href="#123" class="article__link"><img src="{{$data->news_img}}" alt="img" class="article__img" /></a>
                    <div class="article__info">
                        <h2 class="article__heading article__heading--small">
                            <a href="#" class="article__link">{{$data->news_title}}</a>
                        </h2>
                        <div class="article__category">
                            <a href="#" class="article__link link">{{$data->categorynews->news_category}}</a>
                        </div>
                        <div class="article__intro mota">
                            {!!$data->news_content!!}
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </section>
        <section class="local news-section">
            <h4 class="heading">
                <a href="#" class="heading__link link link--bold">
                    <i class="fas fa-lemon"></i>
                    Sản vật địa phương</a>
            </h4>
            <div class="grid grid--12">
                <article class="article grid--span-3">
                    <a href="#123" class="article__link"><img src="{{$localProduct1[1]->news_img}}" alt="img" class="article__img" /></a>
                    <div class="article__info">
                        <h2 class="article__heading article__heading--small">
                            <a href="#" class="article__link title-cut">{{$localProduct1[1]->news_title}}</a>
                        </h2>
                        <div class="article__category">
                            <a href="#" class="article__link link">{{$localProduct1[1]->categorynews->news_category}}</a>
                        </div>
                        <div class="article__intro mota">
                        {!!$localProduct1[0]->news_content!!}
                        </div>
                    </div>
                </article>
                <article class="article grid--span-5">
                    <a href="#123" class="article__link"><img src="{{$localProduct1[0]->news_img}}" alt="img" /></a>
                    <div class="article__info">
                        <h2 class="article__heading">
                            <a href="#" class="article__link title-cut-2">{{$localProduct1[0]->news_title}}</a>
                        </h2>
                        <div class="article__category">
                            <a href="#" class="article__link link">{{$localProduct1[0]->categorynews->news_category}}</a>
                        </div>
                    </div>
                </article>
                <div class="market__list grid--span-4">
                    @foreach($localProduct2 as $key => $data)
                    <article class="article article--small">
                        <a href="#123" class="article__link"><img src="{{$data->news_img}}" alt="img" class="article__img" /></a>
                        <div class="article__info">
                            <h2 class="article__heading article__heading--small">
                                <a href="#" class="article__link title-cut-2">{{$data->news_title}}</a>
                            </h2>
                            <div class="article__category">
                                <a href="#" class="article__link link">{{ $data->categorynews->news_category }}</a>
                            </div>
                        </div>
                    </article>
                   @endforeach
                
                </div>
            </div>
        </section>
        <div class="news__grid grid grid--no-gap">
            <section class="enterprise news-section grid--span-2">
                <h4 class="heading">
                    <a href="#" class="heading__link link link--bold">
                        <i class="fas fa-landmark"></i>
                        Doanh nghiệp</a>
                </h4>
                <div class="news__container grid">
                    <article class="article grid--span-4">
                        <a href="#123" class="article__link"><img src="{{$enterprise1[0]->news_img}}" alt="img"
                            style="max-height: 360px;"
                        /></a>
                        <div class="article__info">
                            <h2 class="article__heading">
                                <a href="#" class="article__link title-cut">{{$enterprise1[0]->news_title}}</a>
                            </h2>
                            <div class="article__category">
                                <a href="#" class="article__link link">{{$enterprise1[0]->categorynews->news_category}}</a>
                            </div>
                            <div class="article__intro mota">
                            {!!$enterprise1[0]->news_content!!}
                            </div>
                        </div>
                    </article>
                    @foreach($enterprise2 as $key =>$data)
                    <article class="article grid--span-2">
                        <a href="#123" class="article__link"><img src="{{$data->news_img}}" alt="img" class="article__img" /></a>
                           <div class="article__info">
                            <h2 class="article__heading article__heading--small">
                                <a href="#" class="article__link title-cut">{{$data->news_title}}</a>
                            </h2>
                            <div class="article__category">
                                <a href="#" class="article__link link">{{$data->categorynews->news_category}}</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>
            <section class="financy news-section grid--span-2">
                <h4 class="heading">
                    <a href="#" class="heading__link link link--bold">
                        <i class="fas fa-coins"></i>
                        Tài chính
                    </a>
                </h4>
                <div class="news__container grid">
                    <article class="article grid--span-4">
                        <a href="#123" class="article__link"><img src="{{$financy1[0]->news_img}}" alt="img"
                        style="max-height: 360px;"
                        /></a>
                        <div class="article__info">
                            <h2 class="article__heading">
                                <a href="#" class="article__link title-cut">{{$financy1[0]->news_title}}</a>
                            </h2>
                            <div class="article__category">
                                <a href="#" class="article__link link">{{$financy1[0]->categorynews->news_category}}</a>
                            </div>
                            <div class="article__intro mota">
                            {!!$financy1[0]->news_content!!}
                            </div>
                        </div>
                    </article>
                    @foreach($financy2 as $key =>$data)
                    <article class="article grid--span-2">
                        <a href="#123" class="article__link"><img src="{{$data->news_img}}" alt="img" class="article__img" /></a>
                        <div class="article__info">
                            <h2 class="article__heading article__heading--small">
                                <a href="#" class="article__link title-cut">{{$data->news_title}}</a>
                            </h2>
                            <div class="article__category">
                                <a href="#" class="article__link link">{{$data->categorynews->news_category}}</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>
        </div>
        <div class="news__grid grid grid--no-gap">
            <section class="organic news-section grid--span-2">
                <h4 class="heading">
                    <a href="#" class="heading__link link link--bold">
                        <i class="fas fa-leaf"></i>
                        Organic
                    </a>
                </h4>
                <div class="news__container grid">
                    <article class="article grid--span-4">
                        <a href="#123" class="article__link"><img src="{{$organic1[0]->news_img}}" alt="img" style="max-height: 360px;"/></a>
                        <div class="article__info">
                            <h2 class="article__heading">
                                <a href="#" class="article__link title-cut-2">{{$organic1[0]->news_title}}</a>
                            </h2>
                            <div class="article__category">
                                <a href="#" class="article__link link">{{$organic1[0]->categorynews->news_category}}</a>
                            </div>
                            <div class="article__intro mota">
                                {!!$organic1[0]->news_content!!}
                            </div>
                        </div>
                    </article>
                    @foreach($organic2 as $key =>$data)
                    <article class="article grid--span-2">
                        <a href="#123" class="article__link"><img src="{{$data->news_img}}" alt="img" class="article__img" /></a>
                        <div class="article__info">
                            <h2 class="article__heading article__heading--small">
                                <a href="#" class="article__link title-cut">{{$data->news_title}}</a>
                            </h2>
                            <div class="article__category">
                                <a href="#" class="article__link link">{{$data->categorynews->news_category}}</a>
                            </div>
                        </div>
                    </article>
                   @endforeach
                </div>
            </section>
            <section class="cuisine news-section grid--span-2">
                <h4 class="heading">
                    <a href="#" class="heading__link link link--bold">
                        <i class="fas fa-cheese"></i>
                        Ẩm thực
                    </a>
                </h4>
                <div class="news__container grid">
                    <article class="article grid--span-4">
                        <a href="#123" class="article__link"><img src="{{$cuisine1[0]->news_img}}" alt="img" style="max-height: 360px;" /></a>
                        <div class="article__info">
                            <h2 class="article__heading">
                                <a href="#" class="article__link title-cut-2">{{$cuisine1[0]->news_title}}</a>
                            </h2>
                            <div class="article__category">
                                <a href="#" class="article__link link">{{$cuisine1[0]->categorynews->news_category}}</a>
                            </div>
                            <div class="article__intro mota">
                            {!!$cuisine1[0]->news_content!!}
                            </div>
                        </div>
                    </article>
                    @foreach($cuisine2 as $key => $data)
                    <article class="article grid--span-2">
                        <a href="#123" class="article__link"><img src="{{$data->news_img}}" alt="img" class="article__img" /></a>
                        <div class="article__info">
                            <h2 class="article__heading article__heading--small">
                                <a href="#" class="article__link title-cut">{{$data->news_title}}</a>
                            </h2>
                            <div class="article__category">
                                <a href="#" class="article__link link">{{$data->categorynews->news_category}}</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>
        </div>
    </main>

@endsection