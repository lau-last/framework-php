<?php $form = new \Core\FormBuilder\Form(['action' => '/post-comment/' . $article->getId(), 'method' => 'post']); ?>
<div class="container mt-150">
    <h1 class="text-center">Article</h1>
    <div class="card text-center mt-5">
        <div class="card-header headband-top text-white">
            <?php echo $article->getTitle(); ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $article->getHead(); ?></h5>
            <p class="card-text"><?php echo $article->getContent(); ?></p>
        </div>
        <div class="card-footer text-white headband-bottom">
            Posted by <?php echo $article->getAuthor(); ?> at <?php echo $article->getDate(); ?>
        </div>
    </div>
    <?php if (\App\Manager\UserManager::userIsConnected()) { ?>
        <div class="container">
            <div class="row mt-5 mb-5 justify-content-md-center">
                <div class="col-6">
                    <h2 class="text-center mb-3">Your comment</h2>
                    <?php echo $form->start(); ?>
                    <?php echo (new \App\Manager\FormManager\FormCreationComment())->formCreationComment(); ?>
                    <?php echo $form->end(); ?>
                </div>
            </div>
        </div>
    <?php }
    if (!\App\Manager\UserManager::userIsConnected()) { ?>
        <div class="container">
            <div class="row mt-5 mb-5 justify-content-md-center">
                <div class="col-6">
                    <h2 class="text-center mb-3">You must be logged in to leave a comment</h2>
                    <div  class="d-flex justify-content-center">
                        <a href="/connection" class="btn btn-warning">Connection</a>
                    </div>
                </div>
            </div>
        </div>
    <?php }; ?>
    <div class="container">
        <h2 class="text-center">Comments</h2>
    </div>

    <?php foreach ($comments as $comment) : ?>
        <div class="card text-center mt-5 comment-container">
            <div class="card-header headband-top text-white">
                <?php echo $comment->getAuthor(); ?>
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