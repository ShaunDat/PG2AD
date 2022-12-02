@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create report</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('reports.index') }}">Report</a>
                </li>
                <li class="active">
                    <strong>Index</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        @include('partials.flash_messages.flashMessages')

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create report</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <form method="POST" action="{{ route('reports.create') }}" class="form-horizontal">
                            @csrf()

                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Trainer<span class="required-star"> *</span></label>
                                        <select class="form-control chosen-select" name="trainer_id" required>

                                            <option value="">--Select--</option>
                                            @foreach($trainers as $trainer)
                                                <option value="{{ $trainer->user->id }}">
                                                    {{ ucfirst($trainer->user->name) .' - '. $trainer->phone }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Course<span class="required-star"> *</span></label>
                                        <select id="course" @change="setStudent" class="form-control" name="course_id" required>

                                            <option value="">--Select--</option>
                                            @foreach($courses as $course)
                                                <option {{ (isset($attendance->course->id) AND $attendance->course->id == $course->id)?'selected':''}} value="{{ $course->id }}">
                                                    {{ ucfirst($course->name) }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group" id="data_4">
                                        <label class="font-normal">Month select</label>
                                        <div class="input-group date">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                            <input name="attendance_date" required type="text" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <div class="">
                                            <button class="btn btn-primary" type="submit" formtarget="_blank">Create Report</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $('.chosen-select').chosen({
            width: "100%",
            search_contains: true
        });

        $('#data_4 .input-group.date').datepicker({
            format: 'mm/yyyy',
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

        $( '#data_4 .input-group.date' ).datepicker( 'setDate', today );

    </script>

@endsection()
