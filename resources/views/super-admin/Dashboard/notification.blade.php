<!-- headr-file-start -->



@if(session()->has('message'))
    <script> alert('{{ session()->get('message') }}');

    </script>

{{session()->forget('message') }}
@endif
<style>
    .notification-form {
    padding: 40px;
    margin: 40px 0px 40px 0px;
}
</style>
@include('header.header')
<!-- headr-file-start -->
   <div class="content-wrapper">
      <!-- Container-fluid starts -->
      <!-- Main content starts -->
      <div class="container-fluid">
         <div class="row">
            <div class="main-header">
               <h4>Notification</h4>
            </div>
         </div>
         <!-- 4-blocks row start -->
         <div class="row dashboard-header" style="background: #e5e5e5;">
             <div class="col-md-11  mx-auto">
               <form class="notification-form shadow rounded" action="{{url('/notification/send')}}" method="post">
                @csrf
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="for" id="inlineRadio1" value="all">
  <label class="form-check-label" for="inlineRadio1">All</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="for" id="inlineRadio2" value="electrician">
  <label class="form-check-label" for="inlineRadio2">For Electrician</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="for" id="inlineRadio3" value="dealer">
  <label class="form-check-label" for="inlineRadio3">For Dealer</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="for" id="inlineRadio4" value="partner">
  <label class="form-check-label" for="inlineRadio4">For Partner</label>
</div>

  <div class="form-group">

    <label for="exampleInputEmail1">Subject</label>
    <input type="text" class="form-control" id="exampleInputsubject" name="title" aria-describedby="textHelp" placeholder="Subject">

  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Notification Message</label>
    <textarea class="form-control" placeholder="Type Message" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary btn-md">Submit</button>
</form>
   <!-- 4-blocks row end -->







      </div>
      <!-- Main content ends -->
      <!-- Container-fluid ends -->

   </div>
   </div>




<!-- footer-file-start -->

@include('footer.footer')
<!-- footer-file-start -->
