<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Kissan Electric</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
     	<link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
	<link rel="icon" href="assets/images/fav.png" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
      <!-- themify -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- iconfont -->
      <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
      <!-- simple line icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/simple-line-icons/css/simple-line-icons.css">
      <!-- Datepicker -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- Chartlist chart css -->
      <link rel="stylesheet" href="assets/plugins/chartist/dist/chartist.css" type="text/css" media="all">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
         integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Weather css -->
      <link href="assets/css/svg-weather.css" rel="stylesheet">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/main.css">
      <!-- Responsive.css-->
      <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
      <style>
         
        .main-header-top, .main-header-top > .navbar {background-color: #e3000f;}
        .sidebar-menu > li.active > a {background: #02345f;}
      </style>
   </head>
   <body class="sidebar-mini fixed">
      <div class="loader-bg">
         <div class="loader-bar">
         </div>
      </div>
      <div class="wrapper">
         <!-- Navbar-->
         <header class="main-header-top hidden-print">
            <a href="/" class="logo"><img class="img-fluid able-logo" src="assets/images/kishan-logo.png"
               alt="Theme-logo"></a>
            <nav class="navbar navbar-static-top">
               <!-- Sidebar toggle button-->
               <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
               <ul class="top-nav lft-nav">
                  <li class="dropdown pc-rheader-submenu message-notification search-toggle">
                     <a href="#!" id="morphsearch-search" class="drop icon-circle txt-white">
                     <i class="ti-search"></i>
                     </a>
                  </li>
               </ul>
               <!-- Navbar Right Menu-->
               <ul class="top-nav top-nav-icon ">
                 <!-- window screen -->
                  <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                     <i class="icon-size-fullscreen"></i>
                     </a>
                  </li>
                  <!-- User Menu-->
                  <li class="dropdown">
                     <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                        class="dropdown-toggle drop icon-circle drop-image">
                     <span><img class="img-circle " src="assets/images/avatar-1.png" style="width:40px;"
                        alt="User Image"></span>
                     <span><b>Kissan</b> Electric <i class=" icofont icofont-simple-down"></i></span>
                     </a>
                     <ul class="dropdown-menu settings-menu">
                       
                        <li class="p-0">
                           <div class="dropdown-divider m-0"></div>
                        </li>
                        <li><a href="forgot-password.php"><i class="icon-lock"></i>Forget Password</a></li>
                        <li><a href="logout.php"><i class="icon-logout"></i> Logout</a></li>
                     </ul>
                  </li>
               </ul>
               <!-- search -->
               <div id="morphsearch" class="morphsearch">
                  <form class="morphsearch-form">
                     <input class="morphsearch-input" type="search" placeholder="Search..." />
                     <button class="morphsearch-submit" type="submit">Search</button>
                  </form>
                  <div class="morphsearch-content">
                     <div class="dummy-column">
                        <h2>People</h2>
                        <a class="dummy-media-object" href="#!">
                           <img class="round"
                              src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G"
                              alt="Sara Soueidan" />
                           <h3>Sara Soueidan</h3>
                        </a>
                        <a class="dummy-media-object" href="#!">
                           <img class="round"
                              src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G"
                              alt="Shaun Dona" />
                           <h3>Shaun Dona</h3>
                        </a>
                     </div>
                     <div class="dummy-column">
                        <h2>Popular</h2>
                        <a class="dummy-media-object" href="#!">
                           <img src="assets/images/avatar-1.png" alt="PagePreloadingEffect" />
                           <h3>Page Preloading Effect</h3>
                        </a>
                        <a class="dummy-media-object" href="#!">
                           <img src="assets/images/avatar-1.png" alt="DraggableDualViewSlideshow" />
                           <h3>Draggable Dual-View Slideshow</h3>
                        </a>
                     </div>
                     <div class="dummy-column">
                        <h2>Recent</h2>
                        <a class="dummy-media-object" href="#!">
                           <img src="assets/images/avatar-1.png" alt="TooltipStylesInspiration" />
                           <h3>Tooltip Styles Inspiration</h3>
                        </a>
                        <a class="dummy-media-object" href="#!">
                           <img src="assets/images/avatar-1.png" alt="NotificationStyles" />
                           <h3>Notification Styles Inspiration</h3>
                        </a>
                     </div>
                  </div>
                  <!-- /morphsearch-content -->
                  <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
               </div>
               <!-- search end -->
      </div>
      </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print ">
         <section class="sidebar" id="sidebar-scroll">
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
               <li class="active treeview">
                  <a class="waves-effect waves-dark" href="index.php">
                  <i class="fa-solid fa-house"></i></i><span>Dashboard</span>
                  </a>
               </li>
              
             
                <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                  <i class="fa-solid fa-users"></i><span>Active Users </span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/electrican-all-user') }}"><i class="icon-arrow-right"></i>Electrican</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/dealer-all-user') }}"><i class="icon-arrow-right"></i> Dealer</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/partner-all-user') }}"><i class="icon-arrow-right"></i> Partner</a></li>
                  </ul>
               </li>
                 <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                  <i class="fa-solid fa-user"></i><span> User Status</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                      <li><a class="waves-effect waves-dark" href="panding-user-status.php"><i class="icon-arrow-right"></i>All User</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/panding-user-status') }}"><i class="icon-arrow-right"></i>Pending</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/approved-user-status') }}"><i class="icon-arrow-right"></i> Approved</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('suspended-user-status') }}"><i class="icon-arrow-right"></i> Suspended</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/block-user-status') }}"><i class="icon-arrow-right"></i>Block</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                  <i class="fa-solid fa-id-card"></i><span>User Profile</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/electrican-user-profile') }}"><i class="icon-arrow-right"></i>Electrican</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/dealer-user-profile') }}"><i class="icon-arrow-right"></i> Dealer</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/partner-user-profile') }}"><i class="icon-arrow-right"></i> Partner</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                  <i class="fa-solid fa-cart-shopping"></i><span>My Product</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/Series-product') }}"><i class="icon-arrow-right"></i>Series</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/categories-product') }}"><i class="icon-arrow-right"></i> Categories</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/all-product') }}"><i class="icon-arrow-right"></i> All Product</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                  <i class="fa-solid fa-truck-monster"></i><span>Scheme / Offer</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/scheme') }}"><i class="icon-arrow-right"></i> Scheme</a></li>
                      <li><a class="waves-effect waves-dark" href="{{ url('/offer') }}"><i class="icon-arrow-right"></i>Offer</a></li>
                     
                  </ul>
               </li>
               
                <li class="treeview">
                  <a class="waves-effect waves-dark" href="qrcode.php">
                  <i class="fa fa-qrcode" aria-hidden="true"></i><span>QR Code</span></a>
                 
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                  <i class="fa fa-history" aria-hidden="true"></i><span>History</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/point-history') }}"><i class="icon-arrow-right"></i>Point History</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/transaction-history') }}"><i class="icon-arrow-right"></i> Transaction History</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/order-history') }}"><i class="icon-arrow-right"></i> Order History</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/scheme-history') }}"><i class="icon-arrow-right"></i>Scheme History</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/offer-history') }}"><i class="icon-arrow-right"></i>Offers History</a></li>
                  
                  </ul>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                  <i class="fab fa-first-order"></i><span>Order</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/dealer-order') }}"><i class="icon-arrow-right"></i>Delear Order</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                  <i class="fa-solid fa-ranking-star"></i><span>Ranking</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/electrican-ranking') }}"><i class="icon-arrow-right"></i>Electrican Ranking</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/transaction-ranking') }}"><i class="icon-arrow-right"></i> Transaction Ranking</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/partner-ranking') }}"><i class="icon-arrow-right"></i> Partner Ranking</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                  <i class="fa-solid fa-money-bill"></i><span>Cash Transaction</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/pending-transaction') }}"><i class="icon-arrow-right"></i>Pending Transaction</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/success-transaction') }}"><i class="icon-arrow-right"></i> Success Transaction</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/failed-transaction') }}"><i class="icon-arrow-right"></i> Failed Transaction</a></li>
                      <li><a class="waves-effect waves-dark" href="{{ url('/point-amount') }}"><i class="icon-arrow-right"></i>Add Point Amount</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/tds-transaction') }}"><i class="icon-arrow-right"></i>TDS</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                  <i class="fas fa-shipping-fast"></i><span>Scheme Deliver</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/pending-scheme-deliver') }}"><i class="icon-arrow-right"></i>Pending</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/success-scheme-deliver') }}"><i class="icon-arrow-right"></i> Success</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/failed-scheme-deliver') }}"><i class="icon-arrow-right"></i> Failed</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="{{ url('/notification') }}">
                  <i class="ti-bell" ></i></i><span>Notification</span>
                  </a>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="{{ url('/catalog') }}">
                  <i class="fa-solid fa-book"></i><span>Catalog</span>
                  </a>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="#!">
                 <i class="fa fa-file" aria-hidden="true"></i><span>Manage Page</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/privacy-policy') }}"><i class="icon-arrow-right"></i>Privacy Policy</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/terms-and-conditions') }}"><i class="icon-arrow-right"></i>Terms & Conditions</a></li>
                  </ul>
               </li>
               
               
                 <li class="treeview">
                  <a class="waves-effect waves-dark" href="/">
                  <i class="fa fa-users" aria-hidden="true"></i><span>Manage Admins</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('/manage-admin') }}"><i class="icon-arrow-right"></i>Add Users</a></li>
                     <li><a class="waves-effect waves-dark" href="{{ url('/all-users') }}"><i class="icon-arrow-right"></i>All Users</a></li>
                  </ul>
               </li>
              
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="{{ url('/feedback') }}">
                  <i class="fa fa-comments" aria-hidden="true"></i><span>Feedback</span>
                  </a>
               </li>
               
                 <li class="treeview">
                  <a class="waves-effect waves-dark" href="{{ url('/complaints') }}">
                  <i class="fa fa-comments" aria-hidden="true"></i><span>
                       Complaints</span>
                  </a>
               </li>
               
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="logout.php">
                  <i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span>
                  </a>
               </li>
            </ul>
         </section>
      </aside>
      <div class="showChat_inner">
         <div class="media chat-inner-header">
            <a class="back_chatBox">
            <i class="icofont icofont-rounded-left"></i> Josephin Doe
            </a>
         </div>
         <div class="media chat-messages">
            <a class="media-left photo-table" href="#!">
               <img class="media-object img-circle m-t-5" src="assets/images/avatar-1.png" alt="Generic placeholder image">
               <div class="live-status bg-success"></div>
            </a>
            <div class="media-body chat-menu-content">
               <div class="">
                  <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                  <p class="chat-time">8:20 a.m.</p>
               </div>
            </div>
         </div>
         <div class="media chat-messages">
            <div class="media-body chat-menu-reply">
               <div class="">
                  <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                  <p class="chat-time">8:20 a.m.</p>
               </div>
            </div>
            <div class="media-right photo-table">
               <a href="#!">
                  <img class="media-object img-circle m-t-5" src="assets/images/avatar-2.png"
                     alt="Generic placeholder image">
                  <div class="live-status bg-success"></div>
               </a>
            </div>
         </div>
         <div class="media chat-reply-box">
            <div class="md-input-wrapper">
               <input type="text" class="md-form-control" id="inputEmail" name="inputEmail">
               <label>Share your thoughts</label>
               <span class="highlight"></span>
               <span class="bar"></span> <button type="button" class="chat-send waves-effect waves-light">
               <i class="icofont icofont-location-arrow f-20 "></i>
               </button>
               <button type="button" class="chat-send waves-effect waves-light">
               <i class="icofont icofont-location-arrow f-20 "></i>
               </button>
            </div>
         </div>
      </div>
      <!-- Sidebar chat end-->
      </div>
      
<script>
    // JavaScript to activate the menu based on the URL
document.addEventListener("DOMContentLoaded", function () {
  var currentURL = window.location.href;
  var sidebarLinks = document.querySelectorAll(".sidebar-menu a");

  for (var i = 0; i < sidebarLinks.length; i++) {
    var link = sidebarLinks[i];

    if (link.href === currentURL) {
      // Add the "active" class to the link and its parent list item
      link.classList.add("active");
      link.parentElement.classList.add("active");
      
      // If you want to expand any parent treeviews, you can add this code
      var parentTreeview = link.closest(".treeview");
      if (parentTreeview) {
        parentTreeview.classList.add("active");
      }
    }
  }
});

</script>
      
      