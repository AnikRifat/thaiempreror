<?php $admin = Auth::guard('admin')->user(); ?>
<div class="wrapper">
    <div class="sidebar" data-active-color="purple" data-background-color="black" data-image="/images/login.jpg">
        <div class="logo">
            <a href="/admin" class="simple-text">
                <?php echo e(config('app.name')); ?>

            </a>
        </div>
        <div class="logo logo-mini">
            <a href="admin" class="simple-text">
                <?php echo e(config('app.name')); ?>

            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="/images/<?php echo e(($admin->image)? 'profile/'.$admin->image : 'avatar.png'); ?>" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <?php echo e($admin->first_name. ' '. $admin->last_name); ?>

                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li><a href="/admin/profile">My Profile</a></li>
                            <li><a href="/admin/profile">Edit Profile</a></li>
                            <li><a href="/admin/logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="">
                    <a href="/admin">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" href="#tablesExamples">
                        <i class="material-icons">people</i>
                        <p>Customers
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="tablesExamples">
                        <ul class="nav">
                            <li><a href="/admin/create_customer">Add New Customer</a></li>
                            <li><a href="/admin/view_customers">View All Customers</a></li>
                            <li><a href="/admin/print_address" target="_blank">Print Postal Address</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#mapsExamples">
                        <i class="material-icons">shopping_cart</i>
                        <p>Orders
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="mapsExamples">
                        <ul class="nav">
                            <li><a href="/admin/choose_order_option">Create Order</a></li>
                            <li><a href="/admin/view_orders">View Orders</a></li>
                        </ul>
                    </div>
                </li>

                <?php if($admin->user_role == 'SUPER-ADMIN' || $admin->user_role == 'ADMIN'): ?>
                <li>
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">subject</i>
                        <p>Food Category
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li><a href="/admin/create_category">Add Food Category</a></li>
                            <li><a href="/admin/view_categories">View Food Category</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#PaymentMethod">
                        <i class="material-icons">subject</i>
                        <p>Food Sub-Category
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="PaymentMethod">
                        <ul class="nav">
                            <li><a href="/admin/create_sub_category">Add Food Sub-Category</a></li>
                            <li><a href="/admin/view_sub_categories">View Food Sub-Category</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#FoodItems">
                        <i class="material-icons">blur_on</i>
                        <p>Food Items
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="FoodItems">
                        <ul class="nav">
                            <li><a href="/admin/create_food_item">Add Food Item</a></li>
                            <li><a href="/admin/view_food_items">View Food Items</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#events">
                        <i class="material-icons">subject</i>
                        <p>Events
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="events">
                        <ul class="nav">
                            <li><a href="/admin/create_event">Add Event</a></li>
                            <li><a href="/admin/view_events">View Events</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#blogs">
                        <i class="material-icons">subject</i>
                        <p>blogs
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="blogs">
                        <ul class="nav">
                            <li><a href="/admin/create_blog">Add blog</a></li>
                            <li><a href="/admin/view_blogs">View blogs</a></li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>

                <?php if($admin->user_role == 'SUPER-ADMIN'): ?>
                <li>
                    <a data-toggle="collapse" href="#reports">
                        <i class="material-icons">report</i>
                        <p>Reports
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="reports">
                        <ul class="nav">
                            <li><a href="/admin/reports">View Reports</a></li>
                            <li><a href="/admin/order_reports">View Orders Reports</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#cmdAdmin">
                        <i class="material-icons">build</i>
                        <p>Settings
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="cmdAdmin">
                        <ul class="nav">

                            <li><a href="/admin/create_new_admin">Add New User</a></li>
                            <li><a href="/admin/show_admins">Show Users</a></li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>

    <!-- order allert -->
    <div class="allAlerts" id="allAlerts" onclick="this.style.display='none';" style="display:none">
        <div id="sub_alert"
          style="position: fixed; right: 5%; margin: 0px auto; z-index: 99999; top: 40%; border: 2px solid #f00; max-width: 400px; text-align: center; left: 5%; padding: 10px; background: #fff;color:#f00">
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/admin"> <?php echo e(config('app.name')); ?> Admin Panel</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/admin/logout" class="" title="Logout">
                                Logout <i class="material-icons">settings_power</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->make('partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>