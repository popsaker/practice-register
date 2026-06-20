

<?php $__env->startSection('title', $car['brand'] . ' ' . $car['model'] . ' — RED LEASING'); ?>

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="breadcrumb"><a href="<?php echo e(url('/catalog')); ?>">Каталог</a> / <?php echo e($car['brand']); ?> <?php echo e($car['model']); ?></div>

    <div class="top">
      <div class="left">
        <h1><?php echo e($car['brand']); ?> <?php echo e($car['model']); ?></h1>
        <p class="subtitle"><?php echo e($car['fuel']); ?> · <?php echo e($car['engine']); ?> · <?php echo e($car['transmission']); ?> · <?php echo e($car['drive_type']); ?> · <?php echo e($car['body_type']); ?></p>
        <img src="<?php echo e(asset($car['image'] ?: 'cars/sedan.png')); ?>" alt="<?php echo e($car['brand']); ?> <?php echo e($car['model']); ?>" class="main-img">
        <span class="stock <?php echo e(intval($car['stock_count']) > 0 ? 'in' : 'out'); ?>">
          <?php echo e(intval($car['stock_count']) > 0 ? 'В наличии: ' . $car['stock_count'] . ' шт.' : 'Нет в наличии'); ?>

          <?php if(!empty($car['city'])): ?> · <?php echo e($car['city']); ?> <?php endif; ?>
        </span>
      </div>

      <div class="calc car-calc" data-price="<?php echo e((int) $car['price']); ?>" data-rate="0.04">
        <div class="big-price"><?php echo e(number_format($car['price'], 0, '.', ' ')); ?> ₽</div>
        <span class="badge">Онлайн-оформление</span>

        <div class="summary">
          <div><span>Год</span><span><?php echo e($car['year']); ?></span></div>
          <div><span>Мощность</span><span><?php echo e($car['horsepower']); ?> л.с.</span></div>
          <div><span>Привод</span><span><?php echo e($car['drive_type']); ?></span></div>
        </div>

        <div class="detail-actions">
          <form action="<?php echo e(url('/cart/add')); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo e($car['id']); ?>">
            <button type="submit" class="btn-red">Положить в корзину</button>
          </form>
          <a href="#" class="btn-out">Получить консультацию</a>
        </div>
      </div>
    </div>

    <div class="specs-block">
      <h2>Характеристики</h2>
      <div class="specs-grid">
        <div class="spec-item"><div class="k">Двигатель</div><div class="v"><?php echo e($car['fuel']); ?>, <?php echo e($car['engine']); ?>, <?php echo e($car['horsepower']); ?> л.с.</div></div>
        <div class="spec-item"><div class="k">Коробка</div><div class="v"><?php echo e($car['transmission']); ?></div></div>
        <div class="spec-item"><div class="k">Привод</div><div class="v"><?php echo e($car['drive_type']); ?></div></div>
        <div class="spec-item"><div class="k">Кузов</div><div class="v"><?php echo e($car['body_type']); ?></div></div>
        <div class="spec-item"><div class="k">Год выпуска</div><div class="v"><?php echo e($car['year']); ?></div></div>
        <div class="spec-item"><div class="k">Разгон 0-100</div><div class="v"><?php echo e($car['acceleration'] ?: '—'); ?></div></div>
        <div class="spec-item"><div class="k">Расход</div><div class="v"><?php echo e($car['consumption'] ?: '—'); ?></div></div>
        <div class="spec-item"><div class="k">Цвет</div><div class="v"><?php echo e($car['color'] ?: '—'); ?></div></div>
      </div>
    </div>

    <div class="desc">
      <h2>Описание</h2>
      <p><?php echo e($car['description'] ?: 'Описание товара отсутствует.'); ?></p>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\home\practice-register\resources\views/car-detail.blade.php ENDPATH**/ ?>