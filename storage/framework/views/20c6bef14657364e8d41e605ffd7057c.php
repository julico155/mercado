<?php $__env->startSection('cliente'); ?>
    <div class="container mx-auto">
        <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
            <div class="text-center">
                <a href="<?php echo e(route('empresa.show', $u->id)); ?>">
                    <h2 class="text-2xl text-green-500 font-bold mb-6">Restaurante: <?php echo e($u->name); ?></h2>
                </a>
            </div>

            <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden my-6">
                <img src="<?php echo e(asset($p->imagen)); ?>" alt="Foto del producto" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-medium text-gray-800"><?php echo e($p->nombre); ?></h3>
                    <p class="text-sm text-gray-600 mb-4">Cantidad disponible: <?php echo e($p->cantidad); ?></p>
                    <p class="text-gray-600 mb-4"><?php echo e($p->descripcion); ?></p>
                    
                    <?php if(auth()->guard()->check()): ?>
                        <form action="<?php echo e(route('carrito.update', $p->id)); ?>" method="post">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="producto_id" value="<?php echo e($p->id); ?>">
                            <input type="hidden" name="producto_precio" value="<?php echo e($p->precio); ?>">

                            <div class="flex justify-start">
                                <input type="number" name="cantidad" placeholder="Cantidad" required min="1"
                                    max="<?php echo e($p->cantidad); ?>" class="border border-gray-300 px-4 py-2 rounded-l-md w-32">

                                <button class="bg-green-500 text-white px-4 py-2 rounded-r-md">Agregar al Carrito</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <p class="text-red-600 bg-red-100 border border-red-600 rounded-md px-4 py-2 mb-4">Inicia sesión para
                            poder
                            comprar</p>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mauricio\mercadoverde\resources\views/VistaEmpresa/productoShow.blade.php ENDPATH**/ ?>