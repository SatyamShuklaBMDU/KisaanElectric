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
                  <h4 class="text-dark">Series</h4>
                  <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                     <li class="breadcrumb-item">
                        <a href="index.html">
                           <i class="icofont icofont-home"></i>
                        </a>
                     </li>
                     <li class="breadcrumb-item "><a href="#" style="color: black;">My Product</a>
                     </li>
                     <li class="breadcrumb-item"><a href="electrican-all-user.html" style="color: rgb(2, 2, 78);">Series</a>
                     </li>
                  </ol>
               </div>
            </div>
            <div class="col-sm-2" style="position: relative; top: 50px;">
            <div class="Click-here">  <button class="btn " type="submit" style="padding: 8px 20px; font-size:12px;">+ Add New Series</button></div>
            <div class="custom-model-main">
                <div class="custom-model-inner">
                <div class="close-btn ">×</div>
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                            <div class="container mt-2 p-5">
                                <div class="row justify-content-center">
                                   <div class="col-12  " id="form" >
                                    <h3 class="mt-2 ">Add New Series</h3>
                                    <form action="{{url('/Series-product/add')}}" enctype='multipart/form-data'  method="post" class="mt-3">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="series" class="form-control"  placeholder="Title Name*">
                                        </div>
                                        <div class="mt-2 mb-2">
                                          <p class="mt-1">Upload Default image *</p>
                                          <input class="form-control  mt-3" type="file" name="image" id="formFile">
                                        </div>
                                   <div class="buttton mt-3 ">
                                    <button type="submit" class="btn-1 px-3 py-1">Save</button>
                                </form>

                                   </div>
                                   </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="bg-overlay"></div>
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

                            <form action="{{url('Series-product/filter')}}" method="post">
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

               <div class="row mt-3 px-4">
                 <div class="col">
                     <table class="table responsive-table" id="example1">
                         <thead>
                           <tr class="">
                             {{-- <th scope="col"><input type="checkbox" name="" id=""></th> --}}
                             <th scope="col">Sr.No.</th>
                             <th scope="col">Last Modified</th>
                             <th scope="col ">Created At</th>
                             <th scope="col ">Image</th>
                             <th scope="col ">Series</th>

                             <th scope="col">Action</th>
                           </tr>
                         </thead>
                         <tbody>

                            @php
                                $i=1;
                            @endphp
@foreach ( $series as $series )




                           <tr>
                              {{-- <th scope="row"><input type="checkbox" name="" id=""></th> --}}
                              <td><b>{{$i}}</b></td>


                              <td class="pt-4">{{$series->created_at->format('d/m/Y')}}</td>

                              <td class="col-2 pt-4">
                                {{$series->updated_at->format('d/m/Y')}}
                                </td>
                              <td class="col-2 ">

                                <img src="{{ asset('storage/images/'.$series->image) }}" class="img-fluid" style="width:100px;" alt="">

                             </td>
                             <td class="col-3 ">

                                {{$series->Series}}

                        <input type="hidden" name="" id="id" value="{{$series->id}}">
                        <input type="hidden" name="" id="series" value="{{$series->Series}}">

                            </td>

                              <td class="col">
                                 <div class=" d-flex mt-3 ">
                                  <div class="edit  me-2">

    <i class="fa-solid fa-pen-to-square" onclick="{document.getElementById('name1').value='{{$series->Series}}';
 document.getElementById('id1').value={{$series->id}};}" data-target="simpleModal_2"
data-toggle="modal"></i>



{{-- </div> --}}

                                  </div>



                                  <div class="delet">
                                    <a href="{{url('Series-product/delete/'.$series->id)}}"> <i class="fa-solid fa-trash"></i></a>
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







      </div>
      <!-- Main content ends -->
      <!-- Container-fluid ends -->

   </div>
   </div>

   <div id="simpleModal_2" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <div class="container mt-2 p-5">
            <div class="row justify-content-center">
                <div class="col-12  " id="form">
                    <h3 class="mt-2 ">Edit Series</h3>
                    <form action="{{url('/Series-product/update')}}" method="post" class="mt-3" enctype='multipart/form-data'>
@csrf
                        <input type="hidden" id="id1" name="id">
                        <div class="form-group ">
                            <input type="text" id="name1" name="series"
                                class="form-control"
                                placeholder="Series Name">
                        </div>
                        <div class="mt-2 mb-2 ">

                            <input class="form-control  mt-3"
                                type="file" name="image" id="formFile">
                        </div>


                    <div class="buttton mt-3 ">
                        <button type="submit" >Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>

  function  getdata(){

    const id=document.getElementById('id').value;
    const name= document.getElementById('series').value;

    document.getElementById('id1').value=id;
    document.getElementById('name1').value=name;




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

