<header class="header">
    <div class="container">
        <div class="header__top">
            <div class="header__logo logo logo--small">
                <a href="/">
                    <img src="/admintemplate/img/logo.png" alt="logo" class="header__img" />
                    <span><strong>Nông Nghiệp Xanh</strong></span>
                </a>
            </div>
            <div class="header__search">
             <?php 
                $link = \App\Helpers\Helper::checkUrlContain(); 
             ?>
                <form class="header__form" action="/searchnews/{!!$link!!}" method="get">
                    <input class="header__input" type="text" name="searchnews" placeholder="Tìm kiếm thông tin" />
                    <button class="header__btn btn btn--small btn--primary"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="header__control logged-in">
                @if(Auth::guard('user')->check())
                <div class="header__profile">
                    <div class="header__avt">
                        <button class="avatar btn">
                            <img src="{{Auth::guard('user')->user()->user_avatar}}" alt="avt" />
                        </button>
                    </div>
                    <ul class="header__list">
                        <li class="header__item">
                            <a href="/profile/{{Auth::guard('user')->user()->user_id}}" class="header__link"><i class="fas fa-user-circle"></i>Trang cá nhân</a>
                        </li>
                        <li class="header__item">
                            <a href="/account/{{Auth::guard('user')->user()->user_id}}" class="header__link"><i class="fas fa-user"></i>Tài khoản của tôi</a>
                        </li>
                        <li class="header__item">
                            <a href="/forum/add" class="header__link"><i class="fas fa-edit"></i>Viết bài</a>
                        </li>
                        <li class="header__item">
                            <a href="/log-out" class="header__link"><i class="fas fa-power-off"></i>Đăng xuất</a>
                        </li>
                    </ul>
                </div>

                @else
                <a href="/sign-up" class="link link--regular">Đăng ký</a>
                <span style="padding: 0 6px;"> | </span>
                <a href="/sign-in" class="link link--regular">Đăng nhập</a>
                @endif

                <!-- <div class="header__auth">
                   
               </div> -->


            </div>




        </div>
        <nav class="header__nav nav">
            <a href="/" class="nav__link link link--regular link--bold active" style="margin-right: 15px;"><i class="link__icon fas fa-home"></i></a>
            <!-- <a href="" class="nav__link link link--regular link--bold">Nông nghiệp 4.0</a> -->
            <div class="nav__dropdown">
                <a href="#" class="nav__link nav__link--dropdown link link--regular link--bold">Tin Tức <i class="fas fa-caret-down"></i></a>
                <ul class="nav__list">


                    <?php $list = \App\Helpers\Helper::getAllNewsCategory(); ?>


                    @foreach( $list as $key => $data)

                    <li class="nav__item"><a href="/news/category/{{$data->id_news_category}}" class="nav__link link link--regular link--bold">{{$data->news_category}}</a></li>
                    @endforeach



                </ul>
            </div>

            <a href="/land" class="nav__link link link--regular link--bold" style="margin-right: 12px;">Thời tiết & đất</a>
           
            <div class="nav__dropdown">
                <a href="#" class="nav__link nav__link--dropdown link link--regular link--bold" style="margin-right: 12px;">Cây trồng & bệnh hại <i class="fas fa-caret-down"></i></a>
                <ul class="nav__list">
                    <li class="nav__item"><a href="/plant" class="nav__link link link--regular link--bold">Tra cứu cây trồng</a></li>
                    <li class="nav__item"><a href="/sop" class="nav__link link link--regular link--bold">Tra cứu bệnh hại</a></li>
                </ul>
            </div>

            <div class="nav__dropdown">
                <a href="#" class="nav__link nav__link--dropdown link link--regular link--bold" >Vật nuôi & bệnh hại <i class="fas fa-caret-down"></i></a>
                <ul class="nav__list">
                    <li class="nav__item"><a href="/animal" class="nav__link link link--regular link--bold">Tra cứu vật nuôi</a></li>
                    <li class="nav__item"><a href="/soa" class="nav__link link link--regular link--bold">Tra cứu bệnh hại</a></li>
                </ul>
            </div>
            <a href="#" class="nav__link link link--regular link--bold">Thuốc & vật tư nông nghiệp</a>
            <a href="/forum" class="nav__link link link--regular link--bold">Diễn đàn</a>
            <a href="#" class="nav__link link link--regular link--bold">Chợ Nông Nghiệp</a>
        </nav>
    </div>
</header>