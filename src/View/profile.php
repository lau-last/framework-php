<div class="container mt-150">
    <h1 class="text-center">My profile</h1>
    <div class="card text-center mt-5 comment-container">
        <div class="card-header headband-top text-white">
            <?php echo $userSession->getName(); ?>
        </div>
        <div class="card-body">
            <p class="card-text">Your are <?php echo $userSession->getRole(); ?></p>
            <p class="card-text">Your email is <?php echo $userSession->getEmail(); ?></p>
            <p class="card-text">

                <?php if (!empty($errors)) {
                    foreach ($errors as $err) {
                        echo '<div class="alert alert-warning text-center" role="alert">' . $err . '</div>';
                    }
                } ?>
            </p>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Change your password there
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php $form = new \Core\FormBuilder\Form(['action' => '/update-password/' . $userSession->getId(), 'method' => 'post']); ?>
                            <?php echo $form->start(); ?>
                            <?php echo (new \App\Manager\FormManager\FormChangePassword())->formChangePassword(); ?>
                            <?php echo $form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-white headband-bottom">
            Registered since <?php echo $userSession->getDate(); ?>
        </div>
    </div>
</div>