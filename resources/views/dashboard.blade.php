<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex gap-4 justify-start items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="" width="72" class="mr-8">
                        <h1 class="text-7xl font-bold">
                            Task Manager
                        </h1>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:task-component />
            </div>
        </div>
    </div>
</x-app-layout>
