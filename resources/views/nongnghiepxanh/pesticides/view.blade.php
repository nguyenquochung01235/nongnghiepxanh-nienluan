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
        <h1 class="detail-content__heading">{{$pesticides->pesticides_name}}</h1>
        
        <p class="detail-content__intro">
        Danh mục: {{$pesticides->category_pesticides->category_pesticides}}
        </p>
      </div>
      <div class="detail-content__main">
        <div class="grid_detail">
                    <figure class="figure">
                        <img src="{{$pesticides->pesticides_img_1}}" alt="img" class="figure__img img_detail" />
                    </figure>
                    <figure class="figure">
                        <img src="{{$pesticides->pesticides_img_2}}" alt="img" class="figure__img img_detail" />
                    </figure>
                    <figure class="figure">
                        <img src="{{$pesticides->pesticides_img_3}}" alt="img" class="figure__img img_detail" />
                    </figure>
                </div>

        {!! $pesticides->pesticides_description !!}

      </div>
      
    </section>
    <br>
      <div>
        
        <div class="detail-content__top"><strong>Danh sách các bệnh : </strong>
            @foreach($pesticides->sop as $key => $data)
              <a style="color: #007bff;" class=" link" href="/sop/detail/{{$data->sop_id}}">{{$data->sop_name}}. </a>
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
        @foreach($listpesticides as $key => $data)
        <article class="article article--medium">
          <a href="/pesticides/detail/{{$data->pesticides_id}}" class="article__link"><img src="{{$data->pesticides_img_1}}" alt="img" class="article__img" /></a>
          <div class="article__info">
            <h2 class="article__heading">
              <a href="/pesticides/detail/{{$data->pesticides_id}}" class="article__link title-cut-2">{{$data->pesticides_name}}</a>
            </h2>
            <div class="article__category">
                <p class="detail-content__intro">
            {{$data->category_pesticides->category_pesticides}}
            </p>
            </div>
            <div class="article__intro mota">
               {!!$data->pesticides_description!!}
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