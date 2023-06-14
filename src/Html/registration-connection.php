<?php
$form = new \Core\FormBuilder\Form(['action' => '/', 'method' => 'post']);
$btn = new \Core\FormBuilder\Button('Submit', ['type'=>'submit', 'class'=>'btn btn-primary mb-3']);
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6">
            <h2 class="text-center">Registration</h2>
            <?php echo $form->start(); ?>
            <?php echo(new \Core\FormBuilder\Label('Email address', ['for' => 'email', 'class' => 'form-label'])); ?>
            <?php echo(new \Core\FormBuilder\Input('email', 'email', ['id' => 'email', 'class' => "form-control mb-3"])); ?>
            <?php echo(new \Core\FormBuilder\Label('Password', ['for' => 'password', 'class' => 'form-label'])); ?>
            <?php echo(new \Core\FormBuilder\Input('password', 'password', ['id' => 'password', 'class' => "form-control mb-3"])); ?>
            <?php echo(new \Core\FormBuilder\Label('Password', ['for' => 'password', 'class' => 'form-label'])); ?>
            <?php echo(new \Core\FormBuilder\Input('password', 'password', ['id' => 'password', 'class' => "form-control mb-3"])); ?>
            <?php echo $btn;?>
            <?php echo $form->end(); ?>
        </div>

        <div class="col-6">
            <h2 class="text-center">Connection</h2>
            <?php echo $form->start(); ?>
            <?php echo(new \Core\FormBuilder\Label('Email address', ['for' => 'email', 'class' => 'form-label'])); ?>
            <?php echo(new \Core\FormBuilder\Input('email', 'email', ['id' => 'email', 'class' => "form-control mb-3"])); ?>
            <?php echo(new \Core\FormBuilder\Label('Password', ['for' => 'password', 'class' => 'form-label'])); ?>
            <?php echo(new \Core\FormBuilder\Input('password', 'password', ['id' => 'password', 'class' => "form-control mb-3"])); ?>
            <?php echo(new \Core\FormBuilder\Label('Password', ['for' => 'password', 'class' => 'form-label'])); ?>
            <?php echo(new \Core\FormBuilder\Input('password', 'password', ['id' => 'password', 'class' => "form-control mb-3"])); ?>
            <?php echo $btn;?>
            <?php echo $form->end(); ?>
        </div>
    </div>
</div>
