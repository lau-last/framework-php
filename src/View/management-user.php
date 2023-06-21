<div class="container mt-150">
    <h1 class="text-center">User management</h1>
    <?php foreach ($users as $user) : ?>
        <div class="card text-center mt-5 comment-container">
            <div class="card-header headband-top text-white">
                <?php echo $user->getName(); ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $user->getRole(); ?></p>
                <a href="user-delete/<?php echo $user->getId(); ?>" class="btn btn-danger">Delete</a>
                <?php if ($user->getRole() == 'user') { ?>
                    <a href="user-admin/<?php echo $user->getId(); ?>" class="btn btn-warning">Set admin</a>
                <?php }
                if ($user->getRole() == 'admin') { ?>
                    <a href="user-user/<?php echo $user->getId(); ?>" class="btn btn-warning">Set user</a>
                <?php } ?>
            </div>
            <div class="card-footer text-white headband-bottom">
                Registered since <?php echo $user->getDate(); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>