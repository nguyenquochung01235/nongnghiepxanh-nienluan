<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="shortcut icon" href="/admintemplate/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/NongNghiepXanhTemplate/css/main.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header header--second">
        <div class="header__container container">
            <div class="header__logo logo logo--second logo--small">
                <a href="/">
                    <img src="/admintemplate/img/logo.png" alt="logo" class="header__img" />
                    <span>Nông Nghiệp Xanh</span>
                </a>
            </div>
            <h1 class="header__heading">Đăng nhập</h1>
        </div>
    </header>
    <main class="authen-main">
        <section class="authen-content">
            <div class="authen-content__container container grid">
                <div class="authen-content__brand">
                    <div class="logo logo--large">
                        <a href="#">
                            <img src="/admintemplate/img/logo.png" alt="logo" class="header__img" />
                            <span>Nông Nghiệp Xanh</span>
                        </a>
                    </div>
                    <p class="authen-content__slogan">Nền tảng thương mại điện tử dành cho thị trường nông nghiệp Việt Nam</p>
                </div>
                <div class="authen-content__form">
                    <form class="form">
                        <h4 class="form__heading">Đăng Nhập</h4>
                       
                            @include('administrator.alert')
                      
                            
                        
                        <div class="form__field">
                            <input id="email" class="form__input" type="text" name="email" placeholder=" " />
                            <label class="form__label" for="email">Email</label>
                        </div>
                        <div class="form__field">
                            <input id="password" class="form__input" type="password" name="email" placeholder=" " />
                            <label class="form__label" for="password">Mật khẩu</label>
                        </div>
                        <div class="form__field--remember">
                            <input id="remember" class="form__input" type="checkbox" name="remember" />
                            <label class="form__label" for="remember">Ghi nhớ đăng nhập</label>
                        </div>
                        <div class="form__field">
                            <button class="form__submit btn btn--primary">Đăng Nhập</button>
                        </div>
                        <a href="./forgetPassword.html" class="link link--second">Quên mật khẩu?</a>
                        <p class="form__split"><span>Hoặc</span></p>
                        <div class="form__socials">
                            <a href="#" class="form__btn btn btn--second btn--medium">
                                <i class="fab fa-facebook form__icon form__icon--fb"></i>
                                <span>Facebook</span>
                            </a>
                            <a href="#" class="form__btn btn btn--second btn--medium">
                                <i class="fab fa-google form__icon"></i>
                                <span>Google</span>
                            </a>
                        </div>
                        <p class="form__mesage">
                            <span>Bạn mới biết đến Nông Nghiệp Xanh?</span>
                            <a href="/sign-up" class="link link--primary">Đăng ký</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer__logo logo logo--second logo--regular">
                <a href="#">
                    <img src="/admintemplate/img/logo.png" alt="logo" class="header__img" />
                    <span>Nông Nghiệp Xanh</span>
                </a>
            </div>
            <div class="footer__contact">
                <ul class="footer__list">
                    <li class="footer__item">Địa chỉ: Đại học Cần Thơ Khu II, 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ</li>
                    <li class="footer__item">
                        Email: <a href="mailto:nongnghiepxanh@gmail.com" class="link">nongnghiepxanh@gmail.com</a>
                    </li>
                    <li class="footer__item">Hotline: <a href="tel:0123456789" class="link">0123456789</a></li>
                </ul>
            </div>
            <div class="footer__copyright">
                <p>© Nông Nghiệp Xanh - Nền tảng thương mại điện tử dành cho thị trường nông nghiệp Việt Nam</p>
            </div>
        </div>
    </footer>
    <script src="/NongNghiepXanhTemplate/js/main.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

</body>

</html>