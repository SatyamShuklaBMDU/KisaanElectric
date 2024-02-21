@include('header.header')

@extends('layouts.app')

@section('content')
   <div class="content-wrapper">
      <!-- Container-fluid starts -->
      <!-- Main content starts -->
      <div class="container-fluid bg-light">
         <div class="row">
            <div class="main-header">
               <h4>Dashboard</h4>
            </div>
         </div>
         <!-- 4-blocks row start -->
         <div class="row dashboard-header">
            <div class="col-lg-2 col-md-6">
               <div class="card dashboard-product">
                  <span>Pending Users</span>
                  <h2 class="dashboard-total-products">4500</h2>
                  <div class="side-box">
                     <i class="fa-solid fa-users text-warning-color"></i>
                  </div>
               </div>
            </div>
            
            <div class="col-lg-2 col-md-6">
               <div class="card dashboard-product">
                  <span>Order Status</span>
                  <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                  <div class="side-box">
                     <i class="fa-solid fa-id-card text-success-color"></i>
                  </div>
               </div>
            </div>
            <div class="col-lg-2 col-md-6">
               <div class="card dashboard-product">
                  <span>User Profile No.</span>
                  <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                  <div class="side-box">
                     <i class="fa-solid fa-cart-shopping text-success-color"></i>
                  </div>
               </div>
            </div>
         
         

         <!-- 5-blocks row start -->
         
            <div class="col-lg-2 col-md-6">
               <div class="card dashboard-product">
                  <span>Order</span>
                  <h2 class="dashboard-total-products">37,500</h2>
                  <div class="side-box ">
                     <i class="fab fa-first-order text-primary-color"></i>
                  </div>
               </div>
            </div>
            <div class="col-lg-2 col-md-6">
               <div class="card dashboard-product">
                  <span>Ranking</span>
                  <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                  <div class="side-box">
                     <i class="fa-solid fa-ranking-star text-success-color"></i>
                  </div>
               </div>
            </div>
            <div class="col-lg-2 col-md-6">
               <div class="card dashboard-product">
                  <span>Cash Transaction</span>
                  <h2 class="dashboard-total-products">4500</h2>
                  <div class="side-box">
                     <i class="fa-solid fa-money-bill text-warning-color"></i>
                  </div>
               </div>
            </div>
            <div class="col-lg-2 col-md-6">
               <div class="card dashboard-product">
                  <span>Scheme Deliver</span>
                  <h2 class="dashboard-total-products">37,500</h2>
                  <div class="side-box ">
                     <i class="fas fa-shipping-fast text-primary-color"></i>
                  </div>
               </div>
            </div>
         
         <!-- 5-blocks row end -->

         
            
            <div class="col-lg-3 col-md-6">
               <div class="card dashboard-product">
                  <span>Feedback & Complaints</span>
                  <h2 class="dashboard-total-products">37,500</h2>
                  <div class="side-box ">
                     <i class="fa fa-comments text-primary-color"></i>
                  </div>
               </div>
            </div>
         </div>
         <!-- 6-blocks row end -->
      </div>
      <!-- Main content ends -->
      <!-- Container-fluid ends -->
   </div>
@endsection

@include('footer.footer')