window.todoStore = {
	todos: JSON.parse(localStorage.getItem('todo-store') || '[]'),

	save() {
		localStorage.setItem('todo-store', JSON.stringify(this.todos));
	}
};

// Another Approach with Constructor
// window.Todo = function(body) {
// 	this.id = Date.now();
// 	this.body = body;
// 	this.completed = false;

	// Give u a hook, like __set/__call magic method in php
	// return new Proxy(this, {
	// 	set(obj,prop, val) {
	// 		obj[prop] = val;

	// dispatch a event
	// todoStore.save();
	// 	}
	// })
// }


window.todos = function () {
	return {
		...todoStore,
		filter: 'all',
		newTodo: '',
		editedTodo: null,


		get active() {
			return this.todos.filter(todo => !todo.completed)
		},

		get completed() {
			return this.todos.filter(todo => todo.completed)
		},

		get filteredTodos() {
			return {
				all: this.todos,
				active: this.active,
				completed: this.completed
			}[this.filter];
		},

		get allComplete() {
			return this.todos.length === this.completed.length
		},

		addTodo() {
			if (!this.newTodo) {
				return;
			}

			// More OOP Approach with Constructor
			// this.todos.push(new Todo(this.newTodo));

			this.todos.push({
				id: Date.now(),
				body: this.newTodo,
				completed: false
			});

			this.save();

			this.newTodo = ''
		},

		editTodo(todo) {
			console.log('!"3');
			todo.cachedBody = todo.body;
			this.editedTodo = todo;
		},


		cancelEdit(todo) {
			todo.body = todo.cachedBody;

			this.editedTodo = null;
			
			delete todo.cachedBody;
		},

		editComplete(todo) {
			if (todo.body.trim() === '') {
				return this.deleteTodo(todo);
			}

			this.editedTodo = null;

			this.save();
		},

		deleteTodo(todo) {
			let position = this.todos.indexOf(todo);

			this.todos.splice(position, 1);

			this.save();
		},

		toggleTodoCompletion(todo) {
			todo.completed = ! todo.completed;

			this.save();
		},

		toggleAllComplete() {
			let allComplete = this.allComplete;

			this.todos.forEach(todo => todo.completed =! allComplete);

			this.save();
		},

		clearCompletedTodos() {
			this.todos = this.active;

			this.save();

			// this.update(() => {
			// 	this.todos = this.active;
			// })
		}
	}
}
