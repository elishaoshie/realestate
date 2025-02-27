@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Properties</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPropertyModal">Add Property</button>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Location</th>
                <th>Price</th>
                <th>Area</th>
                <th>Beds</th>
                <th>Baths</th>
                <th>Garage</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->location }}</td>
                    <td>{{ $property->price }}</td>
                    <td>{{ $property->area }}</td>
                    <td>{{ $property->beds }}</td>
                    <td>{{ $property->baths }}</td>
                    <td>{{ $property->garage }}</td>
                    <td>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Create Property Modal -->
    <div class="modal fade" id="createPropertyModal" tabindex="-1" role="dialog" aria-labelledby="createPropertyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPropertyModalLabel">Add Property</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Fields for Property -->
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="area">Area:</label>
                            <input type="number" class="form-control" id="area" name="area">
                        </div>
                        <div class="form-group">
                            <label for="beds">Beds:</label>
                            <input type="number" class="form-control" id="beds" name="beds">
                        </div>
                        <div class="form-group">
                            <label for="baths">Baths:</label>
                            <input type="number" class="form-control" id="baths" name="baths">
                        </div>
                        <div class="form-group">
                            <label for="garage">Garage:</label>
                            <input type="number" class="form-control" id="garage" name="garage">
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Property</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection