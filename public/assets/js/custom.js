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
