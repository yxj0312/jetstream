<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE7: Transitions 102
        </h2>
    </x-slot>
    <div class="grid items-center justify-center h-screen">
        <div x-data="{ show: false }"  @click.away = "show = false">
            <button @click="show = !show">Links</button>

            <div class="absolute bg-black text-white py-2 rounded mt-1" x-show="show"
                x-transition:enter = "transition duration-200 transform ease-out"
                x-transition:enter-start = "scale-75"
                x-transition:leave = "transition duration-100 transform ease-in"
                x-transition:leave-end = "opacity-0 scale-90"
            >
                <a class="block hover:bg-gray-800 text-xs py-px px-4" href="#">Edit</a>
                <a class="block hover:bg-gray-800 text-xs py-px px-4" href="#">Delete</a>
                <a class="block hover:bg-gray-800 text-xs py-px px-4" href="#">Report Spam</a>
            </div>
        </div>
    </div>

</x-app-layout>