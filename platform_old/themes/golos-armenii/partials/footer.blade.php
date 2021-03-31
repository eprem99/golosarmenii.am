<footer class="footer">
    <section class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   {!! dynamic_sidebar('footer_sidebar') !!}
                </div>

                <div class="col-md-4">
                   {!! dynamic_sidebar('footer_sidebar_2') !!}
                </div>

                <div class="col-md-5">
                   {!! dynamic_sidebar('footer_sidebar_3') !!}
                </div>
            </div><!-- end .cboth -->
        </div><!-- end .container -->
    </section><!-- end .dooter-top -->
    <section class="footer-bottom">
        <section class="container">
            <section class="footer-bottom-left fleft">
                {!! clean(theme_option('copyright')) !!}
            </section><!-- end  .footer-bottom-left -->
            <section class="footer-bottom-right fright">
<a href="https://vecto.digital" class="vecto-logo"><svg class="icon vecto"> <use xlink:href="/themes/golos-armenii/images/vecto2-1.svg#vecto" width="100%" height="100%"></use> </svg></a>
            </section><!-- end .footer-bottom-right -->
            <section class="cboth"></section><!-- end .cboth -->
        </section><!-- end .container -->
    </section><!-- end .footer-bottom -->
</footer><!-- end .footer -->
<!--<section class="icon-back-top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</section>-->
<!-- end .icon-back-top -->

{!! Theme::footer() !!}
</body>
</html>
