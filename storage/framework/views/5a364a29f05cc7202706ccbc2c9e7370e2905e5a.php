

<?php $__env->startSection('content'); ?>
  <div class="container admin-container">
    <div class="admin-header">
      <h1>Админ-панель</h1>
      <a href="<?php echo e(url('/admin/cars/create')); ?>" class="btn-main">Добавить машину</a>
    </div>
    <?php echo $__env->yieldContent('admin-content'); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
  <style>
    .admin-container {
      padding: 40px 0;
    }
    .admin-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      margin-bottom: 30px;
    }
    .admin-table {
      width: 100%;
      border-collapse: collapse;
      background: var(--dark);
      border: 1px solid #2a2a2a;
    }
    .admin-table th,
    .admin-table td {
      padding: 14px 16px;
      border-bottom: 1px solid #2a2a2a;
      color: var(--white);
      text-align: left;
    }
    .admin-table th {
      color: var(--gray);
      font-weight: 600;
      background: #111;
    }
    .admin-table tr:hover {
      background: #1a1a1a;
    }
    .admin-actions {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }
    .admin-actions a,
    .admin-actions button {
      border: none;
      border-radius: 6px;
      padding: 8px 14px;
      cursor: pointer;
      background: var(--red);
      color: #fff;
      font-size: 14px;
    }
    .admin-actions a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }
    .admin-actions button {
      background: #444;
    }
    .admin-actions button.delete {
      background: rgba(225, 6, 0, .9);
    }
    .admin-form {
      background: var(--dark);
      border: 1px solid #2a2a2a;
      border-radius: 12px;
      padding: 32px;
      max-width: 900px;
    }
    .admin-form .row {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 18px;
      margin-bottom: 18px;
    }
    .admin-form label {
      display: block;
      color: var(--gray);
      margin-bottom: 8px;
      font-size: 14px;
    }
    .admin-form input,
    .admin-form select,
    .admin-form textarea {
      width: 100%;
      background: var(--black);
      border: 1px solid #333;
      border-radius: 8px;
      color: var(--white);
      padding: 12px 14px;
      font-size: 15px;
    }
    .admin-form input[type="number"] {
      -moz-appearance: textfield;
    }
    .admin-form input[type="number"]::-webkit-inner-spin-button,
    .admin-form input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    .admin-form textarea {
      min-height: 140px;
      resize: vertical;
    }
    .admin-form .full-width {
      grid-column: 1 / -1;
    }
  </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\home\practice-register\resources\views/admin/layout.blade.php ENDPATH**/ ?>