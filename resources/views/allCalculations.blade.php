<div class="container">
	<h2>All Calculations</h2>
</div>

<a href="calculator">New Calculation</a>

<div>
	<table id="users" class="display">

		<thead>

			<tr>
				<th>Title</th>
				<th>Result</th>
			</tr>

		</thead>

		<tbody>

			@foreach ($allCalculations as $c)
			<tr>
				<td>{{$c->getTitle()}}</td>
				<td>{{$c->getResult()}}</td>
			</tr>
			@endforeach

		</tbody>

	</table>
</div>

