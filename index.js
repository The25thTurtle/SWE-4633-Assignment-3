const button = document.getElementById("requestData");
const div = document.getElementById("data");

button.addEventListener('click', () => {
    fetch("get-todo.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Failed to retrieve todo information");
            }
            return response.json();
        })

        .then(data => {
            div.textContent = 
            `Todo Information\n` +
            `User ID: ${data.userId}\n` +
            `ID: ${data.id}\n` +
            `Title: ${data.title}\n` +
            `Completed: ${data.completed}`;
        })

        .catch(error => {
            div.textContent = error.message;
     });
});