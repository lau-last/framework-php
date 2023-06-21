<div class="container mt-150">
    <h1 class="text-center">All Articles</h1>
    <?php foreach ($articles as $article): ?>
        <div class="card text-center mt-5">
            <div class="card-header headband-top text-white">
                <?php echo $article->getTitle(); ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $article->getHead(); ?></h5>
                <p class="card-text"><?php echo $article->getExtract(); ?></p>
                <a href="<?php echo $article->getUrl(); ?>" class="btn btn-warning">See article</a>
            </div>
            <div class="card-footer text-white headband-bottom">
                Posted by <?php echo $article->getAuthor(); ?> at <?php echo $article->getDate(); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>