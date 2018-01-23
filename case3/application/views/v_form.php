<div class="container">

	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Error!</strong>&nbsp; <?=$this->session->flashdata('error')?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif ?>

	<form method="POST">

		<div class="form-group">
			<label for="date">Date</label>
			
			<?php if ($this->uri->segment(2) == 'insert'): ?>
				<input type="text" class="form-control" id="date" name="date" placeholder="2018-01-24" value="<?=$date?>">
			<?php else: ?>
				<label for="date"><?=$date?></label>
				<input type="hidden" name="date" value="<?=$date?>">
			<?php endif ?>
		</div>

		<div class="form-group">
			<label for="max">Max</label>
			<input type="text" class="form-control" id="max" name="max" placeholder="100" value="<?=$max?>">
		</div>

		<div class="form-group">
			<label for="min">Min</label>
			<input type="text" class="form-control" id="min" name="min" placeholder="50" value="<?=$min?>">
		</div>

		<?php if ($this->uri->segment(2) == 'insert'): ?>
			<button class="btn btn-primary btn-full" name="submit" value="submit" type="submit">Insert</button>
		<?php else: ?>
			<button class="btn btn-primary btn-full" name="submit" value="submit" type="submit">Edit</button>
		<?php endif ?>

	</form>

</div>
