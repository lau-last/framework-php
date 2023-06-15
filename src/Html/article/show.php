<div class="container">
    <div class="card text-center mt-5">
        <div class="card-header headband-top text-white">
            <?php echo $article->getTitle(); ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $article->getHead(); ?></h5>
            <p class="card-text"><?php echo $article->getContent(); ?></p>
        </div>
        <div class="card-footer text-white headband-bottom">
            <?php echo $article->getDate(); ?>
        </div>
    </div>
    <?php foreach ($comments as $comment) : ?>
        <div class="card text-center mt-5 comment-container">
            <div class="card-header headband-top text-white">
                <?php echo $comment->getUserId(); ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $comment->getContent(); ?></p>
            </div>
            <div class="card-footer text-white headband-bottom">
                <?php echo $comment->getDate(); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>