  <style>
      .accordionTitle {
  cursor: pointer;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.accordionTitle + .accordionContent {
  display: none;
}
span.cnacel {
    position: absolute;
    top: 128px;
    font-size: 14px;
}
.accordionTitle.is-open + .accordionContent {
  display: block;
}
  </style>
   <script src="https://code.jquery.com/jquery-3.7.0.js" ></script>

@include('header.header')

<section style="background-color: #eee;">
     <div class="content-wrapper">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{  url('/electrican-user-profile') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body mx-auto text-center">
           <form method="POST" action="" enctype="multipart/form-data">
                @csrf

            <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;"> -->
              @foreach ( $UserProfiles as$UserProfiles )

              <div id="image-preview">
                <img id="preview" src="{{ asset('assets/images/ava3.webp') }}" alt="Profile Image" class="rounded-circle img-fluid" style="width: 150px;">
              </div>
              {{-- <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*" onchange="previewImage(this);" style="width: 150px;"> --}}
            <h6 class="mt-3"><b class="text-dark">Name: </b>{{ $UserProfiles->name }}</h6>
            <p class="text-muted mb-1"><b class="text-dark">Phone: </b>{{ $UserProfiles ? $UserProfiles->mobile_no : '' }}</p>
            <p class="text-muted mb-1"><b class="text-dark">Registered On: </b> {{ $UserProfiles->created_at->format('d M Y') }}</p>
            <p class="text-muted mb-2"><b class="text-dark">CIN No. :</b>{{ $UserProfiles ? $UserProfiles->uniq_id : '' }}</p>
            <div class="d-flex justify-content-center mb-2">
            <button type="button" class="btn btn-sm ms-1 btn-warning">20%</button>
            {{-- @endforeach --}}
        </div>
          </div>
        </div>

      </div>
      <div class="col-lg-8">
 <!--******** Accordian start *********-->

 <div>
    <div class="accordionItem">
      <h2 class="accordionTitle is-open"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
     Personal Info
      </button></h2>
      <div class="accordionContent">
           <div class="card mb-4">
          <div class="card-body">
            <div class="row">

                {{-- @foreach ( $UserProfiles as $UserProfiles ) --}}


              <div class="col-sm-3">
                <p class="mb-0  text-dark">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->name}}</p>

            </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Birth Date</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->dob}}</p>
            </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Phone Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->mobile_no}}</p>

            </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Whatsapp Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->whatsapp_number}}</p>

            </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->email}}</p>

            </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->address}}</p>

            </div>
            </div>
            {{-- @endforeach --}}
          </div>
        </div>
      </div>
    </div>
    {{-- <button type="submit" class="btn btn-primary">Save Profile</button> --}}
    </form>
    <div class="accordionItem">
      <h2 class="accordionTitle"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
     Transfer Info
      </button></h2>

      <div class="accordionContent">
          <div class="card mb-4 pb-4">
          <div class="card-body">

            {{-- @foreach ( $UserProfiles as$UserProfiles ) --}}


            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 text-dark">Bank Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->bank_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Account Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->Ac_number}}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">IFSC Code</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->ifsc_code}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Account Holder Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->holder_name}}</p>
              </div>
            </div>
            <hr>
            <h5 class="text-primary"> Paytm Wallet Detail</h5>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">PayTM Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->paytm_no}}</p>
              </div>
            </div>

             <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">PhonePay Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->phonepay_no}}</p>
              </div>
            </div>
            <!---->

             <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">GPay Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->googlepay_no}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Bank Documents</p>
              </div>
              <div class="col-sm-9">
              <span class="cnacel"> Cancelled Cheqe</span>  <img src="{{ asset('storage/images/'.$UserProfiles->cancelled_cheque) }}">
                <span class="cnacel">Passbook</span>   <img src="{{ asset('storage/images/'.$UserProfiles->passbook) }}">
                     <span class="cnacel">Paytm Kyc Screenshot</span>  <img src="{{ asset('storage/images/'.$UserProfiles->paytm_kyc) }}">
              </div>
            </div>
            {{-- @endforeach --}}
          </div>
        </div>
      </div>
    </div>

    <div class="accordionItem">
      <h2 class="accordionTitle"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
   Documents Info
      </button></h2>
      <div class="accordionContent">
         <div class="card mb-4 pb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Aadhar Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->aadhar_no}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Aadhard Card Photo</p>
              </div>
              <div class="col-sm-9 pb-2">
              <span class="">Front Side</span>  <img src="{{ asset('storage/images/'.$UserProfiles->aadhar_front) }}">
                <span class=" text-center">Back Side </span>   <img src="{{ asset('storage/images/'.$UserProfiles->aadhar_back) }}">
              </div>
            </div>
            <hr>

         <h5 class="text-primary"> Pan Details</h5>
         <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Pan Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->pan_no}}</p>
              </div>
            </div>
            <hr>
           <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">GST Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$UserProfiles->gst_no}}</p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0  text-dark">Image</p>
              </div>
              <div class="col-sm-9">
              <span class="">Pan Card</span>  <img src="{{ asset('storage/images/'.$UserProfiles->pan_card) }}">
                <span class="">GST Certificate</span>   <img src="{{ asset('storage/images/'.$UserProfiles->gst_certificate) }}">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="accordionItem">
      <h2 class="accordionTitle"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
   Additional Info
      </button></h2>
      <div class="accordionContent">
      <div class="accordionContent">
           <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <p class="mb-0  text-dark">Nationality</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->nationality}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <p class="mb-0  text-dark">Marital Status</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->marital_status}}</p>
              </div>
            </div>
            <hr>
            <h5 class="text-primary">Children Info</h5>
         <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-6">
                <p class="mb-0  text-dark">Name</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->oneChildName}}</p>
              </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-6">
                <p class="mb-0  text-dark">Birth Date</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->oneChildDate}}</p>
              </div>
                        </div>
                </div>
                <!---->

                  <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-6">
                <p class="mb-0  text-dark">Study In</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->oneChildStudy}}</p>
              </div>
                        </div>
                </div>

            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <p class="mb-0  text-dark">Blood Group</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->bloodgroup}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <p class="mb-0  text-dark">Total Work Experience</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->experiance}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <p class="mb-0  text-dark">Language Known (Reading)</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->reading}}</p>
              </div>
            </div>
            <hr>
            <!---->
              <div class="row">
              <div class="col-sm-6">
                <p class="mb-0  text-dark">Language Known (Writing)</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->writing}}</p>
              </div>
            </div>
            <hr>
              <!---->
              <div class="row">
              <div class="col-sm-6">
                <p class="mb-0  text-dark">Language Known (Speaking)</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->speaking}}</p>
              </div>
            </div>
            <hr>
               <!---->
              <div class="row">
              <div class="col-sm-6">
                <p class="mb-0  text-dark">Dealer/Partner Info</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$UserProfiles->partner}}</p>
              </div>
            </div>



            @endforeach
          </div>
        </div>
      </div>
      </div>
    </div>

  </div>


  <script>
     const accordionTitles = document.querySelectorAll(".accordionTitle");

accordionTitles.forEach((accordionTitle) => {
  accordionTitle.addEventListener("click", () => {
    if (accordionTitle.classList.contains("is-open")) {
      accordionTitle.classList.remove("is-open");
    } else {
      const accordionTitlesWithIsOpen = document.querySelectorAll(".is-open");
      accordionTitlesWithIsOpen.forEach((accordionTitleWithIsOpen) => {
        accordionTitleWithIsOpen.classList.remove("is-open");
      });
      accordionTitle.classList.add("is-open");
    }
  });
});
  </script>




  <!--******** Accordian end *********-->

</div>


      </div>
    </div>
  </div>
    </div>
</section>

<!-- footer-file-start -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@include('footer.footer')
<!-- footer-file-start -->

<script>
    function previewImage(input) {
        var preview = document.getElementById('preview');
        var imagePreview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                imagePreview.style.display = 'block'; // Show the image preview container
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            // preview.src = "{{ asset('/images/ava3.webp') }}";
             var defaultImage = document.getElementById('default-image');
            preview.src = defaultImage.src;// Display a default image
            imagePreview.style.display = 'block'; // Show the image preview container
        }
    }
</script>
