<?php $__env->startSection('producto'); ?>
<div class="flex flex-wrap">
    <div class="w-full lg:w-1/2 px-4 mb-4">
        <h2 class="text-2xl  my-4 ml-4">
            Categorias</h2>
        <form action="<?php echo e(route('categoria.store')); ?>" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">Nombre Categoria:</label>
                <input type="text" name="categoria" id="categoria"
                    class="border border-gray-400 rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
            </div>

            <div class="flex items-center justify-between mb-4">
                <button type="submit"
                    class="py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
            </div>
        </form>
    </div>

    <div class="w-full lg:w-1/2 px-4 mb-4">
        <div class="overflow-x-auto my-6 shadow-md rounded">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class=""">
                    <tr>
                        <th class="py-2 px-4 border-b text-left"></th>
                        <th class="py-2 px-4 border-b text-left">Categoria</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center py-2 px-4 border-b">
                                <p class="font-semibold text-left">
                                    <?php echo e($categoria->id); ?></p>
                            </td>

                            <td class="text-center py-2 px-4 border-b">
                                <p class="font-semibold text-left">
                                    <?php echo e($categoria->categoria); ?>

                                </p>
                            </td>

                            <td class="text-center py-2 px-4 border-b">
                                <a href="<?php echo e(route('categoria.edit', $categoria)); ?>"
                                    class=" mr-2">
                                    Editar
                                </a>
                                <form action="<?php echo e(route('categoria.destroy', $categoria->id)); ?>" method="POST"
                                    class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="">
                                        borrar
                                    </button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <td class="text-center py-2 px-4 border-b">id</td>
                        <td class="text-center py-2 px-4 border-b">nombre</td>
                        <td class="text-center py-2 px-4 border-b">
                            <div class="flex justify-center">
                                editar
                            </div>
                        </td>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde - copia\resources\views/VistaCategoria/index.blade.php ENDPATH**/ ?>