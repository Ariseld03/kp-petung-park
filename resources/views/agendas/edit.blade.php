<form id="agendaForm" method="POST" action="{{ route('agendas.update', $agenda->id) }}">
    @csrf
    @method('PUT') <!-- Use PUT method for updates -->
    <input type="hidden" name="id" value="{{ $agenda->id }}">

    <label for="event_name">Event Name:</label>
    <input type="text" name="event_name" id="event_name" value="{{ old('event_name', $agenda->event_name) }}" required>

    <label for="event_start_date">Start Date:</label>
    <input type="date" name="event_start_date" id="event_start_date" value="{{ old('event_start_date', $agenda->event_start_date) }}" required>

    <label for="event_end_date">End Date:</label>
    <input type="date" name="event_end_date" id="event_end_date" value="{{ old('event_end_date', $agenda->event_end_date) }}" required>

    <label for="event_location">Location:</label>
    <input type="text" name="event_location" id="event_location" value="{{ old('event_location', $agenda->event_location) }}" required>

    <label for="status">Status:</label>
    <input type="number" name="status" id="status" value="{{ old('status', $agenda->status) }}" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description">{{ old('description', $agenda->description) }}</textarea>

    <label for="staff_email">Staff Email:</label>
    <input type="email" name="staff_email" id="staff_email" value="{{ old('staff_email', $agenda->staff_email) }}" required>

    <button type="submit">Update Agenda</button>
</form>
<script src="{{ asset('js/updateAgenda.js') }}"></script>
<div id="responseMessage"></div>
