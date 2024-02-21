<!-- headr-file-start -->

@if(session()->has('message'))
    <script> alert('{{ session()->get('message') }}');

    </script>

{{session()->forget('message') }}
@endif
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
            <div class="col-sm-10 p-0">
               <div class="main-header">
                  <h4 class="text-dark">All Product</h4>
                  <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                     <li class="breadcrumb-item">
                        <a href="index.html">
                           <i class="icofont icofont-home"></i>
                        </a>
                     </li>
                     <li class="breadcrumb-item "><a href="#" style="color: black;">My Product</a>
                     </li>
                     <li class="breadcrumb-item"><a href="categories-product.html" style="color: rgb(2, 2, 78);">All Product</a>
                     </li>
                  </ol>
               </div>
            </div>
            <div class="col-sm-2" style="position: relative; top: 50px;">
             <a href="{{url('/add-new-product')}}"><button class="btn " type="submit" style="padding: 8px 20px; font-size:12px;">+ Add New Product</button></a>

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

                            <form action="{{url('/all-product/filter')}}" method="post">
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
 --}}


               <div class="row mt-3 px-4">
                 <div class="col">
                     <table class="table responsive-table" id="example1">
                         <thead>
                           <tr class="">
                             {{-- <th scope="col"><input type="checkbox" name="" id=""></th> --}}
                             <th scope="col">Sr.No.</th>
                             <th scope="col ">Image</th>
                             <th scope="col ">Series</th>
                             <th scope="col ">Categories</th>
                             <th scope="col">Last Modified</th>
                             <th scope="col ">Product</th>
                             <th scope="col">Action</th>
                           </tr>
                         </thead>
                         <tbody>
                            @php
                                $i=1;
                            @endphp
@foreach ( $product as $product )

{{-- @endforeach --}}
                            <tr>
                              {{-- <th scope="row"><input type="checkbox" name="" id=""></th> --}}
                              <td><b>{{$i}}</b></td>
                              <td class="col-2 ">

                                 <img src="{{ asset('storage/images/'.$product->image) }}" class="img-fluid" style="width:50px;" alt="">

                              </td>
                              <td class="col-3 ">
                                 <p class="pt-3">{{$product->Series}}</p>

                               </td>
                              <td class="col-3 ">
                                <p class="pt-3">{{$product->category}}</p>

                              </td>
                              <td class="pt-4">{{$product->updated_at->format('d/m/Y')}}</td>
                              <td class="col-2 pt-4">
                              {{$product->name}}
                              </td>
                              <td class="col">
                                 <div class=" d-flex mt-3 ">
                                  <div class="edit  me-2">
                                  <a href="{{url('/edit-product/'.$product->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                  </div>




                                  <div class="delet">
                                    <a href="{{url('/product/delete/'.$product->id)}}" class="btn " type="submit" style="
                                        /* background-color: crimson; */
                                        color: crimson;
                                    ">
                                    <i class="fa-solid fa-trash"></i></a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
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
                    'copy', 'csv', 'excel', 'print'
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

