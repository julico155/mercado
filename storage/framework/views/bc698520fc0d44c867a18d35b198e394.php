<?php $__env->startSection('cliente'); ?>
    <div class="container mx-auto px-4 my-4">
        <div class="flex flex-col items-center sm:flex-row">
            <div class="flex items-center justify-center w-32 h-32 rounded-full bg-gray-200 overflow-hidden">
                <img src="<?php echo e(asset($e->profile_photo_path)); ?>" alt="Foto de perfil" class="w-full h-full object-cover">
            </div>
            <div class="mt-4 sm:ml-4">
                <h1 class="text-xl font-bold"><?php echo e($e->name); ?></h1>
            </div>
        </div>
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase"><?php echo e($categoria->categoria); ?></h2>
            <!-- Contenedor de productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-8">

                <?php $__currentLoopData = $categoria->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    

                    <div class="bg-white p-4 shadow-md">
                        <div class="grid grid-cols-[1fr,3fr]">
                            <div>
                                <img src="<?php echo e(asset($producto->imagen)); ?>" alt="Foto del producto" class="w-24 h-24 mb-2">
                            </div>
                            <div class="ml-4">
                                <h2 class="text-lg font-bold"><?php echo e($producto->nombre); ?></h2>
                                <p class="text-xs font-semibold mb-2">Cantidad: <?php echo e($producto->cantidad); ?></p>
                                <p class="mb-2"><?php echo e($producto->descripcion); ?></p>
                                <p class="text-lg font-semibold">Precio: <?php echo e($producto->precio); ?></p>
                            </div>
                        </div>


                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="border-t">
        <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase">Seccion Clientes: </h2>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mauricio\mercadoverde\resources\views/VistaEmpresa/show.blade.php ENDPATH**/ ?>