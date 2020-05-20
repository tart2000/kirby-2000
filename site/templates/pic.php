<?php snippet('header') ?>

<div class="container-fluid img-page mt-5 mb-5">

	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1><?= $page->title() ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="d-none d-lg-block col-md-2 align-self-center">
			<?php if ($page->hasPrev()) : ?>
				<a href="<?= $page->prev()->url() ?>" class="float-right">
					<img src="<?= $site->url() ?>/assets/arrow_left.png" class="img-fluid">
				</a>
			<?php endif ?>
		</div>
		<div class="col-md-8">
			<?php if ($cover = $page->cover()->toFile()) : ?>
				<?php $thumb = $cover->thumb([
					'width' => 2000,
					'quality' => 80
				]) ?>
				<img src="<?= $thumb->url() ?>" class="img-fluid main-image">
			<?php endif ?>
		</div>
		<div class="d-none d-md-block col-md-2 align-self-center">
			<?php if ($page->hasNext()) : ?>
				<a href="<?= $page->next()->url() ?>">
					<img src="<?= $site->url() ?>/assets/arrow_right.png" class="img-fluid">
				</a>
			<?php endif ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="meta">
				<?php if ($page->year() != '') : ?>
					<b>Year:</b> <?= $page->year() ?><br>
				<?php endif ?>

				<?php if ($page->city() != '') : ?>
					<b>City:</b> <?= $page->city() ?><br>
				<?php endif ?>

				<?php if ($page->country() != '') : ?>
					<b>Country:</b> <?= $page->country() ?><br>
				<?php endif ?>

				<?php if ($page->credits() != '') : ?>
					<b>Credits:</b> <?= $page->credits() ?><br>
				<?php endif ?>

				<?php if($user = $site->user()): ?>
					<a href="<?= $site->url() ?>/panel/pages/pics+<?= $page->uid() ?>">
						Edit
					</a>
				<?php endif ?>
			</div>	
		</div>
	</div>

	<!-- Mobile previous / next -->
	<nav aria-label="Page navigation example d-md-none">
	  <ul class="pagination justify-content-center mt-3">
	    <!-- Preivous button mobile -->
	    <?php if ($page->hasPrev()) : ?>
	    	<li class="page-item">
			    <a class="page-link" href="<?= $page->prev()->url() ?>">
			      	Previous
			    </a>
			</li>
		<?php else: ?>
			<li class="page-item disabled">
				<a href="#" class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
			</li>
		<?php endif ?>

		<!-- Next button mobile -->
	    <?php if ($page->hasNext()) : ?>
	    	<li class="page-item">
			    <a class="page-link" href="<?= $page->next()->url() ?>">
			      	Next
			    </a>
			</li>
		<?php else: ?>
			<li class="page-item disabled">
				<a href="#" class="page-link" tabindex="-1" aria-disabled="true">Next</a>
			</li>
		<?php endif ?>
	  </ul>
	</nav>


	
</div>

<?php snippet('footer') ?>