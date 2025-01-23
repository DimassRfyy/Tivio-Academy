const fileInput = document.getElementById('hidden-input');
const previewImg = document.getElementById('photo-preview');
const addPhotoText = document.querySelector('#upload-photo span');
const deletePhotoBtn = document.getElementById('delete-photo');

// Trigger file input when the upload button is clicked
document.getElementById('upload-photo').addEventListener('click', () => {
  fileInput.click();
});

// Handle file input change
fileInput.addEventListener('change', (event) => {
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = function (e) {
      previewImg.src = e.target.result; // Set the image preview
      previewImg.classList.remove('hidden'); // Show the image
      addPhotoText.classList.add('hidden'); // Hide the "Add Photo" text
      deletePhotoBtn.classList.remove('hidden'); // Show the delete button
    };

    reader.readAsDataURL(file); // Convert file to data URL
  }
});

// Handle delete photo button click
deletePhotoBtn.addEventListener('click', () => {
  fileInput.value = ''; // Clear the file input
  previewImg.src = ''; // Reset the image src
  previewImg.classList.add('hidden'); // Hide the image
  addPhotoText.classList.remove('hidden'); // Show the "Add Photo" text
  deletePhotoBtn.classList.add('hidden'); // Hide the delete button
});
