// script.js

google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(connectDatabase);

function connectDatabase() {
    console.log('##############################')
    const form = document.getElementById('databaseForm');
    const formData = new FormData(form);

    fetch('query_backend.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Process and visualize data using Google Charts
        drawChart(data);
    })
    .catch(error => console.error('Error:', error));
}

function drawChart(data) {
    const dataTable = new google.visualization.DataTable();
    // Assuming your data has columns 'name' and 'value'
    dataTable.addColumn('string', 'Name');
    dataTable.addColumn('number', 'Value');

    data.forEach(row => {
        dataTable.addRow([row.name, row.value]);
    });

    const options = {
        title: 'Data Visualization',
        // Add more options based on your visualization requirements
    };

    const chart = new google.visualization.ColumnChart(document.getElementById('chartContainer'));
    chart.draw(dataTable, options);
}
