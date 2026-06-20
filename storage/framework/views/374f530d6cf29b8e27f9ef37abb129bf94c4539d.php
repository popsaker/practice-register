

<?php $__env->startSection('title', 'Каталог авто — RED LEASING'); ?>

<?php $__env->startSection('content'); ?>
  <div class="container">
    <h1>Каталог автомобилей</h1>

    <div class="filters">
      <button class="filter-btn active" data-type="all">Все</button>
      <button class="filter-btn" data-type="legkovoy">Легковой</button>
      <button class="filter-btn" data-type="gruzovoy">Грузовой</button>
      <button class="filter-btn" data-type="vnedorozhnik">Внедорожник</button>
      <button class="filter-btn" data-type="pricep">С прицепом</button>
      <button class="filter-btn" data-type="spec">Спецтехника</button>
    </div>

    <?php
      $typeLabels = [
        'legkovoy' => 'Легковой',
        'gruzovoy' => 'Грузовой',
        'vnedorozhnik' => 'Внедорожник',
        'pricep' => 'С прицепом',
        'spec' => 'Спецтехника',
      ];
    ?>

    <div class="grid" id="carGrid">
      <?php if(!empty($cars) && count($cars) > 0): ?>
        <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card" data-type="<?php echo e($car['type']); ?>" data-id="<?php echo e($car['id']); ?>" data-brand="<?php echo e($car['brand']); ?>" data-model="<?php echo e($car['model']); ?>" data-price="<?php echo e($car['price']); ?>" data-fuel="<?php echo e($car['fuel']); ?>" data-engine="<?php echo e($car['engine']); ?>" data-transmission="<?php echo e($car['transmission']); ?>" data-drive="<?php echo e($car['drive_type']); ?>" data-stock="<?php echo e($car['stock_count']); ?>" data-image="<?php echo e(asset($car['image'] ?: 'cars/sedan.png')); ?>" data-description="<?php echo e($car['description']); ?>">
            <img src="<?php echo e(asset($car['image'] ?: 'cars/sedan.png')); ?>" alt="<?php echo e($car['brand']); ?> <?php echo e($car['model']); ?>">
            <div class="card-body">
              <div class="price"><?php echo e(number_format($car['price'], 0, '.', ' ')); ?> ₽</div>
              <div class="brand"><?php echo e($car['brand']); ?> <?php echo e($car['model']); ?></div>
              <div class="specs">
                <?php echo e($typeLabels[$car['type']] ?? $car['type']); ?> · <?php echo e($car['fuel']); ?> · <?php echo e($car['engine']); ?> · <?php echo e($car['transmission']); ?> · <?php echo e($car['drive_type']); ?>

              </div>
              <?php if(intval($car['stock_count']) > 0): ?>
                <span class="stock in">В наличии: <?php echo e($car['stock_count']); ?> шт.</span>
              <?php else: ?>
                <span class="stock out">Нет в наличии</span>
              <?php endif; ?>
              <a href="/car/<?php echo e($car['id']); ?>" class="btn view-details">Подробнее</a>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?>
        <p>В каталоге пока нет машин.</p>
      <?php endif; ?>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('js/catalog.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\home\practice-register\resources\views/catalog.blade.php ENDPATH**/ ?>