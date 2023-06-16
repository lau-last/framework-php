<?php
dump($_POST);
?>
<div class="container">
    <div class="row mt-5 justify-content-md-center">
        <div class="col-6">
            <h2 class="text-center">Registration</h2>
            <?php echo new \App\Form\FormRegistration(); ?>
        </div>
    </div>
</div>
