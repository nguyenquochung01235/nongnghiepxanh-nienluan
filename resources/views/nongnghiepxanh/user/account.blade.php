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
        <form class="info__form grid grid--12" method="post" action="/account/{{$user[0]->user_id}}/update">
            <div class="info__content grid--span-7">
                @include('administrator.alert')
                <div class="info__field form__field">
                    <input id="name" name="name" type="text" value="{{$user[0]->user_name}}" class="form__input" placeholder=" " />
                    <label for="name" class="form__label">Họ tên</label>
                </div>
                <div class="info__field form__field">
                    <input id="phone" name="phone" type="text" class="form__input" placeholder=" " value="{{$user[0]->user_phone}}" />
                    <label for="phone" class="form__label">Số điện thoại</label>
                </div>
                <div class="info__field form__field">
                    <input id="email" name="email" type="email" disabled class="form__input" placeholder=" " value="{{$user[0]->user_email}}" />
                    <label for="email" class="form__label">Email</label>
                </div>
                <div class="info__field form__field">
                    <input id="test" name="test" type="text" class="form__input radio" placeholder=" " />
                    <label for="test" class="form__label">Giới tính</label>
                    <div class="form__field form__field--radio">
                        <div>
                            <input id="male" name="gender" 
                            {{ $user[0]->user_gender == 1 ? 'checked' : ''}}
                            type="radio" class="form__input" placeholder=" " value="1" />
                            <label for="male" class="form__label radio">Nam</label>
                        </div>
                        <div>
                            <input id="female" name="gender" 
                            {{ $user[0]->user_gender == 2 ? 'checked' : ''}}
                            type="radio" class="form__input" placeholder=" " value="2" />
                            <label for="female" class="form__label radio">Nữ</label>
                        </div>
    
                    </div>
                </div>
                <div class="info__field form__field">
                    <input id="date" name="birthday" type="date" value="{{$user[0]->user_birthday}}" class="form__input" placeholder=" " />
                    <label for="date" class="form__label">Ngày sinh</label>
                </div>
                <div class="info__field form__field">
                    <select name="province" id="provinceSelectBox" class="form__input">
                        @foreach($province as $key => $data  )
                        <option 
                        {{ $user[0]->commune->district->province->province_id== $data->province_id ? 'selected' : ''}}
                        value="{{$data->province_id}}">{{$data->province_name}}</option>

                        @endforeach
                    </select>
                    <label for="date" class="form__label">Chọn tỉnh / thành phố</label>
                </div>
                <div class="info__field form__field">
                    <select name="district" id="districtSelectBox" class="form__input">
                        @foreach($district as $key => $data  )
                        @if($data->province_id == $user[0]->commune->district->province->province_id)
                        <option 
                        {{ $user[0]->commune->district->district_id == $data->district_id ? 'selected' : ''}}
                        value="{{$data->district_id}}">{{$data->district_name}}</option>
                        @endif
                        @endforeach
                    </select>
                    <label for="date" class="form__label">Chọn quận / huyện</label>
                </div>
                <div class="info__field form__field">
                    <select name="commune" id="communeSelectBox" class="form__input">
                        @foreach($commune as $key => $data)
                        @if($data->district_id == $user[0]->commune->district->district_id)
                        <option 
                        {{ $user[0]->commune_id == $data->commune_id ? 'selected' : ''}}
                        value="{{$data->commune_id}}">{{$data->commune_name}}</option>
                        @endif
                        @endforeach
                    </select>
                    <label for="date" class="form__label">Chọn phường / xã</label>
                </div>

                <div class="info__field form__field">
                    <button type="submit" class="btn btn--medium btn--primary info__btn">Lưu</button>
                </div>
            </div>
            <div class="info__avt grid--span-5">
                <label for="avt" class="info__label"><img src="{{$user[0]->user_avatar}}" alt="Avatar" id="user_avatar_img" class="avatar avatar--large info__img" />
                </label>
                <input class="info__input" type="file" name="avt" id="avt" accept=".jpg,.jpeg,.png" />
                <input type="text" value="{{$user[0]->user_avatar}}" hidden id="user_avatar" name="user_avatar">
                <button class="btn btn--medium btn--primary info__btn" id="btn-avt" type="button">Chọn ảnh</button>
            </div>
            @csrf
        </form>
    </section>
    <section id="passwordUser" style="display: none;" class="info grid--span-3">
        <div class="info__header">
            <h4 class="info__heading">Đổi mật khẩu</h4>
        </div>
        <form class="info__form grid grid--12" method="post" action="/account/{{$user[0]->user_id}}/changepassword">
            <div class="info__content grid--span-7">
            @include('administrator.alert')
                <div class="info__field form__field">
                    <input id="currentPw" required name="currentPassword" type="password" class="form__input" placeholder=" " />
                    <label for="currentPw" class="form__label">Mật khẩu hiện tại</label>
                </div>
                <div class="info__field form__field">
                    <input id="newPw" required name="newPassword" type="password" class="form__input" placeholder=" " />
                    <label for="newPw" class="form__label">Mật khẩu mới</label>
                </div>
                <div class="info__field form__field">
                    <input id="confirmPw"  required name="confirmPassword" type="password" class="form__input" placeholder=" " />
                    <label for="confirmPw" class="form__label">Xác nhận mật khẩu</label>
                </div>
                <div class="info__field form__field">
                    <button type="submit" class="btn btn--medium btn--primary info__btn">Xác nhận</button>
                </div>
            </div>
            @csrf
        </form>
    </section>
</main>
@endsection