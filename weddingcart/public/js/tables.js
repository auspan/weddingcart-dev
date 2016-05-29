
$(document).ready(function(){

    var editGuestRow = null;
    var editGuestName = null;
    var editGuestEmail = null;
    var editGuestPhone = null;

    var guestsTable = $('#guestsTable').DataTable( {
        "pagingType": "simple_numbers",
        "dom": "<'row'<'col-sm-12'<'form-inline'<'form-group'f>>" +  "<'row'<'col-sm-12'tr>>" +   "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        "renderer": "bootstrap",
        "columns": [
            { "orderable": false },
            { "orderable": false },
            null,
            null,
            null,
            { "orderable": false },
            { "orderable": false }
        ]
    } );

    $.ajaxSetup({
        headers:{
            'X-CSRF-Token':$('meta[name="_token"]').attr('content')
        }
    })

    $('#guestsTable tr').on( 'click', '.selectRow', function (e) {

        e.preventDefault();
        if(editGuestRow != null)
        {
            showRowBeingEditedAlert();
            return;
        }
        var rowData = guestsTable.row().data();
        alert(rowData);
    } );

    $('#guestsTable').on('click', '.deleteRow', function (e) {
        e.preventDefault();
        var nRow = $(this).parents('tr')[0];
        if(editGuestRow != null)
        {
            showRowBeingEditedAlert();
            return;
        }
        var guestId = guestsTable.cell(nRow, 0).data();

        // Ajax request for deleting data in the backend
        $.ajax({
           type: "POST",
            url: 'deleteContact',
            data: {
                guestId: guestId
            },
            success: function() {
                guestsTable.row(nRow).remove().draw();
                showAlert("Yippe!!", "Guest Deleted", "success");
            },
            error: function() {

            }
        });
    } );

    $('#guestsTable').on('click', '.editRow', function (e) {
        e.preventDefault();
        var nRow = $(this).parents('tr')[0];
        if(editGuestRow != null && editGuestRow != nRow){
            resetEditRow();
        }
        editGuestRow = nRow;
        editRow(guestsTable, nRow);
    } );

    $('#guestsTable').on('click', '.updateRow', function (e) {
        e.preventDefault();
        var nRow = $(this).parents('tr')[0];
        if(editGuestRow != null && editGuestRow != nRow)
        {
            showRowBeingEditedAlert();
            return;
        }
        var jqInputs = $('input', nRow);
        var guestId = guestsTable.cell(nRow, 0).data();
        var guestName = jqInputs[1].value;
        var guestEmail = jqInputs[2].value;
        var guestPhone = jqInputs[3].value;

        alert(guestId+" : "+guestName+" : "+guestEmail+" : "+guestPhone);

        // Ajax request for updating data in the backend
        $.ajax({
           type: "POST",
            url: "updateContact",
            data: {
                guestId: guestId,
                guestName: guestName,
                guestEmail: guestEmail,
                guestPhone: guestPhone
            },
            success: function(){
                updateRow(guestsTable, nRow);
                resetEditFlags();
                showAlert("Yippe!!", "Guest Updated", "success");
            },
            error: function(){

            }
        });
    } );

    $('#guestsTable').on('click', '.cancelEditRow', function (e) {

        e.preventDefault();
        var jqTds = $('>td', editGuestRow);

        guestsTable.cell(editGuestRow, 2).data(editGuestName);
        guestsTable.cell(editGuestRow, 3).data(editGuestEmail);
        guestsTable.cell(editGuestRow, 4).data(editGuestPhone);
        jqTds[5].innerHTML = '<button type="button" class="editRow btn btn-default" aria-label="Edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
        jqTds[6].innerHTML = '<button type="button" class="deleteRow btn btn-default" aria-label="Delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
        guestsTable.row(editGuestRow).draw();

        resetEditFlags();
    });

    $('#addRow').on( 'click', function (e) {

        e.preventDefault();

        var guestName = $('#newName').val();
        var guestEmail = $('#newEmail').val();
        var guestPhone = $('#newPhone').val();

        // Ajax call for add guest
        $.ajax({
            type: "POST",
            url:"addContact",
            data:{
                guestName: guestName,
                guestEmail: guestEmail,
                guestPhone: guestPhone
            },
            success: function(data){
                addRowToGuestsTable(guestsTable, data);
                $('#newName').val('');
                $('#newEmail').val('');
                $('#newPhone').val('');
                //showAlert(data.title, data.message, data.level);
                showAlert("Yippe!!", "Guest Added", "success");
            },
            error: function(){
            }
        });

    } );


    function addRowToGuestsTable(guestsTable, guestsData)
    {

        if(editGuestRow != null)
        {
            showRowBeingEditedAlert();
        }

        var nRow = guestsTable.row.add([
            guestsData.id,
            '<input type="checkbox" id="checkAll" name="query_myTextEditBox">',
            guestsData.guestName,
            guestsData.guestEmail,
            guestsData.guestPhone,
            '<button type="button" class="editRow btn btn-default" aria-label="Edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>',
            '<button type="button" class="deleteRow btn btn-default" aria-label="Delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>',
        ]);

        $(guestsTable.cell(nRow, 0).node()).addClass('hidden');
        guestsTable.draw(false);
    }

    function editRow ( oTable, nRow )
    {

        var name = oTable.cell(nRow, 2).data();
        var email = oTable.cell(nRow, 3).data();
        var phone = oTable.cell(nRow, 4).data();

        editGuestRow = nRow;
        editGuestName = name;
        editGuestEmail = email;
        editGuestPhone = phone;

        var jqTds = $('>td', nRow);
        jqTds[2].innerHTML = '<input type="text" value="'+name+'">';
        jqTds[3].innerHTML = '<input type="email" value="'+email+'">';
        jqTds[4].innerHTML = '<input type="text" value="'+phone+'">';
        jqTds[5].innerHTML = '<button type="button" class="updateRow btn btn-default" aria-label="Update"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>';
        jqTds[6].innerHTML = '<button type="button" class="cancelEditRow btn btn-default" aria-label="Update"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
    }

    function updateRow ( oTable, nRow )
    {
        var jqInputs = $('input', nRow);
        var jqTds = $('>td', nRow);

        oTable.cell(nRow, 2).data(jqInputs[1].value);
        oTable.cell(nRow, 3).data(jqInputs[2].value);
        oTable.cell(nRow, 4).data(jqInputs[3].value);
        jqTds[5].innerHTML = '<button type="button" class="editRow btn btn-default" aria-label="Edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
        jqTds[6].innerHTML = '<button type="button" class="deleteRow btn btn-default" aria-label="Delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
        table.row(nRow).draw();
    }

    function showRowBeingEditedAlert ()
    {
        showAlert("Hmmm!!", "Row being edited. Please update or cancel", "success");
    }

    function resetEditFlags()
    {
        editGuestRow = null;
        editGuestName = null;
        editGuestEmail = null;
        editGuestPhone = null;
    }
} );