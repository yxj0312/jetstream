<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE1
        </h2>
    </x-slot>
    
    <div x-data="{ message: 'Click Me'}" class="px-10 flex items-center justify-center min-h-screen">
        <div class="flex-1 grid grid-cols-4 gap-10">
            <div class="h-32 bg-gray-300">
                <button @click="alert('hi there')" x-text="message"></button>
            </div>
            <div class="h-32 bg-gray-300"></div>
            <div class="h-32 bg-gray-300"></div>
            <div class="h-32 bg-gray-300"></div>
            <div class="h-32 bg-gray-300"></div>
            <div class="h-32 bg-gray-300"></div>
            <div class="h-32 bg-gray-300"></div>
            <div class="h-32 bg-gray-300"></div>
        </div>
    </div>
</x-app-layout>