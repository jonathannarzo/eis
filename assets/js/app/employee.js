$(document).on('submit', '#add-emp-form', function(e){
	e.preventDefault();
	$.ajax({
		url: $(this).attr('action'),
		type: $(this).attr('method'),
		dataType: 'json',
		data: $(this).serialize(),
		success:function(data){
			if (data.success) {
				alert('Record saved.')
				window.location = '';
			} else {
				$('#form-msg').html(data.msg);
			}
		}
	});
});

$(document).on('change', '#birth_date', function(){
	var bdate = this.value.split('/');
	var age = calculate_age(bdate[0], bdate[1], bdate[2]);
	$('#age').val(age);
});

$(document).on('click', '#emp-selectall-checbox', function(){
	var check_status = this.checked;
	$('.emp-record-checkbox').prop('checked', check_status);
});

$(document).on('click', '.emp-record-checkbox', function(){
	buttoncheck();
});


$(document).on('click', '#remove-selected', function(){
	var checks = $('.emp-record-checkbox:checked').length;
	if (checks > 0) {
		var del_url = [$(this).attr('rel')];
		$('.emp-record-checkbox:checked').each(function(){
			del_url.push(this.value);
		});

		if (confirm('Are you sure to delete the selected record(s)')) {
			$.ajax({
				url: del_url.join('/'),
				dataType: 'json',
				success:function(data){
					if (data.success) {
						alert('Record delete');
						window.location = '';
					}
				}
			});
		}
	}
});

$(document).on('click', '#edit-selected', function(){
	var checks = $('.emp-record-checkbox:checked').length;
	$('#addempModalLabel').html('Edit Employee');
	$('#form-method').val('edit');
	if (checks == 1) {
		var edit_url = [$(this).attr('rel')];
		$('.emp-record-checkbox:checked').each(function(){
			edit_url.push(this.value);
		});

		$.ajax({
			url: edit_url.join('/'),
			dataType: 'json',
			success:function(data){
				if (data.success) {
					$('#emp-record-id').val(data.id);
					$('#fullname').val(data.fullname);
					$('#position').val(data.position);
					$('#birth_date').val(data.birth_date);
					var bdate = data.birth_date.split('/');
					var age = calculate_age(bdate[0], bdate[1], bdate[2]);
					$('#age').val(age);
					$('#salary').val(data.salary);
					$('#add-new-emp-modal').modal('show');
				}
			}
		});
	}
});

$(document).on('click', '#add-employee', function(){
	$('#addempModalLabel').html('Add New Employee');
	$('#emp-record-id').val('');
	$('#form-method').val('');
	$('#add-emp-form').trigger('reset');
});

function buttoncheck()
{
	var checks = $('.emp-record-checkbox:checked').length;
	var remove_condition = (checks > 0);
	var edit_condition = (checks == 1);
	$('#edit-selected').prop('disabled', !edit_condition);
	$('#remove-selected').prop('disabled', !remove_condition);
}