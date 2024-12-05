function handleNonaktif(id, status, type) {
    var modalMessage = document.getElementById('modalMessage-' + type + '-' + id);
    var nonaktifForm = document.getElementById('nonaktifForm-' + type + '-' + id);

    if (status === 0) {
        modalMessage.innerHTML = "Status " + (type === 'package' ? "paket" : "hidangan") + " ini sudah nonaktif.";
        nonaktifForm.querySelector("button[type='submit']").disabled = true;
    } else {
        modalMessage.innerHTML = "Apakah Anda yakin ingin mengubah status " + (type === 'package' ? "paket" : "hidangan") + " ini?";
        nonaktifForm.querySelector("button[type='submit']").disabled = false;
    }

    $('#hapusModal-' + type + '-' + id).modal('show');
}

