@php
    $cat_id = $post->categories[0];
    $postcat = get_related_posts($cat_id, 5);
    $subtitle = MetaBox::getMetaData($post, 'post_subtitle', true);
@endphp
<div class="sub-page mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <section class="block-post-item news sidebar-item row mb-2">
                <div class="col-md-12">
                    <div class="block-post-wrap-head sidebar-item-head tf mb-3">
                            <span class="titles">{{$cat_id->name}}</span>
                            <span class="after-title"></span>
                    </div><!-- end .sidebar-item-head -->
                </div>
            </section>
            <div class="row">
                        <div class="col-md-6">
                            <div class="post-author">
                                <a href="/author/{{ $post->author_id }}">
                                    {{ $post->author->getFullName() }}
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 news">
                            <div class="d-flex justify-content-end">
                                <div class="date">
                                    {{ $post->updated_at->format('d F Y') }}
                                    <span class="time"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12.146" height="12.146" viewBox="0 0 12.146 12.146">
                                            <g id="Icon_ionic-md-time" data-name="Icon ionic-md-time" transform="translate(-3.375 -3.375)">
                                            <path id="Path_39" data-name="Path 39" d="M9.442,3.375a6.073,6.073,0,1,0,6.079,6.073A6.071,6.071,0,0,0,9.442,3.375Zm.006,10.931a4.858,4.858,0,1,1,4.858-4.858A4.858,4.858,0,0,1,9.448,14.306Z" fill="#0f83c5"/>
                                            <path id="Path_40" data-name="Path 40" d="M17.448,10.688h-.911v3.644l3.188,1.912.455-.747-2.733-1.62Z" transform="translate(-7.697 -4.276)" fill="var(--color-1st)"/>
                                            </g>
                                        </svg> {{ $post->updated_at->format('H:i') }}
                                    </span>
                                </div>
                                <div class="views">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.114" height="8.742" viewBox="0 0 13.114 8.742">
                                        <path id="Icon_awesome-eye" data-name="Icon awesome-eye" d="M13.034,8.539A7.3,7.3,0,0,0,6.557,4.5,7.3,7.3,0,0,0,.079,8.539a.736.736,0,0,0,0,.665,7.3,7.3,0,0,0,6.478,4.039A7.3,7.3,0,0,0,13.034,9.2.736.736,0,0,0,13.034,8.539ZM6.557,12.15A3.278,3.278,0,1,1,9.835,8.871,3.278,3.278,0,0,1,6.557,12.15Zm0-5.464a2.17,2.17,0,0,0-.576.086A1.089,1.089,0,0,1,4.457,8.295a2.181,2.181,0,1,0,2.1-1.609Z" transform="translate(0 -4.5)"  fill="var(--color-1st)"/>
                                    </svg> {{ $post->views }}
                                </div>
                            </div>
                        </div>
                    </div>
                <h1 class="single-title {{ $post->id }} text-center">
                    {{ $post->name }}
                </h1><!-- end .single-pro-title -->
                @if (!empty($subtitle))
                <h2 class="post-subtitle text-center">
                    {{$subtitle}}
                </h2>
                @endif
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
                        <div class="share-block">
                        <ul class="social-list">
                            <li class="telegram"><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11.805" height="9.9" viewBox="0 0 11.805 9.9">
                                    <path id="Icon_awesome-telegram-plane" data-name="Icon awesome-telegram-plane" d="M11.773,5.429l-1.781,8.4c-.134.593-.485.741-.983.461l-2.714-2-1.31,1.26a.682.682,0,0,1-.546.266l.2-2.764L9.665,6.507c.219-.2-.047-.3-.34-.108L3.105,10.315.428,9.477c-.582-.182-.593-.582.121-.862L11.022,4.581C11.507,4.4,11.931,4.689,11.773,5.429Z" transform="translate(-0.001 -4.528)" fill="#fff"/>
                                </svg>
                            </a></li>
                            <li class="facebook"><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="5.668" height="10.583" viewBox="0 0 5.668 10.583">
                                <path id="Icon_awesome-facebook-f" data-name="Icon awesome-facebook-f" d="M6.906,5.953,7.2,4.038H5.362V2.795A.958.958,0,0,1,6.442,1.76h.835V.129A10.189,10.189,0,0,0,5.795,0a2.338,2.338,0,0,0-2.5,2.578v1.46H1.609V5.953H3.292v4.63H5.362V5.953Z" transform="translate(-1.609)" fill="#fff"/>
                                </svg>               
                            </a></li>
                            <li class="vk"><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.126" height="8.986" viewBox="0 0 15.126 8.986">
                                <path id="Icon_awesome-vk" data-name="Icon awesome-vk" d="M16.089,7.359c.1-.351,0-.609-.5-.609H13.935a.71.71,0,0,0-.719.469A13.858,13.858,0,0,1,11.184,10.6c-.385.385-.562.508-.772.508-.1,0-.264-.124-.264-.475V7.359c0-.421-.118-.609-.466-.609h-2.6a.4.4,0,0,0-.421.379c0,.4.6.491.657,1.615v2.437c0,.534-.1.632-.306.632-.562,0-1.926-2.061-2.735-4.42-.163-.458-.323-.643-.747-.643H1.875c-.472,0-.567.222-.567.469,0,.438.562,2.614,2.614,5.49a6.447,6.447,0,0,0,5.046,3.027c1.053,0,1.182-.236,1.182-.643,0-1.876-.1-2.053.432-2.053.244,0,.666.124,1.648,1.07,1.123,1.123,1.309,1.626,1.938,1.626h1.654c.472,0,.71-.236.573-.7-.314-.98-2.44-3-2.536-3.131-.244-.314-.174-.455,0-.736a20.578,20.578,0,0,0,2.23-3.808Z" transform="translate(-1.308 -6.75)" fill="#fff"/>
                                </svg>
                            </a></li>
                            <li class="twitter"><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.436" height="10.912" viewBox="0 0 13.436 10.912">
                                <path id="Icon_awesome-twitter" data-name="Icon awesome-twitter" d="M12.055,6.1c.009.119.009.239.009.358a7.781,7.781,0,0,1-7.835,7.835A7.782,7.782,0,0,1,0,13.057a5.7,5.7,0,0,0,.665.034,5.515,5.515,0,0,0,3.419-1.176A2.759,2.759,0,0,1,1.509,10a3.473,3.473,0,0,0,.52.043,2.912,2.912,0,0,0,.725-.094,2.754,2.754,0,0,1-2.208-2.7V7.217a2.773,2.773,0,0,0,1.245.35A2.758,2.758,0,0,1,.938,3.884,7.827,7.827,0,0,0,6.616,6.765a3.109,3.109,0,0,1-.068-.631A2.756,2.756,0,0,1,11.313,4.25a5.421,5.421,0,0,0,1.748-.665A2.746,2.746,0,0,1,11.85,5.1a5.52,5.52,0,0,0,1.586-.426A5.919,5.919,0,0,1,12.055,6.1Z" transform="translate(0 -3.381)" fill="#fff"/>
                                </svg>
                            </a></li>
                        </ul>
                    </div>  
                    @endif
                    @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($post)))
                        {!! render_object_gallery($galleries, ($post->categories()->first() ? $post->categories()->first()->name : __('Uncategorized'))) !!}
                    @endif
                    {!! clean($post->content, 'youtube') !!}
                    <br>

                </div><!-- end .single-pro-content -->
                @if (is_plugin_active('comment'))
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
                @endif
            </div><!-- end .primary -->
        <div class="col-md-4 post-sidebar">
        <div class="block-post-wrap-head sidebar-item-head tf mb-3">
            <div class="title-tabs tabs nav nav-tabs" id="nav-tab" role="tablist">
                <span class="nav-link tab active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><a href="#">{{ __('Popular') }}</a></span>
                <span class="nav-link tab" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true"><a href="#" >{{$cat_id->name}}</a></span>
                <span class="tabsik"></span>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                [news-posts categorys="{{$cat_id}}" count="30" titles="2"][/news-posts]
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
@if (!$postcat->isEmpty())
    <section class="block-post-item news sidebar-item row mb-5">
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
        {{ Str::limit($posta->description, 90) }}
        </div>
        <div class="row mt-1">
            <div class="col-md-5">
                <a class="post-author" href="/author/{{ $posta->author_id }}">
                   {{ $posta->author->getFullName() }}
                </a>
            </div>
            <div class="col-md-7">
            <div class="d-flex">
            <div class="date">
                {{ $posta->updated_at->format('d F Y') }}
                <span class="time"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="12.146" height="12.146" viewBox="0 0 12.146 12.146">
                        <g id="Icon_ionic-md-time" data-name="Icon ionic-md-time" transform="translate(-3.375 -3.375)">
                        <path id="Path_39" data-name="Path 39" d="M9.442,3.375a6.073,6.073,0,1,0,6.079,6.073A6.071,6.071,0,0,0,9.442,3.375Zm.006,10.931a4.858,4.858,0,1,1,4.858-4.858A4.858,4.858,0,0,1,9.448,14.306Z" fill="#0f83c5"/>
                        <path id="Path_40" data-name="Path 40" d="M17.448,10.688h-.911v3.644l3.188,1.912.455-.747-2.733-1.62Z" transform="translate(-7.697 -4.276)" fill="#0f83c5"/>
                        </g>
                    </svg> {{ $posta->updated_at->format('H:i') }}
                </span>
            </div>
            <div class="views">
                <svg xmlns="http://www.w3.org/2000/svg" width="13.114" height="8.742" viewBox="0 0 13.114 8.742">
                    <path id="Icon_awesome-eye" data-name="Icon awesome-eye" d="M13.034,8.539A7.3,7.3,0,0,0,6.557,4.5,7.3,7.3,0,0,0,.079,8.539a.736.736,0,0,0,0,.665,7.3,7.3,0,0,0,6.478,4.039A7.3,7.3,0,0,0,13.034,9.2.736.736,0,0,0,13.034,8.539ZM6.557,12.15A3.278,3.278,0,1,1,9.835,8.871,3.278,3.278,0,0,1,6.557,12.15Zm0-5.464a2.17,2.17,0,0,0-.576.086A1.089,1.089,0,0,1,4.457,8.295a2.181,2.181,0,1,0,2.1-1.609Z" transform="translate(0 -4.5)" fill="#636363"/>
                </svg> {{ $posta->views }}
            </div>
        </div>
            </div>
        </div>
 
    </section><!-- end .sidebar-new-item-info -->
    <section class="cboth"></section><!-- end .cboth -->
