<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>

    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />


    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css')}}" rel="stylesheet" />

    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>


    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>




</head>

<body>

<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>

<nav class="navbar fixed-top px-0 shadow-sm bg-white">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                <img class="nav-logo-sm mx-2"  src="{{asset('images/menu.svg')}}" alt="logo"/>
            </span>
            <img class="nav-logo  mx-2"  src="{{asset('images/logo.png')}}" alt="logo"/>
        </a>

        <div class="float-right h-auto d-flex">
            <h4 class="text-info">Employer</h4>
        </div>
    </div>
</nav>


<div id="sideNavRef" class="side-nav-open lead">

    <a href="{{url("/employerDashboard")}}" class="side-bar-item {{ request()->is('employerDashboard') ? 'active':'' }}">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Dashboard</span>
    </a>


    <a href="{{url("employer-jobs")}}" class="side-bar-item {{ request()->is('employer-jobs') ? 'active':'' }}">
        <i class="bi bi-list-nested"></i>
        <span class="side-bar-item-caption">Jobs</span>
    </a>

    <a href="{{url("/admin-plugins")}}" class="side-bar-item {{ request()->is('admin-plugins') ? 'active':'' }}">
        <i class="bi bi-receipt"></i>
        <span class="side-bar-item-caption">Plugins</span>
    </a>
    <div class="account">
        <a href="{{url("/dashboard")}}" class="d-block">
            <span class="side-bar-item-caption">Account</span>
        </a>
        <a href="{{url("/logout")}}" class="d-block">
            <span class="side-bar-item-caption">Logout</span>
        </a>
    </div>
</div>


<div id="contentRef" class="content">
    @yield('content')
</div>



<script>
    function MenuBarClickHandler() {
        let sideNav = document.getElementById('sideNavRef');
        let content = document.getElementById('contentRef');
        if (sideNav.classList.contains("side-nav-open")) {
            sideNav.classList.add("side-nav-close");
            sideNav.classList.remove("side-nav-open");
            content.classList.add("content-expand");
            content.classList.remove("content");
        } else {
            sideNav.classList.remove("side-nav-close");
            sideNav.classList.add("side-nav-open");
            content.classList.remove("content-expand");
            content.classList.add("content");
        }
    }



</script>

</body>
</html>
