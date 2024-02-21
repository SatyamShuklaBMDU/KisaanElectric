<!-- headr-file-start -->

@include('header.header')
<style>
    select#format {background: #ffec07;}



div#example1_filter label {
    float: right;
    margin-top: -21px;
}

div#example1_paginate {
    margin-top: -16px;
    float: right;
}
</style>
<!-- headr-file-start -->
   <div class="content-wrapper">
      <!-- Container-fluid starts -->
      <!-- Main content starts -->
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
               <div class="main-header">
                  <h4 class="text-dark">Pending Users</h4>
                  <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                     <li class="breadcrumb-item">
                        <a href="index.html">
                           <i class="icofont icofont-home"></i>
                        </a>
                     </li>
                     <li class="breadcrumb-item "><a href="#" style="color: black;">User Status</a>
                     </li>
                     <li class="breadcrumb-item"><a href="panding-user-status.html" style="color: rgb(2, 2, 78);">Pending</a>
                     </li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- 4-blocks row start -->
         <div class="row dashboard-header">

            <div class="col-md-12">
               <div class="row mt-3" >
                 <div class="col-md-12 boder-danger me-5 pe-5">
                    <div class="row mb" style="margin-bottom: 30px; width:175%;">
                    <div class="col-md-1">
                     <p class="text-dark"><b><strong>Filters:</strong></b></p>
                    </div>

                    <div class="col-sm-3 end-date">

                        <form action="{{url('/panding-user-status/filter')}}" method="post">
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
{{--
               <div class="row pt-4">
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
 --}}


               <div class="row mt-3 px-4">
                 <div class="col">
                     <table id="example1" class="table responsive-table">
                         <thead>
                           <tr class="">
                             {{-- <th scope="col"><input type="checkbox" name="" id=""></th> --}}
                             <th scope="col">Sr.No.</th>
                             <th scope="col ">Registration Date</th>
                             <th scope="col ">profession</th>
                             <th scope="col ">Name</th>
                             <th scope="col ">Phone</th>
                             <th scope="col">Unique Id</th>
                             <th scope="col ">Rank</th>
                             <th scope="col ">Point</th>
                             <th scope="col">Status</th>
                           </tr>
                         </thead>
                         <tbody>
@php
    $count=1;
@endphp

                            @foreach ( $user as $user )


                           <tr>
                             {{-- <th scope="row"><input type="checkbox" name="" id=""></th> --}}
                             <td><b>{{$count}}</b></td>
                             <td>{{$user->created_at->format('d/m/Y')}}</td>
                             <td class="col-2">
                            {{$user->profession}}
                             </td>

                             <td class="col-2">
                             {{$user->name}}
                             </td>
                             <td class="col-2">
                              {{$user->mobile_no}}
                             </td>

                              <td>
                                 {{$user->uniq_id}}
                              </td>
                              <td>234</td>
                              <td>23</td>

                             <td>





                           <div class="select">
                              <select  id="myselect" name=" {{$user->id}}" onchange="handleSelectChange(this)">
                              <option selected disabled>Pending </option>
                              <option value="Approved" name="1"><span class="text-success" ></span>Approved</option>
                                 <option value="Suspended"><span class="text-primary">Suspended</span></option>
                                 <option value="Block"><span class="text-warning"> Block </span></option>





                              </select>
                           </div>
                         </td>


                           </tr>
                           @php
                           $count++;
                           @endphp
                           @endforeach




                         </tbody>
                       </table>
                 </div>
               </div>

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
                 </div>
               </div>

             </div>

         </div>
          <!-- 4-blocks row end -->


          <form method="post" id="myform" action="{{url('/pending-user/update')}}">
@csrf

            <input type="hidden" id="type" name="type">
<input type="hidden" id="id2" name="id">
          </form>






      </div>
      <!-- Main content ends -->
      <!-- Container-fluid ends -->

   </div>
   </div>

<script>
    // JavaScript function to handle the select change event
    function handleSelectChange(e) {
        // Get the select element
        // var selectElement = document.getElementById('mySelect');

        // console.log(e.value);




            document.getElementById('type').value=e.value;
            document.getElementById('id2').value=e.name;
            console.log(e.name);
            document.getElementById('myform').submit();
        // Get the selected option value
        // var selectedOption = selectElement.value;

        // // Update the display
        // var displayElement = document.getElementById('selectedOption');
        // displayElement.textContent = 'Selected Option: ' + selectedOption;

        // Call any other functions or perform actions based on the selected option
        // Example: yourFunction(selectedOption);
    }
</script>






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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>



<p id="selectedOption">Selected Option: None</p>
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
