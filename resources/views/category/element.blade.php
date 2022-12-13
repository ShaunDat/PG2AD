
@include('partials.flash_messages.flashMessages')

<div class="form-group">
    <label class="col-lg-2 control-label">Title<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($category->title) ? $category->title:'' }}" required="required" name="title" type="text" class="form-control">
        <!-- <input value="{{old('title')}}" required="required" name="name" type="text" class="form-control"> -->
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Description</label>
    <div class="col-lg-10">
        <textarea name="description" class="form-control" rows="5">{{ isset($category->description) ? $category->description:'' }}</textarea></div>
        <!-- <textarea name="note" class="form-control" rows="5">{{old('description')}}</textarea></div> -->
</div>
