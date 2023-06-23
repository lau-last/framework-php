<div class="container mt-150">
    <div class="row mt-5 justify-content-md-center">
        <div class="col-6">
            <h1 class="text-center">Connection</h1>
            <?php if (!empty($errors)) {
                foreach ($errors as $error){
                    echo '<div class="alert alert-warning text-center mt-5" role="alert">' . $error . '</div>';
                }
            }
            echo (new \App\Manager\FormManager\FormConnection())->FormConnection(); ?>
        </div>
    </div>
</div>
