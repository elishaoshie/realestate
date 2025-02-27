<div class="container">
    <h2>Admin Login</h2>

    <form wire:submit.prevent="login">
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

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>