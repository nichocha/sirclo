<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

        <title><?=$title?></title>
    </head>

    <body>
		
		<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
			
			<a class="navbar-brand" href="<?=base_url()?>">Body Weight Logging</a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
				
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>weight/insert">Insert</a>
					</li>
				</ul>
			</div>
		</nav>
