<!-- headr-file-start -->
@include('header.header')
<script src="https://cdn.tiny.cloud/1/j2m26a2zqx49l6cq9odk8l2qie4yefbz35ld1i8uk8jz0dub/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .notification-form {
    padding: 40px;
    margin: 40px 0px 40px 0px;
}
</style>

@if(session()->has('message'))
    <script> alert('{{ session()->get('message') }}');

    </script>

{{session()->forget('message') }}
@endif

<!-- headr-file-end-->
<div class="content-wrapper">
   <!-- Container-fluid starts -->
   <!-- Main content starts -->
   <div class="container-fluid">
      <div class="row">
         <div class="main-header">
            <h4>Social Media</h4>
         </div>
      </div>
      <div class="row dashboard-header" style="background: #e5e5e5;">
         <div class="col-md-11  mx-auto">
            <form class="notification-form shadow rounded" method="post" action="{{url('/social-media/update')}}" >
             @csrf
 @foreach ($term as $term )
                <div class="form-group">
                  <label for="exampleInputEmail1">Instagram Link</label>
                  <input type="text" class="form-control" name="instagram" id="exampleInputsubject" aria-describedby="textHelp" value="{{$term->instagram}}" placeholder="">
               </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Facebook Link</label>
                <input type="text" class="form-control" name="facebook" id="exampleInputsubject" aria-describedby="textHelp" value="{{$term->facebook}}" placeholder="">
             </div>
             <div class="form-group">
                <label for="exampleInputEmail1">Linkedin Link</label>
                <input type="text" class="form-control" name="linkedin" id="exampleInputsubject" aria-describedby="textHelp" value="{{$term->linkedin}}" placeholder="">
             </div>
             <div class="form-group">
                <label for="exampleInputEmail1">Twitter Link</label>
                <input type="text" class="form-control" name="telegram" id="exampleInputsubject" aria-describedby="textHelp" value="{{$term->twitter}}" placeholder="">
             </div>
               <div class="form-group">
                <label for="exampleFormControlTextarea1">Youtube Link</label>



                <input type="text" class="form-control"  name="youtube" value="{{$term->youtube}}"  >
@endforeach

              </div>
             <button type="submit" class="btn btn-primary btn-md" >Submit</button>

            </form>
         </div>
      </div>
   </div>
</div>




<!-- footer-file-start -->
@include('footer.footer')
<!-- footer-file-end -->
