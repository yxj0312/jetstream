<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE8: Handling Custom Events
        </h2>
    </x-slot>

    <div class="p-12">
        <div x-data>
            <button @click="alert('I was clicked')">Click Me</button>
        </div>
    </div>
</x-app-layout>