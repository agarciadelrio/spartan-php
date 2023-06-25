<?php
$title = ['title' => &self::$content];
?>
<?= W('MainMenu') ?>
<?= W('TitleSlider', $title) ?>
<main class="Title">
  <header><h1><?= self::$content->title ?></h1></header>
  <section>
    <?= W('TitleFigure', $title) ?>
  </section>
  <?= W('TitleFrames', $title) ?>
  <?= W('TitleInfo', $title) ?>
  <?= W('TitleShop', $title) ?>
</main>
<?= W('TitleRelated', $title) ?>
<?= W('LeadContents') ?>
