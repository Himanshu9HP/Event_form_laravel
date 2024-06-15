<!DOCTYPE html>
<html>
<head>
    <title>Event Form</title>
</head>
<body>
    <h1>Event Form</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form action="{{ url('/event-form') }}" method="POST">
        @csrf
        @foreach($formFields as $field)
            <div>
                <label>{{ $field->data_key }}@if($field->is_mandatory) * @endif</label>
                <!-- 1 id for text type -->
                @if($field->data_type == 1) 
                    <input type="text" name="{{ $field->data_key }}" @if($field->is_mandatory) required @endif>
                @elseif($field->data_type == 2) 
                <!-- 2 if for radio -->
                    @foreach(explode(',', $field->key_options) as $option)
                        <input type="radio" name="{{ $field->data_key }}" value="{{ $option }}" @if($field->is_mandatory) required @endif> {{ $option }}
                    @endforeach
                @elseif($field->data_type == 3) 
                    <!-- 3 is for checkbox -->
                    @foreach(explode(',', $field->key_options) as $option)
                        <input type="checkbox" name="{{ $field->data_key }}[]" value="{{ $option }}" @if($field->is_mandatory) required @endif> {{ $option }}
                    @endforeach
                @elseif($field->data_type == 4) 
                    <!-- 4 is for checkbox -->
                    <select name="{{ $field->data_key }}" @if($field->is_mandatory) required @endif>
                        @foreach(explode(',', $field->key_options) as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        @endforeach
        <button type="submit">Submit</button>
    </form>
</body>
</html>
