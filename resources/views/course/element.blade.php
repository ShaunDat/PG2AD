
@include('partials.flash_messages.flashMessages')
<div class="form-group">
    <label class="col-lg-2 control-label">Name<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($course->name) ? $course->name:'' }}" required="required" name="name" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Note</label>
    <div class="col-lg-10">
        <textarea name="note" class="form-control" rows="5">{{ isset($course->note) ? $course->note:'' }}</textarea></div>
</div>

<div class="form-group">
    <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
    <input id="thumbnail" class="form-control" type="file" name="photo" value="{{old('photo')}}">
  </div>
</div>