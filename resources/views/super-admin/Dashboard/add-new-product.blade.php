<!-- headr-file-start -->

@if(session()->has('message'))
    <script> alert('{{ session()->get('message') }}');

    </script>

{{session()->forget('message') }}
@endif
@include('header.header')
<script src="https://code.jquery.com/jquery-3.7.0.js" ></script>

<!-- headr-file-start -->
   <div class="content-wrapper">
      <!-- Container-fluid starts -->

      <!-- Main content starts -->
      <div class="container-fluid">
    <div class="col-12">
        <div class="row">
          <div class="col pt-2">
              <h4 style="color: rgb(1, 6, 75);"><strong>Add New Product</strong></h4>
          </div>
        </div>

        <form method="post" action="{{url('/add-new-product/add')}}" enctype="multipart/form-data">
@csrf
        <div class="row mt-3 px-4">
        <h6><b>Product Details</b></h6>
        <input type="text" class="form-control mt-3" name="productName" id="exampleFormControlInput1" placeholder="Product Title *">
        <div class="col-md-4">
           <select class="form-select mt-3" name="series" aria-label="Default select example">
             <option selected disabled>Series *</option>
             @foreach($series as $ser)
             <option value="{{$ser->id}}">{{$ser->Series}}</option>
             @endforeach
           </select>
        </div>
        <div class="col-md-4">

           <select class="form-select mt-3" name="category" aria-label="Default select example">
             <option selected disabled>Categories *</option>
             @foreach($category as $cat)

             <option value="{{$cat->id}}">{{$cat->category}}({{$cat->Series}})</option>
             @endforeach
           </select>
        </div>
        <div class="col-md-4"><input type="text" class="form-control mt-3" name="code" id="exampleFormControlInput1" placeholder="SKU Code"> </div>

        <div class="col-12">
            <div class="row">
            <div class="col-3" > <input type="text" class="form-control mt-3" id="exampleFormControlInput1" name="size" placeholder="Product Size *"></div>
            <div class="col-3" > <input type="text" class="form-control mt-3" id="exampleFormControlInput1" name="module_size" placeholder="Module Size *"></div>
            {{-- <div class="col-3" > <input type="text" class="form-control mt-3" id="exampleFormControlInput1" name="" placeholder="Weight *"></div> --}}

            <div class="col-3" > <input type="text" class="form-control mt-3" id="exampleFormControlInput1" name="dimension" placeholder="Demension *"></div>
            </div>
        </div>
        <div class="col-6"><h6 class="mt-4"><b>Unit Price *</b></h6>
           <div class="input-group mt-3">
             <span class="input-group-text" id="basic-addon1"> ₹</span>
             <input type="number" name="price" class="form-control" placeholder="100" aria-label="Username" aria-describedby="basic-addon1">
           </div></div>
       <div class="col-6">
        <div class="mt-4">
           <p class="mt-1">Upload Default image *</p>
           <input class="form-control  mt-3" name="image" type="file" id="formFile">
         </div>
       </div>
        <textarea  id="" cols="30" rows="5" name="description" class="mt-3">Product Description *</textarea>

        <div class="drop-image mt-3">
          <p class="mt-3">Product Image Gallery *</p>
          <div class="row mt-3">
             <div class="col-4"></div>
             <div class="col-4">
             <div class="btn btn-primary btn-rounded">
        <label class="form-label text-white m-1 px-5" for="customFile1"><i class="fa-solid fa-arrow-up-from-bracket"></i>Upload file</label>
        <input type="file" class="form-control d-none" name="photos[]" id="customFile1"  multiple/>
    </div>
             </div>
             <div class="col-4"></div>
          </div>


          <div class="row mt-5">
              <div class="col-4"></div>
              <div class="col-4 fa-trash text-center">Drag and Drop files here</div>
              <div class="col-4"></div>
          </div>

          </div>

          <div class="row mt-5">
              <div class="col-6 mb-5 d-flex">


                          <button type="submit" class="add-btn-busi px-3 me-3">Add</button>


                          <button class="cancle-btn">Cancel</button>
</form>

              </div>
             </div>

        </div>


</div>

</div>


<!-- footer-file-start -->

@include('footer.footer')
<!-- footer-file-start -->
