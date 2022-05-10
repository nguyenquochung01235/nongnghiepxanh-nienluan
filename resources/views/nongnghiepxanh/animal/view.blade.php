@extends('nongnghiepxanh.main')

@section('nongnghiep')
<main class="container s-mainnew grid grid--12">
  <div class="grid--span-7">
    <div>
      <h4 class="heading">
        <a href="./category.html" class="heading__link link link--bold">
          <i class="fas fa-tree"></i>
          {{$title}}
        </a>
      </h4>
    </div>
    
    @include('administrator.alert')

    <section class="detail-content">
      <div class="detail-content__toa">
        <h1 class="detail-content__heading">{{$animal->animal_name}}</h1>
        
        <p class="detail-content__intro">
          Thuộc loại vật: {{$animal->toa->toa_name}}
        </p>
      </div>
      <div class="detail-content__main">
        <div class="grid_detail">
                    <figure class="figure">
                        <img src="{{$animal->animal_img_1}}" alt="img" class="figure__img img_detail" />
                    </figure>
                    <figure class="figure">
                        <img src="{{$animal->animal_img_2}}" alt="img" class="figure__img img_detail" />
                    </figure>
                    <figure class="figure">
                        <img src="{{$animal->animal_img_3}}" alt="img" class="figure__img img_detail" />
                    </figure>
                </div>

        {!! $animal->animal_description !!}

      </div>
      
    </section>
    <br>
      <div>
        <div><strong>Danh sách các bệnh hay gặp: </strong>
            @foreach($animal->soa as $key => $data)
              <a style="color: #007bff;" class=" link" href="/soa/detail/{{$data->soa_id}}">{{$data->soa_name}}. </a>
            @endforeach
        </div>
        <br>
      </div>

    <section class="detail-other">
      <div>
        <h4 class="heading">
          <span class="heading__link link link--bold">
            <i class="fas fa-border-all"></i>
            Bài liên quan
          </span>
        </h4>
      </div>
      <div class="article-list">
        @foreach($listanimal as $key => $data)
        <article class="article article--medium">
          <a href="/animal/detail/{{$data->animal_id}}" class="article__link"><img src="{{$data->animal_img_1}}" alt="img" class="article__img" /></a>
          <div class="article__info">
            <h2 class="article__heading">
              <a href="/animal/detail/{{$data->animal_id}}" class="article__link title-cut-2">{{$data->animal_name}}</a>
            </h2>
            <div class="article__category">
              <a href="#" class="article__link link">{{$data->toa->toa_name}}</a>
            </div>
            <div class="article__intro mota">
              {!!$data->animal_description!!}
            </div>
          </div>
        </article>
        @endforeach
      </div>
    </section>
    <div class="more">
      <button class="btn btn--medium btn--primary btn--round" title="Xem thêm">
        <i class="fas fa-arrow-down"></i>
      </button>
    </div>
  </div>
</main>
@endsection