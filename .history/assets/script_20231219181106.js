// assets/script.js

function submitForm() {
    const form = document.getElementById('queryForm');
    const resultContainer = document.getElementById('result');
  
    // Collect form data
    const formData = new FormData(form);
  
    // Convert form data to URL-encoded string
    const formDataString = new URLSearchParams(formData).toString();
  
    // Send a POST request to the server
    fetch('execute-query.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: formDataString,
    })
    .then(response => response.text())
    .then(data => {
      resultContainer.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
  }
  