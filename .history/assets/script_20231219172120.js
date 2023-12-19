// assets/script.js

function queryData() {
    const tableName = document.getElementById('tableName').value;
  
    // Send a POST request to the server to get data for the specified table
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Parse the JSON response
        const data = JSON.parse(xhr.responseText);
  
        // Use a graph library (e.g., Chart.js) to visualize the data
        visualizeData(data);
      }
    };
    xhr.send(`tableName=${tableName}`);
  }
  
  function visualizeData(data) {
    // Use your preferred graph library here to visualize the data
    // Example: Display data in the console for simplicity
    console.log(data);
  }
  