<!DOCTYPE html>
<html>
<head>
    <title>Event Details</title>
</head>
<body>
    <h1>Event Details</h1>
    <form>
        @foreach($formFields as $field)
            <div>
                <label>{{ $field->data_key }}@if($field->is_mandatory) * @endif</label>
                @if($field->data_type == 1) 
                    <input type="text" name="{{ $field->data_key }}" value="{{ $formValues[$field->data_key] ?? '' }}" readonly>
                @elseif($field->data_type == 2) 
                    @foreach(explode(',', $field->key_options) as $option)
                        <input type="radio" name="{{ $field->data_key }}" value="{{ $option }}" @if(isset($formValues[$field->data_key]) && $formValues[$field->data_key] == $option) checked @endif readonly> {{ $option }}
                    @endforeach
                @elseif($field->data_type == 3)
                    @foreach(explode(',', $field->key_options) as $option)
                        <input type="checkbox" name="{{ $field->data_key }}[]" value="{{ $option }}" @if(isset($formValues[$field->data_key]) && in_array($option, explode(',', $formValues[$field->data_key]))) checked @endif readonly> {{ $option }}
                    @endforeach
                @elseif($field->data_type == 4) 
                    <select name="{{ $field->data_key }}" readonly>
                        @foreach(explode(',', $field->key_options) as $option)
                            <option value="{{ $option }}" @if(isset($formValues[$field->data_key]) && $formValues[$field->data_key] == $option) selected @endif>{{ $option }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        @endforeach
    </form>
    <a href="{{ url('/dash') }}">Back to Events</a>
</body>
</html>
