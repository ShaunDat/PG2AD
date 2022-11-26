@extends('layouts.master')

@section('content')

    <div id="app">
        <div class="row wrapper border-bottom success-bg page-heading">
            <div class="col-lg-10">
                <h2>Dashboard</h2>
                <ol class="breadcrumb">
                    <li>
                        <a>Dashboard</a>
                    </li>
                    <li class="active">
                        <strong>Home</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">

            @include('partials.flash_messages.flashMessages')

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">

                            <div class="table-responsive">

                            </div>
                            <div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
