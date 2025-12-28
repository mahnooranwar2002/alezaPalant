


                <canvas id="myChart" height="250"></canvas>
   





<!-- Chart.js Library and Initialization Script moved to the bottom of the body 
     to ensure the DOM elements are loaded before the script attempts to access them. -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Use DOMContentLoaded to ensure the canvas element exists before trying to access it
document.addEventListener('DOMContentLoaded', () => {
    // 1. Get the chart context, safely checking if the element exists
    const chartElement = document.getElementById('myChart');
    if (!chartElement) {
        console.error("Chart Canvas element with ID 'myChart' not found.");
        return;
    }
    const ctx = chartElement.getContext('2d');

    // 2. Fetch data from the dedicated endpoint
    fetch('sale.php') 
      .then(res => {
        // CRITICAL: Check for HTTP errors (like 404 or 500)
        if (!res.ok) {
            throw new Error(`HTTP error! Status: ${res.status} - ${res.statusText}`);
        }
        return res.json();
      })
      .then(data => {
        // **CRITICAL FIX**: Check for server-side error message structure returned by sale.php
        if (data && data.error) {
            console.error('Server Data Error:', data.error);
            // Display an error message directly on the page instead of the chart
            document.getElementById('myChart').parentNode.innerHTML = 
                `<p class="text-danger p-4">Failed to load chart data. Error: ${data.error}</p>`;
            return;
        }
        createChart(data, 'polarArea');
      })
      .catch(err => {
        // This catches network errors or JSON parsing errors (like the '<' issue)
        console.error('Client-side fetch error or JSON parse error:', err);
        // Display a general error message on the page
        document.getElementById('myChart').parentNode.innerHTML = 
            `<p class="text-danger p-4">A critical error occurred while loading the chart. Please check the console for details.</p>`;
      });

    function createChart(chartData, type) {
      // Aggregate the data based on status codes
      const statusCounts = {};
      
      chartData.forEach(row => {
        let label;
        // Clean up data aggregation and status mapping
        if (row && row.status !== undefined) {
            const status = parseInt(row.status); // Ensure it's treated as a number
            if (status === 1) {
                label = 'Completed';
            } else if (status === 2) {
                label = 'Processing';
            } else {
                label = 'Pending';
            }
            statusCounts[label] = (statusCounts[label] || 0) + 1;
        }
      });

      new Chart(ctx, {
        type: type,
        data: {
          labels: Object.keys(statusCounts),
          datasets: [{
            label: 'Total Orders',
            data: Object.values(statusCounts),
            backgroundColor: [ '#dc3545', '#198754','#ffc107'], // Green, Yellow, Red
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                  stepSize: 1 // Ensure the Y-axis shows whole numbers for counts
              }
            }
          }
        }
      });
    }
});
</script>