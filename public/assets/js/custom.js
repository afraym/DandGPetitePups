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


document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.add-to-cart-btn').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const puppyId = this.getAttribute('data-puppy-id');

            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ puppy_id: puppyId })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data) {
                    $.toast({
                        heading: data.status,
                        text: data.message,
                        position: 'top-right',
                         icon: data.icon,
                        stack: false
                    });
                }
            })
            .catch(error => {
                $.toast({
                    heading: 'Error',
                    text: 'An unexpected error occured , please try again.',
                    icon: 'error'
                })
            });
        });
    });
});

// remove from cart
$(document).ready(function () {
    $('.delete-cart-item').on('click', function (event) {
        event.preventDefault();
        const itemId = $(this).data('item-id');
        const itemElement = $(this).closest('tr');

        $.ajax({
            url: '/cart/remove',
            type: 'POST',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({ item_id: itemId }),
            success: function (data) {
                if (data.success) {
                    $.toast({
                        heading: data.status,
                        text: data.message,
                        position: 'top-right',
                        icon: data.icon,
                        stack: false
                    });
                    // Fade out the closest <tr> element
                    itemElement.fadeOut(500, function () {
                        $(this).remove();
                    });
                } else {
                    $.toast({
                        heading: data.status,
                        text: data.message,
                        position: 'top-right',
                        icon: data.icon,
                        stack: false
                    });
                }
            },
            error: function () {
                $.toast({
                    heading: 'Error',
                    text: 'An unexpected error occurred, please try again.',
                    icon: 'error'
                });
            }
        });
    });
});
