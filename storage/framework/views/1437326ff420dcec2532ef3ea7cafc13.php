<?php $__env->startSection('usuario'); ?>

<h2>Asignar Rol a <?php echo e($user->name); ?></h2>

<form action="<?php echo e(route('user.update_role', $user->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label for="role">Seleccionar Rol:</label>
    <select name="role" id="role">
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <button type="submit">Asignar Rol</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/VistaUser/assign_role.blade.php ENDPATH**/ ?>