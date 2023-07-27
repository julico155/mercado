<?php $__env->startSection('usuario'); ?>


<h2 style="text-align: center; font-weight: bold; font-size: 24px;">Asignar Permisos a <?php echo e($role->name); ?></h2>

<form action="<?php echo e(route('rol.update_permissions', $role->id)); ?>" method="POST" style="display: flex; flex-direction: column; align-items: center;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <h3>Permisos disponibles:</h3>
    <ul style="list-style: none; padding: 0;">
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li style="margin-bottom: 10px;">
                <label>
                    <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>" <?php echo e($role->hasPermissionTo($permission) ? 'checked' : ''); ?>>
                    <?php echo e($permission->name); ?>

                </label>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <button type="submit" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Guardar Permisos</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/roles/assign_permissions.blade.php ENDPATH**/ ?>