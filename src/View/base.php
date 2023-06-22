<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Framework</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid container">
        <a class="navbar-brand" href="/">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/articles">Posts</a>
                </li>
                <?php if (\App\Manager\UserManager::userIsAdmin()) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">Management
                            <?php if (\App\Manager\Notification::notificationInvalidComment() != 0) {
                                echo '<span class="badge rounded-pill bg-danger">' . \App\Manager\Notification::notificationInvalidComment() . '</span>';
                            }; ?>
                        </a>

                        <ul class="dropdown-menu sub-menu bg-warning">
                            <li><a class="nav-item nav-link" href="/article-creation">Article creation</a></li>
                            <li><a class="nav-item nav-link" href="/article-management">Article management</a></li>
                            <li><a class="nav-item nav-link" href="/comment-management">Comment management
                                    <?php if (\App\Manager\Notification::notificationInvalidComment() != 0) {
                                        echo '<span class="badge rounded-pill bg-danger">' . \App\Manager\Notification::notificationInvalidComment() . '</span>';
                                    }; ?>
                                </a></li>
                            <li><a class="nav-item nav-link" href="/user-management">User management</a></li>
                        </ul>
                    </li>
                <?php }; ?>
                <?php if (!\App\Manager\UserManager::userIsConnected()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/registration">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/connection">Connection</a>
                    </li>
                <?php }; ?>
                <?php if (\App\Manager\UserManager::userIsConnected()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                <?php }; ?>
            </ul>
        </div>
        <?php if (\App\Manager\UserManager::userIsConnected()) {
            echo 'Connected';
        } else {
            echo 'Offline';
        }; ?>
    </div>
</nav>
<div class="image-container">
    <img id="portrait-chat" src="/assets/portrait-chat.jpg" class="img-thumbnail" alt="...">
    <img id="background-blog" src="/assets/texture.jpg" class="img-fluid" alt="...">
</div>
<?php echo $content; ?>
<footer class="bg-warning p-4 mt-5">
    <div class="d-flex align-items-center justify-content-evenly">
        <img src="/assets/github-sign.png" class="icon-social-media" alt="">
        <img src="/assets/linkedin.png" class="icon-social-media" alt="">
        <img src="/assets/twitter-sign.png" class="icon-social-media" alt="">
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>