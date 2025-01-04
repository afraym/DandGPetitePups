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
            const cartIcon = this.querySelector('.cart-icon');
            const loaderIcon = document.getElementById(`loader-${puppyId}`);
            console.log(loaderIcon);

            // Hide cart icon and show loader icon
            if (cartIcon) cartIcon.style.display = 'none';
            if (loaderIcon) loaderIcon.style.display = 'inline-block';

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
                    // Show cart icon and hide loader icon
                if (cartIcon) cartIcon.style.display = 'inline-block';
                if (loaderIcon) loaderIcon.style.display = 'none';
                    $.toast({
                        heading: data.status,
                        text: data.message,
                        position: 'top-right',
                        icon: data.icon,
                        stack: 5,
                        hideAfter: 9000   // in milli seconds
                    });
                }
            })
            .catch(error => {
                // Show cart icon and hide loader icon
                cartIcon.style.display = 'inline-block';
                loaderIcon.style.display = 'none';
                $.toast({
                    heading: 'Error',
                    text: 'An unexpected error occurred, please try again.',
                    icon: 'error',
                    stack: 5,
                    hideAfter: 9000   // in milli seconds
                });
            })
            .finally(() => {
                // Show cart icon and hide loader icon
                cartIcon.style.display = 'inline-block';
                loaderIcon.style.display = 'none';
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
