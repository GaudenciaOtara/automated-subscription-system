 // Get the modal element
var modal = document.getElementById("edit-profile-modal");

// Get the button that opens the modal
var editProfileBtn = document.getElementById("edit-profile-btn");

// Get the <span> element that closes the modal
var closeBtn = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
editProfileBtn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
closeBtn.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

