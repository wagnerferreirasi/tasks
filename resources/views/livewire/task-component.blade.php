<div>
    <div class="p-6 text-gray-900">
        @foreach ($tasks as $task)
            <div class="bg-gray-200 rounded-full p-4 mb-4 flex">
                <div class="flex items-center justify-around w-full">
                    <input type="checkbox" wire:click="complete({{ $task->id }})" id="{{ $task->id }}"
                        value="{{ $task->id }}" class="checkbox checkbox-lg"
                        {{ $task->completed ? 'checked' : '' }} />
                    <input type="text" readonly value="{{ $task->name }}"
                        class="input input-md input-bordered w-full max-w-lg" />
                    <div class="flex gap-4">
                        <button wire:click="edit({{ $task->id }})" class="btn btn-sm btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button wire:click="delete({{ $task->id }})" class="btn btn-sm btn-error">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </div>
                @if ($task->completed_at)
                    <div>
                        <p></p>
                    </div>
                @endif
            </div>
        @endforeach

        <div class="mt-4">
            <form wire:submit="save">
                @csrf
                <label class="input input-bordered flex items-center gap-2">
                    <input type="text" wire:model="task" class="grow" placeholder="Digite sua tarefa" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                </label>
                @error('task')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </form>
        </div>

    </div>
</div>
