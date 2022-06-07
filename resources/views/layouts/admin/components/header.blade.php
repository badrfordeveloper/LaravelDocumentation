<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
               {{-- <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
                        <div class="bookmark-input search-input">
                            <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                            <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
                            <ul class="search-list search-list-bookmark"></ul>
                        </div>
                    </li>
                </ul> --}}
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-language"><a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-fr"></i><span class="selected-language">{{__('French') }}</span></a>
                </li>
                <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" id="show-all-notifications" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up"></span></a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto">{{ __('Notifications') }}</h4>
                                <div class="badge rounded-pill badge-light-primary">0</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list" id="results">
                            <!-- Content Notification -->
                        </li>
                        <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">{{ __('Read all notifications') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder mb-0">Admin</span></div><span class="avatar"><img class="round" src="../../../app-assets/images/portrait/small/default-avatar.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">


                        <a class="dropdown-item" href="#"><i class="me-50" data-feather="settings"></i> {{ __('Settings') }}</a>
                        <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="me-50" data-feather="power"></i> {{ucfirst(__('Logout'))}}</a>
                        <form id="logout-form" action="" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>
            </ul>
        </div>
    </nav>
