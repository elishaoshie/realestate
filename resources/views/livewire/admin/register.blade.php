<div class="container">
    <h2>Admin Register</h2>

    <form wire:submit.prevent="register">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" wire:model.defer="name" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" wire:model.defer="email" class="form-control" id="email" required>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" wire:model.defer="password" class="form-control" id="password" required>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" wire:model.defer="password_confirmation" class="form-control" id="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>