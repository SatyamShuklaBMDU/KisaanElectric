<!-- headr-file-start -->
@include('header/header')



@if(session()->has('message'))
    <script> alert('{{ session()->get('message') }}');

    </script>

{{session()->forget('message') }}
@endif

@error('Points')

<script>
alert('Please Enter Valid Points!');


</script>

@enderror
<!-- headr-file-start -->
<div class="content-wrapper">

<style>
.show{
    display: block !important;
}
.icon-pencil:hover{
    color: white;

}
</style>

   <!-- Container-fluid starts -->
   <!-- Main content starts -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-10 p-0">
            <div class="main-header">
               <h4 class="text-dark">QR Code</h4>
               <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                  <li class="breadcrumb-item">
                     <a href="index.html">
                     <i class="icofont icofont-home"></i>
                     </a>
                  </li>
               </ol>
            </div>
         </div>
         <div class="col-sm-2" style="position: relative; top: 50px;">
            <div class="Click-here">  <button class="btn " type="submit" style="padding: 8px 20px; font-size:12px;">+ Create QR Code</button></div>
            <div class="custom-model-main">
               <div class="custom-model-inner">
                  <div class="close-btn ">×</div>
                  <div class="custom-model-wrap">
                     <div class="pop-up-content-wrap">
                        <div class="container mt-2 p-5">
                           <div class="row justify-content-center">
                              <div class="col-12  " id="form" >
                                 <h3 class="mt-2 "> Create New QR Code</h3>

                                  <form action="{{ route('upload-excel') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                                      @csrf
                                    <div class="form-group">
                                       <input type="file" name="excel_file" class="form-control"  accept=".xls, .xlsx" placeholder="QR Code*" required>
                                    </div>
                                   <div class="buttton mt-3 ">
                                    <button type="submit" name="button" class="btn-1 px-3 py-1">Upload Excel File</button>
                                 </div>
                               </form>
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
      @php
  $count=0;
    @endphp
@foreach ( $rs as  $rs)


      <div class="accordion" id="accordionExample">
        <div class="accordion-item" style="
        position: relative;
        margin-bottom: 2px;
        background-color: #02345f;
    ">

            <i class="icon-pencil Click-here1" onclick="$('.group-model').addClass('model-open');
            document.getElementById('editId').value='{{$rs->group}}'; document.getElementById('editId1').value='{{$rs->group}}';  " style="
            z-index: 2;
            color: white;
            position: absolute;
            top: 18px;
            right: 50px;
        " data-toggle="modal"  data-target="#simpleModal_3"></i>



