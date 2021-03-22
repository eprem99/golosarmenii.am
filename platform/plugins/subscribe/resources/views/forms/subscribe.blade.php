{!! Form::open(['route' => 'public.send.subscribe', 'method' => 'POST', 'class' => 'subscribe-form']) !!}
    <div class="subscribe-form-row">
        <div class="subscribe-form-group">
            <input type="email" class="subscribe-form-input form-control" name="email" value="{{ old('email') }}" id="subscribe_email"
                   placeholder="{{ __('Email') }}">
        </div>
    @if (setting('enable_captcha') && is_plugin_active('captcha'))
        <div class="subscribe-form-group">
            {!! Captcha::display() !!}
        </div>
    @endif

    <div class="subscribe-form-group absolute">
        <button type="submit" class="subscribe-button form-control">{{ __('Send') }}</button>
    </div>

    <div class="subscribe-form-group">
        <div class="subscribe-message subscribe-success-message" style="display: none"></div>
        <div class="subscribe-message subscribe-error-message" style="display: none"></div>
    </div>
</div>
{!! Form::close() !!}
