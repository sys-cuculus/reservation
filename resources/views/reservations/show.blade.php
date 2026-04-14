<x-layout>
    <div class="container">
        <div class="mb-4">
            <h1>Reservation Detail</h1>
            <p class="mt-2">
                <a href="{{ route('dashboard')}} " type="button" class="btn btn-secondary">Dashboard</a>
            </p>
        </div>
        <div class="fs-4">
            <p>
                <b>Restaurant:</b> 
                {{ $reservation->restaurant->restaurant_name }}
            </p>
            <p>
                <b>Number of People:</b>
                {{ $reservation->number_of_people }}
            </p>
            <p>
                <b>Address:</b>
                {{ $reservation->restaurant->address }}
            </p>
            <p>
                <b>Tel:</b>
                {{ $reservation->restaurant->tel }}
            </p>
        </div>
        <div>
            <a href="#" type="button" class="btn btn-primary me-2">Manage</a>
            <a href="#" type="button" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</x-layout>
