<!-- headr-file-start -->
   <script src="https://code.jquery.com/jquery-3.7.0.js" ></script>

@include('header.header')
<!-- headr-file-start -->
   <div class="content-wrapper">
      <!-- Container-fluid starts -->

      <!-- Main content starts -->
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
               <div class="main-header">
                  <h4 class="text-dark">History</h4>
                  <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                     <li class="breadcrumb-item">
                        <a href="index.html">
                           <i class="icofont icofont-home"></i>
                        </a>
                     </li>
                     <li class="breadcrumb-item "><a href="#" style="color: black;">History</a>
                     </li>
                     <li class="breadcrumb-item"><a href="approved-user-status.html" style="color: rgb(2, 2, 78);">Transaction</a>
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
                    <div class="row mb" style="margin-bottom: 30px;">
                    <div class="col-md-1">
                     <p class="text-dark"><b><strong>Filters:</strong></b></p>
                    </div>

                    <div class="col-sm-3 end-date">
                     <p class="text-dark"><strong>Date From:</strong></p>
                     <div class="input-group date d-flex" id="datepicker">
                        <input type="text" class="form-control" id="date" placeholder="dd-mm-yyyy"/>
                        <span class="input-group-append">
                        <span class="input-group-text bg-light d-block">
                           <i class="fa fa-calendar"></i>
                        </span>
                        </span>
                     </div>
                    </div>

                    <div class="col-sm-3 end-date">
                     <p><strong class="text-dark">Date to:</strong></p>
                     <div class="input-group date d-flex" id="datepicker1">
                        <input type="text" class="form-control" id="date" placeholder="dd-mm-yyyy"/>
                        <span class="input-group-append">
                        <span class="input-group-text bg-light d-block">
                           <i class="fa fa-calendar"></i>
                        </span>
                        </span>
                     </div>
                     </div>




                    <div class="col-md-1 text-end" style="margin-left: 10px; margin-top:20px;">
                     <button class="btn " type="submit" >Filter</button>
                    </div>
                    <div class="col-md-1 " style="margin-left: -12px;  margin-top:20px;" >
                     <button class="btn " type="submit" >Reset</button>
                    </div>




                 </div>

               </div>
               </div>
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



               <div class="row mt-3 px-4">
                 <div class="col">
                     <table class="table responsive-table">
                         <thead>
                           <tr class="">
                             {{-- <th scope="col"><input type="checkbox" name="" id=""></th> --}}
                             <th scope="col">Sr.No.</th>
                             <th scope="col ">Date</th>
                             {{-- <th scope="col ">Name</th> --}}
                             <th scope="col">Amount</th>
                             {{-- <th scope="col "></th> --}}
                             {{-- <th scope="col ">Rank</th> --}}
                             <th scope="col ">Point</th>
                             <th scope="col">Status</th>
                           </tr>
                         </thead>
                         <tbody>

                            @php
                                $i=1;
                            @endphp
                            @foreach ( $term as $history )



                            <tr>
                             {{-- <th scope="row"><input type="checkbox" name="" id=""></th> --}}
                             <td><b>{{$i}}</b></td>
                             <td>{{$history->created_at->format('d/m/Y')}}</td>

                             <td class="col-2">
                             {{$history->amount}}

                             </td>
                             {{-- <td>
                                 {{$history->city}}
                              </td> --}}
                             {{-- <td class="col-2">

                             </td> --}}


                              {{-- <td>234</td> --}}
                              <td>{{$history->point}}</td>
                              <td>

                                @if ($history->status=="Failed")
                                <span class="badge badge-danger">Failed</span>
                                @elseif ($history->status=="Pending")
                                <span class="badge badge-warning">Pending</span>
                                @else
                                <span class="badge badge-success">Success</span>
                                @endif
                                {{-- {{$history->status}} --}}
                             </td>


                              {{-- <td>
                              <a href="{{url('/transaction-history/delete/'.$history->id)}}" class="btn " type="submit" >Delete</a>
                             </td> --}}

                           </tr>
@php
    $i++;
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







      </div>
      <!-- Main content ends -->
      <!-- Container-fluid ends -->

   </div>
   </div>



<!-- footer-file-start -->

@include('footer.footer')
<!-- footer-file-start -->
