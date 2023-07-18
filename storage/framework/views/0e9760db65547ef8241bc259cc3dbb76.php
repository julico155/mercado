<table class="min-w-full bg-white">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Nombre</th>
            <th class="py-2 px-4 border-b">Descripcion</th>
            <th class="py-2 px-4 border-b">Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="py-2 px-4 border-b text-center"><?php echo e($activity->id); ?></td>
                <td class="py-2 px-4 border-b text-center"><?php echo e($activity->causer->name); ?></td>
                <td class="py-2 px-4 border-b text-center"><?php echo e($activity->description); ?></td>
                <td class="py-2 px-4 border-b text-center"><?php echo e($activity->created_at); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/partials/activities_table.blade.php ENDPATH**/ ?>