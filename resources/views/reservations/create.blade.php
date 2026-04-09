<x-layout>
    <div class="container">
        <div>
            <h1 class="mb-4">Reservation</h1>
        </div>
        <div>
            <div>
                <h4>Restaurant: {{ $restaurant->restaurant_name }}</h4>
            </div>
            <form action="#">
            
                <div>
                    <x-input-label for="number_of_people" value="Number of people" />
                    <x-text-input type="number" name="number_of_people" />
                    <x-input-error :messages="$errors->get('number_of_people')" />
                </div>
                
                <div class="mb-4">
                    <x-input-label for="reservation_date" value="Date and Time" />
                    <x-text-input type="date" name="reservation_date" />
                    <x-input-error :messages="$errors->get('reservation_date')" />

                    <select name="reservation_time" id="reservation_time" class="ml-2">
                        @foreach ($times as $time)
                            <option value="{{ $time }}">{{ $time }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('reservation_time')" />
                </div>

                <div>
                    <x-primary-button class="btn btn-primary">Reserve</x-primary-button>
                    <a href="{{ route('restaurants.index')}}" class="btn btn-secondary">Return</a>
                </div>
                
            </form>
        </div>
        
    </div>
</x-layout>
