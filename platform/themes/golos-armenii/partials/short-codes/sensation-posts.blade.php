@if (is_plugin_active('blog'))

    @php
        $postCategories = app(\Botble\Blog\Repositories\Interfaces\PostInterface::class)->getByCategory($categorys, 0, $count);
    @endphp
    @if (count($postCategories) > 0)
        <section class="block-post-sensation-item row">
            @if($titles == 1)
            <div class="col-md-12 mb-3">
                <div class="block-post-wrap-head sidebar-item-head tf">
                    <a class="white-space" href="{{get_category_by_id($categorys)->url}}">
                        <span>{{get_category_by_id($categorys)->name}}</span>
                    </a>
                </div><!-- end .sidebar-item-head -->
            </div>
            @endif
            <section class="block-post-content reverse-2 row">
                @foreach($postCategories as $postCategory)
                    <div class="{{$per_row}}">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <a class="thumb-full item-thumbnail"
                                   href="{{ $postCategory->url }}">
                                    <img src="{{ RvMedia::getImageUrl($postCategory->image) }}"
                                         class="attachment-full size-full wp-post-image" alt="{{ $postCategory->name }}"/>
                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                    <div class="thumbnail-hoverlay-icon"><i class="fa fa-search"></i></div>
                                </a><!-- end .post1-item-thumb -->
                            </div>
                            <div class="post1-item-info col-md-6">
                                <h2 class="post1-item-title">
                                    <a class=""
                                       href="{{ $postCategory->url }}">{{ $postCategory->name }}</a>
                                </h2><!-- end .post1-item-title -->
                                <div class="post1-item-des">
                                    {{ Str::limit(strip_tags($postCategory->description), 100) }}
                                </div><!-- end .post1-item-des -->
                            </div><!-- end .post1-item-info -->
                        </div>
                    </div>
                @endforeach
            </section><!-- end .block-post-wrap-content -->
        </section><!-- end .block-post-wrap -->
    @endif

@endif
