<div class="container mt-150">
    <div class="row mt-5 justify-content-md-center">
        <div class="col-6">
            <h1 class="text-center mb-5">Registration</h1>
            <?php
            if(!empty($errors)){
                foreach ($errors as $err) {
                    $html = '<div class="alert alert-danger text-center" role="alert">';
                    $html .= $err;
                    $html .= '</div>';
                    echo $html;
                }
            }
            echo (new \App\Manager\FormManager\FormRegistration())->formRegistration();
            ?>
        </div>
    </div>
</div>
