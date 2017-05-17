<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 visible-xs">

                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <span class="mobile_sidebar_btn"> <img src="/images/sidebar_collapse_button.png" alt="" style="width:100%;"> </span>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->

                    <a class="navbar-brand" href="{{ url('/') }}">
                    555 ASHA
                    </a>


                </div>
            </div>

            <div class="col-sm-3 hidden-xs navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">555 ASHA</a>
            </div>

            <div class="col-sm-6 hidden-xs">
                
            </div>

            <div class="col-sm-3 header_right_btns">
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                        <li class="dropdown">
                            <a href="#">
                                SUPPORT
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href='#' onclick="document.querySelector('#logout_form').submit();">
                                LOGOUT
                            </a>
                            <form action="/logout" id="logout_form" method="POST"></form>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </div>
</nav>