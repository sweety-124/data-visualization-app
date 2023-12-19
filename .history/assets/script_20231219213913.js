// assets/script.js

function submitForm() {
    const form = document.getElementById('queryForm');
    const resultContainer = document.getElementById('result');

    const formData = new FormData(form);

    const formDataString = new URLSearchParams(formData).toString();

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
  