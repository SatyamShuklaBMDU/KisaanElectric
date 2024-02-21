<!-- headr-file-start -->

@include('header/header')

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
<!-- headr-file-start -->
   <div class="content-wrapper">
      <!-- Container-fluid starts -->
      <!-- Main content starts -->
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
               <div class="main-header">
                  <h4 class="text-dark">All Dealer</h4>
                  <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                     <li class="breadcrumb-item">
                        <a href="index.html">
                           <i class="icofont icofont-home"></i>
                        </a>
                     </li>
                     <li class="breadcrumb-item "><a href="#" style="color: black;">All User</a>
                     </li>
                     <li class="breadcrumb-item"><a href="electrican-all-user.html" style="color: rgb(2, 2, 78);">Dealer</a>
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
                    <div class="row mb" style="margin-bottom: 30px; width:217%">
                    <div class="col-md-1">
                     <p class="text-dark"><b><strong>Filters:</strong></b></p>
                    </div>
                    <form action="{{url('/dealer-all-user/filter')}}" method="post">
                        @csrf
                    <div class="col-sm-3 end-date">
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
                           <input type="date" format="yyyy-mm-dd" max="{{date('Y-m-d')}}" required class="form-control" id="date" name="end" placeholder="dd-mm-yyyy"/>
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
                  <table  id="example1" class="table table-striped border-radius shadow table-responsive-sm table-bordered">
                     <thead>
                        <tr class="">
                         {{-- <th scope="col"><input type="checkbox" name="" id=""></th> --}}
                         <th scope="col">Sr.No.</th>
                         <th scope="col ">Registration Date</th>
                         <th scope="col">CIN No.</th>
                         <th scope="col ">Name</th>
                         <th scope="col ">Phone</th>
                         <th scope="col ">City</th>
                         <th scope="col ">Rank</th>
                          <th scope="col ">Assign Partners</th>
                         {{-- <th scope="col ">Password</th> --}}
                         <th scope="col">Action</th>
                       </tr>
                     </thead>
                     <tbody>

                        @php
                            $i=1;
                        @endphp

                        @foreach ( $UserProfiles as $UserProfiles)
                        <tr>
                        {{-- @endforeach --}}

                         {{-- <th scope="row"><input type="checkbox" name="" id=""></th> --}}
                         <td><b>{{$i}}</b></td>
                         <td>{{ $UserProfiles->created_at->format('d-m -Y') }}</td>

                         <td>{{$UserProfiles->uniq_id}} </td>
                             <td>{{$UserProfiles->name}}</td>
                         <td class="col-2">
                            {{$UserProfiles->mobile_no}}
                         </td>
                         <td>{{$UserProfiles->city}}</td>
                          <td>
                             001
                          </td>
                          <td>
                            {{$UserProfiles->assign}}
                          </td>
                          {{-- <td>23455</td> --}}

                         <td>
{{--
<a href="#" data-toggle="modal" data-target="#editModal" class="btn btn-primary btn-xs edit
" title="Edit" ><i class="fa fa-pencil"></i></a> --}}

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Choose An Option
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" data-target="simpleModal_2"
                                    data-toggle="modal" onclick="{document.getElementById('id4').value={{$UserProfiles->id}}}" >Assign Partner</a>
                                   <a class="dropdown-item" href="{{url('/user-profile/'.$UserProfiles->id)}}">User Profile</a>
                                   <a class="dropdown-item" href={{url('/point-history/'.$UserProfiles->id)}}>Point History</a>
                                   <a class="dropdown-item" href="{{url('/transaction-history/'.$UserProfiles->id)}}">Transaction Profile </a>
                                   {{-- <a class="dropdown-item" href="#">Scheme  History </a> --}}

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

         </div>
          <!-- 4-blocks row end -->







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
                <h3 class="mt-2 ">Assign Partner</h3>
                <form action="{{url('/assignPartner')}}" method="post" class="mt-3">
                    @csrf
                   <div class="form-group ">
                    <input type="hidden" class="form-control" id="id4" name="id">
                    <select name="partner" id="" class="form-control">
                   <option value="" selected disabled>Choose Partner*</option>
                   @foreach ( $partner as $partner )
                   <option value="{{$partner->name}}" >{{$partner->name}}</option>
                   @endforeach
                    </select>
                      <div class="mt-3"></div>
                   </div>
                <div class="buttton mt-3 ">
                   <button type="submit">Update</button>
                </form>

                </div>
             </div>
          </div>
       </div>
    </div>
 </div>


   <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Assign Partner</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Partner:</label>
              <input type="text" class="form-control" id="recipient-name" name="partner">
 <select name="partner" id="">
 </select>

            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send message</button>
        </form>
        </div>
      </div>
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

@include('footer/footer')


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


