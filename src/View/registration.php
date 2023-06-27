<div class="container mt-150">
    <div class="row mt-5 justify-content-md-center">
        <div class="col-6">
            <h1 class="text-center mb-5">Registration</h1>
            <?php if (!empty($messages)) {
                echo '<div class="alert alert-warning text-center mt-5" role="alert">' . $messages . '</div>';
            }
            if (!empty($errors)) {
                foreach ($errors as $err) {
                    echo '<div class="alert alert-warning text-center" role="alert">' . $err . '</div>';

                }
            }
            echo (new \App\Manager\FormManager\FormRegistration())->formRegistration();
            ?>
        </div>
    </div>
</div>
