
function addEntry() {
    var entryType = document.getElementById("salary").value;
    var name = document.getElementById("firstName").value;
    var date = document.getElementById("dateInput").value;

    var table = document.getElementById("financeTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);

    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);

    cell1.innerHTML = entryType;
    cell2.innerHTML = name;
    cell3.innerHTML = date;
    cell4.innerHTML = '<a href="#" class="edit">Edit</a> | <a href="#" class="delete">Delete</a>';
}

document.addEventListener('DOMContentLoaded', function () {
    var editButtons = document.querySelectorAll('.edit');
    var deleteButtons = document.querySelectorAll('.delete');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            // Handle edit action here
            console.log('Edit clicked');
            event.preventDefault();
        });
    });

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            // Handle delete action here
            console.log('Delete clicked');
            event.preventDefault();
        });
    });
});

