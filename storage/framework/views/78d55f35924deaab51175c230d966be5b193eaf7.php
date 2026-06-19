<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title', 'RED LEASING'); ?></title>
  <link rel="stylesheet" href="<?php echo e(asset('css/site.css')); ?>">
  <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
  <header>
    <div class="logo">RED<span>LEASING</span></div>
    <nav>
      <a href="<?php echo e(url('/')); ?>">Главная</a>
      <a href="<?php echo e(url('/catalog')); ?>">Каталог</a>
      <?php if($currentUser): ?>
        <a href="<?php echo e(url('/profile')); ?>">Профиль</a>
        <?php if(($currentUser['Role'] ?? '') === 'admin'): ?>
          <a href="<?php echo e(url('/admin')); ?>">Админ</a>
        <?php endif; ?>
        <a href="<?php echo e(url('/logout.php')); ?>">Выйти</a>
      <?php else: ?>
        <a href="<?php echo e(url('/login')); ?>">Вход</a>
        <a href="<?php echo e(url('/register')); ?>">Регистрация</a>
      <?php endif; ?>
    </nav>
  </header>

  <main>
    <?php echo $__env->yieldContent('content'); ?>
  </main>

  <footer>
    © 2026 RED LEASING. Все права защищены.
  </footer>

  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\OSPanel\home\practice-register\resources\views/layouts/app.blade.php ENDPATH**/ ?>