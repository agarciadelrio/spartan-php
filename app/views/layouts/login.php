<!DOCTYPE HTML>
<html lang='es'>
<head>
  <title><?= $title ?></title>
  <!--link href="/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" /-->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width" />
  <link href="/app/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="/app/assets/vendor/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="/app/assets/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="/app/assets/css/application.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="/app/assets/vendor/eyecon.ro/css/colorpicker.css" rel="stylesheet" type="text/css" media="screen" />

<script src="/app/assets/vendor/jquery/jquery.min.js"></script>
<script src="/app/assets/vendor/jquery/jquery-ui.min.js"></script>
<script src="/app/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/app/assets/vendor/crypto/md5.js"></script>
<script src="/app/assets/vendor/eyecon.ro/js/colorpicker.js"></script>
<script src="/app/assets/vendor/eyecon.ro/js/eye.js"></script>
<script src="/app/assets/vendor/eyecon.ro/js/utils.js"></script>

<?= $yield_head ?>
</head>
<body class='login'>
<?= $yield_body ?>
</body>
</html>
