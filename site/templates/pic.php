<?php snippet('header') ?>

<div class="container img-page mt-5 mb-5">

	<div class="row">
			<h1><?= $page->title() ?></h1>
			<?php if ($cover = $page->cover()->toFile()) : ?>
				<?php $thumb = $cover->thumb([
					'width' => 2000,
					'quality' => 80
				]) ?>
				<img class="" src="<?= $thumb->url() ?>" class="img-fluid">
			<?php endif ?>
	</div><!-- end card -->


	<b>Year:</b> <?= $page->year() ?><br>

	<b>City:</b> <?= $page->city() ?><br>

	<b>Country:</b> <?= $page->country() ?><br>

	<b>Credits:</b> <?= $page->credits() ?><br>
</div>

<?php snippet('footer') ?>