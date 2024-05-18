<?php require_once '../src/lib/func.php'; ?>
<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <title>Docker-Dev-Env</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="d-flex flex-column h-100">
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Welcome to the "Docker-Dev-Env" Admin Panel!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor04"
                    aria-controls="navbarColor04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor04">
                <ul class="navbar-nav ms-md-auto ">
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://github.com/pkolomeitsev/docker-dev-env">
                            <img src="assets/imgs/github.png" height="16" alt="GitHub"> GitHub
                        </a>
                    </li>
                </ul>
            </div>
    </nav>
</header>

<main class="flex-shrink-0">
    <div class="container">

        <h2 class="mt-3">Projects</h2>
        <p class="lead">Here you can select your favourite project <code class="small">:)</code></p>
        <div class="row g-3 mb-3">
            <div class="col-md-5">
                <select class="form-select" id="projects" name="projects">
                    <?php foreach (getListOfTheProjects() as $site): ?>
                        <option value="<?= $site; ?>"><?php echo $site; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <button class="btn btn-info" id="httpBtn" type="submit">http://</button>
                <button class="btn btn-success" id="httpsBtn" type="submit">https://</button>
            </div>
        </div>

        <h2 class="mt-3">Apps</h2>

        <?php
        /**
         * Render application links
         */
        foreach (getAppList() as $app => $uri) {
            echo sprintf('<a href="%s" class="btn btn-lg btn-primary" role="button" target="_blank">%s</a>', $uri, $app) . PHP_EOL;
        }
        ?>

        <h2 class="mt-3">System info</h2>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">PHP</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title">v<?php echo phpversion(); ?></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Memory usage: <?php echo convert(memory_get_usage(true)); ?></li>
                            <li>Memory limit: <?php echo ini_get('memory_limit'); ?></li>
                            <li><?php echo php_uname(); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">MySQL</h4>
                    </div>
                    <div class="card-body">
                        <?php $mysqlInfo = getMysqlInfo(); ?>
                        <h1 class="card-title">v<?php echo $mysqlInfo['SERVER_VERSION']; ?></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Client version: <?php echo $mysqlInfo['CLIENT_VERSION']; ?></li>
                            <li>Connection status: <?php echo $mysqlInfo['CONNECTION_STATUS']; ?></li>
                            <li><?php echo $mysqlInfo['SERVER_INFO']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">NGiNX</h4>
                    </div>
                    <div class="card-body">
                        <?php $nginxInfo = getNginxInfo(); ?>
                        <h1 class="card-title">v<?php echo $nginxInfo['version']; ?></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>IP: <?php echo $_SERVER['SERVER_ADDR']; ?></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<footer class="footer mt-auto py-3 bg-body-tertiary">
    <div class="container">
        <span class="text-body-secondary">&copy; <?php echo date("Y"); ?> All rights reserved - your localhost </span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script type="text/javascript">
    // Vanilla JS :)
    (() => {
        document.getElementById('httpBtn').addEventListener('click', function (ev) {
            redirect()
        });
        document.getElementById('httpsBtn').addEventListener('click', function (ev) {
            redirect(true)
        });

        function redirect(ssl = false) {
            let project = document.getElementById("projects").value;
            let protocol = (ssl) ? 'https://' : 'http://';

            window.open(
                protocol + project,
                '_blank'
            );
        }
    })()
</script>
</body>
</html>