<?php $__env->startSection('venta'); ?>

<div class="flex justify-center items-center mt-8">
    <p> Pago realizado con exito</p>
    <form action="<?php echo e(route('venta.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="text" name="carrito" hidden value="<?php echo e($c); ?>">
        <button type="submit"
            class="bg-green-500 text-white px-4 py-2 rounded mx-4 sm:mt-0">Pulse para continuar</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/continuar.blade.php ENDPATH**/ ?>