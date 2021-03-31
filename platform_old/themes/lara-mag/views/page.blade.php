@if ($page->template != 'homepage')
    <section class="sub-page">
        <section class="container">
            <section class="primary fleft">
                {!! Theme::partial('breadcrumbs') !!}
                <h1 class="single-title">
                    {{ $page->name }}
                </h1><!-- end .single-pro-title -->
                <section class="single-content">
                    @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($page)))
                        {!! render_object_gallery($galleries) !!}
                    @endif
                    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content, 'youtube'), $page) !!}
                </section><!-- end .single-pro-content -->
            </section><!-- end .primary -->
            <aside class="sidebar fright">
                {!! dynamic_sidebar('primary_sidebar') !!}
            </aside><!-- end .sidebar -->
            <section class="cboth"></section><!-- end .cboth -->
        </section><!-- end .container -->
    </section>
@else
    @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($page)))
        {!! render_object_gallery($galleries) !!}
    @endif
    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content, 'youtube'), $page) !!}
@endif
