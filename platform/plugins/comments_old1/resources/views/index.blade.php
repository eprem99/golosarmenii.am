<!-- @if ($cookieConsentConfig['enabled'] && !$alreadyConsentedWithCookies)

    <div class="js-comments comments" style="background-color: {{ theme_option('comments_background_color', '#000') }} !important; color: {{ theme_option('comments_text_color', '#fff') }} !important;">
        <div class="comments-body" style="max-width: {{ theme_option('comments_max_width', 1170) }}px;">
            <span class="comments__message">
                {{ theme_option('comments_message', trans('plugins/comments::comments.message')) }}
                @if (theme_option('comments_learn_more_url') && theme_option('comments_learn_more_text'))
                    <a href="{{ url(theme_option('comments_learn_more_url')) }}">{{ theme_option('comments_learn_more_text') }}</a>
                @endif
            </span>

            <button class="js-comments-agree comments__agree" style="background-color: {{ theme_option('comments_background_color', '#000') }} !important; color: {{ theme_option('comments_text_color', '#fff') }} !important; border: 1px solid {{ theme_option('comments_text_color', '#fff') }} !important;">
                {{ theme_option('comments_button_text', trans('plugins/comments::comments.button_text')) }}
            </button>
        </div>
    </div>
    <div data-site-cookie-name="{{ $cookieConsentConfig['cookie_name'] }}"></div>
    <div data-site-cookie-lifetime="{{ $cookieConsentConfig['cookie_lifetime'] }}"></div>
    <div data-site-cookie-domain="{{ config('session.domain') ?? request()->getHost() }}"></div>
    <div data-site-session-secure="{{ config('session.secure') ? ';secure' : null }}"></div>

@endif -->
