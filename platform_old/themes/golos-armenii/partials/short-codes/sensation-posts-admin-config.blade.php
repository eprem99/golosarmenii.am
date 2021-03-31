@if (is_plugin_active('blog'))
<div class="form-group">
    <label class="control-label">Category id</label>
    <input name="categorys" data-shortcode-attribute="content[]" class="form-control" placeholder="1">
    <label class="control-label">Post count</label>
    <input name="count" data-shortcode-attribute="content[]" class="form-control" placeholder="5">
    <label class="control-label">Count Post per row</label>
    <select name="per_row" data-shortcode-attribute="content[]" class="form-control">
    	<option value="col-md-12">One</option>
    	<option value="col-md-6">Two</option>
    	<option value="col-md-4">free</option>
    	<option value="col-md-3">Fore</option>
    </select>
</div>
@endif