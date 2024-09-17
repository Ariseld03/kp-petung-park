<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda List</title>
</head>
<body>
    <h1>Agenda List</h1>
    <a href="{{ route('agendas.create') }}">Create New Agenda</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Location</th>
                <th>Status</th>
                <th>Description</th>
                <th>Staff Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agendas as $agenda)
                <tr>
                    <td>{{ $agenda->event_name }}</td>
                    <td>{{ $agenda->event_start_date }}</td>
                    <td>{{ $agenda->event_end_date }}</td>
                    <td>{{ $agenda->event_location }}</td>
                    <td>{{ $agenda->status }}</td>
                    <td>{{ $agenda->description }}</td>
                    <td>{{ $agenda->staff_email }}</td>
                    <td>
                        <a href="{{ route('agendas.show', $agenda->id) }}">View</a>
                        <a href="{{ route('agendas.edit', $agenda->id) }}">Edit</a>
                        <form action="{{ route('agendas.destroy', $agenda->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
