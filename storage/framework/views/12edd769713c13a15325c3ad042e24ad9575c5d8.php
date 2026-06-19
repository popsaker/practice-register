

<?php $__env->startSection('title', 'RED LEASING — Лизинг автомобилей и спецтехники'); ?>

<?php $__env->startSection('content'); ?>
  <section class="hero">
    <div class="hero-text">
      <h1>RED<span>LEASING</span><br>лизинг авто и спецтехники</h1>
      <p>Оформите лизинг легкового авто, грузовика, внедорожника, фуры с прицепом или спецтехники быстро и без переплат.</p>
      <a href="<?php echo e(url('/catalog')); ?>" class="btn-main">Взять лизинг</a>
    </div>
    <div class="hero-img">
      <img src="<?php echo e(asset('cars/hero.png')); ?>" alt="Премиальный автомобиль">
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\home\practice-register\resources\views/main.blade.php ENDPATH**/ ?>