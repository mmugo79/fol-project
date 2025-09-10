<?php
class layouts {

    public function header($conf) {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>'.$conf['site_name'].'</title>
          <!-- Bootstrap CSS -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
        ';
    }

    public function nav($conf) {
        echo '
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="'.$conf['site_url'].'">'.$conf['site_name'].'</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
                <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
              </ul>
            </div>
          </div>
        </nav>';
    }

    public function banner($conf) {
        echo '
        <div class="bg-primary text-white text-center p-5 mb-4">
          <h1>Welcome to '.$conf['site_name'].'</h1>
          <p class="lead">Your gateway to learning excellence</p>
        </div>';
    }

    public function content($conf) {
        echo '
        <div class="container mt-5">
          <div class="alert alert-info text-center">
            <strong>📢 Announcement:</strong> This is the default content area.
          </div>
        </div>';
    }

    public function form_frame($conf, $ObjForm) {
        echo '
        <div class="container mt-5">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card shadow-lg">
                <div class="card-body">';
        
        // Decide whether to show signup or signin form
        $currentFile = basename($_SERVER["PHP_SELF"]);
        if ($currentFile == "signup.php") {
            $ObjForm->signup();
        } else {
            $ObjForm->signin();
        }

        echo '
                </div>
              </div>
            </div>
          </div>
        </div>';
    }

    public function footer($conf) {
        echo '
        <footer class="bg-dark text-white text-center py-3 mt-5">
          <p>&copy; '.date("Y").' '.$conf['site_name'].' | All rights reserved.</p>
        </footer>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>';
    }
}
