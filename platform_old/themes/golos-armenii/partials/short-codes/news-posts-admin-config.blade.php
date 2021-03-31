@if (is_plugin_active('blog'))
<div class="form-group">
    <label class="control-label">Category id</label>
    <input name="categorys" data-shortcode-attribute="content[]" class="form-control" placeholder="1">
    <label class="control-label">News count</label>
    <input name="count" data-shortcode-attribute="content[]" class="form-control" placeholder="5">
    <label class="control-label">Display title</label>
    <select name="titles" data-shortcode-attribute="content[]" class="form-control">
        <option value="1">Yes</option>
        <option value="2">No</option>
    </select>
    <label class="control-label">News block height</label>
    <input name="height" data-shortcode-attribute="content[]" class="form-control" placeholder="600">
</div>
@endif