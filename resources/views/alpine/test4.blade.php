<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE4: Two-Way Data Binding
        </h2>
    </x-slot>

    <div class="p-10 max-w-lg mx-auto">
        <form action=""
            x-data="{
                form: {
                    name: ''
                },

                user: null,

                submit() {
                    fetch('https://reqres.in/api/users', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body:  JSON.stringify(this.form)
                    })
                    .then(response => response.json())
                    .then(user => this.user = user);
                }
            }"

            @submit.prevent="submit"
        >
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                    for="name"
                >
                    Name
                </label>

                <!-- x-model is shorthand of :value="name" @input="name = $event.target.value" -->
                <input 
                    class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="name"   
                    id="name"
                    x-model="name"
                    required
                >
            </div>
            <template x-if="user">
                <div x-text="'The user ' + user.name + ' was created at ' + user.createdAt"></div>
            </template>
        </form>
    </div>
</x-app-layout>