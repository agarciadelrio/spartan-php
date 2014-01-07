<!DOCTYPE HTML>
<html lang='es'>
<head>
  <title><?= $title ?></title>
  <link href="/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width" />
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link href="/vendor/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen" />
  <link href="/vendor/jquery-ui/css/ui-lightness/jquery-ui.min.css" rel="stylesheet" media="screen" />
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen" />
  <link href="/css/application.css" rel="stylesheet" media="screen" />
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/jquery-ui/js/jquery-ui.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  <?= $yield_head ?>
</head>
<body>
  <? include '_header.php' ?>
  <?= $yield_body ?>
  <? include '_footer.php' ?>
  <?= $yield_foot ?>
</body>
</html>
