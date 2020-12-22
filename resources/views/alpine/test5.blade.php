<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE5: How and When to Extract Component Logic
        </h2>
    </x-slot>

    <div class="p-10 max-w-lg mx-auto">
        <div class="bg-gray-300 px-10 py-6 rounded" x-data="{ tasks:[], newTask: '' }">
            <form action="" @submit.prevent="tasks.push({body: newTask, completed: false}); newTask=''">
                <input 
                type="text" 
                placeholder="Go to the market..." 
                x-model="newTask" 
                class="w-full px-1">
            </form>

            <ul class="list-disc mt-3">
                <template x-for="(task, index) in tasks" :key="index">
                    <li>
                        <input type="checkbox" x-model="task.completed">
                        <span x-text="task.body" :class="{ 'line-through': task.completed }"></span>
                    </li>
                </template>
            </ul>
        </div>
    </div>


</x-app-layout>