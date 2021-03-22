@php
    $cat_id = $post->categories[0];
    $postcat = get_related_posts($cat_id, 5);
@endphp
<div class="sub-page mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <section class="block-post-item news sidebar-item row mb-5">
                <div class="col-md-12 mb-3">
                    <div class="block-post-wrap-head sidebar-item-head tf mb-3">
                            <span class="titles">{{$cat_id->name}}</span>
                            <span class="after-title"></span>
                    </div><!-- end .sidebar-item-head -->
                </div>
            </section>

                <h1 class="single-title {{ $post->id }}">
                    {{ $post->name }}
                </h1><!-- end .single-pro-title -->
                <div class="single-content">
                    @if ($post->format_type == 'video')
                        @php $url = str_replace('watch?v=', 'embed/', MetaBox::getMetaData($post, 'video_link', true)); @endphp
                        @if (!empty($url))
                            <div class="embed-responsive embed-responsive-16by9 mb30">
                                <iframe class="embed-responsive-item" allowfullscreen frameborder="0" height="315" width="420" src="{{ str_replace('watch?v=', 'embed/', $url) }}"></iframe>
                            </div>
                            <br>
                        @endif
                        @else 
                        <section class="thumb-full">
        <img src="{{ RvMedia::getImageUrl($post->image, 'full') }}" class="attachment-full size-full wp-post-image" alt="{{ $post->name }}"/>
    </section>
                    @endif
                    @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($post)))
                        {!! render_object_gallery($galleries, ($post->categories()->first() ? $post->categories()->first()->name : __('Uncategorized'))) !!}
                    @endif
                    {!! clean($post->content, 'youtube') !!}
                    <br>
                        <section class="new-item-date">
                            <span><i class="fa fa-calendar" aria-hidden="true"></i>{{ $post->created_at->format('Y-m-d') }}</span>&nbsp;
                            <span><i class="fa fa-user-secret" aria-hidden="true"></i>
                            {{ $post->author->getFullName() }}
                    </span>
                        </section>
                        <br>
                    <div class="list-tag">
                        @if (!$post->tags->isEmpty())
                            <span>
                                <span class="tag-list-title">{{ __('Tags') }}: </span>
                                @foreach ($post->tags as $tag)
                                    <a href="{{ $tag->url }}">{{ $tag->name }}</a>
                                @endforeach
                            </span>
                        @endif
                    </div>
                </div><!-- end .single-pro-content -->
                <div class="single-comment">
                    <section class="block-archive-head">
                        <section class="box-share fright">
                            <div class="addthis_inline_share_toolbox_pjup"></div>
                        </section><!-- end .box-share-->
                        <section class="cboth"></section>
                    </section><!-- end .block-archive-head -->
                    <section class="single-comment-content">
                    <div class="tabs">
                                <ul class="list-tab">
                                    <li>{{ __('Comments') }}</li>
                                    <li>{{ __('Add comment') }}</li>
                                </ul>
                            <div class="tabs-content">
                                <div class="tab-content">
                                    <ul class="comments">
                                        @foreach (getComments($post->id) as $comment)
                                        <li class="comment">
                                                <div class="comment-head">
                                                    <div class="comment-author">
                                                        {{$comment->name}}
                                                    </div>
                                                    <div class="comment-date">
                                                        {{$comment->created_at}}
                                                    </div>
                                                </div>
                                                <div class="comments-content">
                                                {!! $comment->content !!}
                                                </div>
                                            </li>
                                            <ul class="comment-replay">
                                            @foreach (getCommentsReplay($comment->id) as $replay)
                                            <li class="replay">
                                                {!! $replay->message !!}
                                            </li>
                                            @endforeach
                                            </ul>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-content">
                                {!! do_shortcode('[comments-form][/comments-form]') !!}
                                </div>
                            </div>
                        </div>
    
                        <!-- {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null) !!} -->
                        
                    </section><!-- end .single-comment-content -->
                </div><!-- end .single-comment -->
            </div><!-- end .primary -->
        <div class="col-md-4">
        @if (is_plugin_active('blog'))
@php
    $postAuthor = getPostsByAuthor($post->author_id, 5);
@endphp
@if (!$postAuthor->isEmpty())
    <section class="block-post-item news sidebar-item row mb-5">
        <div class="col-md-12 mb-3">
            <div class="block-post-wrap-head sidebar-item-head tf mb-3">
                    <span class="titles">{{ __('Latest from author') }}</span>
                    <span class="after-title"></span>
            </div><!-- end .sidebar-item-head -->
        </div>
    <section class="col-md-12">
