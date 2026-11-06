const button = document.getElementById("requestData");
const div = document.getElementById("data");

button.addEventListener('click', () => {
    fetch("https://jsonplaceholder.typicode.com/todos/1")
    .then(response => response.json())
    .then(data => {
        div.textContent = `Todo Information\nUser ID: ${data.userId}\nID: ${data.id}\nTitle: ${data.title}\nCompleted: ${data.completed}`;
    });
});

const dbButton = document.getElementById("testDatabase");
const dbResults = document.getElementById("db-result");

dbButton.addEventListener("click", async () => {

    dbResults.textContent = "Testing connection...";

    try {
        const response = await fetch("test-db.php");
        const data = await response.json();

        dbResults.textContent = data.message;

    } catch (error) {
        console.error(error);
        dbResults.textContent = "Unable to reach database endpoint.";
    }
});