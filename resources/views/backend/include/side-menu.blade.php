<div class="vertical-menu">
    <div class="h-100">
        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img
                    src="{{ asset('assets') }}/images/users/avatar-2.jpg"
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

{{--                <li>--}}
{{--                    <a--}}
{{--                        href="javascript: void(0);"--}}
{{--                        class="has-arrow waves-effect"--}}
{{--                    >--}}
{{--                        <i class="mdi mdi-account-circle-outline"></i>--}}
{{--                        <span>Pages</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        --}}
{{--                    </ul>--}}
{{--                </li>--}}

                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="">
                        <i class="mdi mdi-view-dashboard-variant"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.index') }}"
                       class="">
                        <i class="mdi mdi-account-star"></i>
                        <span>Admins</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="mdi mdi-account"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('brand.index') }}">
                        <i class="mdi mdi-home-floor-b"></i>
                        <span>Brands</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}">
                        <i class="mdi mdi-shape"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subcategory.index') }}">
                        <i class="mdi mdi-shape-plus"></i>
                        <span>Sub Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product.index') }}">
                        <i class="mdi mdi-package-variant-closed"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('basicinfos.index') }}">
                        <i class="mdi mdi-information"></i>
                        <span>Basic Infos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('banner.index') }}">
                        <i class="mdi mdi-page-layout-header-footer"></i>
                        <span>Banners</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('slider.index') }}">
                        <i class="mdi mdi-page-layout-body"></i>
                        <span>Sliders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('size.index') }}">
                        <i class="mdi mdi-format-size"></i>
                        <span>Sizes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('color.index') }}">
                        <i class="mdi mdi-palette"></i>
                        <span>Colors</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.index') }}">
                        <i class="mdi mdi-account-cash-outline"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}">
                        <i class="mdi mdi-post-outline"></i>
                        <span>Blogs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blogcomment.index') }}">
                        <i class="mdi mdi-comment-account-outline"></i>
                        <span>Blog Comment</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
