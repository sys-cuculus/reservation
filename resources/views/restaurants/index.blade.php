<div>
    <h1>restaurants</h1>
</div>
@if (empty($restaurants->items))
    <div>
        <p>No restaurants found</p>
    </div>
@else
    @foreach ($restaurants->itams as $restaurant)
        <div>
            <p>{{ $restaurant->restaurant_name }}</p>
        </div>
    @endforeach
    
@endif
