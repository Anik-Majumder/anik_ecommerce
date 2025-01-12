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
                            <a href="{{ url('/users') }}">
                                <span>Users</span>
                            </a>
                            <a href="{{ url('/brands') }}">
                                <span>Brands</span>
                            </a>
                            <a href="{{ url('/basicinfos') }}">
                                <span>Basic Infos</span>
                            </a>
                            <a href="{{ url('/banners') }}">
                                <span>Banner</span>
                            </a>
                            <a href="{{ url('/sliders') }}">
                                <span>Sliders</span>
                            </a>
                            <a href="{{ url('/sizes') }}">
                                <span>Sizes</span>
                            </a>
                            <a href="{{ url('/colors') }}">
                                <span>Colors</span>
                            </a>
                            <a href="{{ url('/customers') }}">
                                <span>Customers</span>
                            </a>
                            <a href="{{ url('/blogs') }}">
                                <span>Blogs</span>
                            </a>
                            <a href="{{ url('/categories') }}">
                                <span>Categories</span>
                            </a>
                            <a href="{{ url('/subcategories') }}">
                                <span>Sub Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
