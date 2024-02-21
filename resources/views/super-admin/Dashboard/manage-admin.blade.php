<!-- headr-file-start -->
@include('header')

<style>
    .notification-form {
    padding: 40px;
    margin: 40px 0px 40px 0px;
}
</style>
<!-- headr-file-end-->
<div class="content-wrapper">
   <!-- Container-fluid starts -->
   <!-- Main content starts -->
   <div class="container-fluid">
      <div class="row">
         <div class="main-header">
            <h4>Manage Admins</h4>
         </div>
      </div>
      <div class="row dashboard-header" style="background: #e5e5e5;">
         <div class="col-md-11  mx-auto">
            <form class="notification-form shadow rounded">
               <div class="form-group">
                  <label for="exampleInputEmail1">Admin Title</label>
                  <input type="text" class="form-control" id="exampleInputsubject" aria-describedby="textHelp" placeholder="Admin Title">
               </div>
 <div class="form-group">
                  <label for="exampleInputEmail1">Create Password</label>
                  <input type="password" class="form-control" id="exampleInputsubject" aria-describedby="textHelp" placeholder="*****">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Role</label>
                  <input type="password" class="form-control" id="exampleInputsubject" aria-describedby="textHelp" placeholder="Role">
               </div>
  <h6>Assign Modules</h6>          
<div class="col-md-4">
     
               <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"checked>
  <label class="form-check-label" for="flexCheckChecked">
  All User
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
   User Status
  </label>
</div>
</div>
<div class="col-md-4">
               <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
 User Profile
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
 My Products
  </label>
</div>
</div>
<div class="col-md-4">
               <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
Ranking
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
  Cash Transition
  </label>
</div>
</div>

<div class="col-md-4">
               <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
Scheme Deliver
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
  Notification
  </label>
</div>
</div>
    
    
 <div class="col-md-4">
               <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
 Catelogue
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
Manage Page
  </label>
</div>
</div>

<div class="col-md-4">
               <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
 Feedback
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
Complaints
  </label>
</div>
</div>   
    
    
    
    
    
    
    
    
               <button type="submit" class="btn btn-dark btn-md" style="    margin: 30px 0px 0px;">Assign Roles</button></div>
            </form>
        
      </div>
   </div>
</div>
<!-- footer-file-start -->
@include('footer')
<!-- footer-file-end -->