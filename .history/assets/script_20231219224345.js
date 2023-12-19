// assets/script.js

google.charts.load('current', { 'packages': ['corechart'] });

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
    .then(response => response.json())
    .then(data => {
        drawBarChart(data, resultContainer);
    })
    .catch(error => console.error('Error:', error));
}

function drawBarChart(data, container) {
    const dataTable = new google.visualization.DataTable();
    dataTable.addColumn('string', 'Label');
    dataTable.addColumn('number', 'Value');

    data.forEach((value, index) => {
        dataTable.addRow([`Data Point ${index + 1}`, value]);
    });

    const options = {
        title: 'Result Visualization',
        legend: { position: 'bottom' },
    };

    const chart = new google.visualization.BarChart(container);
    chart.draw(dataTable, options);
}
