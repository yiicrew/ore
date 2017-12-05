<section class="apartments">
    <h2 class="apartments-heading"><?= $heading ?></h2>
    <div class="row">
    <?php foreach ($apartments as $apartment): ?>
        <div class="col-lg-4">
            <div class="card apartment">
                <img class="card-img-top" src="<?= $apartment->image ?>" height="150" alt="Card image cap">
                <div class="card-body apartment-details">
                    <h4 class="card-title apartment-title"><?= $apartment->title ?></h4>
                    <h6 class="card-subtitle apartment-price mb-2 text-muted">
                        $<?= $apartment->price ?> per month
                    </h6>
                    <p class="card-text apartment-description"><?= $apartment->descriptionShort ?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
</section>
<br>
<br>
<br>