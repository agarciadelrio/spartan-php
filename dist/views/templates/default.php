<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= self::$title ?></title>
  <link href="/assets/css/variables.css?v=<?= VERSION ?>" rel="stylesheet"/>
  <link href="/assets/css/styles.css?v=<?= VERSION ?>" rel="stylesheet"/>
  <script defer src="/assets/js/app.js?v=<?= VERSION ?>"></script>
  <script defer src="/assets/vendor/alpine.js?v=<?= VERSION ?>"></script>
</head><body><?= self::$content ?><?= W('Footer') ?></body></html>