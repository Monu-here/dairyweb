<div id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">DAIRY ADMIN</a>
        </div>
        <ul class="sidebar-nav">

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <strong>WELCOME, <span style="text-transform:uppercase;">{{Auth::user()->name}}!!</span></strong>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i>
                </i>
                    Settings
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i>
                            Home Page</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.settings.aboutpage')}}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i>
                            About Page</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.settings.contactpage')}}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i>Contact</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i>Footer</a>
                    </li>

                </ul>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.blogs.index')}}" class="sidebar-link">
                    <i class="fa fa-edit"></i>
                    Blogs
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.products.index')}}" class="sidebar-link">
                    <i class="fa fa-th-large" aria-hidden="true"></i>

                    Products
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.messages.index')}}" class="sidebar-link">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    Messages
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.testimonials.index')}}" class="sidebar-link">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    Testimonials
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('logout') }}" class="sidebar-link">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Log Out
                </a>
            </li>
        </ul>
    </div>
</div>
