require('./bootstrap');

import taskApp from './components/TaskApp';

window.taskApp = taskApp;


// If alpinejs is in the compiled js, should follow window.
// window.taskApp = () => {
//     return { 
//         tasks: [], 
//         newTask: '',

//         submit() {
//             this.tasks.push({body: this.newTask, completed: false}); this.newTask=''
//         }  
//     };
// }
