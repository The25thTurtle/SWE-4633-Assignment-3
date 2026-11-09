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

// Retrieve authenticated user information
fetch("/.auth/me")
    .then(response => {
        if (!response.ok) {
            throw new Error("Unable to retrieve user information");
        }

        return response.json();
    })
    .then(users => {
        const welcomeMessage = document.getElementById("welcome-message");

        if (!users.length) {
            welcomeMessage.textContent = "Welcome!";
            return;
        }

        const claims = users[0].user_claims;

        function getClaim(names) {
            const claim = claims.find(c => {
                const type = c.typ.split("/").pop().toLowerCase();
                return names.includes(type);
            });

            return claim ? claim.val : "";
        }

        const name = getClaim(["given_name", "givenname", "name"]);

        welcomeMessage.textContent = name
            ? `Welcome, ${name}!`
            : "Welcome!";
    })
    .catch(error => {
        console.error(error);
        document.getElementById("welcome-message").textContent =
            "Welcome!";
    });
