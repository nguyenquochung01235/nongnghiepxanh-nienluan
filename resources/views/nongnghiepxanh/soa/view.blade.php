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
      <div class="detail-content__top">
        <h1 class="detail-content__heading">{{$soa->soa_name}}</h1>
        
        <p class="detail-content__intro">
          Bệnh hại trên vật nuôi
        </p>
      </div>
      <div class="detail-content__main">
        <div class="grid_detail">
                    <figure class="figure">
                        <img src="{{$soa->soa_img_1}}" alt="img" class="figure__img img_detail" />
                    </figure>
                    <figure class="figure">
                        <img src="{{$soa->soa_img_2}}" alt="img" class="figure__img img_detail" />
                    </figure>
                    <figure class="figure">
                        <img src="{{$soa->soa_img_3}}" alt="img" class="figure__img img_detail" />
                    </figure>
                </div>

        {!! $soa->soa_description !!}

      </div>
      
    </section>
    <br>
      <div>
        <div><strong>Danh sách các loại vật thường mắc bệnh: </strong>
            @foreach($soa->animal as $key => $data)
              <a style="color: #007bff;" class=" link" href="/animal/detail/{{$data->animal_id}}">{{$data->animal_name}}. </a>
            @endforeach
        </div>
        <br>
        <div class="detail-content__top"><strong>Danh sách các loại thuốc hay sử dụng: </strong>
            @foreach($soa->veterinary_medicine as $key => $data)
              <a style="color: #007bff;" class=" link" href="/veterinary-medicine/detail/{{$data->vm_id}}">{{$data->vm_name}}. </a>
            @endforeach
        </div>
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
        @foreach($listsoa as $key => $data)
        <article class="article article--medium">
          <a href="/soa/detail/{{$data->soa_id}}" class="article__link"><img src="{{$data->soa_img_1}}" alt="img" class="article__img" /></a>
          <div class="article__info">
            <h2 class="article__heading">
              <a href="/soa/detail/{{$data->soa_id}}" class="article__link title-cut-2">{{$data->soa_name}}</a>
            </h2>
            <div class="article__category">
              <a href="#" class="article__link link">Bệnh hại trên vật nuôi</a>
            </div>
            <div class="article__intro mota">
              {!!$data->soa_description!!}
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