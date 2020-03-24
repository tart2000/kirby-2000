<?php snippet('header') ?>

<?php $pics = page('pics')->children() ?>

	<div class="grid">
		<?php foreach ($pics as $pic) : ?>

			<?php if ($pic->featured() != '') : ?>
				<?php if ($pic->featured() == true) : ?>
					<?php $makebig = 'grid-item--gigante'; ?>
				<?php endif ?>
				<?php if ($cover = $pic->cover()->toFile()) : ?>
					<?php $thumb = $cover->thumb([
						'width' => 640,
						'quality' => 80
					]) ?>
				<?php endif ?>
			<?php else : ?>
				<?php $makebig = '' ?>
				<?php if ($cover = $pic->cover()->toFile()) : ?>
					<?php $thumb = $cover->thumb([
						'width' => 300,
						'quality' => 80
					]) ?>
				<?php endif ?>
			<?php endif ?>
			<div class="grid-item <?= $makebig ?>">
				<a href="<?= $pic->url() ?>">
					
						<img src="<?= $thumb->url() ?>" class="thumb" alt="<?= $pic->title() ?>">
						
					
				</a>
			</div><!-- end card -->
			
		<?php endforeach ?>
	</div>

<?php snippet('footer') ?>
