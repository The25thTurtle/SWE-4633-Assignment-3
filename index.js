const button = document.getElementById("requestData");
const div = document.getElementById("data");

button.addEventListener("click", () => {
    fetch("get-todo.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Failed to retrieve todo information");
            }
            return response.json();
        })
        .then(todos => {
            div.textContent = todos.map(todo =>
                `Todo Information\n` +
                `User ID: ${todo.user_id}\n` +
                `ID: ${todo.id}\n` +
                `Title: ${todo.title}\n` +
                `Completed: ${todo.completed}\n`
            ).join("\n");
        })
        .catch(error => {
            div.textContent = error.message;
        });
});
