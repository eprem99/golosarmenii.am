<div class="form-group">
    <label for="post_subtitle">{{ __('Post subtitle') }}</label>
    {!! Form::text('post_subtitle', $postSubtitle, ['class' => 'form-control', 'id' => 'post_subtitle']) !!} 
</div>
<div class="form-group">
    <label for="video_link">{{ __('Video') }}</label>
    {!! Form::text('video_link', $videoLink, ['class' => 'form-control', 'id' => 'video_link']) !!} 
</div>
<div class="form-group">
<label for="important" class="control-label">{{ __('Important?') }}</label>

<div class="onoffswitch">
	<input type="hidden" name="is_important" value="1">
	{!! Form::text('is_important', $is_important, ['class' => 'onoffswitch-checkbox', 'id' => 'is_important']) !!}
    <label class="onoffswitch-label" for="is_important">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>

</div>