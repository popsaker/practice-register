

<?php $__env->startSection('title', 'Вход — RED LEASING'); ?>

<?php $__env->startSection('content'); ?>
  <div class="wrap">
    <form class="form-box" id="loginForm">
      <h1>Вход</h1>
      <p class="sub">Войдите в свой аккаунт RED LEASING</p>

      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" placeholder="example@mail.ru" required>

      <label for="password">Пароль</label>
      <input type="password" id="password" name="password" placeholder="Ваш пароль" required>

      <button type="submit" class="btn-red">Войти</button>
      <p class="msg"></p>

      <div class="switch">Нет аккаунта? <a href="<?php echo e(url('/register')); ?>">Зарегистрироваться</a></div>
    </form>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('js/auth.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\home\practice-register\resources\views/login.blade.php ENDPATH**/ ?>