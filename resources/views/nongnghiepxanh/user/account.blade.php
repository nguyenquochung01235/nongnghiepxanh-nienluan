@extends('nongnghiepxanh.main')

@section('nongnghiep')
<main class="container grid info-wrapper s-mainnew">
    <section class="sidebar grid--span-1">
        <aside class="sidebar__dropdown">
            <a class="sidebar__link active"><i class="fas fa-user"></i>Tài khoản của tôi</a>
            <ul class="sidebar__list">
                <li class="sidebar__item">
                    <a id="btnShowInfo" class="sidebar__link link active">Hồ sơ</a>
                </li>
                <li class="sidebar__item">
                    <a  id="btnShowPassword" class="sidebar__link">Mật khẩu</a>
                </li>
            </ul>
        </aside>
    </section>
    <section id="informationUser" class="info grid--span-3">
        <div class="info__header">
            <h4 class="info__heading">Hồ sơ của tôi</h4>
        </div>
        <form class="info__form grid grid--12">
            <div class="info__content grid--span-7">

                <div class="info__field form__field">
                    <input id="name" name="name" type="text" value="{{$user->user_name}}" class="form__input" placeholder=" " />
                    <label for="name" class="form__label">Họ tên</label>
                </div>
                <div class="info__field form__field">
                    <input id="phone" name="phone" type="text" class="form__input" placeholder=" " value="{{$user->user_phone}}" />
                    <label for="phone" class="form__label">Số điện thoại</label>
                </div>
                <div class="info__field form__field">
                    <input id="email" name="email" type="email" class="form__input" placeholder=" " value="{{$user->user_email}}" />
                    <label for="email" class="form__label">Email</label>
                </div>
                <div class="info__field form__field">
                    <input id="test" name="test" type="text" class="form__input radio" placeholder=" " />
                    <label for="test" class="form__label">Giới tính</label>
                    <div class="form__field form__field--radio">
                        <div>
                            <input id="male" name="gender" type="radio" class="form__input" placeholder=" " value="male" />
                            <label for="male" class="form__label radio">Nam</label>
                        </div>
                        <div>
                            <input id="female" name="gender" type="radio" class="form__input" placeholder=" " value="female" />
                            <label for="female" class="form__label radio">Nữ</label>
                        </div>
                        <div>
                            <input id="other" name="gender" type="radio" class="form__input" placeholder=" " value="other" />
                            <label for="other" class="form__label radio">Khác</label>
                        </div>
                    </div>
                </div>
                <div class="info__field form__field">
                    <input id="date" name="date" type="date" value="{{$user->user_birthday}}" class="form__input" placeholder=" " />
                    <label for="date" class="form__label">Ngày sinh</label>
                </div>
                <div class="info__field form__field">
                    <select name="province" id="" class="form__input">
                        <option value="">Cần Thơ</option>
                        <option value="">Hồ Chí Minh</option>
                        <option value="">Tiền Giang</option>
                        <option value="">Đồng Tháp</option>
                    </select>
                    <label for="date" class="form__label">Chọn tỉnh / thành phố</label>
                </div>
                <div class="info__field form__field">
                    <select name="province" id="" class="form__input">
                        <option value="">Ninh Kiều</option>
                        <option value=""></option>
                        <option value="">Tiền Giang</option>
                        <option value="">Đồng Tháp</option>
                    </select>
                    <label for="date" class="form__label">Chọn quận / huyện</label>
                </div>
                <div class="info__field form__field">
                    <select name="province" id="" class="form__input">
                        <option value="">Hưng Lợi</option>
                        <option value="">Hồ Chí Minh</option>
                        <option value="">Tiền Giang</option>
                        <option value="">Đồng Tháp</option>
                    </select>
                    <label for="date" class="form__label">Chọn phường / xã</label>
                </div>

                <div class="info__field form__field">
                    <button type="submit" class="btn btn--medium btn--primary info__btn">Lưu</button>
                </div>
            </div>
            <div class="info__avt grid--span-5">
                <label for="avt" class="info__label"><img src="{{$user->user_avatar}}" alt="Avatar" class="avatar avatar--large info__img" />
                </label>
                <input class="info__input" type="file" name="avt" id="avt" accept=".jpg,.jpeg,.png" />
                <button class="btn btn--medium btn--primary info__btn" type="button">Chọn ảnh</button>
            </div>
        </form>
    </section>
    <section id="passwordUser" style="display: none;" class="info grid--span-3">
        <div class="info__header">
            <h4 class="info__heading">Đổi mật khẩu</h4>
        </div>
        <form class="info__form grid grid--12">
            <div class="info__content grid--span-7">
                <div class="info__field form__field">
                    <input id="currentPw" name="currentPw" type="password" class="form__input" placeholder=" " />
                    <label for="currentPw" class="form__label">Mật khẩu hiện tại</label>
                </div>
                <div class="info__field form__field">
                    <input id="newPw" name="newPw" type="password" class="form__input" placeholder=" " />
                    <label for="newPw" class="form__label">Mật khẩu mới</label>
                </div>
                <div class="info__field form__field">
                    <input id="confirmPw" name="confirmPw" type="password" class="form__input" placeholder=" " />
                    <label for="confirmPw" class="form__label">Xác nhận mật khẩu</label>
                </div>
                <div class="info__field form__field">
                    <button type="submit" class="btn btn--medium btn--primary info__btn">Xác nhận</button>
                </div>
            </div>
        </form>
    </section>
</main>
@endsection