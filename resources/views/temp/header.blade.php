    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
            <a href="{{ url('/') }}"><img src="{{ url('assets/img/logo_prama.png') }}" alt="logo" /></a>
        </div>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="{{ request()->is('about_us') ? 'active' : '' }}">
                    <a href="{{ url('/about_us') }}">{{ __('bahasa.tentang kami') }}</a>
                </li>
                <li class="{{ request()->is('career') ? 'active' : '' }}">
                    <a href="{{ url('/career') }}">{{ __('bahasa.karir') }}</a>
                </li>
                <li class="{{ request()->is('news-') ? 'active' : '' }}">
                    <a href="{{ url('/news') }}">{{ __('bahasa.berita') }}</a>
                </li>
                <li class="drop-down"><a>{{ __('bahasa.bahasa') }}</a>
                    <ul>
                        <li><a href="{{ route('localization.switch', 'id') }}">{{ __('bahasa.indonesia') }}</a>
                        </li>
                        <li><a href="{{ route('localization.switch', 'en') }}">{{ __('bahasa.inggris') }}</a></li>
                    </ul>
                </li>
                <div class="loginbtn"><a href="{{ url('/order') }}"><button
                            class="login_button">{{ __('bahasa.pesan') }}</button></a>
                </div>
            </ul>
        </nav><!-- .nav-menu -->
    </div>
