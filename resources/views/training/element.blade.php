
@include('partials.flash_messages.flashMessages')

<div class="form-group">
    <label class="col-lg-2 control-label">Name<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($training->user->name) ? $training->user->name:'' }}" required="required" name="name" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Email<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($training->user->email) ? $training->user->email:'' }}" required="required" name="email" type="email" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Phone<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($training->phone) ? $training->phone:'' }}" required="required" name="phone" type="text" class="form-control">
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
        <input value="{{ isset($training->address) ? $training->address:'' }}" name="address" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Gender</label>
    <div class="col-lg-10">
        <select class="form-control m-b" name="gender" required>
            <option value="">--Select--</option>
            <option value="male" {{ (isset($trainee->gender) AND $trainee->gender == 'male') ? 'selected':old('gender') ==  'male'?'selected' : '' }}
            >Male</option>
            <option value="female" {{ (isset($trainee->gender) AND $trainee->gender == 'female') ? 'selected':old('gender') ==  'female'?'selected' : '' }}
            >Female</option>
            <option value="other" {{ (isset($trainee->gender) AND $trainee->gender == 'other') ? 'selected':old('gender') ==  'other'?'selected' : '' }}
            >Other</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Topics</label>
    <div class="col-lg-10">
    {{-- <select class="form-control" name="topic_id" required>
        <option value="">--Select--</option>
        @foreach($topics as $topic)
        <option value="{{ $topic->id }}"
            {{ (isset($training->topic_id) AND $topic->id == $training->topic_id)?'selected':old('topic_id') ==  $topic->id  ? 'selected' : '' }}>
            {{ $topic->name }}
        </option>
        @endforeach
        </select> --}}
        <input value="{{ isset($training->topic_id) ? $topic->id:'' }}" name="topic_id" type="text" class="form-control">

    </div>
</div>


