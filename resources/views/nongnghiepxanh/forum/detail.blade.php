@extends('nongnghiepxanh.main')

@section('nongnghiep')


<main class="container s-mainnew grid grid--12">
    
    <div class="grid--span-7">
        <div>
            <h4 class="heading">
                <a href="./category.html" class="heading__link link link--bold">
                    <i class="fab fa-forumbee"></i>
                    Forum
                </a>
            </h4>
        </div>
        @include('administrator.alert')
        <section class="detail-content">
            <div class="detail-content__top">
                <h1 class="detail-content__heading">{{$forumDetail->forum_title}}</h1>
                <div class="author">
                    <a href="#" class="author__avt">
                        <div class="avatar">
                            <img src="{{$forumDetail->user->user_avatar}}" alt="avt" />
                        </div>
                    </a>
                    <div class="author__info">
                        <a href="#" class="author__name link">{{$forumDetail->user->user_name}}</a>
                        <div class="author__time-comment">
                            <span class="author__time">{{$forumDetail->created_at}}</span>

                        </div>
                    </div>
                </div>
                <p class="detail-content__intro">
                    {{$forumDetail->forum_title}}
                </p>
            </div>
            <div class="detail-content__main">

                <div class="grid_detail">
                    <figure class="figure">
                        <img src="{{$forumDetail->forum_img_1}}" alt="img" class="figure__img img_detail" />
                    </figure>
                    <figure class="figure">
                        <img src="{{$forumDetail->forum_img_2}}" alt="img" class="figure__img img_detail" />
                    </figure>
                    <figure class="figure">
                        <img src="{{$forumDetail->forum_img_3}}" alt="img" class="figure__img img_detail" />
                    </figure>
                </div>

                {!! $forumDetail->forum_content !!}
            </div>
        </section>

        <!-- Comment Here -->
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
                    <form class="detail-comment__form" method="POST" action="/forum/detail/{{$forumDetail->forum_id}}/{{Auth::guard('user')->user()->user_id}}/comment">
                        <div class="detail-comment__field form__field">
                            <textarea required name="comment" id="comment" class="detail-comment__input form__input" placeholder=" ">{{old('comment')}}</textarea>
                            <label for="comment" class="form__label">Bạn nghĩ gì về tin này</label>
                        </div>
                        <div class="detail-comment__group form__field">
                            <button class="detail-comment__btn form__submit btn btn--error">Huỷ</button>
                            <button type="submit" class="detail-comment__btn form__submit btn btn--primary">Gửi</button>
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
                            <button onclick="showReply(
                                    <?php echo $data->forum_comment_id ?>
                                 )" class="detail-comment__btn form__submit btn btn--primary">Trả lời</button>
                            @endif
                        </div>


                        <!-- test -->
                        <ul class="detail-comment__list">
                            @foreach($replyComment as $key =>$dataRelly)
                            @if($dataRelly->parent_comment == $data->forum_comment_id)
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
                            <li id="reply-comment-{{$data->forum_comment_id}}" class="detail-comment__item" style="display: none;">
                                <div class="detail-comment__avt">
                                    <a href="#" class="author__avt">
                                        <div class="avatar">
                                            <img src="{{Auth::guard('user')->user()->user_avatar}}" alt="avt" />
                                        </div>
                                    </a>
                                </div>
                                <form class="detail-comment__form" method="POST" action="/forum/detail/{{$forumDetail->forum_id}}/{{Auth::guard('user')->user()->user_id}}/comment/{{$data->forum_comment_id}}">
                                    <div class="detail-comment__field form__field">
                                        <textarea required name="comment" id="comment" class="detail-comment__input form__input" placeholder=" ">{{old('comment')}}</textarea>
                                        <label for="comment" class="form__label">Trả lời bình luận của {{$data->user->user_name}}</label>
                                    </div>
                                    <div class="detail-comment__group form__field">
                                        <button type="button" onclick="hideReply(<?php echo $data->forum_comment_id ?>)" class="detail-comment__btn form__submit btn btn--error">Huỷ</button>
                                        <button type="submit" class="detail-comment__btn form__submit btn btn--primary">Gửi</button>
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


    </div>
</main>
@endsection