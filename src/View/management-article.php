<div class="container mt-150">
    <?php foreach ($articles as $article): ?>
        <div class="card text-center mt-5">
            <div class="card-header headband-top text-white">
                <?php echo $article->getTitle(); ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $article->getHead(); ?></h5>
                <p class="card-text"><?php echo $article->getContent(); ?></p>
                <a href="delete-article/<?php echo $article->getId(); ?>" class="btn btn-danger">Delete article</a>
                <a href="modify-article/<?php echo $article->getId(); ?>" class="btn btn-warning">Edit article</a>
            </div>
            <div class="card-footer text-white headband-bottom">
                Posted by <?php echo $article->getAuthor(); ?> at <?php echo $article->getDate(); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>