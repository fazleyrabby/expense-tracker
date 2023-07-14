import Chart from 'chart.js/auto';

const incomeColor = 'rgb(135,206,235)';
const expenseColor = 'rgb(205,92,92)'

const analytics = document.getElementById('myChart').dataset.analytics;

let extractColumn = (arr, column) => arr.map(x=>x[column]);

const labels = extractColumn(JSON.parse(analytics), 'month');

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