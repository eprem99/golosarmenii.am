{!! Theme::partial('header') !!}

    <section class="home-wrap">
        <section class="container">
            <div class="row mt-5">
                <div class="col-md-7">
                    [last-posts categorys="30" count="4" per_row="col-md-12" style="3"][/last-posts]
                    [last-posts categorys="30" count="6" per_row="col-md-6" style="2"][/last-posts]
                </div>
                <div class="col-md-5">
                <div class="block-post-wrap-head sidebar-item-head tf mb-3">
                    <div class="title-tabs tabs nav nav-tabs" id="nav-tab" role="tablist">
                        <span class="nav-link tab active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><a href="#">
                        Сенсация
                        </a></span>
                        <span class="nav-link tab" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true"><a href="#" >
                        Сенсация
                        </a></span>
                        <span class="tabsik"></span>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  [news-posts categorys="30" count="30" titles="2" height="600"][/news-posts]
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  [sensation-posts categorys="30" count="8" per_row="col-md-12" titles="2"][/sensation-posts]
                  </div>
                </div>  
                <div class="calendar-widget mb-4">
                    <input id="dom-id" type="hidden" name="calendar"/>
                    <div id="date-range12-container" class="text-center mt-5"></div>  
                </div>      
                <div class="home-ads">
                    {!! dynamic_sidebar('home_sidebar_2') !!}
                </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-5 reverse">
                <div class="home-ads mb-4">
                    {!! dynamic_sidebar('home_sidebar_3') !!}
                </div>
                    [news-posts count="30" titles="2" titles="1" height="490"][/news-posts]
                </div>
                <div class="col-md-7">
                     [last-posts categorys="30" count="4" per_row="col-md-6" style="1"][/last-posts]   
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-7">
                    [last-posts categorys="30" count="2" per_row="col-md-6" style="1"][/last-posts]  
                </div>
                <div class="col-md-5">
                     [news-posts count="30" titles="2"][/news-posts] 
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    [last-posts categorys="30" count="2" per_row="col-md-12" style="1"][/last-posts]
                </div>
                <div class="col-md-4">
                     [last-posts categorys="30" count="2" per_row="col-md-12" style="1"][/last-posts]    
                </div>
                <div class="col-md-4">
                    [last-posts categorys="30" count="2" per_row="col-md-12" style="1"][/last-posts]     
                </div>
            </div>
            <section class="cboth"></section><!-- end .cboth -->
        </section><!-- end .container -->
    </section><!-- end .home-wrap -->

{!! Theme::partial('footer') !!}
