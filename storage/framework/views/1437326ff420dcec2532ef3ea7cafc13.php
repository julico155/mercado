<?php $__env->startSection('usuario'); ?>

<h2 class="text-center font-bold text-2xl">Asignar Rol a <?php echo e($user->name); ?></h2>

<form action="<?php echo e(route('user.update_role', $user->id)); ?>" method="POST" class="flex flex-col items-center">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label for="role" class="mb-2">Seleccionar Rol:</label>
    <select name="role" id="role" class="rounded-md">
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <button type="submit" class="bg-green-500 text-white rounded-md py-2 px-4 mt-4">Asignar Rol</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/VistaUser/assign_role.blade.php ENDPATH**/ ?>