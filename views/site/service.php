<?php 
$title = 'Servicios';
include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
		<div class="col-sm-12">
			<div class="features_items"><!--Servicios_items-->
				<h2 class="title text-center">Servicios</h2>

				<?php foreach ($servicesList as $service): ?>
					<div class="col-sm-4">
						<div class="servicios-image-wrapper">
							<div class="single-products">
								<div class="servicios-info text-center service-title">
									<div>
										<img src="<?echo Service::getImage($service['id']); ?>" alt="" />
									</div>
									<h3>
										<?php echo $service['name']; ?>
									</h3>
									<p>
										<?php echo $service['description']; ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>


			</div><!--features_items-->
		</div>
	</div>	
</section>
	
<?php include ROOT . '/views/layouts/footer.php'; ?>