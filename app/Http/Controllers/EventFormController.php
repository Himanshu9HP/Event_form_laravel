<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventCategoricalDataKey;
use App\Models\EventCategoricalDataValue;

class EventFormController extends Controller
{
    /**
    * @description function for get form view
    */
    public function showForm()
    {
        $formFields = EventCategoricalDataKey::where('status', 1)->where('event_id', 1)->get();
        if ($formFields->isEmpty()) {
            $formFields = $this->getFormField();
        } 
        return view('event-form', compact('formFields'));
    }

    /**
    * @description custom for fields for intial
    */
    public function getFormField(){
        $customerFormFields = [
            (object)[
                'event_id' => 1,
                'data_key' => 'name',
                'data_type' => 1,
                'key_options' => '',
                'status' => 1,
                'is_mandatory' => 1,
            ],
            (object)[
                'event_id' => 1,
                'data_key' => 'gender',
                'data_type' => 2, 
                'key_options' => 'Male,Female,Other',
                'status' => 1,
                'is_mandatory' => 0,
            ],
            (object)[
                'event_id' => 1,
                'data_key' => 'type',
                'data_type' => 3,
                'key_options' => 'Indoor,OutDoor,Both',
                'status' => 1,
                'is_mandatory' => 0,
            ],
            (object)[
                'event_id' => 1,
                'data_key' => 'state',
                'data_type' => 4, 
                'key_options' => 'Punjab,Uttarakhand,Delhi,MP',
                'status' => 1,
                'is_mandatory' => 1,
            ],
        ];
        return collect($customerFormFields);
    }

    /**
    * @description save form
    */
    public function submitForm(Request $request)
    {
        $newEventId = rand(1, 9999);
        $formFields = EventCategoricalDataKey::where('status', 1)->get();
        if ($formFields->isEmpty()) {
            $formFields = $this->getFormField();
        } 
        $eventKeys = $formFields->map(function ($field) use ($newEventId) {
            return [
                'event_id' => $newEventId,
                'data_key' => $field->data_key,
                'data_type' => $field->data_type,
                'key_options' => $field->key_options,
                'status' => $field->status,
                'is_mandatory' => $field->is_mandatory
            ];
        });
        EventCategoricalDataKey::insert($eventKeys->toArray());

        foreach ($formFields as $field) {

            $dataValue = new EventCategoricalDataValue();
            $dataValue->event_id = $newEventId;
            $dataValue->user_id = null;
            $dataValue->data_key = $field->data_key;

            if (is_array($request->input($field->data_key))) {
                $dataValue->data_value = implode(',', $request->input($field->data_key));
            } else {
                $dataValue->data_value = $request->input($field->data_key);
            }

            $dataValue->status = 1; 
            $dataValue->save();
        }

        return redirect()->route('home')->with('success', 'Event submitted successfully.');
    }

    public function index()
    {
        $events = EventCategoricalDataKey::select('event_id')->distinct()->get();
        return view('home', compact('events'));
    }

    /**
    * @description function for get event by evemnt id
    */
    public function showEvent($id)
    {
        $formFields = EventCategoricalDataKey::where('event_id', $id)->get();        
        $formValues = EventCategoricalDataValue::where('event_id', $id)
                        ->pluck('data_value', 'data_key')->toArray();
        
        return view('event-show', compact('formFields', 'formValues', 'id'));
    }
}
