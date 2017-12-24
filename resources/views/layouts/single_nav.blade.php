<!-- top navbar-->
<header class="topnavbar-wrapper">
    <!-- START Top Navbar-->
    <ul role="navigation" class="navbar topnavbar" style="padding-left: 0;">
        <div class="container">
            <!-- START navbar header-->
            <div class="navbar-header">
                <a href="{{ url('/')}}" class="navbar-brand">
                    <div class="brand-logo">
                        {{ config('app.name') }}
                    </div>
                </a>
            </div>
            <!-- END navbar header-->

            <!-- START Nav wrapper-->
            <div class="nav-wrapper" style="box-shadow: none;">
                {{
                    Element::public_navbar([
                        'id' => 'top_navbar',
                        'navigations' => $navigations,
                        'active_navigation' => $active_navigation,
                        'li_class' => 'hidden-xs'
                    ])
                }}

                <ul class="nav navbar-nav navbar-right">
                    @if($user)
                        <li>
                            <a href="{{ url('/dashboard') }}" class="">Go to Dashboard</a>
                        </li>
                        <li class="ml-sm">
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               title="Log out" class="">Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ url('/login') }}" class="">Login/Register</a>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- END Nav wrapper-->
        </div>
    </ul>
    <!-- END Top Navbar-->
</header>


<!-- sidebar-->
<aside class="aside hidden-sm hidden-md hidden-lg">
    <!-- START Sidebar (left)-->
    <div class="aside-inner">
        <nav data-sidebar-anyclick-close="" class="sidebar">
            <!-- START sidebar nav-->
        {{
            Element::public_navbar([
                'id' => 'aside_navbar',
                'navigations' => $navigations,
                'active_navigation' => $active_navigation
            ])
        }}
        <!-- END sidebar nav-->
        </nav>
    </div>
    <!-- END Sidebar (left)-->
</aside>