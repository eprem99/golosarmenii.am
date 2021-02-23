<div class="form-group">
    <label for="widget-name">{{ trans('core/base::forms.name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
</div>

<div class="form-group">
    <label for="widget-facebook-name">{{ trans('plugins/facebook::facebook.widget_facebook_name') }}</label>
    <input type="text" class="form-control" name="facebook_name" value="{{ $config['facebook_name'] }}">
</div>

<div class="form-group">
    <label for="widget-facebook-id">{{ trans('plugins/facebook::facebook.widget_facebook_url') }}</label>
    <input type="text" class="form-control" name="facebook_id" value="{{ $config['facebook_id'] }}">
</div>
