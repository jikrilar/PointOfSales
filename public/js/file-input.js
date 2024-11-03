const dropArea = document.getElementById("drop-area");
const fileInput = document.getElementById("file-input");
const fileList = document.getElementById("file-list");

// Drag and Drop functionality
dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropArea.classList.add("active");
});

dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("active");
});

dropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    dropArea.classList.remove("active");
    const files = e.dataTransfer.files;
    handleFiles(files);
});

// Open file input when drop area is clicked
dropArea.addEventListener("click", () => {
    fileInput.click();
});

// Handle files from input
fileInput.addEventListener("change", () => {
    const files = fileInput.files;
    handleFiles(files);
});

function handleFiles(files) {
    fileList.innerHTML = ""; // Clear previous file list
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const fileItem = document.createElement("div");
        fileItem.classList.add("file-item");
        fileItem.textContent = `File: ${file.name}`;
        fileList.appendChild(fileItem);
    }
}
