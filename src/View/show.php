<?php
$form = new \Core\FormBuilder\Form(['action' => '/articles/' . $article->getId(), 'method' => 'post']);
$btn = new \Core\FormBuilder\Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
?>
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

    <div class="container">
        <div class="row mt-5 justify-content-md-center">
            <div class="col-6">
                <h2 class="text-center mb-3">Your comment</h2>
                <?php echo $form->start(); ?>
                <?php echo (new \Core\FormBuilder\Textarea('comment', ['id' => 'comment', 'class' => 'form-control mb-3']))->required(); ?>
                <div class="d-flex justify-content-center">
                    <?php echo $btn; ?>
                </div>
                <?php echo $form->end(); ?>
            </div>
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