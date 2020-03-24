<?php snippet('header') ?>

<?php $pics = page('pics')->children() ?>


<div class="container-fluid">
	<div class="grid">

		<!-- used to check if first for sizer -->
		<?php $count = 1 ?>
		
		<?php foreach ($pics as $pic) : ?>

			<!-- check if double sized -->
			<?php if ($pic->featured() != '') : ?>
				<?php if ($pic->featured() == true) : ?>
					<?php $makebig = 'col-md-6'; ?>
				<?php endif ?>
				<?php if ($cover = $pic->cover()->toFile()) : ?>
					<?php $thumb = $cover->thumb([
						'width' => 800,
						'quality' => 80
					]) ?>
				<?php endif ?>
			<?php else : ?>
				<!-- small image -->
				<?php $makebig = 'col-md-3' ?>
				<?php if ($cover = $pic->cover()->toFile()) : ?>
					<?php $thumb = $cover->thumb([
						'width' => 500,
						'quality' => 80
					]) ?>
				<?php endif ?>
			<?php endif ?>

			<div class="grid-sizer col-md-3"></div>

			<div class="grid-item <?= $makebig ?>">
				<div class="grid-item-content">
					<a href="<?= $pic->url() ?>">
						<img src="<?= $thumb->url() ?>" class="img-fluid" alt="<?= $pic->title() ?>">
					</a>
				</div>
			</div><!-- end card -->
			
			<?php $count++ ?> 
		<?php endforeach ?>
	</div>
</div>

<?php snippet('footer') ?>
