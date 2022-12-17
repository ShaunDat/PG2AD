
@include('partials.flash_messages.flashMessages')

<div class="form-group">
    <label class="col-lg-2 control-label">Name<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($trainer->user->name) ? $trainer->user->name:'' }}" required="required" name="name" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Email<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($trainer->user->email) ? $trainer->user->email:'' }}" required="required" name="email" type="email" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Phone<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($trainer->phone) ? $trainer->phone:'' }}" required="required" name="phone" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Password @if(class_basename(Route::current()->uri) == 'create')<span class="required-star"> *</span>@endif</label>
    <div class="col-lg-10">
        <input value="" name="password" type="password" class="form-control" {{ (class_basename(Route::current()->uri) == 'create')?'required':'' }}>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Address</label>
    <div class="col-lg-10">
        <input value="{{ isset($trainer->address) ? $trainer->address:'' }}" name="address" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Gender</label>
    <div class="col-lg-10">
        <select class="form-control m-b" name="gender" required>
            <option value="">--Select--</option>
            <option value="male" {{ (isset($trainer->gender) AND $trainer->gender == 'male') ? 'selected':old('gender') ==  'male'?'selected' : '' }}
            >Male</option>
            <option value="female" {{ (isset($trainer->gender) AND $trainer->gender == 'female') ? 'selected':old('gender') ==  'female'?'selected' : '' }}
            >Female</option>
            <option value="other" {{ (isset($trainer->gender) AND $trainer->gender == 'other') ? 'selected':old('gender') ==  'other'?'selected' : '' }}
            >Other</option>
        </select>
    </div>
</div>
<div class="form-group"><label class="col-lg-2 control-label">Topic<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <select class="form-control" name="topic_id" required>

            <option value="">--Select--</option>

            @foreach($topics as $topic)
                <option value="{{ $topic->id }}"
                    {{ (isset($trainer->topic_id) AND $topic->id == $trainer->topic_id)?'selected':old('topic_id') ==  $topic->id  ? 'selected' : '' }}>
                    {{ $topic->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>


