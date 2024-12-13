<footer class="footer">
    <div class=" container-fluid ">
      <nav>
        <ul>
         <!--  <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="http://presentation.creative-tim.com">
              About Us
            </a>
          </li>
          <li>
            <a href="http://blog.creative-tim.com">
              Blog
            </a>
          </li> -->
        </ul>
      </nav>
      <div class="copyright" id="copyright">
        &copy; <script>
          document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
        </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a> & <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>. Coded by <a href="https://afraym.com" target="_blank">Afraym</a>.
      </div>
    </div>
  </footer>
</div>
</div>
<!--   Core JS Files   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
<!--  Google Maps Plugin    -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE" async></script> --}}
<!-- Chart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<!--  Notifications Plugin    -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('/assets/js/now-ui-dashboard.min.js?v=1.5.0')}}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/js/bootstrap-datepicker.min.js"></script>
<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>


<!-- Initialize Quill editor -->
<script>
  // const quill = new Quill('.htmledit', {
  //   theme: 'snow'
  // });

//   const quillElements = document.querySelectorAll('.htmledit');
//   // const quillInstances = document.querySelectorAll('.htmlvalue');
// quillElements.forEach(element => {
//   const quill = new Quill(element, {
//     theme: 'snow'
//   });

//   quill.on('text-change', function(delta, oldDelta, source) {
//     const htmlInput = quillElement.nextElementSibling;

//     if (htmlInput && htmlInput.classList.contains('htmlvalue')) {
//       htmlInput.value = quill.root.innerHTML;
//     }
//   });
//   // quill.on('text-change', function(delta, oldDelta, source) {
//   //       document.getElementsByClassName("htmlvalue").value = quill.root.innerHTML;
//   //   });
// });

// const quillInstances = document.querySelectorAll('.htmledit');

// quillInstances.forEach(quillElement => {
//   // const quill = new Quill(quillElement, {
//   //   // Quill configuration options
//   // });

//   quill.on('text-change', function(delta, oldDelta, source) {
//     const htmlInput = quillElement.nextElementSibling;

//     if (htmlInput && htmlInput.classList.contains('htmlvalue')) {
//       htmlInput.value = quill.root.innerHTML;
//     }
//   });
// });

const quillInstances = document.querySelectorAll('.htmledit');

quillInstances.forEach(quillElement => {
  const quill = new Quill(quillElement, {
    // Quill configuration options
    theme: 'snow'
  });

  quill.on('text-change', function(delta, oldDelta, source) {
    const htmlInput = quillElement.nextElementSibling;

    if (htmlInput && htmlInput.classList.contains('htmlvalue')) {
      htmlInput.value = quill.root.innerHTML;
    } else {
      console.error('Could not find the associated .htmlvalue input.');
    }
  });

});
</script>
<script>

  Dropzone.autoDiscover = false;

  $(document).ready(function () {
//Breeds
$(function() {
  $('#breed').selectpicker();
});

    $('.date-picker').each(function(){
    $(this).datepicker({
        templates:{
            leftArrow: '<i class="now-ui-icons arrows-1_minimal-left"></i>',
            rightArrow: '<i class="now-ui-icons arrows-1_minimal-right"></i>'
        }
    }).on('show', function() {
            $('.datepicker').addClass('open');

            datepicker_color = $(this).data('datepicker-color');
            if( datepicker_color.length != 0){
                $('.datepicker').addClass('datepicker-'+ datepicker_color +'');
            }
        }).on('hide', function() {
            $('.datepicker').removeClass('open');
        });
});

    $(".dropzone").dropzone({
            maxFiles: 100,
            // url: "/puppy/add",
            // url: function() {
            //     return $(this).parent().attr('action');
            // },
            url:  $(".dropzone").parent().attr('action'),
            autoProcessQueue: false,
            addRemoveLinks: true,
            acceptedFiles: "image/*",
            paramName: "images", // The name that will be used to transfer the file
            maxFilesize: 2048, // MB
            thumbnailWidth: 300,//the "size of image" width at px
            thumbnailHeight: 250,
            uploadMultiple: true,
            parallelUploads: 100,
            
            // The setting up of the dropzone
  init: function() {
    var myDropzone = this;
console.log(  $("#submitpuppy")[0]);
    // First change the button to actually tell Dropzone to process the queue.
    $("#submitpuppy")[0].addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
      e.preventDefault();
      e.stopPropagation();

      // submit form without images
      if (!myDropzone.files.length) {
        $('form').submit(); // just submit the form
      } else {
    if($('#name').val() == '') {
      $('#name').parent().addClass('has-danger');
    } else if($("#price").val() == '')
    {
      $('#price').parent().addClass('has-danger');
    } else {
      
      myDropzone.processQueue();
    };

  }

    });

    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
    // of the sending event because uploadMultiple is set to true.
    this.on("sendingmultiple", function(FILES, xhr, formData) {
      // Gets triggered when the form is actually being sent.
      // Hide the success button or the complete form.
      var data = $('.dropzoneform').serializeArray();
            $.each(data, function(key, el) {
                formData.append(el.name, el.value);
            });
    });
    
    this.on("successmultiple", function(files, response) {
      // Gets triggered when the files have successfully been sent.
      // Redirect user or notify of success.
      console.log(response.success);
      $(".dropzoneform").fadeOut(2);
      $('#success').html(response.success)
      $('#success').show();
    });
    this.on("errormultiple", function(files, response) {
      // Gets triggered when there was an error sending the files.
      // Maybe show form again, and notify user of error
      $.each(myDropzone.files, function(i, file) {
            file.status = myDropzone.QUEUED
        });

        // $.each(message, function(i, item) {
        //     $("#dropzoneErrors .errors ul").append("<li>" + message[i] + "</li>")
        // });
    });
  },
            success: function (file, response) {
                console.log(response);
            }
        });


    });


    $(document).on("click", ".deleteitem", function () {
     var puppyID = $(this).data('id');
     $("#deleteitem").val( puppyID );
});

$('#aicreate').on("click", function(e) {

        $('#aicreate').hide();
        $('#aicreateloading').show();
        e.preventDefault(); // Prevent default form submission

        var form = $('form');
        var formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: '/admin/ai/new',
            data: formData,
            dataType: "json",
            success: function(response) {
                $('#longDesc .ql-editor').html(response.longDescription);
                $('#longDescHtml').val(response.longDescription);

                $('#shortDesc .ql-editor').html(response.shortDesription);
                $('#shortDescHtml').val(response.shortDesription);

                $('#aicreate').show();
                $('#aicreateloading').hide();
            },
            error: function(xhr, status, error) {
                $('#aicreate').show();
                $('#aicreateloading').hide();
                alert('Someting went wrong try again, Error: ' + error);
            }
        });
    });
//   $(document).ready(function () {
//     Dropzone.autoDiscover = false;
//   window.Dropzone.options.myDropzone = {
//     autoDiscover : false,
//     url: "/chunkupload",
//     autoProcessQueue: false,
//     addRemoveLinks: true,
//     acceptedFiles: "video/*,application/octet-stream,video/MP2T,.ts",
//     paramName: "localFile", // The name that will be used to transfer the file
//     maxFilesize: 2048, // MB
//     thumbnailWidth: 300,//the "size of image" width at px
//     thumbnailHeight: 250,
//     maxFiles: 1,
//     uploadMultiple: false,
//     chunking: true,
//     chunksize: 5000000,
//     parallelChunkUploads: false,
//   }
// });

</script>
</body>

</html>