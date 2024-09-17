document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('agendaForm');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(form);
            const id = form.querySelector('input[name="id"]').value;

            fetch(`/agendas/${id}`, { // Ensure URL is correct
                method: 'PUT', // Use PUT method for updates
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                const responseMessage = document.getElementById('responseMessage');
                if (data.success) {
                    responseMessage.innerText = 'Agenda updated successfully!';
                } else {
                    responseMessage.innerText = 'Error: ' + data.message;
                }
            })
            .catch(error => {
                document.getElementById('responseMessage').innerText = 'Error: ' + error.message;
            });
        });
    }
});
