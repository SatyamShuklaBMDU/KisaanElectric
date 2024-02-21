<!-- footer-file-start -->
@include('header.header')
<style>

</style>

<!-- footer-file-start -->
<div class="content-wrapper">
   <!-- Container-fluid starts -->
   <!-- Main content starts -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 p-0">
            <div class="main-header">
               <h4 class="text-dark">Order</h4>
               <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                  <li class="breadcrumb-item">
                     <a href="index.html">
                     <i class="icofont icofont-home"></i>
                     </a>
                  </li>
                  <li class="breadcrumb-item "><a href="#" style="color: black;">Order</a>
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
            <div class="row mt-3" >
               <div class="col-md-12 boder-danger me-5 pe-5">
                  <div class="row mb" style="margin-bottom: 30px;">
                     <div class="col-md-1">
                        <p class="text-dark"><b><strong>Filters:</strong></b></p>
                     </div>
                     <div class="col-sm-3 end-date">
                        <p class="text-dark"><strong>Date From:</strong></p>
                        <div class="input-group date d-flex" id="datepicker">
                           <input type="text" class="form-control" id="date" placeholder="dd-mm-yyyy" />
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
                           <input type="text" class="form-control" id="date" placeholder="dd-mm-yyyy" />
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
            <div class="table-responsive">
                 <!-- start table-->

                  <table class="table table-striped border-radius shadow table-responsive-sm table-bordered">
                     <thead>
                        <tr>
                           {{-- <th scope="col"><input type="checkbox" name="" id=""></th> --}}
                           <th scope="col">Sr.No.</th>
                           <th scope="col">Date</th>
                           <th scope="col" >CIN No.</th>
                           {{-- <th scope="col" class="w-100">Phone No.</th> --}}
                           <th scope="col">Name</th>
                           <th scope="col">Order Id</th>
                           <th scope="col">Order Quantity</th>
                           <th scope="col">Order Value</th>
                           <th scope="col">Order View</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>

                        @php
                            $i=1;
                        @endphp
                        @foreach ( $history as $history )


                            <tr>
                           {{-- <th scope="row"><input type="checkbox" name="" id=""></th> --}}
                           <td class="text-center"><b>{{$i}}</b></td>
                           <td>
                              {{$history->created_at->format('d/m/Y')}}
                           </td>
                           <td>{{$history->cin_no}}</td>
                           {{-- <td  class="w-100">+91 90875 65543</td> --}}
                           <td>{{$history->name}}</td>
                           <td>
                              {{$history->order_id}}
                           </td>
                           <td>{{$history->quantity}}</td>
                           <td>
                              {{$history->total_amount}} Rs
                           </td>
                           <td class="col">
                              <h6 class="Product text-dark"
                                       > <a href="{{url('invoice/'.$history->order_id)}}"> View </a></h6>
                          </td>
                           <td>

                            @if ($history->status=='pending')
                              <p class="badge badge-warning">Pending</p>
                                @elseif ($history->status=='success')
                              <p class="badge badge-success">Confirm</p>
                              @elseif ($history->status=='cancelled')
                              <p class="badge badge-danger">Cancelled</p>

                              @endif
                           </td>
                           <td class="d-flex">



                            <div class="select">
                                <select  id="myselect" name=" {{$history->id}}" onchange="handleSelectChange(this)">
                                <option selected disabled>Order Update </option>
                                <option value="cancelled" name="1"><span class="text-success" ></span>Cancel By Partner</option>
                                   <option value="cancelled"><span class="text-primary">Cancel By Kissan</span></option>
                                   <option value="success"><span class="text-warning"> Order Complete </span></option>





                                </select>
                              {{-- <div class="select ">
                                 <select name="format" id="format">
                                    <option selected disabled>Order Update</option>
                                    <option value="pdf">Cancel By Partner</option>
                                    <option value="txt">Cancel By Kissan</option>
                                    <option value="fb2"> Order Complete</option>
                                 </select>
                              </div> --}}
                              {{-- <div class="btn-form " style="z-index: 999;">
                                 <button class="btn " type="submit" style="margin-left: 10px;">Send</button>
                              </div> --}}
                           </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                                             </tbody>
                  </table>
                  <!-- end table-->

                  <!--1st start -->


                  <!-- end table-->
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


<form method="post" id="myform" action="{{url('dealer-order/status')}}">
    @csrf

                <input type="hidden" id="type" name="type">
    <input type="hidden" id="id2" name="id">
              </form>


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
<!-- footer-file-start -->
@include('footer.footer')
<!-- footer-file-start -->
