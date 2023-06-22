<div class="container mt-150">
    <h1 class="text-center">Comment management</h1>
    <?php if (\App\Manager\Notification::notificationInvalidComment() === '0') :?>
        <div class="alert alert-warning text-center mt-5" role="alert">
            No comment to manage
        </div>
    <?php endif;?>
    <?php foreach ($comments as $comment) : ?>
        <div class="card text-center mt-5 comment-container">
            <div class="card-header headband-top text-white">
                Posted by <?php echo $comment->getAuthor(); ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $comment->getContent(); ?></p>
                <a href="comment-delete/<?php echo $comment->getId(); ?>" class="btn btn-danger">Delete</a>
                <a href="comment-approved/<?php echo $comment->getId(); ?>" class="btn btn-warning">Approved</a>
            </div>
            <div class="card-footer text-white headband-bottom">
                <?php echo $comment->getDate(); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
