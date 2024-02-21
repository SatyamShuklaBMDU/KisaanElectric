
<!-- headr-file-start -->

@if (session()->has('message'))
    <script>
        alert('{{ session()->get('message') }}');
    </script>

    {{ session()->forget('message') }}
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
                    <h4 class="text-dark">Category</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item "><a href="#" style="color: black;">My Product</a>
                        </li>
                        <li class="breadcrumb-item"><a href="categories-product.html"
                                style="color: rgb(2, 2, 78);">Category</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-2" style="position: relative; top: 50px;">
                <div class="Click-here"> <button class="btn " type="submit"
                        style="padding: 8px 20px; font-size:12px; margin-left:-10px">+
                        Add New Category</button></div>
                <div class="custom-model-main">
                    <div class="custom-model-inner">
                        <div class="close-btn ">×</div>
                        <div class="custom-model-wrap">
                            <div class="pop-up-content-wrap">
                                <div class="container mt-2 p-5">
                                    <div class="row justify-content-center">
                                        <div class="col-12 " id="form">
                                            <h3 class="mt-2 ">Add New Category</h3>
                                            <form action="{{ url('/categories-product/add') }}"
                                                enctype='multipart/form-data' method="post" class="mt-3">
                                                @csrf
                                                <div class="form-group ">
                                                    <select name="Series" class="form-control"
                                                        placeholder="Category name*">

                                                        <option value="" selected disabled>Choose Series*</option>

                                                        @foreach ($series as $series)
                                                            <option value="{{ $series->id }}">{{ $series->Series }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" name="category" class="form-control"
                                                        placeholder="Title Name*">
                                                </div>
                                                <div class="mt-2 mb-2">
                                                    <p class="mt-1">Upload Default image *</p>
                                                    <input class="form-control mt-3" type="file" name="image"
                                                        id="formFile">
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
            <div class="row mt-3">
                <div class="col-md-12 boder-danger me-5 pe-5">
                    <div class="row mb" style="margin-bottom: 30px; width:175%;">
                        <div class="col-md-1">
                         <p class="text-dark"><b><strong>Filters:</strong></b></p>
                        </div>

                        <div class="col-sm-3 end-date">

                            <form action="{{url('/categories-product/filter')}}" method="post">
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
                        <div class="col-md-4 text-center d-flex multiple-btn">
                            <button class="btn " type="submit" style="margin-left: 10px;">Copy</button>
                            <button class="btn " type="submit" style="margin-left: 10px;">CSV</button>
                            <button class="btn " type="submit" style="margin-left: 10px;">Excel</button>
                            <button class="btn " type="submit" style="margin-left: 10px;">PDF</button>
                            <button class="btn " type="submit" style="margin-left: 10px;">Print</button>
                        </div>

                    </div>

                </div>

                <div class="col-md-3">
                    <input class="form-control border-none me-2" type="search" placeholder="Search"
                        aria-label="Search">

                </div>
                <div class="col-md-2" style="margin-left: -25px; margin-top: 1.5px;">
                    <button class="btn " type="submit">Search</button>

                </div>

            </div> --}}



            <div class="row mt-3 px-4">
                <div class="col">
                    <table class="table responsive-table" id="example1">
                        <thead>
                            <tr class="">
                                {{-- <th scope="col"><input type="checkbox" name="" id=""></th> --}}
                                <th scope="col">Sr.No.</th>
                                <th scope="col ">Image</th>
                                <th scope="col ">Categories</th>
                                <th scope="col">Last Modified</th>
                                <th scope="col ">Series</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $i = 1;
                            @endphp
                            @foreach ($join as $category)
                                <tr>
                                    {{-- <th scope="row"><input type="checkbox" name="" id=""></th> --}}
                                    <td><b>{{ $i }}</b></td>
                                    <td class="col-2 ">

                                        <img src="{{ asset('storage/images/' . $category->image) }}" class="img-fluid"
                                            style="width:50px;" alt="">

                                    </td>
                                    <td class="col-3 ">
                                        <p class="pt-3">{{ $category->category }}</p>

                                    </td>
                                    <td class="pt-4">{{ $category->created_at->format('d-m-Y') }}</td>
                                    <td class="col-2 pt-4" id="series">
                                        {{ $category->Series }}
                                    </td>
                                    <td class="col">
                                        <div class=" d-flex mt-3 ">
                                            <div class="edit me-2">
                                                <i class="fa-solid fa-pen-to-square"
                                                    onclick="{


                                       const selectElement = document.getElementById('seriesSelect').value='{{ $category->Series }}';

                                         // Create a new option element
                                         var newOption = document.createElement('option');
                                         document.getElementById('category').value='{{ $category->category }}';
                                         document.getElementById('id4').value={{ $category->id }};


                                    // Set the value and text content of the new option
                                    newOption.value ='';
                                    newOption.textContent = '{{ $category->Series }}';
                                    newOption.setAttribute('selected', 'selected');
                                    newOption.setAttribute('disabled', true);


                                    // selectElement.appendChild(newOption);

                                    }"
                                                    data-target="simpleModal_2" data-toggle="modal"></i>
                                            </div>


                                        </div>

                                        <div class="delet">
                                            <a href="{{ url('categories-product/delete/' . $category->id) }}"> <i
                                                    class="fa-solid fa-trash"></i></a>
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
                <div class="col-12 " id="form">
                    <h3 class="mt-2 ">Edit Category</h3>
                    <form action="{{ url('/categories-product/update') }}" enctype='multipart/form-data' method="post"
                        class="mt-3">
                        @csrf
                        <div class="form-group ">
                            {{-- <select id="seriesSelect" name="Series" class="form-control" --}}
                            <input type="hidden" id="seriesSelect" name="Series"  class="form-control"
                            placeholder="Category name*">

                        </div>





                        <div class="form-group ">
                            <input type="text" id="category" name="category" class="form-control"
                                placeholder="Category name*">
                        </div>

                        <div class="form-group ">
                            <input type="hidden" id="id4" name="id" class="form-control"
                                placeholder="Category name*">
                        </div>





                        <div class="mt-2 mb-2 ">

                            <input class="form-control mt-3" name="image" type="file" id="formFile">
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
        function getdata() {

            const series = document.getElementById('series').innerText;
            const selectElement = document.getElementById('seriesSelect');

            // Create a new option element
            var newOption = document.createElement("option");

            // Set the value and text content of the new option
            newOption.value = '';
            newOption.textContent = series;
            newOption.setAttribute("selected", "selected");
            newOption.setAttribute("disabled", true);


            selectElement.appendChild(newOption);

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



    {{--
undefined
undefinedThis code includes a table to display categories, filters, and pagination. It also includes a modal for adding and editing categories. The modal is triggered by clicking the "+" button and the edit button. The modal includes a form with fields for the category name, series, and image. The form is submitted using the "Save" button in the modal. The "Update" button in the modal is used to update the category. The "Delete" button is used to delete a category. The "Filter" button is used to filter the categories based on the selected date range. The "Reset" button is used to reset the filters. The "Search" button is used to search for categories based on the entered text. The "Copy", "CSV", "Excel", "PDF", and "Print" buttons are used to export the categories data in different formats. --}}
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

