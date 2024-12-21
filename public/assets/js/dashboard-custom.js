
const quillInstances = document.querySelectorAll('.htmledit');

quillInstances.forEach(quillElement => {
    const quill = new Quill(quillElement, {
        // Quill configuration options
        theme: 'snow'
    });

    quill.on('text-change', function (delta, oldDelta, source) {
        const htmlInput = quillElement.nextElementSibling;

        if (htmlInput && htmlInput.classList.contains('htmlvalue')) {
            htmlInput.value = quill.root.innerHTML;
        } else {
            console.error('Could not find the associated .htmlvalue input.');
        }
    });

});

// replace notfound images
// Get all images on the page
const images = document.querySelectorAll('img');

// Add the onerror attribute to each image
images.forEach(image => {
  image.onerror = function() {
    this.onerror = null;
    this.src = '/assets/images/bg/404image.jpg';
  };
});

Dropzone.autoDiscover = false;

$(document).ready(function () {
    //Breeds
    $(function () {
        $('#breed').selectpicker();
    });

    $('.date-picker').each(function () {
        $(this).datepicker({
            templates: {
                leftArrow: '<i class="now-ui-icons arrows-1_minimal-left"></i>',
                rightArrow: '<i class="now-ui-icons arrows-1_minimal-right"></i>'
            }
        }).on('show', function () {
            $('.datepicker').addClass('open');

            datepicker_color = $(this).data('datepicker-color');
            if (datepicker_color.length != 0) {
                $('.datepicker').addClass('datepicker-' + datepicker_color + '');
            }
        }).on('hide', function () {
            $('.datepicker').removeClass('open');
        });
    });

    $(".dropzone").dropzone({
        maxFiles: 100,
        // url: "/puppy/add",
        // url: function() {
        //     return $(this).parent().attr('action');
        // },
        url: $(".dropzone").parent().attr('action'),
        autoProcessQueue: false,
        addRemoveLinks: true,
        acceptedFiles: "image/*",
        paramName: "images", // The name that will be used to transfer the file
        maxFilesize: 2048, // MB
        thumbnailWidth: 300, //the "size of image" width at px
        thumbnailHeight: 250,
        uploadMultiple: true,
        parallelUploads: 100,

        // The setting up of the dropzone
        init: function () {
            var myDropzone = this;
            console.log($("#submitpuppy")[0]);
            // First change the button to actually tell Dropzone to process the queue.
            $("#submitpuppy")[0].addEventListener("click", function (e) {
                // Make sure that the form isn't actually being sent.
                // $("form").children().each(function(){
                //     $(this).slideUp(1100);
                // });

                $("form").slideUp(1100);
                e.preventDefault();
                e.stopPropagation();

                // submit form without images
                if (!myDropzone.files.length) {
                    $('form').submit(); // just submit the form
                   
                } else {
                    if ($('#name').val() == '') {
                        $('#name').parent().addClass('has-danger');
                    } else if ($("#price").val() == '') {
                        $('#price').parent().addClass('has-danger');
                    } else {
                        myDropzone.processQueue();
                    };

                }
            });

            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function (FILES, xhr, formData) {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
                window.scrollTo({ top: 0, behavior: 'smooth' });
                var data = $('.dropzoneform').serializeArray();
                $.each(data, function (key, el) {
                    formData.append(el.name, el.value);
                });

            });

            this.on("successmultiple", function (files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
                console.log(response.success);
                $(".dropzoneform").fadeOut(3);
                $('#success').html(response.success)
                $('#success').fadeIn(3);
            });
            this.on("errormultiple", function (files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
                $.each(myDropzone.files, function (i, file) {
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



    // drag and drop images to change order
    $(function () {
        $("#imageListId").sortable({
            update: function (event, ui) {
                getIdsOfImages();
            } //end update        
        });
    });

    function getIdsOfImages() {
        var values = [];
        $('.listitemClass').each(function (index) {
            values.push($(this).attr("id")
                .replace("imageNo", ""));
        });
        $('#outputvalues').val(values);
    }
});


$(document).on("click", ".deleteitem", function () {
    var puppyID = $(this).data('id');
    $("#deleteitem").val(puppyID);
});

$('#aicreate').on("click", function (e) {

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
        success: function (response) {
            $('#longDesc .ql-editor').html(response.longDescription);
            $('#longDescHtml').val(response.longDescription);

            $('#shortDesc .ql-editor').html(response.shortDesription);
            $('#shortDescHtml').val(response.shortDesription);

            $('#aicreate').show();
            $('#aicreateloading').hide();
        },
        error: function (xhr, status, error) {
            $('#aicreate').show();
            $('#aicreateloading').hide();
            alert('Someting went wrong try again, Error: ' + error);
        }
    });
});

$('.date-picker').each(function () {
    $(this).datepicker({
        templates: {
            leftArrow: '<i class="now-ui-icons arrows-1_minimal-left"></i>',
            rightArrow: '<i class="now-ui-icons arrows-1_minimal-right"></i>'
        }
    }).on('show', function () {
        $('.datepicker').addClass('open');

        datepicker_color = $(this).data('datepicker-color');
        if (datepicker_color.length != 0) {
            $('.datepicker').addClass('datepicker-' + datepicker_color + '');
        }
    }).on('hide', function () {
        $('.datepicker').removeClass('open');
    });
});
