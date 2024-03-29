var isEditing = false,
	tempNameValue = "",
	tempDataValue = "";

// Handles live/dynamic element events, i.e. for newly created edit buttons
$(document).on('click', '.edit', function() {
	var parentRow = $(this).closest('tr'),
		tableBody = parentRow.closest('tbody'),
		tdName = parentRow.children('td.name'),
		tdData = parentRow.children('td.data');

	if (isEditing) {
		var nameInput = tableBody.find('input[name="name"]'),
			dataInput = tableBody.find('input[name="data"]'),
			tdNameInput = nameInput.closest('td'),
			tdDataInput = dataInput.closest('td'),
			currentEdit = tdNameInput.parent().find('td.edit');

		if ($(this).is(currentEdit)) {
			// Save new values as static html
			var tdNameValue = nameInput.prop('value'),
				tdDataValue = dataInput.prop('value');

			tdNameInput.empty();
			tdDataInput.empty();

			tdNameInput.html(tdNameValue);
			tdDataInput.html(tdDataValue);
		} else {
			// Restore previous html values
			tdNameInput.empty();
			tdDataInput.empty();

			tdNameInput.html(tempNameValue);
			tdDataInput.html(tempDataValue);
		}
		
		
		// Display static row
		currentEdit.html('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>');
		isEditing = false;
	} else {
		// Display editable input row
		isEditing = true;
		$(this).html('<i class="fa fa-floppy-o" aria-hidden="true"></i>');

		var tdNameValue = tdName.html(),
			tdDataValue = tdData.html();

		// Save current html values for canceling an edit
		tempNameValue = tdNameValue;
		tempDataValue = tdDataValue;

		// Remove existing html values
		tdName.empty();
		tdData.empty();

		// Create input forms
		tdName.html('<input type="text" name="name" value="' + tdNameValue + '">');
		tdData.html('<input type="text" name="data" value="' + tdDataValue + '">');
	}
});

// Handles live/dynamic element events, i.e. for newly created trash buttons
$(document).on('click', '.trash', function() {
	// Turn off editing if row is current input
	if (isEditing) {
		var parentRow = $(this).closest('tr'),
			tableBody = parentRow.closest('tbody'),
			tdInput = tableBody.find('input').closest('td'),
			currentEdit = tdInput.parent().find('td.edit'),
			thisEdit = parentRow.find('td.edit');

		if (thisEdit.is(thisEdit)) {
			isEditing = false;
		}
	}

	// Remove selected row from table
	$(this).closest('tr').remove();
});

$('.new-row').on('click', function() {
	var tableBody = $(this).closest('tbody'),
		trNew = '<tr><td class="name"><input type="text" name="name" value=""></td><td class="data"><input type="text" name="data" value=""></td><td class="edit"><i class="fa fa-floppy-o" aria-hidden="true"></i></td><td class="trash"><i class="fa fa-trash-o" aria-hidden="true"></i></td></tr>';

	if (isEditing) {
		var nameInput = tableBody.find('input[name="name"]'),
			dataInput = tableBody.find('input[name="data"]'),
			tdNameInput = nameInput.closest('td'),
			tdDataInput = dataInput.closest('td'),
			currentEdit = tdNameInput.parent().find('td.edit');

		// Get current input values for newly created input cases
		var newNameInput = nameInput.prop('value'),
			newDataInput = dataInput.prop('value');

		// Restore previous html values
		tdNameInput.empty();
		tdDataInput.empty();

		tdNameInput.html(newNameInput);
		tdDataInput.html(newDataInput);

		// Display static row
		currentEdit.html('Edit');
	}

	isEditing = true;
	tableBody.find('tr:last').before(trNew);
});