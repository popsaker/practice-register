

<?php $__env->startSection('admin-content'); ?>
  <h2>Добавить машину</h2>
  <?php echo $__env->make('admin.car-form', ['action' => url('/admin/cars/store'), 'car' => []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\home\practice-register\resources\views/admin/car-create.blade.php ENDPATH**/ ?>