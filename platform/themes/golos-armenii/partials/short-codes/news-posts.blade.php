@if (is_plugin_active('blog'))

    @php
        $postCategories = get_recent_posts($count);
        $title = $titles;
    @endphp
    @if (count($postCategories) > 0)
        <section class="block-post-item news bsize row mb-5">
            @if ($title == 1)
            <div class="col-md-12">
                <div class="block-post-wrap-head sidebar-item-head tf mb-3">
                    <a class="white-space" href="">
                        <span class="titles">{{ __('News') }}</span>
                        <span class="after-title"></span>
                    </a>
                </div><!-- end .sidebar-item-head -->
            </div>
            @endif
            <section class="block-post-content scrollbar row">
                @foreach($postCategories as $post)
                    <div class="col-md-12 mb-3">
                        <div class="border-bottom-2">
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
                        <h2 class="post1-item-title">
                            <a class="white-space"
                               href="{{ $post->url }}">{{ $post->name }}</a>
                        </h2><!-- end .post1-item-title -->
                        <div class="post1-item-des">
                            {{ $post->description }}
                        </div><!-- end .post1-item-des -->
                    </div>
                </div><!-- end .post1-item-info -->
                @endforeach
            </section><!-- end .block-post-wrap-content -->
        </section><!-- end .block-post-wrap -->
    @endif

@endif
