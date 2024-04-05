function populateLeadTable(data) {
    const leadTableBody = document.querySelector('#leadTable tbody');
    leadTableBody.innerHTML = '';
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

function filterLeads() {
    const startDate = document.getElementById('startDate').value + ' 00:00:00';
    const endDate = document.getElementById('endDate').value + ' 23:59:59';
    fetch(`get_lead_statuses.php?startDate=${startDate}&endDate=${endDate}`)
        .then(response => response.json())
        .then(data => populateLeadTable(data))
        .catch(error => console.error('Error:', error));
}

fetch('get_lead_statuses.php')
    .then(response => response.json())
    .then(data => populateLeadTable(data))
    .catch(error => console.error('Error:', error));
