<header id="page-topbar" style="background-color:#556ee6;">
    <div class="navbar-header" style="max-width:100%;">
        <div class="navbar-brand-box" style="width:36%; text-align:left">
            <a href="{{ url('/index') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ URL::asset ('/assets/images/favicon.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset ('/assets/images/logo.png') }}" alt="" height="17">
                </span>
            </a>
            <a href="{{ url('/index') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ URL::asset ('/assets/images/logo.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset ('/assets/images/logo.png') }}" alt="" height="40">
                </span>
            </a>
        </div>
        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
            <i class="fa fa-fw fa-bars"></i>
        </button>
        <div class="" style="width:81%"></div>

        <div class="dropdown d-inline-block" style="width:15%">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="{{ URL::asset ('/assets/images/profile.jpg') }}" alt="Header Avatar">
                <span class="d-none d-xl-inline-block ms-1" key="t-henry">Test</span>
            </button>
        </div>

        
    </div>
</header>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>