@extends('layouts.master')

@section('content')
@role('training')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            
            <h2>All Topic</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('topic.index') }}">Topic</a>
                </li>
                <li class="active">
                    <strong>Index</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            @unlessrole('trainer')
            <div class="ibox-tools m-t-xl">
                <a href="{{ route('topic.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
            @endunlessrole
        </div>
    </div>
@endrole
    <div class="wrapper wrapper-content animated fadeInRight">

        @include('partials.flash_messages.flashMessages')

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Topic</h5>
                    </div>

                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Note</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($topic as $item)
                                    <tr>
                                        <td>{{ ucfirst($item->name) }}</td>
                                        <td> {{ ucfirst($item->note) }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
