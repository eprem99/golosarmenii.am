<div class="form-group">
    <label for="widget-name">{{ trans('bases::forms.name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
</div>
<div class="form-group">
    <label for="cachetime">{{ __('Cache time') }}</label>
    <input type="text" name="cachetime" class="form-control" value="{{ $config['cachetime'] }}">
</div>
<div class="form-group">
    <label for="geoid">{{ __('City geoID') }}</label>
    <input type="text" name="geoid" class="form-control" value="{{ $config['geoid'] }}">
</div>