// assets/script.js

function submitForm(isSearch) {
    const form = document.getElementById('queryForm');
    const resultContainer = document.getElementById('result');
  
    // Collect form data
    const formData = new FormData(form);
  
    // Convert form data to URL-encoded string
    const formDataString = new URLSearchParams(formData).toString();
  
    // Determine the endpoint based on whether it's a search or query
    const endpoint = isSearch ? 'search.php' : 'execute-query.php';
  
    // Send a POST request to the server
    fetch(endpoint, {
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
  