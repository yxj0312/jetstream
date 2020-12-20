<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE4: Two-Way Data Binding
        </h2>
    </x-slot>

    <div class="p-10 max-w-lg mx-auto">
        <form action="">
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                    for="name"
                >
                    Name
                </label>

                <input 
                    class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="name"   
                    id="name"
                    required
                >

            </div>


        </form>

    </div>
</x-app-layout>