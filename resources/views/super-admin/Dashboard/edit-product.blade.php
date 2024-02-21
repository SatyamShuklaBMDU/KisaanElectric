<!-- headr-file-start -->

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
              <h4 style="color: rgb(1, 6, 75);"><strong>Edit Product</strong></h4>
          </div>
        </div>
        <div class="row mt-3 px-4">
        <h6><b>Product Details</b></h6>
        <input type="text" class="form-control mt-3" id="exampleFormControlInput1" placeholder="Product Title *">
        <div class="col-md-6">

           <select class="form-select mt-3" aria-label="Default select example">
             <option selected>Series *</option>
             <option value="1">One</option>
             <option value="2">Two</option>
             <option value="3">Three</option>
           </select>
        </div>
        <div class="col-md-6 ">

           <select class="form-select mt-3" aria-label="Default select example">
             <option selected>Categories *</option>
             <option value="1">One</option>
             <option value="2">Two</option>
             <option value="3">Three</option>
           </select>
        </div>

        <div class="col-12">
            <div class="row">
            <div class="col-3" > <input type="text" class="form-control mt-3" id="exampleFormControlInput1" placeholder="Product Size *"></div>
            <div class="col-3" > <input type="text" class="form-control mt-3" id="exampleFormControlInput1" placeholder="Module Size *"></div>
            <div class="col-3" > <input type="text" class="form-control mt-3" id="exampleFormControlInput1" placeholder="Weight *"></div>

            <div class="col-3" > <input type="text" class="form-control mt-3" id="exampleFormControlInput1" placeholder="Demension *"></div>
            </div>
        </div>
        <div class="col-6"><h6 class="mt-4"><b>Unit Price *</b></h6>
           <div class="input-group mt-3">
             <span class="input-group-text" id="basic-addon1"> ₹</span>
             <input type="number" class="form-control" placeholder="100" aria-label="Username" aria-describedby="basic-addon1">
           </div></div>
       <div class="col-6">
        <div class="mt-4">
           <p class="mt-1">Upload Default image *</p>
           <input class="form-control  mt-3" type="file" id="formFile">
         </div>
       </div>
        <textarea name="" id="" cols="30" rows="5" class="mt-3">Product Description *</textarea>



        <div class="drop-image mt-3">
          <p class="mt-3">Product Image Gallery *</p>
          <div class="row mt-3">
             <div class="col-4"></div>
             <div class="col-4">
             <div class="btn btn-primary btn-rounded">
        <label class="form-label text-white m-1 px-5" for="customFile1"><i class="fa-solid fa-arrow-up-from-bracket"></i>Upload file</label>
        <input type="file" class="form-control d-none" id="customFile1" />
    </div>
             </div>
             <div class="col-4"></div>
          </div>


          <div class="row mt-5">
              <div class="col-4"></div>
              <div class="col-4 fa-trash me-3 pm-3">Drag and Drop files here</div>
              <div class="col-4"></div>
          </div>

          </div>

          <div class="row mt-5">
              <div class="col-6 mb-5 d-flex">


                          <button class="add-btn-busi px-3 me-3">Update</button>





              </div>
             </div>

        </div>


</div>

</div>


<!-- footer-file-start -->

@include('footer.footer')
<!-- footer-file-start -->
