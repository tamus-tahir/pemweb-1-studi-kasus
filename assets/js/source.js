$('#data-table').DataTable();


// ===== notif delete ======
let btnModalDelete = document.getElementsByClassName('btn-modal-delete');

let hapus = function () {
    let url = this.getAttribute('data-url');
    document.getElementById('btn-delete').setAttribute('href', url);
}

for (let i = 0; i < btnModalDelete.length; i++) {
    btnModalDelete[i].addEventListener('click', hapus);
}
// ===== end notif delete ======