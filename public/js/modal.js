// Dapatkan semua tombol yang membuka modal
var openModalBtns = document.querySelectorAll("[id^='openModalBtn']");

// Dapatkan semua elemen modal
var modals = document.querySelectorAll(".modal");

// Dapatkan semua elemen <span> yang menutup modal
var spans = document.querySelectorAll(".close");

// Tambahkan event listener ke setiap tombol untuk membuka modal yang sesuai
openModalBtns.forEach(function (btn) {
    btn.addEventListener("click", function () {
        var modalId = btn.id.replace("openModalBtn", "myModal");
        document.getElementById(modalId).style.display = "block";
    });
});

// Tambahkan event listener ke setiap tombol close untuk menutup modal yang sesuai
spans.forEach(function (span) {
    span.addEventListener("click", function () {
        var modalId = span.getAttribute("data-modal");
        document.getElementById(modalId).style.display = "none";
    });
});

// Ketika pengguna mengklik di luar modal, tutup semua modal
window.onclick = function (event) {
    modals.forEach(function (modal) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
};
