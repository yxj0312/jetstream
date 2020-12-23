<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE5: How and When to Extract Component Logic
        </h2>
    </x-slot>

    <div class="p-10 max-w-lg mx-auto">
        <!-- <div class="bg-gray-300 px-10 py-6 rounded" 
        x-data="{ tasks:[], newTask: '' }" 
        > -->
        <div class="bg-gray-300 px-10 py-6 rounded" 
        x-data="taskApp()" 
        >
            <!-- <form action="" @submit.prevent="tasks.push({body: newTask, completed: false}); newTask=''"> -->
            <form action="" @submit.prevent="submit">
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


<!-- <script>
    // Advise: keep inline as long as u can
    let taskApp = () => {
        return { 
            tasks: [], 
            newTask: '',

            submit() {
               this.tasks.push({body: this.newTask, completed: false}); this.newTask=''
            }  
        };
    }
</script> -->