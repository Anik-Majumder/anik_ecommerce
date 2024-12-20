<div class="vertical-menu">
    <div class="h-100">
        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img
                    src="assets/images/users/avatar-2.jpg"
                    alt=""
                    class="avatar-md mx-auto rounded-circle"
                />
            </div>

            <div class="mt-3">
                <a href="#" class="text-body fw-medium font-size-16"
                    >Anik Majumder</a
                >
                <p class="text-muted mt-1 mb-0 font-size-13">WEB DEVELOPER</p>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a
                        href="javascript: void(0);"
                        class="has-arrow waves-effect"
                    >
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ url('/admins') }}">
                                <span>Admins</span>
                            </a>
                            <a href="{{ url('/brands') }}">
                                <span>Brands</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
