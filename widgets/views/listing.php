<section class="section featured-listings">
    <h2 class="section-heading"><?= $heading ?></h2>
    <div class="section-body featured-listings-grid row">
    <?php foreach ($listings as $listing): ?>
        <div class="col-lg-4">
            <div class="card listing">
                <img class="card-img-top" src="<?= $listing->image ?>" height="200" alt="Card image cap">
                <div class="card-body listing-details">
                    <h4 class="card-title listing-title"><?= $listing->title ?></h4>
                    <h6 class="card-subtitle listing-price mb-2 text-muted">
                        $<?= $listing->price ?> per month
                    </h6>
                    <p class="card-text listing-description"><?= $listing->descriptionShort ?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
</section>