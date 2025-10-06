<header class="header bg-primary text-white shadow">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5 col-6">
                <div class="header-left d-flex align-items-center">
                    <div class="menu-toggle-btn mr-15">
                        <button id="menu-toggle" class="main-btn btn-light btn-hover text-primary">
                            <i class="lni lni-menu me-2"></i> Menu
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
                <div class="header-right d-flex justify-content-end align-items-center">
                    <div class="notification-box mx-3">
                        <a href="#" class="notification-icon text-white">
                            <i class="lni lni-bell"></i>
                        </a>
                    </div>
                    
                    <div class="profile-box ml-15 dropdown">
                        <button class="dropdown-toggle bg-transparent border-0 text-white d-flex align-items-center" type="button" id="profile"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-info text-end d-none d-md-block">
                                <h6 class="fw-600 mb-0 text-white">{{ Auth::user()->name }}</h6>
                                <p class="mb-0 text-light small">{{ Auth::user()->email }}</p>
                            </div>
                            <i class="lni lni-user ms-md-2" style="font-size: 24px;"></i>
                        </button>
                        {{-- <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                            <li><a class="dropdown-item" href="#"><i class="lni lni-user"></i> View Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="lni lni-cog"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="lni lni-exit"></i> Sign Out
                                    </button>
                                </form>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>