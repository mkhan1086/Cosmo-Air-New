document.querySelector("#signup-form").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent the default form submission
    
    const formData = new FormData(e.target);
    
    fetch('http://localhost/Cosmo%20Airlines/php/controllers/UserController.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json()) // Parse the response as JSON
    .then(data => {
        console.log(data); // Log the response data for debugging
        
        if (data.success) {
            alert("User created successfully!");
        } else if (data.error) {
            alert("Error: " + data.error);
        }
    })
    .catch(error => {
        console.error('Error submitting the form:', error);  // Log any errors
    });
});
