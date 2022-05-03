@extends('nongnghiepxanh.main')

@section('nongnghiep')
<main class="container s-mainnew grid grid--12">

    <div class="grid--span-7">
        <p>*<i style="text-decoration: underline;"> Nhập huyện mà bạn muốn xem ở thanh tìm kiếm</i></p>
        <div>
            <h4 class="heading">
                <a href="#" class="heading__link link link--bold">
                    <i class="fas fa-sun"></i>
                    {{$title}}
                </a>
            </h4>
        </div>


        <section class="weather">
            <div class="weather_body">
                <div class="weather__top">
                    <input id="locator" type="text" hidden value="{{$land->weather}}">
                    <div class="weather__data">
                        <img src="http://openweathermap.org/img/wn/10d@2x.png" alt="img" class="weather__img" id="img_today" />
                        <div class="weather__temperature">
                            <span class="weather__temperature-number"></span>
                            <span class="weather__temperature-unit">°C | °F</span>
                        </div>
                        <div class="weather__statistical">
                            <span>Khả năng có mưa: 35%</span>
                            <span>Độ ẩm: 76%</span>
                            <span class="weather__wind"></span>
                        </div>
                    </div>
                </div>
                <div class="weather__middle">
                    <div class="weather__info">
                        <h3 class="weather__place">Hồ Chí Minh, Thành phố Hồ Chí Minh</h3>
                        <div class="weather__subhead">
                            <p class="weather__date"></p>
                            <p class="weather__status">Mây rải rác</p>
                        </div>
                    </div>
                </div>

                <div class="weather__bottom">
                    <ul class="weather__list" id="time">
                    </ul>
                    <ul class="weather__list" id="date">
                    </ul>
                </div>
            </div>
        </section>






        <section class="detail-content">
            <div class="detail-content__top">
                <h1 class="detail-content__heading">{{$land->land_title}}</h1>

                <p class="detail-content__intro">
                    {{$land->forum_title}}
                </p>
            </div>
            <div class="detail-content__main">

                <div class="grid_detail">
                    <figure class="figure">
                        <img src="{{$land->land_img_1}}" alt="img" class="figure__img img_detail" />
                    </figure>
                    <figure class="figure">
                        <img src="{{$land->land_img_2}}" alt="img" class="figure__img img_detail" />
                    </figure>
                    <figure class="figure">
                        <img src="{{$land->land_img_3}}" alt="img" class="figure__img img_detail" />
                    </figure>
                </div>

                {!! $land->land_content !!}
            </div>
        </section>




    </div>
</main>
@endsection