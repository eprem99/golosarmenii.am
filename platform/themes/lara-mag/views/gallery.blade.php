<section class="sub-page">
    <section class="container">
        <section class="primary fleft">
            {!! Theme::partial('breadcrumbs') !!}
            <h1 class="single-title">
                {{ $gallery->name }}
            </h1><!-- end .single-pro-title -->
            <section class="single-content">
                <p>{{ $gallery->description }}</p>
                <div id="list-photo">
                    @php
                        $images = gallery_meta_data($gallery);
                    @endphp
                    @if (!empty($images))
                        @foreach ($images as $image)
                            @if ($image)
                                <div class="item" data-src="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}" data-sub-html="{{ clean(Arr::get($image, 'description')) }}">
                                    <div class="photo-item">
                                        <div class="thumb">
                                            <a href="{{ clean(Arr::get($image, 'description')) }}">
                                                <img src="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}" alt="{{ clean(Arr::get($image, 'description')) }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <br>
                <section class="single-comment-content">
                    {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null) !!}
                </section><!-- end .single-comment-content -->
            </section><!-- end .single-pro-content -->
        </section><!-- end .primary -->
        <aside class="sidebar fright">
            {!! dynamic_sidebar('primary_sidebar') !!}
        </aside><!-- end .sidebar -->
        <section class="cboth"></section><!-- end .cboth -->
    </section><!-- end .container -->
</section>
