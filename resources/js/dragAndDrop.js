const dropzone = document.querySelector('#dropzone');
const dropzoneContent = document.querySelector('#dropzone-content');
const fileNames = document.querySelector('#file-names');
const fileInput = document.querySelector('#images');

// Function to update the UI when files are selected
function updateUIWithFiles(files) {
  dropzone.classList.remove('border-orange-600');
  dropzoneContent.innerHTML = '';

  // Display the selected file names
  fileNames.innerHTML = '';
  files.forEach(file => {
    const fileName = document.createElement('span');
    fileName.textContent = file.name;
    fileNames.appendChild(fileName);
  });
}

// Event listener for file input change
fileInput.addEventListener('change', function() {
  const files = Array.from(fileInput.files);
  updateUIWithFiles(files);
});

// Event listeners for drag and drop functionality
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropzone.addEventListener(eventName, function(event) {
    event.preventDefault();
    event.stopPropagation();
  });
});

dropzone.addEventListener('dragenter', function() {
  dropzone.classList.add('border-orange-600');
});

dropzone.addEventListener('dragover', function(event) {
  event.preventDefault();
  dropzone.classList.add('border-orange-600');
});

dropzone.addEventListener('dragleave', function() {
  dropzone.classList.remove('border-orange-600');
});

dropzone.addEventListener('drop', function(event) {
  event.preventDefault();
  dropzone.classList.remove('border-orange-600');
  const files = Array.from(event.dataTransfer.files);
  updateUIWithFiles(files);
});

// Event listener for click on dropzone
dropzone.addEventListener('click', function() {
  fileInput.click();
});