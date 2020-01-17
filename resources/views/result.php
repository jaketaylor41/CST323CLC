<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<link rel="stylesheet" type="text/css" href="/cst323_milestone/public/css/custom-styles.css">
<body>
	<table class="table">

		<thead>

			<tr>
				<th>Title</th>
				<th>Result</th>
			</tr>

		</thead>

		<tbody>

<?php
    echo "<tr>";
    
    echo "<td>" . $c->getTitle() . "</td>";
    echo "<td>" . $c->getResult() . "</td>";

?>

</tbody>

	</table>

</body>
