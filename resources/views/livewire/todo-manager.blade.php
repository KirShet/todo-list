<?php

use Livewire\Volt\Component;
use App\Models\Todo;

new class extends Component {
    public Todo $todo;
    public string $todoName = '';

    public function createTodo()
    {
        $this->validate([
            'todoName' => 'required|min:3',
        ]);

        Auth::user()
            ->todos()
            ->create([
                'name' => $this->todoName,
        ]);
    }

    public function with()
    {
        return [
            'todos' => Auth::user()->todos()->get(),
        ];
    }
}; ?>

<div>
    <form wire:submit='createTodo'>
        <x-text-input wire:model='todoName' />
        <x-primary-button type="submit">Create</x-primary-button>
        <x-input-error :messages="$errors->get('todoName')" class="mt-2" />
    </form>
    @foreach ($todos as $todo)
        <div wire:key='{{ $todo->id }}'>
            <div>
                {{$todo->name}}
            </div>
            <button wire:click='delete({{$todo->id}})'
                class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Delete</button>
        </div>
    @endforeach
</div>