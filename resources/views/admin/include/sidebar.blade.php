<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
      
        <!-- Light Logo-->
        <a href="{{ url('/') }}" class="logo logo-light">
            <span class="logo-sm" style="background: #fff;padding: 18px 12px;">
                <img src="{{ URL::asset('public/assets/images/logo-sm.png')}}" alt="" height="45">
            </span>
            <span class="logo-lg" style="background: #fff;padding: 18px 12px;">
                <img src="{{ URL::asset('public/assets/images/logo-light.png')}}" alt="" height="45">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
@php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path=explode('/', $actual_link);
$page_name=$path[4];
@endphp
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu {{$page_name}}</span></li>
                <li class="nav-item">
                    <a class="nav-link {{$page_name=='dashboard'?'active':''}}" href="{{ url('/admin/dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='banner'?'active':''}}" href="{{ url('/admin/banner') }}">
                        <i class="fa fa-file-image-o" aria-hidden="true"></i> <span data-key="t-dashboards">Banner</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='category'?'active':''}}" href="{{ url('/admin/category') }}">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i> <span data-key="t-dashboards">Category</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='subcategory'?'active':''}}" href="{{ url('/admin/subcategory') }}">
                       <i class="fa fa-file-text-o" aria-hidden="true"></i> <span data-key="t-dashboards">Subcategory</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='package'?'active':''}}" href="{{ url('/admin/package') }}">
                        <i class="fa fa-diamond" aria-hidden="true"></i> <span data-key="t-dashboards">Package</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{$page_name=='ads'?'active':''}}" href="{{ url('/admin/ads') }}">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i> <span data-key="t-dashboards">Ads</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{$page_name=='report-ads'?'active':''}}" href="{{ url('/admin/report-ads') }}">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <span data-key="t-dashboards">Report Ads</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='city'?'active':''}}" href="{{ url('/admin/city') }}">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> <span data-key="t-dashboards">City</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='users'?'active':''}}" href="{{ url('/admin/users') }}">
                        <i class="fa fa-users" aria-hidden="true"></i> <span data-key="t-dashboards">Users</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='testimonial'?'active':''}}" href="{{ url('/admin/testimonial') }}">
                        <i class="fa fa-commenting" aria-hidden="true"></i> <span data-key="t-dashboards">Testimonial</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='contacts'?'active':''}}" href="{{ url('/admin/contacts') }}">
                        <i class="fa fa-comments-o" aria-hidden="true"></i> <span data-key="t-dashboards">Contacts</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='faq'?'active':''}}" href="{{ url('/admin/faq') }}">
                        <i class="fa fa-rss" aria-hidden="true"></i> <span data-key="t-dashboards">FAQ</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='admin_logout'?'active':''}}" href="{{ url('/admin/admin_logout') }}">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> <span data-key="t-dashboards">Logout</span>
                    </a>
                </li> 

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="apps-calendar.html" class="nav-link" data-key="t-calendar"> Calendar </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat.html" class="nav-link" data-key="t-chat"> Chat </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Email
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEmail">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-mailbox.html" class="nav-link" data-key="t-mailbox"> Mailbox </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebaremailTemplates" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebaremailTemplates">
                                                <span data-key="t-email-templates">Email Templates</span> <span class="badge badge-pill bg-danger" data-key="t-new">New</span>
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebaremailTemplates">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="apps-email-basic.html" class="nav-link" data-key="t-basic-action"> Basic Action </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="apps-email-ecommerce.html" class="nav-link" data-key="t-ecommerce-action"> Ecommerce Action </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEcommerce" data-key="t-ecommerce">
                                    Ecommerce
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEcommerce">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-products.html" class="nav-link" data-key="t-products"> Products </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-product-details.html" class="nav-link" data-key="t-product-Details"> Product Details </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-add-product.html" class="nav-link" data-key="t-create-product"> Create Product </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-orders.html" class="nav-link" data-key="t-orders">
                                                Orders </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-order-details.html" class="nav-link" data-key="t-order-details"> Order Details </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-customers.html" class="nav-link" data-key="t-customers"> Customers </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-cart.html" class="nav-link" data-key="t-shopping-cart"> Shopping Cart </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-checkout.html" class="nav-link" data-key="t-checkout"> Checkout </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-sellers.html" class="nav-link" data-key="t-sellers">
                                                Sellers </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-seller-details.html" class="nav-link" data-key="t-sellers-details"> Seller Details </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProjects" data-key="t-projects">
                                    Projects
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProjects">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-projects-list.html" class="nav-link" data-key="t-list"> List
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-overview.html" class="nav-link" data-key="t-overview"> Overview </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-create.html" class="nav-link" data-key="t-create-project"> Create Project </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTasks" data-key="t-tasks"> Tasks
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTasks">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tasks-kanban.html" class="nav-link" data-key="t-kanbanboard">
                                                Kanban Board </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-list-view.html" class="nav-link" data-key="t-list-view">
                                                List View </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-details.html" class="nav-link" data-key="t-task-details"> Task Details </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCRM" data-key="t-crm"> CRM
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCRM">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crm-contacts.html" class="nav-link" data-key="t-contacts">
                                                Contacts </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-companies.html" class="nav-link" data-key="t-companies">
                                                Companies </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-deals.html" class="nav-link" data-key="t-deals"> Deals
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-leads.html" class="nav-link" data-key="t-leads"> Leads
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrypto" data-key="t-crypto"> Crypto
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCrypto">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crypto-transactions.html" class="nav-link" data-key="t-transactions"> Transactions </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-buy-sell.html" class="nav-link" data-key="t-buy-sell">
                                                Buy & Sell </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-orders.html" class="nav-link" data-key="t-orders">
                                                Orders </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-wallet.html" class="nav-link" data-key="t-my-wallet">
                                                My Wallet </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-ico.html" class="nav-link" data-key="t-ico-list"> ICO
                                                List </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-kyc.html" class="nav-link" data-key="t-kyc-application"> KYC Application </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoices" data-key="t-invoices">
                                    Invoices
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarInvoices">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-invoices-list.html" class="nav-link" data-key="t-list-view">
                                                List View </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-details.html" class="nav-link" data-key="t-details">
                                                Details </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-create.html" class="nav-link" data-key="t-create-invoice"> Create Invoice </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTickets" data-key="t-supprt-tickets">
                                    Support Tickets
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTickets">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tickets-list.html" class="nav-link" data-key="t-list-view">
                                                List View </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tickets-details.html" class="nav-link" data-key="t-ticket-details"> Ticket Details </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarnft" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarnft">
                                    <span data-key="t-nft-marketplace">NFT Marketplace</span> <span class="badge badge-pill bg-danger" data-key="t-new">New</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarnft">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-nft-marketplace.html" class="nav-link" data-key="t-marketplace"> Marketplace </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-explore.html" class="nav-link" data-key="t-explore-now"> Explore Now </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-auction.html" class="nav-link" data-key="t-live-auction"> Live Auction </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-item-details.html" class="nav-link" data-key="t-item-details"> Item Details </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-collections.html" class="nav-link" data-key="t-collections"> Collections </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-creators.html" class="nav-link" data-key="t-creators"> Creators </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-ranking.html" class="nav-link" data-key="t-ranking"> Ranking </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-wallet.html" class="nav-link" data-key="t-wallet-connect"> Wallet Connect </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-create.html" class="nav-link" data-key="t-create-nft"> Create NFT </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>