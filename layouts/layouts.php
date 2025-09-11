
<?php
class layouts {
    public function header($conf) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $conf['site_name']; ?></title>
            <!-- Bootstrap 5 CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
                <div class="container">
                    <a class="navbar-brand" href="#"><?php echo $conf['site_name']; ?></a>
                </div>
            </nav>
        <?php
    }

    public function footer($conf) {
        ?>
            <!-- Footer -->
            <footer class="bg-dark text-white text-center py-3 mt-5">
                <p class="mb-0">
                    &copy; <?php echo date("Y"); ?> <?php echo $conf['site_name']; ?>. All rights reserved.
                </p>
            </footer>

            <!-- Bootstrap 5 JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
        <?php
    }
}
