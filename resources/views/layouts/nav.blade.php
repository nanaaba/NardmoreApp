<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ url('dashboard') }}"  class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ url('category') }}"  class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sub-menu ">
                    <a href="javascript:;" class="{{ Request::is('images*') ? 'active' : '' }}">
                        <i class="fa fa-laptop"></i>
                        <span>Images</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ Request::is('images/upload') ? 'active' : '' }}">
                            <a href="{{ url('images/upload') }}">Upload Image</a>
                        </li>
                        <li class="{{ Request::is('images/all') ? 'active' : '' }}">
                            <a href="{{ url('images/all') }}">All Images</a></li>
                        <li class="{{ Request::is('images/banners') ? 'active' : '' }}">
                            <a href="{{ url('images/banners') }}">All Banners</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="{{ Request::is('messages*') ? 'active' : '' }}">
                        <i class="fa fa-laptop"></i>
                        <span>Messages</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ Request::is('messages/new') ? 'active' : '' }}">
                            <a href="{{ url('messages/new') }}">New Messages</a>
                        </li>
                        <li class="{{ Request::is('messages/all') ? 'active' : '' }}">
                            <a href="{{ url('messages/all') }}">All Messages</a>
                        </li>
                        <li class="{{ Request::is('messages/reservations') ? 'active' : '' }}">
                            <a href="{{ url('messages/reservations') }}"> Reservations</a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="{{ url('users') }}" class="{{ Request::is('users*') ? 'active' : '' }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Users</span>
                    </a>
                </li>
            </ul>
        </div>        
        <!-- sidebar menu end-->
    </div>
</aside>
