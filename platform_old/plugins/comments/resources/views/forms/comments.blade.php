

{!! Form::open(['route' => 'public.send.comments', 'method' => 'POST', 'class' => 'comments-form']) !!}
    <div class="comments-form-row">
        <div class="comments-column-6">
            <div class="comments-form-group">
                <label for="comments_name" class="comments-label required">{{ __('Name') }}</label>
                <input type="text" class="comments-form-input" name="name" value="{{ old('name') }}" id="comments_name"
                       placeholder="{{ __('Name') }}">
            </div>
        </div>
        <div class="comments-column-6">
            <div class="comments-form-group">
                <label for="comments_email" class="comments-label required">{{ __('Email') }}</label>
                <input type="email" class="comments-form-input" name="email" value="{{ old('email') }}" id="comments_email"
                       placeholder="{{ __('Email') }}">
            </div>
        </div>
    </div>
    <div class="comments-form-row">
        <div class="comments-column-12">
            <div class="comments-form-group">
                <label for="comments_subject" class="comments-label">{{ __('Subject') }}</label>
                <input type="text" class="comments-form-input" name="subject" value="{{ old('subject') }}" id="comments_subject"
                       placeholder="{{ __('Subject') }}">
            </div>
        </div>
    </div>
    <div class="comments-form-row">
        <div class="comments-column-12">
            <div class="comments-form-group">
                <label for="comments_content" class="comments-label required">{{ __('Message') }}</label>
                <textarea name="content" id="comments_content" class="comments-form-input" rows="5" placeholder="{{ __('Message') }}">{{ old('content') }}</textarea>
            </div>
        </div>
    </div>

    @if (setting('enable_captcha') && is_plugin_active('captcha'))
        <div class="comments-form-row">
            <div class="comments-column-12">
                <div class="comments-form-group">
                    {!! Captcha::display() !!}
                </div>
            </div>
        </div>
    @endif

    <div class="comments-form-group"><p>{!! clean(__('The field with (<span style="color:#FF0000;">*</span>) is required.')) !!}</p></div>

    <div class="comments-form-group">
        <input type="hidden" value="" id="posts_id">
        <button type="submit" class="comments-button">{{ __('Send') }}</button>
    </div>

    <div class="comments-form-group">
        <div class="comments-message comments-success-message" style="display: none"></div>
        <div class="comments-message comments-error-message" style="display: none"></div>
    </div>

{!! Form::close() !!}
