<div class="form-group">
    <label for="widget-name">{{ trans('bases::forms.telegram') }}</label>
    <input type="text" class="form-control" name="telegram" value="{{ $config['telegram'] }}">
</div>
<div class="form-group">
    <label for="widget-name">{{ trans('bases::forms.facebook') }}</label>
    <input type="text" class="form-control" name="facebook" value="{{ $config['facebook'] }}">
</div>
<div class="form-group">
    <label for="widget-name">{{ trans('bases::forms.vk') }}</label>
    <input type="text" class="form-control" name="vk" value="{{ $config['vk'] }}">
</div>
<div class="form-group">
    <label for="widget-name">{{ trans('bases::forms.twitter') }}</label>
    <input type="text" class="form-control" name="twitter" value="{{ $config['twitter'] }}">
</div>
