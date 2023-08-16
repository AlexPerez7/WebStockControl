<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ url('images/user.png') }}" width="60" height="60" alt="User" />
        </div>
        <div class="info-container">
            @if(Auth::check())
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                <div class="email">{{ Auth::user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ url('password-change') }}"><i class="material-icons">person</i>Perfil</a></li>
                        <li><a href="{{ url('logout') }}"><i class="material-icons">input</i>Desconectar</a></li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">NAVEGACIÓN PRINCIPAL</li>
            <li class="{{ Route::currentRouteName() == '' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>

            @php
            $side_menu = Session::get('side_menu');
            @endphp

            @if(is_array($side_menu) && count($side_menu) > 0)
                @foreach($side_menu[0] as $value)
                    @if(is_array($value) && count($value['sub_menu']) > 0)
                        <li class="parent">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">{{ $value['icon'] }}</i>
                                <span>{{ $value['name'] }}</span>
                            </a>
                            <ul class="ml-menu">
                                @foreach($value['sub_menu'] as $sub)
                                    <li class="{{ Route::currentRouteName() == $sub->menu_url ? 'active' : '' }}">
                                        <a href="{{ $sub->menu_url ? route($sub->menu_url) : '' }}">
                                            <span>{{ $sub->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="{{ Route::currentRouteName() == $value['url'] ? 'active' : '' }}">
                            <a href="{{ $value['url'] ? route($value['url']) : '' }}">
                                <i class="material-icons">{{ $value['icon'] }}</i>
                                <span>{{ $value['name'] }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</aside>
<!-- #END# Left Sidebar -->
