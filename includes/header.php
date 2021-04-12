<?php
    $beginLoad = microtime(true);
    define('ROOT_DIR', realpath(__DIR__ . '/..'));

    require ROOT_DIR . "/vendor/autoload.php";

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
    $dotenv->safeLoad();

    define("ROOT", $_ENV['ROOT']);
    header("X-Frame-Options: DENY");

    use Auth0\SDK\Auth0;
    $auth0 = new Auth0([
        // The values below are found on the Application settings tab.
        'domain'        => $_ENV['AUTH0_DOMAIN'],
        'client_id'     => $_ENV['AUTH0_CLIENT_ID'],
        'client_secret' => $_ENV['AUTH0_CLIENT_SECRET'],
    
        // This is your application URL that will be used to process the login.
        // Save this URL in the "Allowed Callback URLs" field on the Application settings tab
        'redirect_uri' => 'https://8080-coral-sole-tiw38xbb.ws-eu03.gitpod.io/login',
    ]);

?>


<!-- Primary Meta Tags -->
<meta name="title" content="Interclip - easy peasy clipboard sharing">
<meta name="description" content="Interclip is a tool for easily sharing URLs between devices or users.">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://interclip.app/">
<meta property="og:title" content="Interclip - easy peasy clipboard sharing">
<meta property="og:description" content="Interclip is a tool for easily sharing URLs between devices or users.">
<meta property="og:image" content="https://interclip.app/img/header.png">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://interclip.app/">
<meta property="twitter:title" content="Interclip - easy peasy clipboard sharing">
<meta property="twitter:description" content="Interclip is a tool for easily sharing URLs between devices or users.">
<meta property="twitter:image" content="https://interclip.app/img/header.png">

<link rel="apple-touch-icon" sizes="180x180" href="/img/icons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/icons/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<link rel="stylesheet" href="<?php echo ROOT ?>/css/menu.css">
<link rel="stylesheet" href="<?php echo ROOT ?>/css/dark.css" media="(prefers-color-scheme: dark)">

<!-- External JS libraries -->
<script src='https://cdn.jsdelivr.net/gh/jquery/jquery/dist/jquery.min.js'></script>
<script type="module" src="https://cdn.pika.dev/dark-mode-toggle"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Meta tags -->
<meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="google-site-verification" content="-YbUutUgfmvMugp0SOLLwef8BKdDcRvSoOvlQVJx4oM" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
