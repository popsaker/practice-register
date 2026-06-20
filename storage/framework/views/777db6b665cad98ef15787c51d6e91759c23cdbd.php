

<?php $__env->startSection('title', 'Корзина — RED LEASING'); ?>

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="breadcrumb"><a href="<?php echo e(url('/catalog')); ?>">Каталог</a> / Корзина</div>

    <div class="cart-page">
      <h1>Корзина</h1>

      <?php if(!empty($items)): ?>
        <div class="cart-table">
          <div class="cart-row cart-header">
            <div>Товар</div>
            <div>Цена</div>
            <div>Кол-во</div>
            <div>Сумма</div>
            <div></div>
          </div>
          <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cart-row">
              <div class="cart-item">
                <img src="<?php echo e(asset($item['image'] ?: 'cars/sedan.png')); ?>" alt="<?php echo e($item['brand']); ?> <?php echo e($item['model']); ?>">
                <div class="cart-item-details">
                  <div class="cart-item-title"><?php echo e($item['brand']); ?> <?php echo e($item['model']); ?></div>
                  <div class="cart-item-meta"><?php echo e($item['year']); ?> · <?php echo e($item['fuel']); ?> · <?php echo e($item['transmission']); ?></div>
                </div>
              </div>
              <div><?php echo e(number_format($item['price'], 0, '.', ' ')); ?> ₽</div>
              <div><?php echo e($item['quantity']); ?></div>
              <div><?php echo e(number_format($item['price'] * $item['quantity'], 0, '.', ' ')); ?> ₽</div>
              <div>
                <form action="<?php echo e(url('/cart/' . $item['id'] . '/remove')); ?>" method="post">
                  <button type="submit" class="btn-out">Удалить</button>
                </form>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="cart-summary">
          <div class="cart-total">
            <span>Итого</span>
            <strong><?php echo e(number_format($total, 0, '.', ' ')); ?> ₽</strong>
          </div>
          <div class="cart-actions">
            <form action="<?php echo e(url('/cart/clear')); ?>" method="post">
              <button type="submit" class="btn-out">Очистить корзину</button>
            </form>
            <a href="#" class="btn-red">Оформить заказ</a>
          </div>
        </div>
      <?php else: ?>
        <p>В корзине пока нет товаров.</p>
        <a href="<?php echo e(url('/catalog')); ?>" class="btn-red">Вернуться в каталог</a>
      <?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\home\practice-register\resources\views/cart.blade.php ENDPATH**/ ?>