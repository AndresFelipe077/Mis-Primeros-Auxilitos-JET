// Event delegation
document.addEventListener('dragstart', function(evt) {
  if (evt.target.tagName == 'IMG') {
    evt.preventDefault();
  }
});