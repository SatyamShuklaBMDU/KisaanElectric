<!-- headr-file-start -->

@include('header.header')
<!-- headr-file-start -->


<style>
    div#example1_filter label {
        float: right;
        margin-top: -21px;
    }

    div#example1_paginate {
        margin-top: -16px;
        float: right;
    }
    </style>




<div class="content-wrapper">
      <!-- Container-fluid starts -->

      <!-- Main content starts -->
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
               <div class="main-header">
                  <h4 class="text-dark">User Profile</h4>
                  <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                     <li class="breadcrumb-item">
                        <a href="index.html">
                           <i class="icofont icofont-home"></i>
                        </a>
                     </li>
                     <li class="breadcrumb-item "><a href="#" style="color: black;">User Profile</a>
                     </li>
                     <li class="breadcrumb-item"><a href="approved-user-status.html" style="color: rgb(2, 2, 78);">Dealer</a>
                     </li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- 4-blocks row start -->
         <div class="row dashboard-header">

            <div class="col-md-12">
               <div class="row-flex">
               <div class="row mt-3" >
                 <div class="col-md-12 boder-danger me-5 pe-5">
                    <div class="row mb" style="margin-bottom: 30px; width:175%;">
                        <div class="col-md-1">
                         <p class="text-dark"><b><strong>Filters:</strong></b></p>
                        </div>

                        <div class="col-sm-3 end-date">

                            <form action="{{url('/partner-user-profile/filter')}}" method="post">
                                @csrf
                            <p class="text-dark"><strong>Date From:</strong></p>
                            <div class="input-group date d-flex" id="">
                               <input type="date" class="form-control" required  format="yyyy-mm-dd" name="start" id="date" placeholder="dd-mm-yyyy"/>
                               {{-- <span class="input-group-append">
                               <span class="input-group-text bg-light d-block"> --}}
                               {{-- <i class="fa fa-calendar"></i> --}}
                               </span>
                               </span>
                            </div>
                         </div>
                         <div class="col-sm-3 end-date">
                            <p><strong class="text-dark">Date to:</strong></p>
                            <div class="input-group date d-flex" id="">
                               <input type="date" format="yyyy-mm-dd" required class="form-control" id="date" name="end" placeholder="dd-mm-yyyy"/>
                               <span class="input-group-append">
                               <span class="input-group-text bg-light d-block">
                               {{-- <i class="fa fa-calendar"></i> --}}
                               </span>
                               </span>
                            </div>
                         </div>
                         <div class="col-md-1 text-end" style="margin-left: 10px; margin-top:20px;">
                            <button class="btn " type="submit" >Filter</button>
                         </div>
                         <div class="col-md-1 " style="margin-left: -12px;  margin-top:20px;" >
                            <button class="btn " type="reset" >Reset</button>
                         </div>
                        </form>



                 </div>

               </div>
               </div>
               {{-- <div class="row pt-4">
                 <div class="col-md-7 ">
                     <div class="row">
                         <div class="col-md-4  text-center d-flex multiple-btn">
                           <button class="btn " type="submit" style="margin-left: 10px;">Copy</button>
                           <button class="btn " type="submit" style="margin-left: 10px;">CSV</button>
                           <button class="btn  " type="submit" style="margin-left: 10px;">Excel</button>
                           <button class="btn  " type="submit" style="margin-left: 10px;">PDF</button>
                           <button class="btn  " type="submit" style="margin-left: 10px;">Print</button>
                         </div>

                     </div>

                 </div>

                 <div class="col-md-3" >
                     <input class="form-control border-none me-2" type="search" placeholder="Search" aria-label="Search" >

                 </div>
                 <div class="col-md-2" style="margin-left: -25px; margin-top: 1.5px;">
                  <button class="btn " type="submit" >Search</button>

              </div>

               </div>
            </div>
 --}}

               <div class="row mt-3 px-4">
                 <div class="col">
                  <table id="example1" class="table table-striped border-radius shadow table-responsive-sm table-bordered" >
                     <thead>
                       <tr class="">
                         {{-- <th scope="col"><input type="checkbox" name="" id=""></th> --}}
                         <th scope="col">Sr.No.</th>
                         <th scope="col">Name</th>
                         <th scope="col">Registeres On.</th>
                         <th scope="col">Phone Number</th>
                         <th scope="col">Whatshap Number</th>
                         <th scope="col">Email</th>
                         <th scope="col">Address</th>
                         <th scope="col">Pin code</th>
                         <th scope="col">Country</th>
                         <th scope="col">City</th>
                         <th scope="col">State</th>
                         <th scope="col">Action</th>
                       </tr>
                     </thead>
                     <tbody>

                        @php
                            $i=1;
                        @endphp
                        @foreach ( $user as $user )


                       <tr>
                         {{-- <th scope="row"><input type="checkbox" name="" id=""></th> --}}
                         <td><b>{{$i}}</b></td>
                         <td >
                           {{$user->name}}
                         </td>
                         <td>{{$user->created_at->format('d-m-Y')}}</td>
                         <td>{{$user->mobile_no}} </td>
                             <td>{{$user->whatsapp_number}}</td>
                         <td class="col-2">
                         {{$user->email}}
                         </td>
                         <td class="col-2">{{$user->address}}</td>
                          <td>
                            {{$user->pincode}}
                          </td>
                          <td>{{$user->country}}</td>
                          <td>{{$user->city}}</td>
                          <td >{{$user->state}}</td>
                         <td>
                          <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Choose An Option
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{url('/user-profile/'.$user->id)}}">User Profile</a>
    <a class="dropdown-item" href="{{url('/point-history/'.$user->id)}}">Point History</a>
    <a class="dropdown-item" href="{{url('/transaction-history/'.$user->id)}}">Transaction Profile </a>

  </div>
</div>
                         </td>
                       </tr>
                       @php
                           $i++;
                       @endphp
                       @endforeach


                     </tbody>
                   </table>
                 </div>
               </div>
{{--
               <div class="row mt-5  px-3 pb-5">
                 <div class="col-md-7">
<div class="showing-numb" style="margin-top: 10px;">
   <p class="text-dark">Showing 1 to 10 of 57 entries</p>
</div>
                 </div>
                 <div class="col-md-5">
                  <nav aria-label="Page navigation example">
                     <ul class="pagination justify-content-end">
                       <li class="page-item disabled">
                         <a class="page-link">Previous</a>
                       </li>
                       <li class="page-item"><a class="page-link" href="#">1</a></li>
                       <li class="page-item"><a class="page-link" href="#">2</a></li>
                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                       <li class="page-item">
                         <a class="page-link" href="#">Next</a>
                       </li>
                     </ul>
                   </nav>
                 </div> --}}
               </div>

             </div>

         </div>
          <!-- 4-blocks row end -->







      </div>
      <!-- Main content ends -->
      <!-- Container-fluid ends -->

   </div>
   </div>



   <script src="https://code.jquery.com/jquery-3.7.0.js" ></script>

   <script src="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" ></script>
   {{-- https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css" ></script>

   <script src="https://cdn.datatables.net/1.13.7/css/dataTables.foundation.min.css" ></script>



   {{-- https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js --}}
          <!-- DataTables -->
   <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

   <!-- jQuery link  -->
   <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>




<!-- footer-file-start -->

@include('footer.footer')
<!-- footer-file-start -->

<script>

    // var $ = jQuery.noConflict();
        $(function() {
            // let table = new DataTable('#example1',{
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "ordering": true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,

            // });


        });
    </script>

