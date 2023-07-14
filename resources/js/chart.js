import Chart from 'chart.js/auto';

const incomeColor = 'rgb(135,206,235)';
const expenseColor = 'rgb(205,92,92)'

const analytics = document.getElementById('myChart').dataset.analytics;

let extractColumn = (arr, column) => arr.map(x=>x[column]);

const labels = extractColumn(JSON.parse(analytics), 'month');

// Define Chart.js default settings
// Chart.defaults.font.family = '"Inter", sans-serif';
// Chart.defaults.font.weight = '500';
// Chart.defaults.color = 'rgb(148, 163, 184)';
// Chart.defaults.scale.grid.color = 'rgb(241, 245, 249)';
// Chart.defaults.plugins.tooltip.titleColor = 'rgb(30, 41, 59)';
// Chart.defaults.plugins.tooltip.bodyColor = 'rgb(30, 41, 59)';
// Chart.defaults.plugins.tooltip.backgroundColor = '#FFF';
// Chart.defaults.plugins.tooltip.borderWidth = 1;
// Chart.defaults.plugins.tooltip.borderColor = 'rgb(226, 232, 240)';
// Chart.defaults.plugins.tooltip.displayColors = false;
// Chart.defaults.plugins.tooltip.mode = 'nearest';
// Chart.defaults.plugins.tooltip.intersect = false;
// Chart.defaults.plugins.tooltip.position = 'nearest';
// Chart.defaults.plugins.tooltip.caretSize = 0;
// Chart.defaults.plugins.tooltip.caretPadding = 20;
// Chart.defaults.plugins.tooltip.cornerRadius = 4;
// Chart.defaults.plugins.tooltip.padding = 8;

const data = {
    labels: labels,
    datasets: [{
        label: 'Income',
        backgroundColor: incomeColor,
        borderColor: incomeColor,
        data: extractColumn(JSON.parse(analytics), 'income'),
    },
    {
        label: 'Expense',
        backgroundColor: expenseColor,
        borderColor: expenseColor,
        data: extractColumn(JSON.parse(analytics), 'expense'),
    }]
};

const config = {
    type: 'bar',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);