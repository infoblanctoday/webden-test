<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="form">
	<input type="text" name="name">
	<input type="text" name="surname">
	<button id="send">Send</button>
</div>

<script type="text/javascript">
	document.getElementById('send').addEventListener('click', function() {

		var formData = new FormData();

		let name = document.querySelector(`input[name="name"]`);
		let surname = document.querySelector(`input[name="surname"]`);

		formData.append('name', name.value);
		formData.append('surname', name.value);

		fetch('/?action=submit', {
			method: 'POST',
			body: formData
		})
		.then(function(response) {
			return response.json();
		})
		.then(function(data) {
			console.log(data);
			if(data.success) {
		        
		    } else {
		    	console.log('bad')
		        // proccess server errors
		    }
		})
		.catch(function(error) {
      		// proccess network errors
  		});
	})
	
</script>
</body>
</html>