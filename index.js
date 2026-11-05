const button = document.getElementById("requestData");
const div = document.getElementById("data");

button.addEventListener('click', () => {
    fetch("https://jsonplaceholder.typicode.com/todos/1")
    .then(response => response.json())
    .then(data => {
        div.textContent = `Todo Information\nUser ID: ${data.userId}\nID: ${data.id}\nTitle: ${data.title}\nCompleted: ${data.completed}`;
    });
});