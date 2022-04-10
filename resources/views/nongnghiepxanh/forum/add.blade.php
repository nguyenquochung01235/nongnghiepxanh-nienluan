@extends('nongnghiepxanh.main')

@section('nongnghiep')
<main class="container grid s-mainnew">

    <section class="sidebar grid--span-1">
        <!-- <aside class="sidebar__dropdown">
            <a class="sidebar__link active"><i class="fab fa-forumbee"></i>Đăng bài viết - câu hỏi</a>
            <ul class="sidebar__list">
                <li class="sidebar__item">
                    <a id="btnShowInfo" class="sidebar__link link active">Hồ sơ</a>
                </li>
                <li class="sidebar__item">
                    <a id="btnShowPassword" class="sidebar__link">Mật khẩu</a>
                </li>
            </ul>
        </aside> -->
    </section>
    <section id="informationUser" class="info grid--span-2">
        <div class="info__header">
        <h4><a class="sidebar__link active"><i class="fab fa-forumbee"></i>Đăng bài viết - câu hỏi</a></h4>
        </div>
        <form class="info__form grid grid--7" method="post" action="/forum/add/create"> 
            <div class="info__content grid--span-7">

                <div class="info__field form__field">
                    <input id="forum_title" required name="forum_title" type="text"class="form__input" placeholder=" " />
                    <label for="name" class="form__label">Nhập tựa đề, câu hỏi</label>
                </div>

               
                

                <div class="info__field form__field">
                    <select name="category" id="" class="form__input">
                        <option value="">Nông nghiệp</option>
                        <option value="">Chăn nuôi</option>
                        <option value="">...</option>
                    </select>
                    <label for="date" class="form__label">Chọn chủ đề</label>
                </div>

                <div class="img_input">
                    <div class="info__avt">
                        <label for="avt" class="info__label"
                        ><img src="" alt="Avatar" class="btn_img_1 img_forum_detail" />
                        </label>
                        <input class="info__input" type="file" name="img_1" id="img_1"/>
                        <input class="info__input" hidden type="text" name="img_1_link" id="img_1_link"/>
                        <button class="btn btn--medium btn--primary info__btn btn_img_1" type="button">Chọn ảnh</button>
                    </div>
                    <div class="info__avt">
                        <label for="avt" class="info__label">
                            <img src="" alt="Avatar" class="btn_img_2 img_forum_detail" />
                        </label>
                        <input class="info__input" type="file" name="img_2" id="img_2"/>
                        <input class="info__input" hidden type="text" name="img_2_link" id="img_2_link"/>
                        <button class="btn btn--medium btn--primary info__btn btn_img_2" type="button">Chọn ảnh</button>
                    </div>
                    <div class="info__avt">
                        <label for="avt" class="info__label"
                        ><img src="" alt="Avatar" class="btn_img_3 img_forum_detail" />
                        </label>
                        <input class="info__input" type="file" name="img_3" id="img_3"/>
                        <input class="info__input" hidden type="text" name="img_3_link" id="img_3_link"/>
                        <button class="btn btn--medium btn--primary info__btn btn_img_3" type="button">Chọn ảnh</button>
                    </div>
                </div>

                <div style="margin-bottom: 2em;">
                    
                    <textarea name="content" id="content">Nội dung</textarea>
                    
                </div>

                <div class="info__field form__field">
                    <button type="submit" style="float: right;" class="btn btn--medium btn--primary info__btn">Đăng bài</button>
                </div>
            </div>
            @csrf
        </form>
    </section>
</main>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection