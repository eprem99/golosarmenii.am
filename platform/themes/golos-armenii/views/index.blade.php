@php Theme::layout('homepage') @endphp

@if (is_plugin_active('simple-slider'))
    {!! do_shortcode('[simple-slider key="home-slider"]') !!}
@endif

{!! do_shortcode('[category-posts][/category-posts]') !!}
{!! do_shortcode('[all-galleries][/all-galleries]') !!}
