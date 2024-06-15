<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
</head>
<body>
    <h1>Events</h1>
    <ul>
        @foreach($events as $event)
            <li><a href="{{ url('/event/' . $event->event_id) }}">Event {{ $event->event_id }}</a></li>
        @endforeach
    </ul>
</body>
</html>
