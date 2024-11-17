document.querySelector("#login-form").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    const formData = new FormData(e.target);

    fetch('php/login.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Successful login, redirect to the dashboard or homepage
            window.location.href = "dashboard.html";
        } else {
            // Show error message if login fails
            alert(data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
