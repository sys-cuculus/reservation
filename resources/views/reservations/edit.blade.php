<x-layout>
    <div class="container">
        <div>
            <h1>Manage Reservation</h1>
        </div>
        <div>
            <div>
                <h4>Restaurant: {{ $reservation->restaurant->restaurant_name }}</h4>
            </div>
            <form action="{{route('reservations.update', $reservation)}}" method="POST">
                @method('put')
            
                <div>
                    <x-input-label for="number_of_people" value="Number of people" />
                    <x-text-input type="number" name="number_of_people" value="{{ old('number_of_people') ?: $reservation->number_of_people}}" min="1"/>
                    <x-input-error :messages="$errors->get('number_of_people')" />
                </div>
                
                <div class="mb-4">
                    <x-input-label for="reservation_date" value="Date and Time" />
                    <x-text-input type="date" name="reservation_date" value="{{ old('reservation_date', $reservation->date) }}" min="{{ date('Y-m-d') }}" />
                    <select name="reservation_time" id="reservation_time" class="ml-2">
                        @foreach ($times as $time)
                            <option value="{{ $time }}" @selected(old('reservation_time', $reservation->time) === $time)>{{ $time }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('reservation_date')" />
                    <x-input-error :messages="$errors->get('reservation_date_time')" />
                    <x-input-error :messages="$errors->get('reservation_time')" />
                </div>

                <div>
                    <x-primary-button class="btn btn-primary">Change</x-primary-button>
                    <a href="{{ route('reservations.show', $reservation)}}" class="btn btn-secondary">Return</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
