<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">

                    <?php
                    if (isset(Auth::user()->image)){
                        $image_url = URL::to('uploads/images/admins/'.Auth::user()->image);
                    }else{
                        $image_url = URL::to('img/no-image.png');
                    }
                    ?>

                    <span>
                        <img alt="image" class="img-circle" src="{{ $image_url }}" />
                    </span>

                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs"> <strong class="font-bold">{{ Auth()->user()->name }}</strong>
                            </span> <span class="text-muted text-xs block">Settings<b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('profile') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a></li>
                        <li><a href="{{ route('changePassword') }}"><i class="fa fa-shield" aria-hidden="true"></i> Change Password</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit()";>
                                <i class="fa fa-sign-out"></i> Log out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li class="{{ (currentController() == 'DashboardController')?'active':'' }}">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>

            @role('admin')

                @php
                    $active_adminstration = ((currentController() == 'PermissionController')
                                            OR (currentController() == 'RoleController') )?'active':'';
                @endphp

                <li class="{{ $active_adminstration }}">
                    <a href="index.html"><i class="fa fa-user-secret" aria-hidden="true"></i> <span class="nav-label">Administration</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{ (currentController() == 'PermissionController')?'active':'' }}"><a href="{{ route('permissions.index') }}">Manage Permission</a></li>
                        <li class="{{ (currentController() == 'RoleController')?'active':'' }}"><a href="{{ route('roles.index') }}">Manage Role</a></li>
                    </ul>
                </li>


                <li class="{{ (currentController() == 'TrainerController')? 'active':'' }}">
                    <a href="{{ route('trainers.index') }}"><i class="fa fa-user-secret" aria-hidden="true"></i> <span class="nav-label">Trainer</span> </a>
                </li>

                <li class="{{ (currentController() == 'TraineeController')? 'active':'' }}">
                    <a href="{{ route('trainees.index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="nav-label">Trainee</span> </a>
                </li>

                <li class="{{ (currentController() == 'ClassController')? 'active':'' }}">
                    <a href="{{ route('class.index') }}"><i class="fa fa-th" aria-hidden="true"></i> <span class="nav-label">Course</span> </a>
                </li>

                <li class="{{ (currentController() == 'ReportController')? 'active':'' }}">
                    <a href="{{ route('reports.index') }}"><i class="fa fa-child" aria-hidden="true"></i> <span class="nav-label">Report</span> </a>
                </li>

            @endrole

            
            @role('trainer')

            <li class="{{ (currentController() == 'TraineeController')? 'active':'' }}">
                <a href="{{ route('trainees.index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="nav-label">Trainee</span> </a>
            </li>

            <li class="{{ (currentController() == 'ClassController')? 'active':'' }}">
                <a href="{{ route('class.index') }}"><i class="fa fa-th" aria-hidden="true"></i> <span class="nav-label">Course</span> </a>
            </li>
            
            <li class="{{ (currentController() == 'ReportController')? 'active':'' }}">
                
                <a href="{{ route('reports.index') }}"><i class="fa fa-child" aria-hidden="true"></i> <span class="nav-label">Report</span> </a>
            </li>
            
            <li class="{{ (Route::getFacadeRoot()->current()->uri() == 'class-routine')? 'active':'' }}">
                <a href="{{ route('class-routine.index') }}"><i class="fa fa-child" aria-hidden="true"></i> <span class="nav-label">Class Routine</span> </a>
            </li>
            @endrole
            
            @role('trainee')
                <li class="{{ (Route::getFacadeRoot()->current()->uri() == 'class-routine')? 'active':'' }}">
                    <a href="{{ route('class-routine.index') }}"><i class="fa fa-child" aria-hidden="true"></i> <span class="nav-label">Class Routine</span> </a>
                </li>
            @endrole
        </ul>

    </div>
</nav>
