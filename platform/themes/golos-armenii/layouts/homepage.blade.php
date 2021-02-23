{!! Theme::partial('header') !!}

<div class="container">
    <section class="home-wrap">
        <section class="container">
            {!! do_shortcode('[featured-posts][/featured-posts]') !!}
            <section class="primary fleft">
                {!! Theme::content() !!}
            </section><!-- end .primary -->
            <aside class="sidebar fright">
                {!! dynamic_sidebar('home_sidebar') !!}
            </aside><!-- end .sidebar -->
            <section class="cboth"></section><!-- end .cboth -->
        </section><!-- end .container -->
    </section><!-- end .home-wrap -->
</div>

{!! Theme::partial('footer') !!}
