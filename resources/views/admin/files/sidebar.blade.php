<!--navigation : sidebar & header-->
<nav class="navbar navbar-expand-lg fixed-top navbar-light" id="mainNav">
    <!--brand name-->
    <a class="navbar-brand" href="#" >
        <img class="pr-3 float-left" height="50" src="/logo.png" srcset="/assets/img/logo-icon@2x.png 2x"  alt=""/>
        <div class="float-left">
            <div>Saiinfotech.org</div>
            
           
        </div>
    </a>
    <!--/brand name-->

   
    <!--responsive nav toggle-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--/responsive nav toggle-->

    <!--responsive rightside toogle-->
    <a href="javascript:;" class="nav-link right_side_toggle responsive-right-side-toggle">
        <i class="icon-options-vertical"> </i>
    </a>
    <!--/responsive rightside toogle-->

    <div class="collapse navbar-collapse" id="navbarResponsive">

        <!--left side nav-->
        <ul class="navbar-nav left-side-nav" id="accordion">

          

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link " href="{{route('dashboard')}}">
                    <i class="vl_dashboard"></i>
                    <span class="nav-link-text">Dashboard </span>
                </a> 
            </li>


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Widgets">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#widgets" aria-expanded="false">
                    <i class="vl_bond"></i>
                    <span class="nav-link-text">Master</span>
                </a>
                <ul class="sidenav-second-level collapse" id="widgets" data-parent="#accordion" style="">
                <li> <a href="{{route('company.create')}}">Create Company</a> </li>
                <li> <a href="{{route('department.index')}}"> Create Department</a> </li>
                
                <li> <a href="{{route('designation.create')}}"> Create Designation</a> </li>

                <li> <a href="{{route('salaryhead.create')}}"> Create Salary Head</a> </li>
                <li> <a href="{{route('leavetype.create')}}"> Create Leave Type</a> </li>
               
                <li> <a href="{{route('calendar.create')}}"> Create Leave calendar</a> </li>
                
               
                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Icons">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#icons">
                    <i class="icon-social-reddit"></i>
                    <span class="nav-link-text">Employee</span>
                </a>
                <ul class="sidenav-second-level collapse " id="icons" data-parent="#accordion">
                <li> <a href="{{route('employee.create')}}">Create Employee</a> </li>
               
                </ul>

             
            </li>


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Icons">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#att">
                    <i class="fa fa-cubes"></i>
                    <span class="nav-link-text">Attendance</span>
                </a>
                <ul class="sidenav-second-level collapse " id="att" data-parent="#accordion">
                <li> <a href="{{route('quick_att')}}">Quick Attendance</a> </li>
                <li> <a href="{{route('daily_att')}}">Daily Attendance</a> </li>
                <li> <a href="{{route('att_summary')}}">Attendance Summary</a> </li>


                </ul>
            </li>



            
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="salary">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#salary">
                    <i class="fa fa-money"></i>
                    <span class="nav-link-text"> Salary</span>
                </a>
                <ul class="sidenav-second-level collapse " id="salary" data-parent="#accordion">
                <li> <a href="{{route('salary.index')}}">Salary details</a> </li>

                <li> <a href="{{route('emi.index')}}">Advance Salary Payment</a> </li>
                   
                </ul>
            </li>


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="reports">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#reports">
                    <i class="fa fa-calculator"></i>
                    <span class="nav-link-text"> Reports</span>
                </a>
                <ul class="sidenav-second-level collapse " id="reports" data-parent="#accordion">
                <li> <a href="{{route('epf_index')}}">EPF reports</a> </li>
                <li> <a href="{{route('esic_index')}}">ESIC reports</a> </li>

                <li> <a href="{{route('goverment_index')}}">Government reports</a> </li>
                <li> <a href="{{route('department_index')}}">Department reports</a> </li>
                <li> <a href="{{route('balance_index')}}">Balance Sheet </a> </li>
                <li> <a href="{{route('wages_index')}}"> Wages Report </a> </li>


                <li> <a href="{{route('employee.index')}}">Employee list</a> </li>

                <li> <a href="{{route('show_attendance')}}">Date wise Attendance</a> </li>

                   
                </ul>

                
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="account">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#account">
                    <i class="fa fa-universal-access"></i>
                    <span class="nav-link-text"> Accounts</span>
                </a>
                <ul class="sidenav-second-level collapse " id="account" data-parent="#accordion">
                    <li> <a href="{{route('user.create')}}">Create User</a> </li>
                    <li> <a href="{{route('user.index')}}">See User</a> </li>
               
                <li> <a href="{{route('change_password' , Auth::user()->id)}}">Change Password</a> </li>

                

                
                   
                </ul>

                
            </li>



            <li class="nav-item" >
            <a class="nav-link " href="{{route('logout')}}">
                    <i class="icon-user"></i>
                   Logout 
                </a> 
            </li>
           
            
            
        </ul>
    </div>
</nav>


      
    