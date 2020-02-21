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
<div id="response"></div>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Surname</th>
		</tr>
	</thead>
	<tbody>
	<?php 

		foreach ($table as $key => $value) {
			echo "<tr>";
			echo "<td>".$value["name"]."</td>";
			echo "<td>".$value["surname"]."</td>";
			echo "</tr>";
		}

	?>
	</tbody>
</table>

<script type="text/javascript">
	document.getElementById('send').addEventListener('click', function() {

		var formData = new FormData();

		let name = document.querySelector(`input[name="name"]`);
		let surname = document.querySelector(`input[name="surname"]`);

		formData.append('name', name.value);
		formData.append('surname', name.value);

		fetch('?action=submit', {
			method: 'POST',
			body: formData
		})
		.then(function(response) {
			return response.json();
		})
		.then(function(data) {
		    document.getElementById('response').innerHTML =`<p>${data}</p>`;
		})
	})
	
</script>
</body>
</html>