@foreach ($postAuthor as $posta)
<section class="sidebar-new-item">
    <section class="thumb-full mb-1">
        <img src="{{ RvMedia::getImageUrl($posta->image, 'medium') }}" class="attachment-full size-full wp-post-image" alt="{{ $posta->name }}"/>
    </section>
    <!-- end .sidebar-new-item-thumb -->
    <section class="post-new-item-info">
        <h2 class="post1-item-list">
            <a class="white-space" href="{{ $posta->url }}">{{ $posta->name }}</a>
        </h2><!-- end .post1-item-list -->
        <div class="post-content">
        {{ Str::limit($post->description, 150) }}
        </div>
        <div class="d-flex">
            <div class="date">
                {{ $post->updated_at->format('d F Y') }}
                <span class="time"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="12.146" height="12.146" viewBox="0 0 12.146 12.146">
                        <g id="Icon_ionic-md-time" data-name="Icon ionic-md-time" transform="translate(-3.375 -3.375)">
                        <path id="Path_39" data-name="Path 39" d="M9.442,3.375a6.073,6.073,0,1,0,6.079,6.073A6.071,6.071,0,0,0,9.442,3.375Zm.006,10.931a4.858,4.858,0,1,1,4.858-4.858A4.858,4.858,0,0,1,9.448,14.306Z" fill="#0f83c5"/>
                        <path id="Path_40" data-name="Path 40" d="M17.448,10.688h-.911v3.644l3.188,1.912.455-.747-2.733-1.62Z" transform="translate(-7.697 -4.276)" fill="#0f83c5"/>
                        </g>
                    </svg> {{ $post->updated_at->format('H:i') }}
                </span>
            </div>
            <div class="views">
                <svg xmlns="http://www.w3.org/2000/svg" width="13.114" height="8.742" viewBox="0 0 13.114 8.742">
                    <path id="Icon_awesome-eye" data-name="Icon awesome-eye" d="M13.034,8.539A7.3,7.3,0,0,0,6.557,4.5,7.3,7.3,0,0,0,.079,8.539a.736.736,0,0,0,0,.665,7.3,7.3,0,0,0,6.478,4.039A7.3,7.3,0,0,0,13.034,9.2.736.736,0,0,0,13.034,8.539ZM6.557,12.15A3.278,3.278,0,1,1,9.835,8.871,3.278,3.278,0,0,1,6.557,12.15Zm0-5.464a2.17,2.17,0,0,0-.576.086A1.089,1.089,0,0,1,4.457,8.295a2.181,2.181,0,1,0,2.1-1.609Z" transform="translate(0 -4.5)" fill="#636363"/>
                </svg> {{ $post->views }}
            </div>
        </div>
    </section><!-- end .sidebar-new-item-info -->
    <section class="cboth"></section><!-- end .cboth -->
</section><!-- end .sidebar-new-item -->

@endforeach
</section><!-- end .footer-item-content -->
    </section><!-- end .footer-item -->
@endif

@if (!$postcat->isEmpty())
    <section class="block-post-item news sidebar-item row mb-5">
        <div class="col-md-12 mb-3">
            <div class="block-post-wrap-head sidebar-item-head tf mb-3">
                    <span class="titles">{{ __('Latest on topic ') }}</span>
                    <span class="after-title"></span>
            </div><!-- end .sidebar-item-head -->
        </div>
    <section class="col-md-12">
@foreach ($postcat as $posta)
<section class="sidebar-new-item">
    <section class="thumb-full mb-1">
        <img src="{{ RvMedia::getImageUrl($posta->image, 'medium') }}" class="attachment-full size-full wp-post-image" alt="{{ $posta->name }}"/>
    </section>
    <!-- end .sidebar-new-item-thumb -->
    <section class="post-new-item-info">
        <h2 class="post1-item-list">
            <a class="white-space" href="{{ $posta->url }}">{{ $posta->name }}</a>
        </h2><!-- end .post1-item-list -->
        <div class="post-content">
        {{ Str::limit($post->description, 150) }}
        </div>
        <div class="d-flex">
            <div class="date">
                {{ $post->updated_at->format('d F Y') }}
                <span class="time"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="12.146" height="12.146" viewBox="0 0 12.146 12.146">
                        <g id="Icon_ionic-md-time" data-name="Icon ionic-md-time" transform="translate(-3.375 -3.375)">
                        <path id="Path_39" data-name="Path 39" d="M9.442,3.375a6.073,6.073,0,1,0,6.079,6.073A6.071,6.071,0,0,0,9.442,3.375Zm.006,10.931a4.858,4.858,0,1,1,4.858-4.858A4.858,4.858,0,0,1,9.448,14.306Z" fill="#0f83c5"/>
                        <path id="Path_40" data-name="Path 40" d="M17.448,10.688h-.911v3.644l3.188,1.912.455-.747-2.733-1.62Z" transform="translate(-7.697 -4.276)" fill="#0f83c5"/>
                        </g>
                    </svg> {{ $post->updated_at->format('H:i') }}
                </span>
            </div>
            <div class="views">
                <svg xmlns="http://www.w3.org/2000/svg" width="13.114" height="8.742" viewBox="0 0 13.114 8.742">
                    <path id="Icon_awesome-eye" data-name="Icon awesome-eye" d="M13.034,8.539A7.3,7.3,0,0,0,6.557,4.5,7.3,7.3,0,0,0,.079,8.539a.736.736,0,0,0,0,.665,7.3,7.3,0,0,0,6.478,4.039A7.3,7.3,0,0,0,13.034,9.2.736.736,0,0,0,13.034,8.539ZM6.557,12.15A3.278,3.278,0,1,1,9.835,8.871,3.278,3.278,0,0,1,6.557,12.15Zm0-5.464a2.17,2.17,0,0,0-.576.086A1.089,1.089,0,0,1,4.457,8.295a2.181,2.181,0,1,0,2.1-1.609Z" transform="translate(0 -4.5)" fill="#636363"/>
                </svg> {{ $post->views }}
            </div>
        </div>
    </section><!-- end .sidebar-new-item-info -->
    <section class="cboth"></section><!-- end .cboth -->
</section><!-- end .sidebar-new-item -->

@endforeach
</section><!-- end .footer-item-content -->
    </section><!-- end .footer-item -->
@endif
@endif

            {!! dynamic_sidebar('primary_sidebar') !!}
        </div>
        <section class="cboth"></section><!-- end .cboth -->
    </div><!-- end .container -->
</div>
</div>
