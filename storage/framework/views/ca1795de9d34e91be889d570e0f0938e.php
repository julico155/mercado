<?php $__env->startSection('producto'); ?>
    <div class="container mx-auto px-4 my-4">
        <div class="flex flex-col items-center sm:flex-row justify-end">
            <div class="mt-4 sm:ml-4">
                <a href="<?php echo e(route('producto.create')); ?>">Registrar
                    Producto</a>
            </div>
        </div>
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2 class="text-2xl   mt-8 mb-4 ml-4 uppercase"><?php echo e($categoria->categoria); ?></h2>
            <!-- Contenedor de productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-8">
                <?php $__currentLoopData = $categoria->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white p-4 shadow-md">
                        <div class="grid grid-cols-[1fr,3fr]">
                            <div>
                                <img src="<?php echo e(asset($producto->imagen)); ?>" alt="Foto del producto" class="w-24 h-24 mb-2">
                                <a href="<?php echo e(route('producto.edit', $producto->id)); ?>"
                                    class= "px-4 py-2 rounded-md mr-2">Editar</a>

                            </div>
                            <div class="ml-4">
                                <h2 class="text-lg "><?php echo e($producto->nombre); ?></h2>
                                <p class="mb-2"><?php echo e($producto->descripcion); ?></p>
                                <p class="text-lg">Precio: <?php echo e($producto->precio); ?></p>
                                <form action="<?php echo e(route('producto.destroy', $producto->id)); ?>" method="POST"
                                    class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class=" hover:text-red-700">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde - copia\resources\views/VistaProductos/index.blade.php ENDPATH**/ ?>