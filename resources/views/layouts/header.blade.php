<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">

        <a href="index.html" class="logo">
<!--                        <img src="images/logo.png" alt="">-->
            NARDMORE
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->

    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->

            <!-- settings end -->
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="blank.html#">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-important">4</span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <li>
                        <p class="red">You have 4 Messages</p>
                    </li>
                    <li>
                        <a href="blank.html#">
                            <span class="photo"><img alt="avatar" src="images/avatar-mini.jpg"></span>
                            <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                            </span>
                            <span class="message">
                                Hello, this is an example msg.
                            </span>
                        </a>
                    </li>
                  
                    <li>
                        <a href="blank.html#">See all messages</a>
                    </li>
                </ul>
            </li>
            <!-- inbox dropdown end -->
         
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">

            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle icon-user" href="blank.html#">
                    <!--<img alt="" src="images/avatar1_small.jpg">-->
                    <i class="fa fa-user"></i>
                    <span class="username">{{session('username')}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="{{url('users/profle')}}"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="{{url('users/changepassword')}}"><i class=" fa fa-envelope-o"></i>Change Password</a></li>

                    <li><a href="{{url('logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->

        </ul>
        <!--search & user info end-->
    </div>
</header>
