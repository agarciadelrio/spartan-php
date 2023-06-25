<?php
$imgs = [
  (object) [ 'src' => 'https://www.bizcochito.es/Films/Slider/tt11820950.webp', 'sleep' => 4000],
  (object) [ 'src' => 'https://www.bizcochito.es/Films/Slider/tt9362722.webp', 'sleep' => 3000],
  (object) [ 'src' => 'https://www.bizcochito.es/Films/Slider/tt14230388.webp', 'sleep' => 2000],
  (object) [ 'src' => 'https://www.bizcochito.es/Films/Slider/tt15671028.webp', 'sleep' => 1000],
];
?>
<section class="MainSlider">
  <header>Main Slider</header>
  <nav x-data="Slider" data-sleep="1000">
    <?php foreach($imgs as $i => $img): ?>
    <a href="/title" @mouseenter="onEnterFrame()" @mouseleave="onLeaveFrame()" data-sleep="<?= $img->sleep?>">
      <figure>
        <picture>
          <img src="<?= $img->src ?>" alt="">
        </picture>
        <figcaption>SLIDE <?= $i ?></figcaption>
      </figure>
    </a>
    <?php endforeach ?>
  </nav>
</section>