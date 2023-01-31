$('#data-table').DataTable();

// ===== preview img =====
document.addEventListener("DOMContentLoaded", function () {
    let uploadimg = document.getElementById('upload-img');
    uploadimg.addEventListener('change', function () {
        let previewImg = document.getElementById('preview-img');
        previewImg.src = URL.createObjectURL(event.target.files[0]);
    })
})
// ===== end preview img =====

// ===== notif delete ======
document.addEventListener("DOMContentLoaded", function () {
    let btnModalDelete = document.getElementsByClassName('btn-modal-delete');

    let hapus = function () {
        let url = this.getAttribute('data-url');
        document.getElementById('btn-delete').setAttribute('href', url);
    }

    for (let i = 0; i < btnModalDelete.length; i++) {
        btnModalDelete[i].addEventListener('click', hapus);
    }
})
// ===== end notif delete ======
