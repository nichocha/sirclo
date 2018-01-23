<?php if ($this->session->flashdata('success')): ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success!</strong>&nbsp; <?=$this->session->flashdata('success')?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>

<?php if ($this->session->flashdata('error')): ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Error!</strong>&nbsp; <?=$this->session->flashdata('error')?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>

<table class="table table-striped">
	
	<thead>
		<tr>
			<th scope="col">Date</th>
			<th scope="col">Max</th>
			<th scope="col">Min</th>
			<th scope="col">Variance</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	
	<tbody>

		<?php foreach ($weight as $row): ?>
			
			<tr>
				<td><?=$row['date']?></td>
				<td><?=$row['max']?></td>
				<td><?=$row['min']?></td>
				<td><?=$row['max'] - $row['min']?></td>
				<td>
					<a class="btn btn-primary" href="<?=base_url()?>weight/view/<?=$row['date']?>" role="button">View</a>
					<a class="btn btn-success" href="<?=base_url()?>weight/edit/<?=$row['date']?>" role="button">Edit</a>
					<a class="btn btn-danger" href="<?=base_url()?>weight/delete/<?=$row['date']?>" role="button">Delete</a>
				</td>
			</tr>

		<?php endforeach ?>

	</tbody>

</table>