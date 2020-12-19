<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE2: Data Binding
        </h2>
    </x-slot>

    <div x-data="{ message: 'Hello world', message2: ''}">
        <h1 x-text="message.toUpperCase().substr(1)"></h1>

        <button @click="message = 'Changed!'">Click Me</button>

        <h1 x-text="message2"></h1>
        <input type="text" x-model="message2">
    </div>
    <hr/>
    <div x-data="{ first:0, second: 0 }">
        <input type="text" x-model.number="first"> + <input type="text" x-model.number="second"> = <output x-text="first + second"></output>
    </div>
</x-app-layout>