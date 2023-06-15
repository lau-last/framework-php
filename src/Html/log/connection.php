<?php
$form = new \Core\FormBuilder\Form(['action' => '/', 'method' => 'post']);
$btn = new \Core\FormBuilder\Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
?>
<div class="container">
    <div class="row mt-5 justify-content-md-center">
        <div class="col-6">
            <h2 class="text-center">Connection</h2>
            <?php echo $form->start(); ?>
            <?php echo(new \Core\FormBuilder\Label('Email address', ['for' => 'email', 'class' => 'form-label'])); ?>
            <?php echo (new \Core\FormBuilder\Input('email', 'email', ['id' => 'email', 'class' => "form-control mb-3"]))->required(); ?>
            <?php echo(new \Core\FormBuilder\Label('Password', ['for' => 'password', 'class' => 'form-label'])); ?>
            <?php echo (new \Core\FormBuilder\Input('password', 'password', ['id' => 'password', 'class' => "form-control mb-3"]))->required(); ?>
            <div class="d-flex justify-content-center">
                <?php echo $btn; ?>
            </div>
            <?php echo $form->end(); ?>
        </div>
    </div>
</div>
