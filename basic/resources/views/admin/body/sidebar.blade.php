 <div class="vertical-menu" style="background-color: #defae8cf;">

     <div data-simplebar class="h-100">

         <!-- User details -->


         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">


                 <li>
                     <a href="{{route('dashboard')}}" class="waves-effect">
                         <i class="ri-dashboard-line"></i>Dashboard</span>
                     </a>
                 </li>


                 <li style="color:#fff">
                     <a href="javascript: void(0);" class="has-arrow waves-effect" style="">
                         <i class="ri-admin-line"></i>
                         <span>Manage Admin</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('admin.all')}}">All Admins</a></li>

                     </ul>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class=" ri-user-add-line"></i>
                         <span>Manage Customer</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('customer.all')}}">All Customer</a></li>

                     </ul>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('customer.credit')}}">Credit Customer</a></li>

                     </ul>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('customer.paid')}}">Paid Customer</a></li>

                     </ul>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('customer.report')}}">Customer Wise Report</a></li>

                     </ul>

                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class=" ri-contacts-line"></i>
                         <span>Manage Suppliers</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('supplier.all')}}">All Suppliers</a></li>

                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class=" ri-honor-of-kings-line"></i>
                         <span>Manage Category</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('category.all')}}">All Category</a></li>

                     </ul>
                 </li>


                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-product-hunt-line"></i>
                         <span>Manage Product</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('product.all')}}">All Product</a></li>

                     </ul>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class=" ri-honour-line"></i>
                         <span>Manage Unit</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('unit.all')}}">All Unit</a></li>

                     </ul>
                 </li>


                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class=" ri-shopping-bag-line"></i>
                         <span>Manage Purchase</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('purchase.all')}}">All Purchase</a></li>

                     </ul>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('purchase.pending')}}">Approval</a></li>

                     </ul>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('daily.purchase.report')}}">Purchase Report</a></li>

                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class=" ri-order-play-fill"></i>
                         <span>Manage invoice</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('invoice.all')}}">All Invoice</a></li>

                     </ul>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('invoice.pending')}}">Approval Invoice</a></li>

                     </ul>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('dailyinvoice.report')}}">Invoice Report</a></li>

                     </ul>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('invoice.print')}}">Print Invoice</a></li>

                     </ul>
                 </li>


                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-archive-line"></i>
                         <span>Manage Stock</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('stock.report')}}">Stock Report</a></li>

                     </ul>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{route('product.stock.report')}}">Product Wise Report</a></li>

                     </ul>

                 </li>
                 <!-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Layouts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                            <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                            <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                            <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                            <li><a href="layouts-preloader.html">Preloader</a></li>
                                            <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                            <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                                            <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                                            <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                                            <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->

                 <!-- <li class="menu-title">Pages</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Authentication</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="auth-login.html">Login</a></li>
                                    <li><a href="auth-register.html">Register</a></li>
                                    <li><a href="auth-recoverpw.html">Recover Password</a></li>
                                    <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-profile-line"></i>
                                    <span>Utility</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html">Starter Page</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li> -->






             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>