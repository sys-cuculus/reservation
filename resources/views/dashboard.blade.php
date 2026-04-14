<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-2 container w-75">
        <div class="mb-2 text-center">
            <h1 class="text-3xl font-bold">Reservations</h1>
            <p class="text-right">
                <a href="{{ route('restaurants.index')}} " type="button" class="btn btn-secondary">Restaurants</a>
            </p>
        </div>
        @if ($reservations->isEmpty())
            <div>
                <div>
                    <p>No Reservations</p>
                </div>
            </div>            
        @else
            <div>
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Restaurant</th>
                            <th>Reserved time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->restaurant->restaurant_name}}</td>
                            <td>{{ $reservation->reservation_time }}</td>
                            <td>
                                <a href="{{ route('reservations.show', $reservation) }}" type="button" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
