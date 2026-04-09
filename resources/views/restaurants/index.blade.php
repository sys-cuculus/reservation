<x-layout>
    <x-slot:title>Restaurants</x-slot:title>
    <div class="mb-4 text-center">
        <h1>Restaurants</h1>
    </div>
    @if ($restaurants->isEmpty())
        <div>
            <p>No restaurants found</p>
        </div>
    @else
        
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Restaurant Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">TEL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restaurants as $restaurant)
                        <tr>
                            <td>{{ $restaurant->restaurant_name }}</td>
                            <td>{{ $restaurant->address }}</td>
                            <td>{{ $restaurant->tel }}</td>
                            <td>
                                <a type="button" class="btn btn-primary" href="{{ route('reservations.create', ['restaurant' => $restaurant]) }}">Reserve</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    @endif
</x-layout>
