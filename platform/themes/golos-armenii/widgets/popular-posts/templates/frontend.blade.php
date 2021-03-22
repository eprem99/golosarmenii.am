@if (is_plugin_active('blog'))
    @if ($sidebar == 'footer_sidebar')
        <section class="footer-item">
            <section class="footer-item-head">
                <span>{{ $config['name'] }}</span>
            </section><!-- end .footer-item-head -->
            <section class="footer-item-content">
    @else
        <section class="sidebar-item">
            <section class="sidebar-item-head tf">
            	<div class="title-block"></div>
                <span>{{ $config['name'] }}</span>
            </section><!-- end .sidebar-item-head -->
            <section class="sidebar-item-content">
    @endif
            @foreach(get_popular_posts($config['number_display']) as $post)
            <div class="popular-post row">
            	<div class="col-md-6">
            	    <div class="post-image">
			            <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" class="attachment-full size-full wp-post-image" alt="{{ $post->name }}"/>
			        </div>
	            </div>
		        <div class="col-md-6">    
			        <div class="post-content">
			            <h2 class="post1-item-list">
			                <a href="{{ $post->url }}">{{ $post->name }}</a>
			            </h2><!-- end .post1-item-list -->
			            <div class="post-description">
			            	{{ $post->description }}
			            </div>
			        </div>
			    </div>
            </div>
            @endforeach
        </section><!-- end .sidebar-item-contentt -->
    </section><!-- end .sidebar-item -->
@endif
