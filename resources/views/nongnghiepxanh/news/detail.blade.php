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
            <li class="detail-comment__item">
              <div class="detail-comment__avt">
                <a href="#" class="author__avt">
                  <div class="avatar">
                    <img src="../assets/images/img_avatar.png" alt="avt" />
                  </div>
                </a>
              </div>
              <form class="detail-comment__form">
                <div class="detail-comment__field form__field">
                  <textarea
                    name="comment"
                    id="comment"
                    class="detail-comment__input form__input"
                    placeholder=" "
                  ></textarea>
                  <label for="comment" class="form__label">Bạn nghĩ gì về tin này</label>
                </div>
                <div class="detail-comment__group form__field">
                  <button class="detail-comment__btn form__submit btn btn--error">Huỷ</button>
                  <button class="detail-comment__btn form__submit btn btn--primary">Gửi</button>
                </div>
              </form>
            </li>
            <li class="detail-comment__item">
              <div class="detail-comment__avt">
                <a href="#" class="author__avt">
                  <div class="avatar">
                    <img src="../assets/images/avatar_male_2.png" alt="avt" />
                  </div>
                </a>
              </div>
              <div class="detail-comment__content">
                <div class="detail-comment__heading">
                  <a href="#" class="detail-comment__name link">nguyencaothangtp</a>
                  <span class="detail-comment__time">1 giờ</span>
                </div>
                <p class="detail-comment__text">
                  Đọc mấy bài kiểu này xong không thấy tăng thêm kiến thức gì cả. Nản luôn cái diễn đàn này. Bài đã ra
                  trang chủ nên là bài rất chất lượng, hàm lượng kiến thức cao cho người đọc.
                </p>
                <div class="detail-comment__group detail-comment__group--second form__field">
                  <button class="detail-comment__btn form__submit btn btn--primary">Trả lời</button>
                </div>
                <ul class="detail-comment__list">
                  <li class="detail-comment__item">
                    <div class="detail-comment__avt">
                      <a href="#" class="author__avt">
                        <div class="avatar">
                          <img src="../assets/images/avt_3.jpg" alt="avt" />
                        </div>
                      </a>
                    </div>
                    <div class="detail-comment__content">
                      <div class="detail-comment__heading">
                        <a href="#" class="detail-comment__name link">demash</a>
                        <span class="detail-comment__time">1 giờ</span>
                      </div>
                      <p class="detail-comment__text">
                        Công nhận là quảng cáo ngu quá 😌 Nói linh tinh thiên địa rồi cuối cùng không kết luận được gì.
                      </p>
                      <div class="detail-comment__group detail-comment__group--second form__field">
                        <button class="detail-comment__btn form__submit btn btn--primary">Trả lời</button>
                      </div>
                      <ul class="detail-comment__list">
                        <li class="detail-comment__item">
                          <div class="detail-comment__avt">
                            <a href="#" class="author__avt">
                              <div class="avatar">
                                <img src="../assets/images/img_avatar.png" alt="avt" />
                              </div>
                            </a>
                          </div>
                          <form class="detail-comment__form">
                            <div class="detail-comment__field form__field">
                              <textarea
                                name="comment"
                                id="comment"
                                class="detail-comment__input form__input"
                                placeholder=" "
                              ></textarea>
                              <label for="comment" class="form__label">Đang trả lời demash</label>
                            </div>
                            <div class="detail-comment__group form__field">
                              <button class="detail-comment__btn form__submit btn btn--error">Huỷ</button>
                              <button class="detail-comment__btn form__submit btn btn--primary">Gửi</button>
                            </div>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
            <li class="detail-comment__item">
              <div class="detail-comment__avt">
                <a href="#" class="author__avt">
                  <div class="avatar">
                    <img src="../assets/images/avt4.jpg" alt="avt" />
                  </div>
                </a>
              </div>
              <div class="detail-comment__content">
                <div class="detail-comment__heading">
                  <a href="#" class="detail-comment__name link">lamtien338</a>
                  <span class="detail-comment__time">1 giờ</span>
                </div>
                <p class="detail-comment__text">Đúng kiểu quảng cáo. May mà đọc đoạn đầu sau đó lướt đọc comment</p>
                <div class="detail-comment__group detail-comment__group--second form__field">
                  <button class="detail-comment__btn form__submit btn btn--primary">Trả lời</button>
                </div>
              </div>
            </li>
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
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
            <article class="article article--medium">
              <a href="#123" class="article__link"
                ><img src="../assets/images/News/nong-dan-dong-thap.jpeg" alt="img" class="article__img"
              /></a>
              <div class="article__info">
                <h2 class="article__heading">
                  <a href="#" class="article__link">Nông dân Đồng Tháp ‘say’ công nghệ thông minh</a>
                </h2>
                <div class="article__category">
                  <a href="#" class="article__link link">Nông nghiệp 4.0</a>
                </div>
                <p class="article__intro">
                  Ứng dụng công nghệ thông minh trong sản xuất nông nghiệp đang có sự lan tỏa rất mạnh mẽ tại tỉnh Đồng
                  Tháp.
                </p>
              </div>
            </article>
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