<?php $__env->startSection('content'); ?>
    <?php if($categorias->isEmpty()): ?>
        <div class="w-full lg:w-1/2 mx-auto mb-4">
            <p class="my-8 text-red-600 bg-red-100 border border-red-600 rounded-md px-4 py-2 mb-4">
                <a href="<?php echo e(route('categoria.create')); ?>">
                    Primero debe registrar una categoria
                </a>
            </p>
        </div>
        <?php elseif($marcas->isEmpty()): ?>
        <div class="w-full lg:w-1/2 mx-auto mb-4">
            <p class="my-8 text-red-600 bg-red-100 border border-red-600 rounded-md px-4 py-2 mb-4">
                <a href="<?php echo e(route('marca.create')); ?>">
                    Primero debe registrar una marca
                </a>
            </p>
        </div>
        <?php else: ?>
        <div class="w-full lg:w-1/2 mx-auto my-4">

            <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase">Registro de productos:</h2>
            <form action="<?php echo e(route('producto.store')); ?>" method="POST" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <?php echo csrf_field(); ?>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">Categoría:</label>
                    <select name="categoria" id="categoria" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        <option selected disabled>Elige una categoria</option>
                        <?php $__empty_1 = true; $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->categoria); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option disabled>Registra una nueva categoria</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">Marca:</label>
                    <select name="marca" id="marca" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        <option selected disabled>Elige una Marca</option>
                        <?php $__empty_1 = true; $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($m->id); ?>"><?php echo e($m->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option disabled>Registra una nueva marca</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="foto">Foto:</label>
                    <input type="file" name="foto" id="foto" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500"></textarea>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="flex items-center justify-between mb-4">
                    <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
                </div>
            </form>
        </div>
    <?php endif; ?>
    <div class="border-t my-4">
        <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase">Seccion Clientes: </h2>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/VistaProductos/create.blade.php ENDPATH**/ ?>