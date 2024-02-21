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
                                 <h4 class="mt-2 ">Set Daily Transaction Limit</h4>
                                 <form action="{{url('/daily-limit/update')}}" method="post" class="mt-3">
                                   @csrf

                                   @foreach ( $limit as $limit )




                                    <div class="form-group">
                                        <label for="">Electricians</label>
                                       <input type="number" name="electrician" class="form-control" value="{{$limit->electrician}}" placeholder="Rupee*">
                                    </div>
                                    {{-- @endforeach --}}



                                    <div class="form-group">
                                        <label for="">Dealers</label>
                                     <input type="text" name="dealers" class="form-control" value="{{$limit->dealer}}" placeholder="Rupee*">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Partners</label>
                                     <input type="text" name="Partners" class="form-control" value="{{$limit->partner}}" placeholder="Rupee*">
                                    </div>

                                    @endforeach
                                 <div class="buttton mt-3 ">
                                    <button type="submit" class="btn-1 px-3 py-1">Update</button>
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
