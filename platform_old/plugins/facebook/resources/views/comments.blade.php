<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0&appId={{ setting('facebook_app_id', config('plugins.facebook.general.app_id')) }}&autoLogAppEvents=1"></script>

<div class="facebook-comment">
    <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width="100%"></div>
</div>
