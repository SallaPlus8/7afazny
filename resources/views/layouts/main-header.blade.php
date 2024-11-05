<!-- Header Start -->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- Logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="
    @if(Auth::guard('admin')->check())
        {{ route('admin.dashboard') }}
    @elseif(Auth::guard('teacher')->check())
        {{ route('teacher.dashboard') }}
    @elseif(Auth::guard('user')->check())
        {{ route('user.dashboard') }}
    @else
        {{ url('/') }} <!-- أو رابط الصفحة الرئيسية كخيار افتراضي -->
    @endif
">
    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="Logo">
</a>

                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-icon-dark.png" alt=""></a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);">
                <i class="zmdi zmdi-menu ti-align-right"></i>
            </a>
        </li>
        <li class="nav-item">
            <div class="search">
                <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                    <input type="text" class="not-click form-control" placeholder="Search" name="search">
                    <button class="search-button" type="submit"><i class="fa fa-search not-click"></i></button>
                </div>
            </div>
        </li>
    </ul>

    <!-- Language Switcher -->
    <ul>
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">
                    {{ $properties['name'] }}
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Top bar right -->
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>
        <!-- User Profile and Logout -->
        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="
                    @if(Auth::guard('admin')->check())
                        {{ Auth::guard('admin')->user()->photo ? asset('images/admins/' . Auth::guard('admin')->user()->photo) : asset('assets/images/profile-avatar.jpg') }}
                    @elseif(Auth::guard('teacher')->check())
                        {{ Auth::guard('teacher')->user()->photo ? asset('images/teachers/' . Auth::guard('teacher')->user()->photo) : asset('assets/images/profile-avatar.jpg') }}
                    @elseif(Auth::guard('user')->check())
                        {{ Auth::guard('user')->user()->photo ? asset('images/users/' . Auth::guard('user')->user()->photo) : asset('assets/images/profile-avatar.jpg') }}
                    @else
                        {{ asset('assets/images/profile-avatar.jpg') }}
                    @endif
                " alt="avatar" class="img-fluid rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">
                                @if(Auth::guard('admin')->check())
                                    {{ Auth::guard('admin')->user()->name }}
                                @elseif(Auth::guard('teacher')->check())
                                    {{ Auth::guard('teacher')->user()->name }}
                                @elseif(Auth::guard('user')->check())
                                    {{ Auth::guard('user')->user()->name }}
                                @else
                                    ضيف
                                @endif
                            </h5>
                            <span>
                                @if(Auth::guard('admin')->check())
                                    {{ Auth::guard('admin')->user()->email }}
                                @elseif(Auth::guard('teacher')->check())
                                    {{ Auth::guard('teacher')->user()->email }}
                                @elseif(Auth::guard('user')->check())
                                    {{ Auth::guard('user')->user()->email }}
                                @else
                                    ضيف
                                @endif
                            </span>
                                                    </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                <a class="dropdown-item" href={{route('teacher.profile.show')}}><i class="text-warning ti-user"></i>Profile</a>
                <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span class="badge badge-info">6</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                
                <!-- Logout Button -->
                <a class="dropdown-item" href="{{ route(Auth::guard('admin')->check() ? 'admin.logout' : (Auth::guard('teacher')->check() ? 'teacher.logout' : 'user.logout')) }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   <i class="text-danger ti-unlock"></i> Logout
                </a>
                <form id="logout-form" action="{{ route(Auth::guard('admin')->check() ? 'admin.logout' : (Auth::guard('teacher')->check() ? 'teacher.logout' : 'user.logout')) }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<!-- Header End -->
