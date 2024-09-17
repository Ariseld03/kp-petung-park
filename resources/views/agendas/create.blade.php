<!DOCTYPE html>
<html>
<head>
    <title>Create Agenda</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Create New Agenda</h1>

    <!-- Form for creating a new agenda -->
    <form id="agendaForm" method="POST" action="{{ route('agendas.store') }}">
        @csrf
        <!-- Form Fields -->
        <label for="event_name">Event Name:</label>
        <input type="text" name="event_name" id="event_name" required>

        <label for="event_start_date">Start Date:</label>
        <input type="date" name="event_start_date" id="event_start_date" required>

        <label for="event_end_date">End Date:</label>
        <input type="date" name="event_end_date" id="event_end_date" required>

        <label for="event_location">Location:</label>
        <input type="text" name="event_location" id="event_location" required>

        <label for="status">Status:</label>
        <input type="number" name="status" id="status" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>

        <label for="staff_email">Staff Email:</label>
        <input type="email" name="staff_email" id="staff_email" required>

        <button type="submit">Create Agenda</button>
    </form>

    <div id="responseMessage"></div>

    <!-- Add your script to handle the form submission -->
    <script src="{{ asset('js/createAgenda.js') }}"></script>
</body>
</html>
