<div class="container-fluid">

	<table class="table table-striped">
		
		<thead>
			<tr>
				<th scope="col">Date</th>
				<th scope="col"><?=$weight['date']?></th>
			</tr>
		</thead>
		
		<tbody>
			<tr>
				<td>Max</td>
				<td><?=$weight['max']?></td>
			</tr>
			<tr>
				<td>Min</td>
				<td><?=$weight['min']?></td>
			</tr>
			<tr>
				<td>Variance</td>
				<td><?=$weight['max'] - $weight['min']?></td>
			</tr>
		</tbody>

	</table>

</div>