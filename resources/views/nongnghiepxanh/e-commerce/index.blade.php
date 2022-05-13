@extends('nongnghiepxanh.main')

@section('nongnghiep')
<main class="container s-mainnew">
  <div class="header_img">
    <img src="/admintemplate/img/banner.gif" alt="">
  </div>


  <div class="container">
    <section class="section">
      <div class="section__top">
        <h4 class="section__heading">Danh mục</h4>
      </div>
      <ul class="section__list">
        @foreach($categoryecommerce as $key => $data)
        <li class="section__item">
          <a href="" class="section__link">
            <div class="section__img">
              <img style="height: 100px; border-radius: 2px;" src="{{$data->category_ecommerce_img}}" alt="img" />
            </div>
            <p class="section__title">{{$data->category_ecommerce}}</p>
          </a>
        </li>
        @endforeach
      </ul>
    </section>


  </div>
</main>
@endsection