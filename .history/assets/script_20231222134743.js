

google.charts.load('current', { 'packages': ['corechart'] });

function submitForm() {
    const form = document.getElementById('queryForm');
    const resultContainer = document.getElementById('result');
    const chartContainer = document.getElementById('myChart');

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

        drawLineChart(data, chartContainer);
    })
    .catch(error => console.error('Error:', error));
}


function drawLineChart(data, container) {
  // Parse the plain text data (array of values)
  const dataArray = data.split(',').map(value => parseFloat(value.trim())); // Modify based on your data format

  const dataTable = new google.visualization.DataTable();
  dataTable.addColumn('string', 'Label');
  dataTable.addColumn('number', 'Temperature');

  dataArray.forEach((value, index) => {
      if (index <= 50) {
          dataTable.addRow([`Data Point ${index + 1}`, value]);
      }
  });

  const options = {
      title: 'Temperature Data Visualization',
      curveType: 'function',
      legend: { position: 'bottom' },
      vAxis: {
          title: 'Temperature',
          minValue: 0, // Set your desired minimum value
          maxValue: 100, // Set your desired maximum value
          gridlines: {
              count: 11, // Set the number of gridlines (intervals)
          },
      },
  };

  const chart = new google.visualization.LineChart(container);
  chart.draw(dataTable, options);
}

