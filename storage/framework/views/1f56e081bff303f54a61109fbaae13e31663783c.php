

<?php $__env->startSection('admin-content'); ?>
  <table class="admin-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Марка</th>
        <th>Модель</th>
        <th>Категория</th>
        <th>Цена</th>
        <th>Наличие</th>
        <th>Город</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($car['id']); ?></td>
          <td><?php echo e($car['brand']); ?></td>
          <td><?php echo e($car['model']); ?></td>
          <td><?php echo e($car['type']); ?></td>
          <td><?php echo e(number_format($car['price'], 0, '.', ' ')); ?> ₽</td>
          <td><?php echo e($car['stock_count']); ?> шт.</td>
          <td><?php echo e($car['city']); ?></td>
          <td class="admin-actions">
            <a href="<?php echo e(url('/admin/cars/'.$car['id'].'/edit')); ?>">Ред.</a>
            <form action="<?php echo e(url('/admin/cars/'.$car['id'].'/delete')); ?>" method="post" style="display:inline-block; margin:0;">
              <button type="submit" class="delete">Удалить</button>
            </form>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\home\practice-register\resources\views/admin/cars.blade.php ENDPATH**/ ?>