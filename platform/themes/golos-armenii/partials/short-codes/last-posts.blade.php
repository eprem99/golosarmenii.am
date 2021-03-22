@if (is_plugin_active('blog'))

    @php
        $postCategories = app(\Botble\Blog\Repositories\Interfaces\PostInterface::class)->getByCategory($categorys, 0, $count);
    @endphp
    @if (count($postCategories) > 0)
        <section class="block-post-sensation-item mb-5">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="block-post-wrap-head sidebar-item-head tf">
                        <a class="white-space" href="{{get_category_by_id($categorys)->url}}">
                            <span class="titles">{{get_category_by_id($categorys)->name}}</span>
                            <span class="after-title"></span>
                        </a>
                    </div><!-- end .sidebar-item-head -->
                </div>
            </div>
            @if ($style == 1)
            <section class="block-post-content last-post row">
                <div class="col-md-12">
                    <div class="last-list">
                    <div class="row">
                @foreach($postCategories as $postCategory)
                <div class="{{$per_row}}">
                        <a class="thumb-full item-thumbnail"
                           href="{{ $postCategory->url }}">
                            <img src="{{ RvMedia::getImageUrl($postCategory->image) }}"
                                 class="attachment-full size-full wp-post-image" alt="{{ $postCategory->name }}"/>
                            <div class="thumbnail-hoverlay main-color-1-bg"></div>
                            <div class="thumbnail-hoverlay-icon"><i class="fa fa-search"></i></div>
                        </a><!-- end .post1-item-thumb -->
                        <div class="post1-item-info">
                            <h2 class="post1-item-title">
                                <a class=""
                                   href="{{ $postCategory->url }}">{{ $postCategory->name }}</a>
                            </h2><!-- end .post1-item-title -->
                            <div class="post1-item-des">
                                {{ $postCategory->description }}
                            </div><!-- end .post1-item-des -->
                            <div class="d-flex pt-2 pb-4">
                                <div class="date">
                                    {{ $postCategory->updated_at->format('d F Y') }}
                                    <span class="time"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12.146" height="12.146" viewBox="0 0 12.146 12.146">
                                          <g id="Icon_ionic-md-time" data-name="Icon ionic-md-time" transform="translate(-3.375 -3.375)">
                                            <path id="Path_39" data-name="Path 39" d="M9.442,3.375a6.073,6.073,0,1,0,6.079,6.073A6.071,6.071,0,0,0,9.442,3.375Zm.006,10.931a4.858,4.858,0,1,1,4.858-4.858A4.858,4.858,0,0,1,9.448,14.306Z" fill="#0f83c5"/>
                                            <path id="Path_40" data-name="Path 40" d="M17.448,10.688h-.911v3.644l3.188,1.912.455-.747-2.733-1.62Z" transform="translate(-7.697 -4.276)" fill="#0f83c5"/>
                                          </g>
                                        </svg> {{ $postCategory->updated_at->format('H:i') }}
                                    </span>
                                </div>
                                <div class="views">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.114" height="8.742" viewBox="0 0 13.114 8.742">
                                        <path id="Icon_awesome-eye" data-name="Icon awesome-eye" d="M13.034,8.539A7.3,7.3,0,0,0,6.557,4.5,7.3,7.3,0,0,0,.079,8.539a.736.736,0,0,0,0,.665,7.3,7.3,0,0,0,6.478,4.039A7.3,7.3,0,0,0,13.034,9.2.736.736,0,0,0,13.034,8.539ZM6.557,12.15A3.278,3.278,0,1,1,9.835,8.871,3.278,3.278,0,0,1,6.557,12.15Zm0-5.464a2.17,2.17,0,0,0-.576.086A1.089,1.089,0,0,1,4.457,8.295a2.181,2.181,0,1,0,2.1-1.609Z" transform="translate(0 -4.5)" fill="#636363"/>
                                    </svg> {{ $postCategory->views }}
                                </div>
                            </div>
                        </div><!-- end .post1-item-info -->
                    </div>
      
                @endforeach
                                </div>  
                                                </div>  
                                                                </div>  
            </section><!-- end .block-post-wrap-content -->
            @elseif ($style == 2)
            <section class="block-post-content last-post row">
                <div class="col-md-12">
                    <div class="last-list">
                    <div class="row">
                @foreach($postCategories as $postCategory)
                @if ($loop->index < 2)
                    <div class="{{$per_row}} mb-2">
                        <a class="thumb-full item-thumbnail"
                           href="{{ $postCategory->url }}">
                            <img src="{{ RvMedia::getImageUrl($postCategory->image) }}"
                                 class="attachment-full size-full wp-post-image" alt="{{ $postCategory->name }}"/>
                            <div class="thumbnail-hoverlay main-color-1-bg"></div>
                            <div class="thumbnail-hoverlay-icon"><i class="fa fa-search"></i></div>
                        </a><!-- end .post1-item-thumb -->
                    <div class="post1-item-info">
                        <h2 class="post1-item-title">
                            <a class=""
                               href="{{ $postCategory->url }}">{{ $postCategory->name }}</a>
                        </h2><!-- end .post1-item-title -->
                        <div class="post1-item-des">
                            {{ $postCategory->description }}
                        </div><!-- end .post1-item-des -->
                            <div class="d-flex">
                            <div class="date">
                                {{ $postCategory->updated_at->format('d F Y') }}
                                <span class="time"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.146" height="12.146" viewBox="0 0 12.146 12.146">
                                      <g id="Icon_ionic-md-time" data-name="Icon ionic-md-time" transform="translate(-3.375 -3.375)">
                                        <path id="Path_39" data-name="Path 39" d="M9.442,3.375a6.073,6.073,0,1,0,6.079,6.073A6.071,6.071,0,0,0,9.442,3.375Zm.006,10.931a4.858,4.858,0,1,1,4.858-4.858A4.858,4.858,0,0,1,9.448,14.306Z" fill="#0f83c5"/>
                                        <path id="Path_40" data-name="Path 40" d="M17.448,10.688h-.911v3.644l3.188,1.912.455-.747-2.733-1.62Z" transform="translate(-7.697 -4.276)" fill="#0f83c5"/>
                                      </g>
                                    </svg> {{ $postCategory->updated_at->format('H:i') }}
                                </span>
                            </div>
                            <div class="views">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.114" height="8.742" viewBox="0 0 13.114 8.742">
                                    <path id="Icon_awesome-eye" data-name="Icon awesome-eye" d="M13.034,8.539A7.3,7.3,0,0,0,6.557,4.5,7.3,7.3,0,0,0,.079,8.539a.736.736,0,0,0,0,.665,7.3,7.3,0,0,0,6.478,4.039A7.3,7.3,0,0,0,13.034,9.2.736.736,0,0,0,13.034,8.539ZM6.557,12.15A3.278,3.278,0,1,1,9.835,8.871,3.278,3.278,0,0,1,6.557,12.15Zm0-5.464a2.17,2.17,0,0,0-.576.086A1.089,1.089,0,0,1,4.457,8.295a2.181,2.181,0,1,0,2.1-1.609Z" transform="translate(0 -4.5)" fill="#636363"/>
                                </svg> {{ $postCategory->views }}
                            </div>
                        </div>
                    </div><!-- end .post1-item-info --> 
                     </div> 
                    @endif
    
                @endforeach
 </div> 
  </div> 
   </div> 
            </section><!-- end .block-post-wrap-content -->

    <div class="owl-slider owl-carousel carousel--nav inside" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach($postCategories as $postCategory)
                @if ($loop->index > 1)
            <div class="slider-item">
                <a href="{{ $postCategory->link }}" class="slider-item-overlay">
                    <img src="{{ RvMedia::getImageUrl($postCategory->image) }}" alt="{{ $postCategory->name }}">
                </a>
                    <header class="slider-item-header">
                            <div class="slider-date">{{ $postCategory->updated_at->format('d F Y') }}</div>
                            <h2 class="slider-item-title">{{ $postCategory->name }}</h2>
                    </header>
            </div>
            @endif
        @endforeach
    </div>

            @else 
            <section class="block-post-content last-post row">
                <div class="col-md-12">
                    <div class="owl-slider owl-carousel carousel--nav inside" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                   @foreach($postCategories as $postCategory)
                        <div class="slider-item">
                            <a href="{{ $postCategory->link }}" class="slider-item-overlay">
                                <img src="{{ RvMedia::getImageUrl($postCategory->image) }}" alt="{{ $postCategory->name }}">
                            </a>
                                <header class="slider-item-header">
                                        <div class="slider-date">{{ $postCategory->updated_at->format('d F Y') }}</div>
                                        <h2 class="slider-item-title">{{ $postCategory->name }}</h2>
                                </header>
                        </div>    
                    @endforeach
                    </div>
                </div>
            </section><!-- end .block-post-wrap-content -->
            @endif
        </section><!-- end .block-post-wrap -->
    @endif

@endif
