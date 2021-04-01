@php
    $cat_id = $category->id;
    $postcat = get_related_posts($cat_id, 5);
@endphp
<section class="sub-page mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="block-post-item news sidebar-item row">
                    <div class="col-md-12">
                        <div class="block-post-wrap-head sidebar-item-head tf mb-3">
                                <span class="titles">{{ $category->name }}</span>
                                <span class="after-title"></span>
                        </div><!-- end .block-archive-head -->
                    </div>
                </section>

                <div class="archive-featured-new row">
                    @foreach ($posts as $post)
                        @if ($loop->index < 1)
                        <div class="col-md-12">
                            <a class="featured-new-item thumb-full item-thumbnail" href="{{ $post->url }}">
                                <img src="{{ RvMedia::getImageUrl($post->image) }}" class="attachment-full size-full wp-post-image" alt="{{ $post->name }}">
                                <section class="featured-new-item-info bsize">
                                    <div class="featured-new-item-title">
                                        <h2 class="white-space">{{ $post->name }}</h2>
                                        <section class="featured-home-post-item-date">
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>{{ $post->created_at->format('Y-m-d') }}</span>
                                            <span><i class="fa fa-user-secret" aria-hidden="true"></i>
                                               <a href="/author/{{$post->author_id}}"> {{ $post->author->getFullName() }}</a>
                                            </span>
                                        </section><!-- end .featured-home-post-item-date -->
                                    </div><!-- end .featured-new-item-title -->
                                </section>
                                <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                <div class="thumbnail-hoverlay-icon"><i class="fa fa-search"></i></div>
                            </a><!-- end .featured-new-item -->
                        </div>
                        @endif
                       
                    @endforeach
                    <section class="cboth"></section><!-- end .cboth -->
                </div><!-- end .archive-featured-new -->

                <div class="archive-pro-wrap row">
                    @foreach($posts as $post)
                        @if ($loop->index >= 1)
                            <div class="new-item bsize col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="new-item-thumb thumb-full item-thumbnail" href="{{ $post->url }}">
                                            <img src="{{ RvMedia::getImageUrl($post->image) }}" class="attachment-full size-full wp-post-image" alt="{{ $post->name }}">
                                            <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                            <div class="thumbnail-hoverlay-icon"><i class="fa fa-search"></i></div>
                                        </a><!-- end .new-item-thumb -->
                                    </div>
                                    <div class="col-md-8">
                                        <section class="new-item-info">
                                            <h2 class="new-item-title post1-item-title">
                                                <a href="{{ $post->url  }}">{{ $post->name }}</a>
                                            </h2><!-- end .new-item-title -->
                                           
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
                                            <section class="new-item-des">
                                                {{ strip_tags($post->description) }}
                                            </section><!-- end .new-item-des -->
                                        </section><!-- end .new-item-info -->
                                    </div>
                                </div>


                                <section class="cboth"></section><!-- end .cboth -->
                            </div><!-- end .new-item -->
                        @endif
                    @endforeach
            </div><!-- end .archive-pro-wrap -->

            @if ($posts->count() > 0)
                <section class="pagination">
                    {!! $posts->links() !!}
                </section><!-- end .pagination -->
            @endif
        </div><!-- end .primary -->
        <div class="col-md-4 post-sidebar">
        <div class="block-post-wrap-head sidebar-item-head tf mb-3">
            <div class="title-tabs tabs nav nav-tabs" id="nav-tab" role="tablist">
                <span class="nav-link tab active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><a href="#">{{ __('Popular') }}</a></span>
                <span class="nav-link tab" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true"><a href="#" >{{$category->name}}</a></span>
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
            {{ Str::limit(strip_tags($posta->description), 100) }}
        </div>
        <div class="row mt-1">
            <div class="col-md-5">
            <a href="/author/{{ $posta->author_id }}">
                {{ $posta->author->getFullName() }}
            </a>
            </div>
            <div class="col-md-7">
            <div class="d-flex">
            <div class="date">
                {{ $posta->created_at->format('d F Y') }}
                <span class="time"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="12.146" height="12.146" viewBox="0 0 12.146 12.146">
                        <g id="Icon_ionic-md-time" data-name="Icon ionic-md-time" transform="translate(-3.375 -3.375)">
                        <path id="Path_39" data-name="Path 39" d="M9.442,3.375a6.073,6.073,0,1,0,6.079,6.073A6.071,6.071,0,0,0,9.442,3.375Zm.006,10.931a4.858,4.858,0,1,1,4.858-4.858A4.858,4.858,0,0,1,9.448,14.306Z" fill="#0f83c5"/>
                        <path id="Path_40" data-name="Path 40" d="M17.448,10.688h-.911v3.644l3.188,1.912.455-.747-2.733-1.62Z" transform="translate(-7.697 -4.276)" fill="#0f83c5"/>
                        </g>
                    </svg> {{ $posta->created_at->format('H:i') }}
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
          
        </div>
        <section class="cboth"></section><!-- end .cboth -->
        </div><!-- end .ROW -->
    </div><!-- end .container -->
</section>
