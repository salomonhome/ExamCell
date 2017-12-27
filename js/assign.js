function addRow(tableID) {
    // to add a new row to the faculy add
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    var colCount = table.rows[0].cells.length;

    for(var i=0; i < colCount; i++) {
        var newcell = row.insertCell(i);
        newcell.innerHTML = table.rows[1].cells[i].innerHTML;
        switch(newcell.childNodes[0].type) {
            case "text":
                    newcell.childNodes[0].value = "";
                    break;
            /*
            case "checkbox":
                    newcell.childNodes[0].checked = false;
                    break;
            */
            case "select-one":
                    newcell.childNodes[0].selectedIndex = 0;
                    break;
        }
    }
}

function deleteRow(tableID, row_index) {
    // to delete a row from the faculy add
    try {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;

        if(rowCount <= 2) {
            alert("Cannot delete all the rows.");
        }
        else {
            table.deleteRow(row_index);
        }
    }
    catch(e) {
        alert(e);
    }
    return true;
}