const urlRegex = /((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w]+@)[A-Za-z0-9\.\-]+)((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-\+=&;%@\.\w_]*)#?(?:[\.\!\/\\\w]*))?)/;

function isValidURL(string) {
  const res = string.match(urlRegex);
  return res !== null;
}

function validateForm() {
  const x = document.forms["urlform"]["input"].value;
  if (!isValidURL(x) || x == "") {
    Swal.fire(
      'Something\'s wrong here',
      'You have to enter a valid URL',
      'error'
    );
    return false;
  }
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
};
