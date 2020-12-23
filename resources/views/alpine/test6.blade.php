<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE6: Transitions 101
        </h2>
    </x-slot>

    <div class="grid items-center justify-center h-screen">
        <div x-data="{ show: true }">
            <div class="w-12 h-12">
                <!-- <div class="bg-green-400 w-full h-full" x-show.transition.duration.5000ms.scale.0="show"></div> -->
                <div class="bg-green-400 w-full h-full" 
                x-show="show"
                x-transition:enter="transition transform duration-1000"
                x-transition:enter-start="opacity-0 scale-125"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                ></div>
            </div>

            <button @click="show = !show">Toggle</button>       
        </div>
    </div>
</x-app-layout>