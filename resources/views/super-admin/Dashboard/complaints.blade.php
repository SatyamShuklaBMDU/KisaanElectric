<!-- headr-file-start -->
<style>
   .notification-form {
   padding: 40px;
   margin: 40px 0px 40px 0px;
   }
   button#status a {
    color: black;
    text-transform: capitalize;
}
</style>

@include('header.header')
<!-- headr-file-start -->
<div class="content-wrapper">
   <!-- Container-fluid starts -->
   <!-- Main content starts -->
   <div class="container-fluid">
      <div class="row">
         <div class="main-header">
            <h4>Complaints </h4>
         </div>
      </div>
      <!-- 4-blocks row start -->
      <div class="row dashboard-header" style="background: #e5e5e5;">
         <div class="col-md-11  mx-auto">
            <!--end form-->



            <!--  ************start table ***********-->
               <table class="table table-striped">
    <thead>





      <tr>
        <th>Sr. No.</th>
        <th>Suject</th>
        <th>Message</th>
         <th>Image</th>
          <th  class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        
        @if ($feedback->count() == 0)
        <tr>
            <td colspan="5" style="text-align: center">Nothing Found</td>
          </tr>
        @else



@php
$i=1;
@endphp
        @foreach ($feedback as $feedback)

        <tr>
            <td>{{$i}}</td>
            <td>{{$feedback->Subject}}</td>
            <td>{{$feedback->Message}}</td>
            <td> <a href="{{ asset('storage/images/'.$feedback->image) }}"><img  style="
                height: auto;
                width: 250px;" src="{{ asset('storage/images/'.$feedback->image) }}"></a></td>
        <td class="text-center">
                           <button class="btn btn-secondary  btn-warning" type="button" id="status">
                         <a href="{{url('/status/'.$feedback->id)}}"> Status</a>
                           </button>
                        </td>
      </tr>
      
@php
$i++;
@endphp
      @endforeach


      @endif
    </tbody>
  </table>
            <!--*************** end table*****************-->
         </div>
      </div>
      <!-- 4-blocks row end -->
   </div>
   <!-- Main content ends -->
   <!-- Container-fluid ends -->
</div>
</div>
<style>
   /* CSS to style the toolbar and menu */
   .toolbar {
   display: flex;
   justify-content: flex-end;
   }
   .menu {
   position: relative;
   }
   .menu button {
   border: none;
   cursor: pointer;
   transform: rotate(90deg);
   background: none !important;
   color: #063b6a !important;
   font-size: 22px;
   }
   .menu-options {
   display: none;
   position: absolute;
   background-color: white;
   box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
   }
   ul.menu-options li {
   padding: 5px 10px;
   background: #063b6a;
   z-index: 1;
   color: white;
   }
   .menu:hover .menu-options {
   display: block;
   }
</style>
<script>
   import React, { useState } from 'react';

   const Toolbar = () => {
   const [isMenuOpen, setIsMenuOpen] = useState(false);

   const toggleMenu = () => {
       setIsMenuOpen(!isMenuOpen);
   };

   return (
       <div className="toolbar">
           {/* Toolbar items */}
           <button>Item 1</button>
           <button>Item 2</button>
           {/* Three dots menu */}
           <div className="menu">
               <button onClick={toggleMenu}>...</button>
               {/* Menu options */}
               {isMenuOpen && (
                   <ul className="menu-options">
                       <li>Option 1</li>
                       <li>Option 2</li>
                       <li>Option 3</li>
                   </ul>
               )}
           </div>
       </div>
   );
   };

   export default Toolbar;

</script>
<!-- footer-file-start -->
@include('footer.footer')
<!-- footer-file-start -->
