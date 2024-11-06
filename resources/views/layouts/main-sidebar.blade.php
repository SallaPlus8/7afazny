<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item chat-->
                    @auth('user')
                    <li>
                        <a href="chat-page.html">
                            <i class="ti-comments"></i><span class="right-nav-text">{{ __('Chat') }}</span>
                        </a>
                    </li>
                    @endauth
                    @auth('teacher')
                    <li>
                        <a href="chat-page.html">
                            <i class="ti-comments"></i><span class="right-nav-text">{{ __('Chat') }}</span>
                        </a>
                    </li>
                    @endauth

                    @auth('teacher')
                    <li>
                        <a href={{route('teacher.feedback')}}>
                            <i class="ti-star"></i></i><span class="right-nav-text">{{ __('Feedback') }}</span>
                        </a>
                    </li>
                    @endauth
                    <!-- فقط للمستخدمين المتحقق منهم عبر جارد "user" -->
                    @auth('teacher')
                        <li>
                            <a href={{route('students.index')}}>
                                <i class="ti-user"></i><span class="right-nav-text">{{ __('My Students') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('certifications.index') }}">
                                <i class="ti-medall-alt"></i><span class="right-nav-text">{{ __('My Certifications') }}</span>
                            </a>
                            
                        </li>
            

                    <li>
                        <a href={{route('current_bookings.index')}}>
                            <i class="ti-calendar"></i><span class="right-nav-text">{{ __('Current bookings') }}</span>
                        </a>
                    </li>
                    @endauth
                    <!-- فقط للمستخدمين المتحقق منهم عبر جارد "teacher" -->
                    @auth('user')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#teachers-menu">
                                <i class="ti-user"></i><span class="right-nav-text">{{ __('Teachers') }}</span>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                            </a>
                            <ul id="teachers-menu" class="collapse" data-parent="#sidebarnav">
                                <li>
                                    <a href="quran-teachers.html">{{ __('Quran Memorization') }}</a>
                                </li>
                                <li>
                                    <a href="arabic-teachers.html">{{ __('Arabic Language Teaching') }}</a>
                                </li>
                                <li>
                                    <a href="both-teachers.html">{{ __('Both') }}</a>
                                </li>
                            </ul>
                        </li>
                    @endauth
                    @auth('admin')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#teachers-menu">
                            <i class="ti-user"></i><span class="right-nav-text">{{ __('Teachers') }}</span>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                        </a>
                        <ul id="teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href={{route('quran.teacher.index')}}>{{ __('Quran Memorization') }}</a>
                            </li>
                            <li>
                                <a href={{route('arabic.teacher.index')}}>{{ __('Arabic Language Teaching') }}</a>
                            </li>
                            <li>
                                <a href={{route('teacher.index')}}>{{ __('Both') }}</a>
                            </li>
                        </ul>
                    </li>
                    @auth('admin')
                    <li>
                        <a href={{route('admin.students.index')}}>
                            <i class="ti-user"></i><span class="right-nav-text">{{ __('Students') }}</span>
                        </a>
                    </li>
                    @endauth
                    @auth('admin')
                    <li>
                        <a href={{route('admin.current_bookings.index')}}>
                            <i class="ti-calendar"></i><span class="right-nav-text">{{ __('Booking') }}</span>
                        </a>
                    </li>
                    @endauth
                @endauth
                    
                </ul>
            </div>
        </div>
        <!-- Left Sidebar End-->
    </div>
</div>
