<?= W('MainMenu') ?>
<?= W('MainSlider') ?>
<main class="Home">
  <header><h1><?= self::$title ?></h1></header>
  <?= W('MainGrid') ?>
  <div><?= self::$content ?></div>
</main>
<?= W('LeadContents') ?>