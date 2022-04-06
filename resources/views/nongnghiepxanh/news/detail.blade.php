@extends('nongnghiepxanh.main')

@section('nongnghiep')
<main class="container s-mainnew grid grid--12">
  <div class="grid--span-7">
    <div>
      <h4 class="heading">
        <a href="./category.html" class="heading__link link link--bold">
          <i class="fas fa-tractor"></i>
          {{$news->categorynews->news_category}}
        </a>
      </h4>
    </div>
    
    <section class="detail-content">
      <div class="detail-content__top">
        <h1 class="detail-content__heading">{{$news->news_title}}</h1>
        <div class="author">
          <a href="#" class="author__avt">
            <div class="avatar">
              <img src="{{$news->admin->admin_avatar}}" alt="avt" />
            </div>
          </a>
          <div class="author__info">
            <a href="#" class="author__name link">{{$news->admin->admin_name}}</a>
            <div class="author__time-comment">
              <span class="author__time">{{$news->created_at}}</span>

            </div>
          </div>
        </div>
        <p class="detail-content__intro">
          {{$news->news_title}}
        </p>
      </div>
      <div class="detail-content__main">

        <figure class="figure">
          <img src="{{$news->news_img}}" alt="img" class="figure__img" />
          <!-- <figcaption class="figure__caption">
                TH đưa nguồn năng lượng xanh lên những mái trang trại công nghệ cao. Ảnh: <em>TH</em>.
              </figcaption> -->
        </figure>

        {!! $news->news_content !!}

      </div>
    </section>

    <section class="detail-comment">
      <ul class="detail-comment__list">
        @if(Auth::guard('user')->check())
        <li class="detail-comment__item">
          <div class="detail-comment__avt">
            <a href="#" class="author__avt">
              <div class="avatar">
                <img src="{{Auth::guard('user')->user()->user_avatar}}" alt="avt" />
              </div>
            </a>
          </div>
          <form class="detail-comment__form" method="POST" action="/news/detail/{{$news->news_id}}/{{Auth::guard('user')->user()->user_id}}">
            <div class="detail-comment__field form__field">
              <textarea required name="comment" id="comment" class="detail-comment__input form__input" placeholder=" ">{{old('comment')}}</textarea>
              <label for="comment" class="form__label">Bạn nghĩ gì về tin này</label>
            </div>
            <div class="detail-comment__group form__field">
              <button class="detail-comment__btn form__submit btn btn--error">Huỷ</button>
              <button  type="submit" class="detail-comment__btn form__submit btn btn--primary">Gửi</button>
            </div>
            @csrf
          </form>
        </li>
        @else
        <li class="detail-comment__item">
          <div class="detail-comment__content">
            <div class="detail-comment__heading">
              <h4><a href="/sign-in" class="detail-comment__name link">Vui lòng đăng nhập để bình luận bài viết</a></h4>
            </div>
          </div>

        </li>
        </br>
        @endif


        @foreach($listComment as $key => $data)
        <li class="detail-comment__item">
          <div class="detail-comment__avt">
            <a href="#" class="author__avt">
              <div class="avatar">
                <img src="{{$data->user->user_avatar}}" alt="avt" />
              </div>
            </a>
          </div>
          <div class="detail-comment__content">
            <div class="detail-comment__heading">
              <a href="#" class="detail-comment__name link">{{$data->user->user_name}}</a>
              <span class="detail-comment__time">{{$data->created_at}}</span>
            </div>
            <p class="detail-comment__text">{{$data->comment}}</p>
            <div class="detail-comment__group detail-comment__group--second form__field">
              @if(Auth::guard('user')->check())
              <button 
              onclick="showReply(
                <?php
                echo $data->id_news_comment
                ?>
              )"
              class="detail-comment__btn form__submit btn btn--primary">Trả lời</button>
              @endif
            </div>


            <!-- test -->
            <ul class="detail-comment__list">
              @foreach($replyComment as $key =>$dataRelly)
                @if($dataRelly->parent_comment == $data->id_news_comment)
                  <li class="detail-comment__item">
                    <div class="detail-comment__avt">
                      <a href="#" class="author__avt">
                        <div class="avatar">
                          <img src="{{$dataRelly->user->user_avatar}}" alt="avt" />
                        </div>
                      </a>
                    </div>
                    <div class="detail-comment__content">
                      <div class="detail-comment__heading">
                        <a href="#" class="detail-comment__name link">{{$dataRelly->user->user_name}}</a>
                        <span class="detail-comment__time">{{$dataRelly->created_at}}</span>
                      </div>
                      <p class="detail-comment__text">
                        {{$dataRelly->comment}}
                      </p>
                    </br>
                    </div>
                  </li>
                @endif
              @endforeach
              <!-- Repply Comment -->
              @if(Auth::guard('user')->check())
              <li id="reply-comment-{{$data->id_news_comment}}" class="detail-comment__item" style="display: none;">
                <div class="detail-comment__avt">
                  <a href="#" class="author__avt">
                    <div class="avatar">
                      <img src="{{Auth::guard('user')->user()->user_avatar}}" alt="avt" />
                    </div>
                  </a>
                </div>
                <form class="detail-comment__form" method="POST" action="/news/detail/{{$news->news_id}}/{{Auth::guard('user')->user()->user_id}}/{{$data->id_news_comment}}">
                  <div class="detail-comment__field form__field">
                    <textarea required name="comment" id="comment" class="detail-comment__input form__input" placeholder=" ">{{old('comment')}}</textarea>
                    <label for="comment" class="form__label">Trả lời bình luận của {{$data->user->user_name}}</label>
                  </div>
                  <div class="detail-comment__group form__field">
                    <button type="button" 
                    onclick="hideReply(<?php echo $data->id_news_comment?>)"
                        
                      
                    class="detail-comment__btn form__submit btn btn--error">Huỷ</button>
                    <button  type="submit" class="detail-comment__btn form__submit btn btn--primary">Gửi</button>
                  </div>
                  @csrf
                </form>
             </li>
              @endif
            </ul>
            <!-- test -->

          </div>
        </li>
        @endforeach


      </ul>
    </section>


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
        @foreach($listnews as $key => $data)
        <article class="article article--medium">
          <a href="/news/detail/{{$data->news_id}}" class="article__link"><img src="{{$data->news_img}}" alt="img" class="article__img" /></a>
          <div class="article__info">
            <h2 class="article__heading">
              <a href="/news/detail/{{$data->news_id}}" class="article__link title-cut-2">{{$data->news_title}}</a>
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
    <div class="more">
      <button class="btn btn--medium btn--primary btn--round" title="Xem thêm">
        <i class="fas fa-arrow-down"></i>
      </button>
    </div>
  </div>
</main>
@endsection