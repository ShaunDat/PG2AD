
@include('partials.flash_messages.flashMessages')

<div class="form-group">
    <label class="col-lg-2 control-label">Name<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($topic->name) ? $topic->name:'' }}" required="required" name="name" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Note</label>
    <div class="col-lg-10">
        <textarea name="note" class="form-control" rows="5">{{ isset($topic->note) ? $topic->note:'' }}</textarea></div>
</div>
