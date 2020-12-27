window.todos = function () {
	return {
		todos: [],

		editedTodo: false,

		get active() {
			return this.todos.filter(todo => !todo.completed)
		},

		get completed() {
			return this.todos.filter(todo => todo.completed)
		},

		newTodo: '',

		addTodo() {
			this.todos.push({
				id: this.todos.length + 1,
				body: this.newTodo,
				completed: false
			});

			this.newTodo = ''
		},

		editTodo(todo) {
			this.editedTodo = todo;
			console.log(this.editedTodo)
			console.log(todo === this.editedTodo)
		},

		deleteTodo(todo) {
			let position = this.todos.indexOf(todo);

			this.todos.splice(position, 1);
		},

		completeTodo(todo) {
			todo.completed = true;
		}
	}
}
