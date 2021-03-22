<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('primary_font', 'Roboto Condensed')) }}:300,300i,400,400i,700,700i" rel="stylesheet" type="text/css">
    <!-- CSS Library-->

    <style>
        :root {
            --color-1st: {{ theme_option('primary_color', '#095272') }};
            --color-2st: {{ theme_option('top_color', '#095272') }};
            --color-3st: {{ theme_option('footer_color', '#095272') }};
            --primary-font: '{{ theme_option('primary_font', 'Roboto Condensed') }}', sans-serif;
        }
    </style>

    {!! Theme::header() !!}
</head>
<body class="home blog" @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif>
<header class="header">
    <section class="header-menu-top">
        <section class="container">
            <section class="header-top-left fleft">
            {!! dynamic_sidebar('top_sidebar') !!}
            </section><!-- end .header-menu-top-left -->
            <section class="header-top-right header-social fright">
                <div class="language-wrapper">
                    {!! apply_filters('language_switcher') !!}
                </div>
                <div class="search-wraper">
                    <a href="#" class="search-btn"><i class="fa fa-search"></i></a>
                </div>
            </section><!-- end .header-menu-top-right -->
            <section class="cboth"></section><!-- end .cboth -->
        </section><!-- end .container -->
    </section><!-- end .header-menu-top -->
    <section class="header-top"> 
        <div class="container">
            <div class="row">
                <div class="col-md-3">
            <h1 class="logo fleft">
                <a href="{{ route('public.single') }}" title="{{ theme_option('site_title') }}">
                    @if (!theme_option('logo'))
                        <span>Golos</span>Armenii
                    @else
                        <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="{{ theme_option('site_title') }}" title="{{ theme_option('site_title') }}"/>
                    @endif
                </a>
            </h1><!-- end .logo -->
                </div>
                <div class="col-md-9">
            @if (theme_option('banner-ads'))
                <section class="header-banners">
                    <a href="{{ theme_option('banner-link') }}" @if (theme_option('banner-new-tab')) target="_blank" @endif><img src="{{ RvMedia::getImageUrl(theme_option('banner-ads')) }}" alt="Banner ads header"/></a>
                </section><!-- end .header-banner -->
            @endif
                </div>
            </div>
        </div>
    </section><!-- end .header-right-top -->
    <section class="header-bottom">
        <section class="container">
            <a class="icon-home fleft icon-home-active icon-home-active" href="{{ route('public.single') }}"></a>
            <section class="main-nav fleft">
                <section class="main-nav-inner tf">

                    {!!
                        Menu::renderMenuLocation('main-menu', [
                            'options' => ['id' => 'menu-header-main-menu', 'class' => 'menu'],
                            'theme' => true,
                        ])
                    !!}
                </section><!-- end .main-nav-inner -->
            </section><!-- end .main-nav -->
            <section class="cboth"></section><!-- end .cboth -->
        </section><!-- end .container -->
    </section><!-- end .header-bottom -->
</header><!-- end .header -->

<div class="super-search hide">
<form class="quick-search" action="{{ route('public.search') }}">
        <input type="text" name="q" placeholder="{{ __('Type to search...') }}" class="form-control search-input" autocomplete="off">
        <span class="search-btn">&times;</span>
    </form>
    <div class="search-result"></div>
</div>
