<!-- headr-file-start -->
@include('header/header')
<!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}

<!-- DataTables CSS -->
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css"> --}}

<!-- DataTables JS -->
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script> --}}

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
   /* Style for the pop-up container */
.popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

/* Style for the pop-up content */
.popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

</style>

<div id="pdfPopup" class="popup" style="display: none;">
    <div class="popup-content">
        <h2>User Profile</h2>
        <h1>Shubham Pandey</h1>
        <!-- Add content for the User Profile pop-up here -->
        <button onclick="closePopup()">Okay</button>
    </div>
</div>
<div class="content-wrapper">
   <!-- Container-fluid starts -->
   <!-- Main content starts -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 p-0">
            <div class="main-header">
               <h4 class="text-dark">All Electrician</h4>
               <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                  <li class="breadcrumb-item">
                     <a href="index.html">
                     <i class="icofont icofont-home"></i>
                     </a>
                  </li>
                  <li class="breadcrumb-item "><a href="#" style="color: black;">All User</a>
                  </li>
                  <li class="breadcrumb-item"><a href="electrican-all-user.html" style="color: rgb(2, 2, 78);">Electrican</a>
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
                  <div class="row mb" style="margin-bottom: 30px; width: 175%;">
                     <div class="col-md-1">
                        <p class="text-dark"><b><strong>Filters:</strong></b></p>
                     </div>
                     <div class="col-sm-3 end-date">
                        <form action="{{url('/electrican-all-user/filter')}}" method="post">
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
               </div> --}}
               {{-- <div class="col-md-3" >
                  <input class="form-control border-none me-2" type="search" placeholder="Search" aria-label="Search" >
               </div>
               <div class="col-md-2" style="margin-left: -25px; margin-top: 1.5px;">
                  <button class="btn " type="submit" >Search</button>
               </div>
            </div> --}}
            <div class="row mt-3 px-4">
               <div class="col">
               <table id="example1" class="table table-striped border-radius shadow table-responsive-sm table-bordered">
               <thead>
                   <tr>
                       {{-- <th scope="col"><input type="checkbox" name="" id=""></th> --}}
                       <th scope="col">Sr.No.</th>
                       <th scope="col">Registration Date</th>
                       <th scope="col">CIN No</th>
                       <th scope="col">Name</th>
                       <th scope="col">Phone</th>
                       <th scope="col">City</th>
                       <th scope="col">Rank</th>
                       {{-- <th scope="col">Password</th> --}}
                       <th scope="col">Action</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach($UserProfiles as $UserProfile)
                   <tr>
                       {{-- <td><input type="checkbox" name="" id=""></td> --}}
                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $UserProfile->created_at->format('d-m -Y') }}</td>
                       <td>{{ $UserProfile ? $UserProfile->uniq_id : '' }}</td>
                       <td>{{ $UserProfile->name }}</td>
                       <td>{{ $UserProfile ? $UserProfile->mobile_no : '' }}</td>
                       <td>{{ $UserProfile->city }}</td>
                       <td>{{ $UserProfile->rank }}</td>
                       {{-- <td>{{ $UserProfile->decrypted_password }}</td> --}}
                       <td>
                                                  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Choose An Option
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="{{url('/user-profile/'.$UserProfile->id)}}">User Profile</a>
      <a class="dropdown-item" href="{{url('/point-history/'.$UserProfile->id)}}">Point History</a>
      <a class="dropdown-item" href={{url('/transaction-history/'.$UserProfile->id)}}">Transaction Profile </a>

    </div>
  </div>
                           </td>
                       {{-- </td> --}}
                   </tr>
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
    function showSelectedOption(select) {
        var selectedOption = select.value;
        if (selectedOption === "pdf") {
            document.getElementById("pdfPopup").style.display = "block";
        } else {
            document.getElementById("pdfPopup").style.display = "none";
        }
    }
     function closePopup() {
        // Hide the pop-up when the "Okay" button is clicked
        document.getElementById("pdfPopup").style.display = "none";
    }




</script>



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

