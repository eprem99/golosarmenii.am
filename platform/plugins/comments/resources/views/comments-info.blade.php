@if ($comments)
    <p>{{ trans('plugins/comments::comments.tables.time') }}: <i>{{ $comments->created_at }}</i></p>
    <p>{{ trans('plugins/comments::comments.tables.post_id') }}: <i>{{ $comments->post_id }}</i></p>
    <div class="comments-form-row">
    <div class="comments-column-12">
            <div class="comments-form-row">
                <div class="comments-column-12">
                    <div class="comments-form-group">
                        <label for="comments_content" class="comments-label required">{{ trans('plugins/comments::comments.tables.full_name') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ $comments->name }}" id="comments_name"
                       placeholder="{{ __('Name') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="comments-column-12">
            <div class="comments-form-row">
                <div class="comments-column-12">
                    <div class="comments-form-group">
                        <label for="comments_content" class="comments-label required">{{ trans('plugins/comments::comments.tables.email') }}</label>
                        <input type="text" class="form-control comments-form-input" name="email" value="{{ $comments->email }}" id="comments_email"
                       placeholder="{{ __('Email') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="comments-column-12">
            <div class="comments-form-row">
                <div class="comments-column-12">
                    <div class="comments-form-group">
                        <label for="comments_content" class="comments-label required">{{ __('Message') }}</label>
                        <textarea name="content" id="comments_content" class="form-control comments-form-input" rows="5" placeholder="{{ __('Message') }}">{{ $comments->content ? $comments->content : '...' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>       
           
@endif
