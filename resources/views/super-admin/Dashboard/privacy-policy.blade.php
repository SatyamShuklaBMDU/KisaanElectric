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
            <h4>Privacy-Policy</h4>
         </div>
      </div>
      <div class="row dashboard-header" style="background: #e5e5e5;">
         <div class="col-md-11  mx-auto">
            <form class="notification-form shadow rounded" method="post" action="{{url('/privacy-policy/update')}}" id="myForm">
             @csrf

                {{-- <div class="form-group">
                  <label for="exampleInputEmail1">Page Title</label>
                  <input type="text" class="form-control" id="exampleInputsubject" aria-describedby="textHelp" placeholder="Page Title">
               </div> --}}
               <div class="form-group">
                <label for="exampleFormControlTextarea1">Page Content</label>

                @foreach ($term as $term )

                <textarea class="form-control" id="editor" name="subject" required  >{{$term->Subject}}</textarea>
                @endforeach

              </div>
             <button type="button" class="btn btn-primary btn-md"  onclick="saveContent()">Submit</button>

            </form>
         </div>
      </div>
   </div>
</div>





<script>tinymce.init({selector:'textarea',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons save  lists  searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent ',
        // tinycomments_mode: 'embedded',
        statusbar: false,
        content_css: 'writer'});</script>


    <script>
        function saveContent() {
            var content = tinymce.get('editor').getContent();
            document.getElementById('editor').value = content;
            document.getElementById('myForm').submit();
        }
    </script>



<style>


    .tox .tox-tbtn--select {
        color: black !important;
        background-color: #e3e3e3 !important;
        margin: 6px 1px 5px 0;
        padding: 0 4px;
        width: auto;
    }

    .tox .tox-tbtn--disabled, .tox .tox-tbtn--disabled:hover, .tox .tox-tbtn:disabled, .tox .tox-tbtn:disabled:hover {
        background-color: #e3e3e3 !important;
        background: 0 0;
        border: 0;
        box-shadow: none;
        color: rgba(34,47,62,.5);
        cursor: not-allowed;
    }

    .tox .tox-tbtn:active {
        background: #a6ccf7 !important;
        border: 0;
        box-shadow: none;
        color: #222f3e;
    }
    .tox .tox-tbtn {
        align-items: center;
        background: 0 0 !important;
        border: 0;
        border-radius: 3px;
        box-shadow: none;
        color: #222f3e !important;
        display: flex;
        flex: 0 0 auto;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        height: 28px;
        justify-content: center;
        margin: 6px 1px 5px 0;
        outline: 0;
        overflow: hidden;
        padding: 0;
        text-transform: none;
        /* width: 34px; */
    }

    .tox .tox-mbtn {
        display: none !important;
        align-items: center;
        background: 0 0;
        border: 0;
        border-radius: 3px;
        box-shadow: none;
        color: #222f3e !important;
        display: flex;
        flex: 0 0 auto;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        height: 28px;
        justify-content: center;
        margin: 5px 1px 6px 0;
        outline: 0;
        overflow: hidden;
        padding: 0 4px;
        text-transform: none;
        width: auto;
        background-color: white !important;
    }
    </style>



<!-- footer-file-start -->
@include('footer.footer')
<!-- footer-file-end -->
