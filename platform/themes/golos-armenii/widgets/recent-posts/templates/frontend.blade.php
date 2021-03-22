
@if (is_plugin_active('blog'))
    @if ($sidebar == 'footer_sidebar')
        <section class="footer-item">
            <section class="footer-item-head">
                <span>{{ $config['name'] }}</span>
            </section><!-- end .footer-item-head -->
            <section class="footer-item-content">
    @else
        <section class="block-post-item news sidebar-item row mb-5">
            <div class="col-md-12 mb-3">
                <div class="block-post-wrap-head sidebar-item-head tf mb-3">
                        <span class="titles">{{ $config['name'] }}</span>
                        <span class="after-title"></span>
                </div><!-- end .sidebar-item-head -->
            </div>
            <section class="col-md-12">
    @endif
                @foreach (get_recent_posts($config['number_display']) as $post)
                    <section class="sidebar-new-item">
                    <section class="sidebar-new-item-thumb fleft thumb-full">
                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" class="attachment-full size-full wp-post-image" alt="{{ $post->name }}"/>
                    </section>
                    <!-- end .sidebar-new-item-thumb -->
                    <section class="sidebar-new-item-info">
                        <h2 class="post1-item-list">
                            <a class="white-space" href="{{ $post->url }}">{{ $post->name }}</a>
                        </h2><!-- end .post1-item-list -->
                        <section class="sidebar-new-item-des">
                            <i class="fa fa-calendar" aria-hidden="true"></i>{{ $post->created_at->format('Y-m-d') }}
                        </section><!-- end .sidebar-new-item-des -->
                    </section><!-- end .sidebar-new-item-info -->
                    <section class="cboth"></section><!-- end .cboth -->
                </section><!-- end .sidebar-new-item -->
                @endforeach
            </section><!-- end .footer-item-content -->
    </section><!-- end .footer-item -->
@endif
