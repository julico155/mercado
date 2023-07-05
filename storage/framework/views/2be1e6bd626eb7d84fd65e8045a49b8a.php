<?php $__env->startSection('content'); ?>
        <div class="w-full lg:w-1/2 mx-auto my-4">

            <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase">Actualizar Permiso:</h2>
            <form action="<?php echo e(route('permisos.update', $p->id)); ?>" method="POST" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Permiso:</label>
                    <input type="text" name="permiso" id="permiso" required value="<?php echo e($p->name); ?>"
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="flex items-center justify-between mb-4">
                    <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Actualizar</button>
                        <button
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><a href="<?php echo e(route('permisos.index')); ?>">Cancelar</a></button>
                </div>
            </form>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/permissions/edit.blade.php ENDPATH**/ ?>