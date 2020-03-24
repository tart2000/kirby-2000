<?php snippet('header') ?>

<div class="container-fluid img-page mt-5 mb-5">

	<div class="row">
		<div class="col-md-1">
			<?php if ($page->hasPrev()) : ?>
				<a href="<?= $page->prev()->url() ?>">
					Previous
				</a>
			<?php endif ?>
		</div>
		<div class="col-md-10">
			<h1><?= $page->title() ?></h1>
			<?php if ($cover = $page->cover()->toFile()) : ?>
				<?php $thumb = $cover->thumb([
					'width' => 2000,
					'quality' => 80
				]) ?>
				<img src="<?= $thumb->url() ?>" class="img-fluid">
			<?php endif ?>
			<div class="meta">
				<b>Year:</b> <?= $page->year() ?><br>

				<b>City:</b> <?= $page->city() ?><br>

				<b>Country:</b> <?= $page->country() ?><br>

				<b>Credits:</b> <?= $page->credits() ?><br>
			</div>	
		</div>
		<div class="col-md-1">
			<?php if ($page->hasNext()) : ?>
				<a href="<?= $page->next()->url() ?>">
					Next
				</a>
			<?php endif ?>
		</div>
	</div><!-- end card -->


	
</div>

<?php snippet('footer') ?>