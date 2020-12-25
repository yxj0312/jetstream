<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE8: Handling Custom Events
        </h2>
    </x-slot>

    <div class="p-12">
        <div
            x-data
        >
            <button @click="flash('Hello There')">Trigger Flash Message</button>
            <!-- with this we can write custom event instead of in the  global script -->
            <button @click="$dispatch('flash', 'Hello There Again')">Trigger Flash Message</button>
            <!-- <button @click="$dispatch('flash', { message: 'Foobar', level: 2, color:})">Trigger Flash Message</button> -->
        </div>

        <hr>

        <div 
            x-data="{ show: false, message: ''}"
            x-show.transition.opacity.scale.75.duration.3000ms="show"
            @flash.window="
            show = true; 
            message=$event.detail
            setTimeout(() => show = false, 3000);
            "
            x-text="message"
            class="fixed bottom-0 right-0 mb-4 mr-4 bg-blue-500 text-white p-4 rounded"
        >
            
        </div>

        <script>
            // call it in console with flash('message');
            window.flash = message => window.dispatchEvent(new CustomEvent('flash', { detail: message }));
        </script>
    </div>
</x-app-layout>