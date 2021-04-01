@if (is_plugin_active('blog'))
    @foreach (get_all_categories(['categories.status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED, 'categories.parent_id' => 0, 'is_featured' => 1]) as $category)
        @php
            $allRelatedCategoryIds = array_unique(array_merge(app(\Botble\Blog\Repositories\Interfaces\CategoryInterface::class)->getAllRelatedChildrenIds($category), [$category->id]));

            $postCategories = app(\Botble\Blog\Repositories\Interfaces\PostInterface::class)->getByCategory($allRelatedCategoryIds, 0, 6);
        @endphp
        @if (count($postCategories) > 0)
            <section class="block-post-wrap-item block-post1-wrap-item fleft bsize">
                <section class="block-post-wrap-head sidebar-item-head tf">
                    <a class="white-space" href="{{ $category->url }}">
                        <span><i class="fa fa-tags" aria-hidden="true"></i>{{ $category->name }}</span>
                    </a>
                </section><!-- end .sidebar-item-head -->
                <section class="block-post-wrap-content">
                    @foreach($postCategories as $postCategory)
                        @if ($loop->index < 3)
                            <section class="post1-item fleft">
                                <a class="post1-item-thumb thumb-full item-thumbnail"
                                   href="{{ $postCategory->url }}">
                                    <img src="{{ RvMedia::getImageUrl($postCategory->image) }}"
                                         class="attachment-full size-full wp-post-image" alt="{{ $postCategory->name }}"/>
                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                    <div class="thumbnail-hoverlay-icon"><i class="fa fa-search"></i></div>
                                </a><!-- end .post1-item-thumb -->
                                <section class="post1-item-info">
                                    <h2 class="post1-item-title">
                                        <a class="white-space"
                                           href="{{ $postCategory->url }}">{{ $postCategory->name }}</a>
                                    </h2><!-- end .post1-item-title -->
                                    <section class="post1-item-des">
                                        {{ Str::limit(strip_tags($postCategory->description), 100) }}
                                    </section><!-- end .post1-item-des -->
                                </section><!-- end .post1-item-info -->
                            </section><!-- end .post1-item -->
                        @endif
                    @endforeach
                    <section class="cboth post1-item-bottom"></section><!-- end .cboth -->
                    @foreach($postCategories as $postCategory)
                        @if ($loop->index >= 3)
                            <h2 class="post1-item-list">
                                <a class="white-space"
                                   href="{{ $postCategory->url }}"><i
                                        class="fa fa-caret-right" aria-hidden="true"></i>{{ Str::limit(strip_tags($postCategory->description), 100) }}</a>
                            </h2><!-- end .post1-item-list -->
                        @endif
                    @endforeach
                </section><!-- end .block-post-wrap-content -->
            </section><!-- end .block-post-wrap -->
        @endif
    @endforeach
@endif
