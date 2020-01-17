<!-- This file is a view for displaying the result of the calculation in a table -->

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