<i class="fa-solid fa-trash Click-here1" onclick="$('.group-model').addClass('model-open');
            document.getElementById('editId3').value='{{$rs->group}}';" style="
            z-index: 2;
            color: white;
            position: absolute;
            top: 18px;
            right: 20px;
        " data-toggle="modal"  data-target="#simpleModal_4"></i>



          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" style="width: 93%" data-bs-toggle="collapse" data-bs-target="#collapse{{$count}}" aria-expanded="true" aria-controls="collapseOne">
              {{$rs->group}} {{--  <span style="

              margin-left: 27px;
              color: #f0757d;
          ">upload At:12/12/2023</span>
          <span style="

          margin-left: 27px;
          color: #f0757d;
      ">update At:12/12/2023</span> --}}
            </button>
          </h2>
          <div id="collapse{{$count}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: white">

                <!-- 4-blocks row start -->
      <div class="row dashboard-header">
        <div class="col-md-12">
           <div class="row mt-3" >
              <div class="col-md-12 boder-danger me-5 pe-5">
                 <div class="row mb" style="margin-bottom: 30px;">
                    <div class="col-sm-1">
                       <p class="text-dark"><b><strong>Filters:</strong></b></p>
                    </div>
                    <div class="col-sm-3 end-date">
                       <p class="text-dark"><strong>Date From:</strong></p>
                       <div class="input-group date d-flex" >
                          <input type="date" class="form-control" id="date" placeholder="dd-mm-yyyy" max="{{date('Y-m-d')}}" />
                          {{-- <span class="input-group-append"> --}}
                          {{-- <span class="input-group-text bg-light d-block"> --}}
                          {{-- <i class="fa fa-calendar"></i> --}}
                          </span>
                          </span>
                       </div>
                    </div>
                    <div class="col-sm-3 end-date">
                       <p><strong class="text-dark">Date to:</strong></p>
                       <div class="input-group date d-flex">
                          <input type="date" class="form-control" id="date" placeholder="dd-mm-yyyy"/>
                          {{-- <span class="input-group-append"> --}}
                          {{-- <span class="input-group-text bg-light d-block"> --}}
                          {{-- <i class="fa fa-calendar"></i> --}}
                          {{-- </span> --}}
                          {{-- </span> --}}
                       </div>
                    </div>
                    <div class="col-md-1 text-end" style="margin-left: 10px; margin-top:20px;">
                       <button class="btn " type="submit" >Filter</button>
                    </div>
                    <div class="col-md-1" style="margin-left: -12px;  margin-top:20px;" >
                       <button class="btn " type="submit" >Reset</button>
                    </div>
                    <div class="col-md-3" >
                       <input class="form-control border-none me-2" type="search" placeholder="Search" aria-label="Search" >
                       <div class="row pt-4">
                          <div class="col-md-2" style="margin-left: -25px; margin-top: 1.5px;">
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="row mt-3 px-4">
              <div class="col">
                 <table class="table responsive-table table-striped border shadow"  id="example1" >
                    <thead>
                       <tr class="">
                          <th scope="col"><input type="checkbox" name="" id=""></th>
                          <th scope="col">Sr.No.</th>
                          <th scope="col ">QR Code</th>
                          <th scope="col">Product Category</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Points</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                       </tr>
                    </thead>
                    <tbody>
@php
    $ids=1;
@endphp

                       @foreach($result as $result1)


                       {{-- {{print_r($result)}} --}}
                   @if ($result1->group==$rs->group)

                   {{-- {$item->Sno} --}}


                       <tr>
                          <th scope="row"><input type="checkbox" name="" id="">
                           {{-- {{$result->Sno}} --}}
                       </th>
                          <td><b>{{$ids}}</b></td>
                          <td class="col-2 ">
                             {{$result1->QR_Code}}
                          </td>
                          <td class="col-3 ">
                           {{$result1->Category}}
                       </td>
                          <td class="col-3 ">
                           {{$result1->Product_Name}}

                          </td>
                          <td class="col-3 ">
                           {{$result1->Points}}

                          </td>

@if ($result1->status==1)

<td class="text-success">Active</td>
@else
<td class="text-danger">Deactive</td>
@endif


                          <td class="col">
                             <div class=" d-flex">
                                <div class="edit  me-2">
                                   <i class="fa-solid fa-pen-to-square" data-target="simpleModal_2"
                                      data-toggle="modal"></i>
                                   <div id="simpleModal_2" class="modal">
                                      <div class="modal-window small">
                                         <span class="close" data-dismiss="modal">&times;</span>
                                         <div class="container mt-2 p-5">
                                            <div class="row justify-content-center">
                                               <div class="col-12  " id="form">
                                                  <h3 class="mt-2 ">Edit Points</h3>
                                                  <form action="{{url('qr-code-view')}}/{{$result1->Sno}}" method="post" class="mt-3">
                                                   @csrf
                                                   <div class="form-group ">

                                                             <div class="mt-3"></div>
                                                        <input type="text" name="Points"
                                                           class="form-control"
                                                           placeholder="Edit Points">
                                                     </div>

                                                  <div class="buttton mt-3 ">
                                                     <button type="submit" >Update</button>
                                                  </div>
                                               </div>
                                           </form>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <form action="{{url('qr-code-view')}}/delete/{{$result1->Sno}}" method="post" class="mt-3">
                                       @csrf

                                </div>
                                <div class="delet">
                                  <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                </div>
                               </form>
                             </div>
                          </td>
                       </tr>
@php
    $ids++;
@endphp


                       @endif

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


    </div>
</div>
</div>
@php
  $count++;
@endphp
     @endforeach


      </div>



      <div id="simpleModal_3" class="modal">
        <div class="modal-window small">
           <span class="close" data-dismiss="modal">&times;</span>
           <div class="container mt-2 p-5">
              <div class="row justify-content-center">
                 <div class="col-12  " style="margin-bottom: 10px" id="form">
                    <h3 class="mt-2 ">Edit Group Detail</h3>

                    <label  class="mt-2 ">Group Name</label>
                    <form action="{{url('qr-code-view/update')}}" method="post" class="mt-3">
                     @csrf
                     <div class="form-group ">

                               <div class="mt-3"></div>
                               <input type="hidden" name="id" value="" id="editId"/>
                          <input type="text" name="group"
                             class="form-control"
                             placeholder="Edit Group Name">
                       </div>

                    <div class="buttton mt-3 ">
                       <button type="submit" >Update</button>
                    </div>
                 </div>
             </form>

             <hr>

             <div class="col-12  " id="form">
                <label class="mt-2 ">Points</label>
                <form action="{{url('/qr-code-view/updatePoints/1')}}" method="post" class="mt-3">
                 @csrf
                 <div class="form-group ">

                           <div class="mt-3"></div>
                           <input type="hidden" name="id" value="" id="editId1"/>
                      <input type="text" name="Points"
                         class="form-control"
                         placeholder="Edit Points">
                         {{-- @foreach ( $ids as  $id) --}}
                         <input type="hidden" name="category" value="{{$id2}}" />
                         {{-- @endforeach --}}
                   </div>

                <div class="buttton mt-3 ">
                   <button type="submit" >Update</button>
                </div>
             </div>
         </form>
              </div>
           </div>
        </div>
     </div>






{{-- delete Group    --}}





<div id="simpleModal_4" class="modal" style="font-size: 1.05rem !important;">

    <div class="modal-window small">

        <h5 class="mt-2 ">Warning</h5> <span class="close" data-dismiss="modal">&times;</span>
       <div class="container mt-2 p-5">
          <div class="row justify-content-center">
             <div class="col-12  " id="form">
<hr>
                <form action="{{url('/qr-code-view/delete/1')}}" method="post" class="mt-3">
                 @csrf
                 <div class="form-group ">

                           <div class="mt-3"></div>
                           <input type="hidden" name="id" value="" id="editId3"/>
                           <h5 class="mt-2 ">Are You Sure Want To Delete?</h5>
<hr>
<input type="hidden" name="category" value="{{$id2}}" />
                   </div>

                <div class="buttton mt-3 ">
                   <button type="submit" >Delete</button>
                </div>
             </div>
         </form>
          </div>
       </div>
    </div>
 </div>


 {{-- End Delete Group   --}}








      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Category:</label>
                  <input type="text" name="Category" class="form-control" id="recipient-name">
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>








<script>

function modal1(){
    $('.group-model').addClass('model-open');

}



function updateGroup(){

}

</script>
<script >



</script>







<script>
   $(function() {
       $("#example1").DataTable({
           "responsive": true,
           "autoWidth": true,
           "info": true,
           "autoWidth": true,
           "responsive": true,
           "searching": true,
           "ordering": true,
         //   dom: 'Bfrtip',
       });
       $('#example2').DataTable({
           "paging": true,
           "lengthChange": false,
           // "searching": false,
           // "ordering": true,

       });


   });
</script>




            <!-- 4-blocks row end -->
   </div>
   <!-- Main content ends -->
   <!-- Container-fluid ends -->
</div>
</div>
<!-- footer-file-start -->
@include('footer/footer')
<!-- footer-file-start -->
