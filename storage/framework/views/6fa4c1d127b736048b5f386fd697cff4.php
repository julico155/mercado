<?php $__env->startSection('cliente'); ?>
<div class="container mx-auto px-4 mt-8">
    <table class="min-w-full border border-gray-200 rounded">
        <thead>
            <tr>
                <th class="bg-gray-100 text-left px-6 py-3">No. de Venta</th>
                <th class="bg-gray-100 text-left px-6 py-3">Ver Nota de Venta</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="border-t px-6 py-4"><?php echo e($compra->id); ?></td>
                <td class="border-t px-6 py-4">
                    <a href="<?php echo e(route('notaVenta', ['id' => $compra->id])); ?>" class="text-blue-500 hover:underline">Ver Nota</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mauricio\mercadoverde\resources\views/VistaCarrito/venta.blade.php ENDPATH**/ ?>