<div>
    <h2 class="text-xl font-bold mb-4">Manage Properties</h2>

    <!-- Flash Messages -->
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-2 mb-2">{{ session('message') }}</div>
    @endif

    <!-- Add/Edit Form -->
    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'create' }}">
        <input type="text" wire:model="location" placeholder="Location">
        <input type="file" wire:model="image">
        <input type="number" wire:model="area" placeholder="Area (sq ft)">
        <input type="number" wire:model="beds" placeholder="Beds">
        <input type="number" wire:model="baths" placeholder="Baths">
        <input type="number" wire:model="garage" placeholder="Garage">
        <input type="number" wire:model="price" placeholder="Price">
        
        <button type="submit">{{ $isEdit ? 'Update Property' : 'Add Property' }}</button>
    </form>

    <!-- Properties Table -->
    <table>
        <thead>
            <tr>
                <th>Location</th>
                <th>Image</th>
                <th>Area</th>
                <th>Beds</th>
                <th>Baths</th>
                <th>Garage</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
            <tr>
                <td>{{ $property->location }}</td>
                <td><img src="{{ asset('storage/' . $property->image) }}" width="50"></td>
                <td>{{ $property->area }}</td>
                <td>{{ $property->beds }}</td>
                <td>{{ $property->baths }}</td>
                <td>{{ $property->garage }}</td>
                <td>{{ $property->price }}</td>
                <td>
                    <button wire:click="edit({{ $property->id }})">Edit</button>
                    <button wire:click="delete({{ $property->id }})">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
