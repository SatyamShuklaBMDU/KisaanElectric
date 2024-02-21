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
                                 <h4 class="mt-2 ">Add Banner</h4>
                                 <form method="POST" action="{{url('/banner/update')}}" enctype="multipart/form-data">
  @csrf

                                    <div class="form-group">
    <label for="exampleFormControlFile1">Choose Banner</label>
    <input type="file"  class="form-control-file" name="banner" accept="" id="exampleFormControlFile1">
  </div>
                                 <div class="buttton mt-3 ">
                                    <button type="submit" class="btn-1 px-3 py-1">Submit</button>
                                 </div>
                              </div>
                            </form>




                            <div class="row mt-3 px-4">
                                <div class="col">
                                <table class="table responsive-table  table-striped">
                                        <thead style="
                                        background-color: white;
                                    ">
                                          <tr class="">
                                            {{-- <th scope="col"><input type="checkbox" name="" id=""></th> --}}
                                            <th scope="col">Sr.No.</th>
                                            <th scope="col ">Banner</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
{{-- {{-- --}}
@php
    $i=1;
@endphp
                                           @foreach ( $banner as $banner )


                                          <tr>
                                            {{-- <th scope="row"><input type="checkbox" name="" id=""></th> --}}
                                            <td><b>{{$i}}</b></td>
                                            <td><img src="{{ asset('storage/images/'.$banner->banner) }}" style="
                                                width: 500px;
                                            "></td>

                                             <td>
                                             <a href="{{url('/banner/delete/'.$banner->id)}}" class="btn " type="submit" style="
                                                background-color: crimson;
                                                color: wheat;
                                            ">Delete</a>
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
                         <!-- 4-blocks row end -->






</div>
</div>
</div>
</div>

<!-- footer-file-start -->

@include('footer.footer')
<!-- footer-file-start -->
