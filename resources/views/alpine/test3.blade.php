<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE3: Toggle Visibility Using State
        </h2>
    </x-slot>

    <div x-data="{ show: false }">
        <h1 x-show="show">Hello World</h1>

        <button @click="show=!show" x-text="show ? 'Hide' : 'Show'"></button>

        <div x-show="show">
            <a href="/" style="display:block">Home</a>
            <a href="/" style="display:block">About</a>
            <a href="/" style="display:block">Contact</a>
        </div>
    </div>

    <div x-data="{currentTab: 'first'}">
        <button @click="currentTab = 'first'">First</button>
        <button @click="currentTab = 'second'">Second</button>
        <button @click="currentTab = 'third'" :class="{'active':currentTab === 'third'}">Third</button>

        <div style="border:1px dotted grey; padding: 1rem">
            <div x-show="currentTab === 'first'">
                <p>First tab.</p>
            </div>
            <div x-show="currentTab === 'second'">
                <p>Second tab.</p>
            </div>
            <div x-show="currentTab === 'third'">
                <p>Third tab.</p>
            </div>
        </div>
    </div>
</x-app-layout>
