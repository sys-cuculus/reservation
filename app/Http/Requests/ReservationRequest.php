<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number_of_people' => ['required', 'numeric', 'min:1'],
            'reservation_date' => ['required', 'date',],
            'reservation_time' => ['required', 'string'],
            'reservation_date_time' => [
                'date',
                'after:now',
                Rule::unique('reservations', 'reservation_time')
                ->where('restaurant_id', $this->restaurant->id)
            ],
        ];
    }

    /**
     * Convert inputs into reservation_date_time
     */
    protected function prepareForValidation(): void
    {
        if ($this->input('reservation_date') && $this->input('reservation_time')) {
            $reservationDateTime = Carbon::createFromFormat(
                'Y-m-d H:i',
                $this->input('reservation_date') . ' ' . $this->input('reservation_time')
            );

            $this->merge(['reservation_date_time' => $reservationDateTime]);
        }

    }

    public function messages(): array
    {
        return [
            'reservation_date_time.unique' => 'Seats not available',
        ];
    }
}
