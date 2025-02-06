function handleNonaktif(id, status, type) {
    var modalMessage = document.getElementById('modalMessage-' + type + '-' + id);
    var nonaktifForm = document.getElementById('nonaktifForm-' + type + '-' + id);

    if (modalMessage && nonaktifForm) {
        if (status === 0) {
            modalMessage.innerHTML = "Status " + (type === 'package' ? "paket" : "hidangan") + " ini sudah nonaktif.";
            nonaktifForm.querySelector("button[type='submit']").disabled = true;
        } else {
            modalMessage.innerHTML = "Apakah Anda yakin ingin mengubah status " + (type === 'package' ? "paket" : "hidangan") + " ini?";
            nonaktifForm.querySelector("button[type='submit']").disabled = false;
        }

        $('#nonaktifModal-' + type + '-' + id).modal('show');
    } else {
        console.error("Modal elements not found for ID:", id, "Type:", type);
    }
}
