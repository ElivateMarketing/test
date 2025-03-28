<div class="flex justify-center items-center min-h-screen">
    <form wire:submit.prevent="submit" class="w-full max-w-md bg-white p-6 rounded shadow">
        <div>
            {{ $this->form }}
        </div>
        <div class="mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
        </div>
    </form>
</div>