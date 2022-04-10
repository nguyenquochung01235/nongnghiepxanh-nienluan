@extends('nongnghiepxanh.main')

@section('nongnghiep')
<main class="container s-mainnew">
    <div>
        <h4 class="heading">
            <a href="./" class="heading__link link link--bold">
                <i class="fab fa-forumbee"></i>
                Diễn đàn
            </a>
        </h4>
    </div>
    
    <div>
    @if(Auth::guard('user')->check())
        <a href="/forum/add" class=" detail-comment__btn form__submit btn btn--primary">Tạo Bài Viết - Câu Hỏi</a>
    @else
        <a href="/sign-in" class=" detail-comment__btn form__submit btn btn--primary">Đăng Nhập Tạo Bài Viết - Câu Hỏi</a>
    @endif
    </div>
</br>
    @include('administrator.alert')
    <!-- <section class="article-list grid grid--12 grid--no-gap"> -->
    <section class="article-list grid  grid--no-gap">
        @foreach($forum as $key => $data)
        <article class="article article--medium grid--span-9" >

            <div class="author">
                <a href="#" class="author__avt">
                    <div class="avatar">
                        <img src="{{$data->user->user_avatar}}" alt="avt" />
                    </div>
                </a>
                <div class="author__info">
                    <a href="#" class="author__name link" style="min-width: 9em;">{{$data->user->user_name}}</a>
                    <div class="author__time-comment">
                        <span class="author__time">{{$data->created_at}}</span>

                    </div>
                </div>
            </div>





            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/forum/detail/{{$data->forum_id}}" class="article__link">{{$data->forum_title}}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">Diễn đàn</a>
                </div>
                <div class="article__intro mota">
                {!!$data->forum_content!!}
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