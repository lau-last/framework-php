<div class="container">
    <?php foreach ($articles as $article): ?>
        <div class="card text-center mt-5">
            <div class="card-header headband-top text-white">
                <?php echo $article->getTitle(); ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $article->getHead(); ?></h5>
                <p class="card-text"><?php echo $article->getExtract(); ?></p>
                <a href="<?php echo $article->getUrl(); ?>" class="btn btn-primary">See article</a>
            </div>
            <div class="card-footer text-white headband-bottom">
                <?php echo $article->getDate(); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>