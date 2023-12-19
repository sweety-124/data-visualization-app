<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MySQL Query Form</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <h1>MySQL Query Form</h1>
  
    <form id="queryForm">
      <div class="column">
        <label for="hostAndUsername">Hostname and Username:</label>
        <input type="text" id="hostAndUsername" name="hostAndUsername" placeholder="Enter hostname and username" required>
      </div>

      <div class="column">
        <label for="dbAndPassword">Database and Password:</label>
        <input type="text" id="dbAndPassword" name="dbAndPassword" placeholder="Enter database and password" required>
      </div>

      <label for="customQuery">Custom SQL Query:</label>
      <textarea id="customQuery" name="customQuery" placeholder="Enter your SQL query" rows="4" required></textarea>

      <button type="button" onclick="submitForm()">Execute Query</button>
    </form>

    <div id="result"></div>
  </div>

  <script src="assets/script.js"></script>
</body>
</html>
