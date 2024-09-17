document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('createAgendaForm');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(form);

            fetch(form.action, { // Use form action URL
                method: 'POST', // Use POST method
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
                    responseMessage.innerText = 'Agenda created successfully!';
                    form.reset(); // Reset form if successful
                } else {
                    responseMessage.innerText = 'Error: ' + data.message; // Display error message
                }
            })
            .catch(error => {
                document.getElementById('responseMessage').innerText = 'Error: ' + error.message;
            });
        });
    }
});
