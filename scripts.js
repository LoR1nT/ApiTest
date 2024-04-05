// Function to populate lead statuses table
function populateLeadTable(data) {
    const leadTableBody = document.querySelector('#leadTable tbody');
    // Clear existing table rows
    leadTableBody.innerHTML = '';
    // Populate table with new data
    data.data.forEach(lead => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${lead.id}</td>
            <td>${lead.email}</td>
            <td>${lead.status}</td>
            <td>${lead.ftd}</td>
        `;
        leadTableBody.appendChild(row);
    });
}

// Function to filter leads by date
function filterLeads() {
    const startDate = document.getElementById('startDate').value + ' 00:00:00';
    const endDate = document.getElementById('endDate').value + ' 23:59:59';
    fetch(`get_lead_statuses.php?startDate=${startDate}&endDate=${endDate}`)
        .then(response => response.json())
        .then(data => populateLeadTable(data))
        .catch(error => console.error('Error:', error));
}

// Initial population of lead statuses table
fetch('get_lead_statuses.php')
    .then(response => response.json())
    .then(data => populateLeadTable(data))
    .catch(error => console.error('Error:', error));
