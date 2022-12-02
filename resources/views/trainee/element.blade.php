
@include('partials.flash_messages.flashMessages')

<div class="col-sm-6">
    <div class="form-group"><label>Name<span class="required-star"> *</span></label>
        <input value="{{ isset($trainee->user->name) ? $trainee->user->name:old('name') }}" required="required" name="name" type="text" class="form-control">
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group"><label>Roll<span class="required-star"> *</span></label>
        <input value="{{ isset($trainee->roll_number) ? $trainee->roll_number:old('roll_number') }}" required="required" name="roll_number" type="text" class="form-control">
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group"><label>Phone<span class="required-star"> *</span></label>
        <input value="{{ isset($trainee->phone) ? $trainee->phone:old('phone') }}" required="required" name="phone" type="text" class="form-control">
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group"><label>Email<span class="required-star"> *</span></label>
        <input value="{{ isset($trainee->user->email) ? $trainee->user->email:old('email') }}" required="required" name="email" type="email" class="form-control">
       {{-- @error('email')
            <p class="color-danger text-xs italic">{{ $message }}</p>
        @enderror--}}
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group"><label>Course<span class="required-star"> *</span></label>

        <select class="form-control" name="course_id" required>

            <option value="">--Select--</option>

            @foreach($courses as $course)
                <option value="{{ $course->id }}"
                    {{ (isset($trainee->course_id) AND $course->id == $trainee->course_id)?'selected':old('course_id') ==  $course->id  ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach

        </select>

    </div>
</div>

<div class="col-sm-6">
    <div class="form-group"><label>Gender<span class="required-star"> *</span></label>
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


<div class="col-sm-6">
    <div class="form-group"><label>Password @if(class_basename(Route::current()->uri) == 'create')<span class="required-star"> *</span>@endif</label>
        <input value="" name="password" type="password" class="form-control" {{ (class_basename(Route::current()->uri) == 'create')?'required':'' }}>
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group"><label>Age<span class="required-star"> *</span></label>
        <input value="{{ isset($trainee->age) ? $trainee->age:old('age') }}" name="age" type="text" required class="form-control">
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group"><label>Date of birth</label>
        <input value="{{ isset($trainee->date_of_birth) ? $trainee->date_of_birth:old('date_of_birth') }}" name="date_of_birth" type="date" class="form-control">
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group"><label>Address</label>
        <input value="{{ isset($trainee->address) ? $trainee->address:old('address') }}" name="address" type="text" class="form-control">
    </div>
</div>

<script>
    $('.chosen-select').chosen({
        width: "100%",
        search_contains: true
    });

    /*$('.chosen-search input').on('keyup', function(evt, params) {
        console.log(this.value)
    });*/

   /* $('test').chosen();
    $('.select').click(function(){
        $('option').prop('selected', true);
        $('select').trigger('liszt:updated');
    });
    $('.deselect').click(function(){
        $('option').prop('selected', false);
        $('select').trigger('liszt:updated');
    });*/

</script>
