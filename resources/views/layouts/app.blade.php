<!DOCTYPE html>
<html class="js" lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel='stylesheet' id='bbp-default-css'  href="{{ asset('css/bbpress.css') }}" type='text/css' media='screen' />
    <link rel='stylesheet' id='parent-style-css'  href="{{ asset('css/style.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='twentysixteen-fonts-css'  href="https://fonts.googleapis.com/css?family=Merriweather%3A400%2C700%2C900%2C400italic%2C700italic%2C900italic%7CMontserrat%3A400%2C700%7CInconsolata%3A400&#038;subset=latin%2Clatin-ext" type='text/css' media='all' />
    <link rel='stylesheet' id='genericons-css'  href="{{ asset('css/genericons_css.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='twentysixteen-style-css'  href="{{ asset('css/style2.css') }}" type='text/css' media='all' />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('extra_javascript')
</head>
<body class="home page-template-default page page-id-3138">
    <div id="page" class="site">
        <div class="site-inner">
            <a class="skip-link screen-reader-text" href="#content">
                Skip to content
            </a>
            <header id="masthead" class="site-header" role="banner">
                <div class="site-header-main">
                    <div class="site-branding">
                        <p class="site-title">
                            <a href="{{ route('index') }}" rel="home">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        </p>
                        <p class="site-description">
                            Een forum gemaakt door Kjell Vos!
                        </p>
                    </div><!-- .site-branding -->
                    <button id="menu-toggle" class="menu-toggle">
                        Menu
                    </button>
                    <div id="site-header-menu" class="site-header-menu">
                        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
                            <div class="menu-main-container">
                                <ul id="menu-main" class="primary-menu">
                                    <li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26">
                                        <a href="{{ route('channelsList') }}">
                                            Channels
                                        </a>
                                    </li>
                                    @if (Auth::guest())
                                        <li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26">
                                            <a href="{{ route('login') }}">
                                                Login/registreer
                                            </a>
                                        </li>
                                    @else
                                        <li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26">
                                            <a href="{{ route('createNewThread') }}">
                                                Nieuwe Thread Aanmaken
                                            </a>
                                        </li>
                                        <li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26">
                                            <a href="{{ route('profile', \Illuminate\Support\Facades\Auth::id()) }}">
                                                Mijn profiel
                                            </a>
                                        </li>
                                        @if (\App\User::isAdmin())
                                            <li id="menu-item-24" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24">
                                                <a href="{{ route('createNewChannel') }}">
                                                    Nieuwe channel aanmaken
                                                </a>
                                            </li>
                                        @endif
                                        <li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28">
                                            <a href="{{ route('logout') }}" onclick="   event.preventDefault();
                                                                                        document.getElementById('logout-form').submit();">
                                                Log uit
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </nav><!-- .main-navigation -->
                    </div><!-- .site-header-menu -->
                </div><!-- .site-header-main -->
            </header><!-- .site-header -->
            <div id="content" class="site-content">
                @if(Session::has('msg'))
                    <div class="alert alert-info">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>Heads Up!</strong> {!!Session::get('msg')!!}
                    </div>
                @endif
                @yield('content')
            </div><!-- .site-content -->
            <footer id="colophon" class="site-footer" role="contentinfo">
                <div class="site-info">
                    <span class="site-title"><a href="">Kjell Vos</a> © 2017</span>
                </div><!-- .site-info -->
            </footer><!-- .site-footer -->
        </div><!-- .site-inner -->
    </div><!-- .site -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var screenReaderText = {"expand":"expand child menu","collapse":"collapse child menu"};
        /* ]]> */
    </script>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/functions.js') }}"></script>
    @yield('bottom_javascript')
</body>
</html>
