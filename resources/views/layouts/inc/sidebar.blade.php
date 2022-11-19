<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{Request::is('admin/dashboard')?'active':''}}" href="{{url('home')}}">
                    <div class="sb-nav-link-icon "><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>

                
                {{-- Employee --}}
                <a class="nav-link {{ Request::is('add-employee') || Request::is('staffview')|| Request::is('/staffview/view_detail/*') ?'collapse active':'collapsed'}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    View Employee
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('staffview') || Request::is('add-employee') ||Request::is('staffview/view_detail/*')?'show':''}} " id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::is('add-employee')?'active':''}}" href="{{url('add-employee')}}">Add Employee</a>
                        <a class="nav-link {{Request::is('staffview')|| Request::is('staffview/view_detail/*')?'active':''}}" href="{{url('staffview')}}">View Employee</a>
                    </nav>
                </div>

                {{--Salary--}}
                <a class="nav-link {{ Request::is('admin/posts')|| Request::is('admin/add-post')||Request::is('admin/edit-post/*')?'collapse active':'collapsed'}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Salary
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/posts')|| Request::is('admin/add-post')||Request::is('admin/edit-post/*')?'show':''}}" id="collapsePost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::is('admin/add-post')?'active':''}}" href="{{url('payroll')}}">Calculate Salary</a>
                        <a class="nav-link {{Request::is('admin/posts')|| Request::is('admin/edit-post/*') ?'active':''}}" href="{{url('viewsalary')}}">View Salary (Admin) </a>
                        <a class="nav-link {{Request::is('admin/posts')|| Request::is('admin/edit-post/*') ?'active':''}}" href="{{url('viewsalaryuser')}}">View Salary User (User) </a>
                    </nav>
                </div>
                {{--Holiday--}}
                <a class="nav-link {{ Request::is('admin/posts')|| Request::is('admin/add-post')||Request::is('admin/edit-post/*')?'collapse active':'collapsed'}}" href="#" data-bs-toggle="collapse" data-bs-target="#holiday" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Holiday
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/posts')|| Request::is('admin/add-post')||Request::is('admin/edit-post/*')?'show':''}}" id="holiday" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::is('admin/add-post')?'active':''}}" href="{{url('viewholidayuser')}}">View  Holiday (User)</a>
                        <a class="nav-link {{Request::is('admin/posts')|| Request::is('admin/edit-post/*') ?'active':''}}" href="{{url('createholiday')}}">Create Holiday (User) </a>
                        <a class="nav-link {{Request::is('admin/posts')|| Request::is('admin/edit-post/*') ?'active':''}}" href="{{url('viewholidayadmin')}}"> View Holiday (Admin)</a>
                        
                    </nav>
                </div>


                {{--Users--}}
                <a class="nav-link {{Request::is('admin/users')||Request::is('admin/edit-user/*')?'active':''}}" href="{{url('admin/users')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>
               

                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>

    