</section><!-- end .sidebar-new-item -->

@endforeach
</section><!-- end .footer-item-content -->
    </section><!-- end .footer-item -->
@endif
                  </div>
                </div>  
                {!! dynamic_sidebar('primary_sidebar') !!}
                @php
    $postAuthor = getPostsByAuthor($post->author_id, 3);
@endphp
@if (!$postAuthor->isEmpty())
    <section class="block-post-item news sidebar-item row mb-3 mt-3">
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
        {{ Str::limit($post->description, 90) }}
        </div>
        <div class="d-flex">
            <div class="date">
                {{ $post->updated_at->format('d F Y') }}
                <span class="time"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="12.146" height="12.146" viewBox="0 0 12.146 12.146">
                        <g id="Icon_ionic-md-time" data-name="Icon ionic-md-time" transform="translate(-3.375 -3.375)">
                        <path id="Path_39" data-name="Path 39" d="M9.442,3.375a6.073,6.073,0,1,0,6.079,6.073A6.071,6.071,0,0,0,9.442,3.375Zm.006,10.931a4.858,4.858,0,1,1,4.858-4.858A4.858,4.858,0,0,1,9.448,14.306Z" fill="#0f83c5"/>
                        <path id="Path_40" data-name="Path 40" d="M17.448,10.688h-.911v3.644l3.188,1.912.455-.747-2.733-1.62Z" transform="translate(-7.697 -4.276)" fill="var(--color-1st)"/>
                        </g>
                    </svg> {{ $post->updated_at->format('H:i') }}
                </span>
            </div>
            <div class="views">
                <svg xmlns="http://www.w3.org/2000/svg" width="13.114" height="8.742" viewBox="0 0 13.114 8.742">
                    <path id="Icon_awesome-eye" data-name="Icon awesome-eye" d="M13.034,8.539A7.3,7.3,0,0,0,6.557,4.5,7.3,7.3,0,0,0,.079,8.539a.736.736,0,0,0,0,.665,7.3,7.3,0,0,0,6.478,4.039A7.3,7.3,0,0,0,13.034,9.2.736.736,0,0,0,13.034,8.539ZM6.557,12.15A3.278,3.278,0,1,1,9.835,8.871,3.278,3.278,0,0,1,6.557,12.15Zm0-5.464a2.17,2.17,0,0,0-.576.086A1.089,1.089,0,0,1,4.457,8.295a2.181,2.181,0,1,0,2.1-1.609Z" transform="translate(0 -4.5)" fill="var(--color-1st)"/>
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
          
        </div>
        <section class="cboth"></section><!-- end .cboth -->
    </div><!-- end .container -->
</div>
</div>
