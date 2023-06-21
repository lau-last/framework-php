<div class="container mt-150">
    <h1 class="text-center">Article management</h1>
    <?php foreach ($articles as $article): ?>
        <div class="card text-center mt-5">
            <div class="card-header headband-top text-white">
                <?php echo $article->getTitle(); ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $article->getHead(); ?></h5>
                <p class="card-text"><?php echo $article->getContent(); ?></p>
                <a href="article-delete/<?php echo $article->getId(); ?>" class="btn btn-danger">Delete</a>
                <a href="article-modify/<?php echo $article->getId(); ?>" class="btn btn-warning">modify</a>
            </div>
            <div class="card-footer text-white headband-bottom">
                Posted by <?php echo $article->getAuthor(); ?> at <?php echo $article->getDate(); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>