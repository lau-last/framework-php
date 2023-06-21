<?php $form = new \Core\FormBuilder\Form(['action' => '/do-article-modify/' . $article->getId(), 'method' => 'post']); ?>
<div class="container mt-150">
    <div class="row mt-5 justify-content-md-center">
        <div class="col-6">
            <h2 class="text-center">Article modification</h2>
            <?php echo $form->start(); ?>
            <?php echo (new \App\Manager\FormManager\FormModifyArticle())->formModifyArticle($article->getTitle(), $article->getHead(), $article->getContent()); ?>
            <?php echo $form->end(); ?>
        </div>
    </div>
</div>