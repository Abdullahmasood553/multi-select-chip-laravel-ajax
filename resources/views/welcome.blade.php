<!DOCTYPE html>
<html>
<head>
	<title>Multi-select Dropdown with Checkboxes in Laravel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container mt-5">
		<h3 class="text-center mb-5">Multi-select Dropdown with Checkboxes in Laravel</h3>
				<form>
			<div class="form-group">
				<label for="options">Select Options:</label>
				<select multiple class="form-control" id="options">
					@foreach($options as $option)
					<option value="{{ $option->id }}">
						<label><input type="checkbox" name="option[]" value="{{ $option->id }}"> {{ $option->title }}</label>
					</option>
					@endforeach
				</select>
			</div>
			<button type="button" class="btn btn-primary" onclick="saveOptions()">Save</button>
		</form>
	</div>
	<script>
		function saveOptions() {
			var selectedOptions = [];
			$('#options option:selected').each(function() {
				var optionId = $(this).val();
				var selectedCheckbox = $(this).find('input[name="option[]"]:checked').val();
				if(selectedCheckbox) {
					selectedOptions.push(optionId);
				}
			});
			$.ajax({
		
				type: 'post',
				data: {
					selectedOptions: selectedOptions,
					_token: '{{ csrf_token() }}'
				},
				success: function(response) {
					alert(response);
				},
				error: function(xhr, status, error) {
					console.log(error);
				}
			});
		}
	</script>
</body>
</html>