<?php
/**
 * ClassAutoLoad.php
 * Central autoloader for your project classes and PHPMailer
 */

// 1️⃣ Load PHPMailer safely
$phpMailerPath = __DIR__ . '/Plugins/PHPMailer/vendor/autoload.php';
if (file_exists($phpMailerPath)) {
    require $phpMailerPath;
} else {
    die("Error: PHPMailer autoload.php not found. Run 'composer install' in Plugins/PHPMailer.");
}

// 2️⃣ Load project config
require __DIR__ . '/conf.php';

// 3️⃣ Autoload your project classes
$directory = ["Global", "layouts", "Forms"];
spl_autoload_register(function ($class_name) use ($directory) {
    foreach ($directory as $dir) {
        $file = __DIR__ . '/' . $dir . '/' . $class_name . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});

// 4️⃣ Instantiate objects
$ObjSendMail = new SendMail();
$ObjLayout = new layouts();
$ObjForm = new forms();
