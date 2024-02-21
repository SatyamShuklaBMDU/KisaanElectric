<!-- headr-file-start -->

@include('header.header')

@if(session()->has('message'))
    <script> alert('{{ session()->get('message') }}');

    </script>

{{session()->forget('message') }}
@endif
 <div class="content-wrapper" style="background-color:#e5e5e5;">
<div class="container-fluid">
        <div class="row">
           <div class="col-md-8 mx-auto mt-5" id="form">
               <div class="shadow p-3 rounded">
                                 <h4 class="mt-2 ">Add Catelogue</h4>
                                 <form method="POST" action="{{url('/catalog/update')}}" enctype="multipart/form-data">
  @csrf

                                    <div class="form-group">
    <label for="exampleFormControlFile1">Choose Catelogue Image</label>
    <input type="file"  class="form-control-file" name="pdf" accept=".pdf" id="exampleFormControlFile1">
  </div>

                                 <div class="buttton mt-3 ">
                                    <button type="submit" class="btn-1 px-3 py-1">Submit</button>
                                 </div>
                              </div>
                            </form>


</div>
</div>
</div>
</div>

<!-- footer-file-start -->

@include('footer.footer')
<!-- footer-file-start -->
