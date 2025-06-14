<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ url('/') }}"><img src="/assets/images/logo.svg" alt="Project" /></a>
        <a class="sidebar-brand brand-logo-mini" href="{{ url('/') }}"><img src="/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>

    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="{{ asset('/') }}" alt="Profile">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                        <span>Student</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="{{ route('dashboard') }}" class="dropdown-item preview-item">
                        <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-settings text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account Settings</p>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-onepassword text-info"></i>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-calendar-today text-success"></i>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do List</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        {{-- View & Apply Scholarships --}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('scholarships') }}">
                <span class="menu-icon"><i class="mdi mdi-file-document-box-check"></i></span>
                <span class="menu-title">Available Scholarships</span>
            </a>
        </li>

        {{-- My Applications --}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('application') }}">
                <span class="menu-icon"><i class="mdi mdi-file-document-box-check"></i></span>
                <span class="menu-title">My Applications</span>
            </a>
        </li>

        <!-- {{-- Messages --}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('message') }}">
                <span class="menu-icon"><i class="mdi mdi-message"></i></span>
                <span class="menu-title">Messages</span>
            </a>
        </li> -->

        {{-- Edit Profile (optional) --}}
        
    </ul>
</nav>
