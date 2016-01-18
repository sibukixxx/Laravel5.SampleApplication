<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ロゴ配置a予定</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">新卒採用</a></li>
                <li class=""><a href="#">アルバイト情報</a></li>
                <li class=""><a href="#">その他</a></li>
            </ul>

            <ul id="navbar-right" class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">ヘルプ <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/contact">お問い合わせ</a></li>
                        <li><a href="#">よくある質問</a></li>

                    </ul>
                </li>
                @if(auth()->guest())
                    @if(!Request::is('auth/login'))
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    @endif
                    @if(!Request::is('auth/register'))
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
                <li class="headerArea__aside__menu">
                    {{--<a class="" href="/profile/edit">--}}
                    <a class="" href="#">
                            <img class="profile_img" src="https://pbs.twimg.com/profile_images/588564070409703424/vZyFdFdy_400x400.png">
                    </a>
                </li>

            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>