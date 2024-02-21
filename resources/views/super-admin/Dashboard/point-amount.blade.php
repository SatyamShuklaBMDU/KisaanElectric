<!-- headr-file-start -->

@include('header.header')
<!-- headr-file-start -->



@if(session()->has('message'))
    <script> alert('{{ session()->get('message') }}');

    </script>

{{session()->forget('message') }}
@endif

  <div class="content-wrapper" style="background-color:#e5e5e5;">
<div class="container-fluid">
        <div class="row">
           <div class="col-md-8 mx-auto mt-4" id="form">
               <div class="shadow p-3 rounded">
                                 <h4 class="mt-2 ">Set 1 Point Value</h4>
                                 <form action="{{url('/point-amount/update')}}" method="post" class="mt-3">
                                   @csrf

                                   @foreach ( $amount as $amount )




                                    <div class="form-group">
                                        <label for="">Electricians</label>
                                        <input type="text" name="electrician" class="form-control" value="{{$amount->electrician}}" placeholder="Points Value">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Dealer</label>
                                        <input type="text" name="dealer" class="form-control" value="{{$amount->dealer}}" placeholder="Points Value">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Partner</label>
                                        <input type="text" name="partner" class="form-control" value="{{$amount->partner}}" placeholder="Points Value">
                                    </div>


                                    @endforeach
                                    <!--<div class="form-group">-->
                                    <!--   <input type="text" name=" " class="form-control" placeholder="Points*">-->
                                    <!--</div>-->
                                 <div class="buttton mt-3 ">
                                    <button type="submit" class="btn-1 px-3 py-1">Save Value</button>
                                 </div>
                              </div>
                            </form>
{{--
                        <div class="shadow p-3 rounded mt-5">
                                 <h4 class="mt-2 ">Amount Notification Message</h4>
                                 <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
   Electrican
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
   Dealer
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
  Partner
  </label>
</div>
                                 <form action="" class="mt-3">
                                    <div class="form-group">
                                       <input type="text" name=" " class="form-control" placeholder="Type Message">
                                    </div>


                                 </form>
                                 <div class="buttton mt-3 ">
                                    <button type="button" class="btn-1 px-3 py-1">Submit</button>
                                 </div>
                              </div> --}}

</div>
</div>
</div>
</div>
<!-- footer-file-start -->

@include('footer.footer')
<!-- footer-file-start -->
