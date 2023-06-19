<?php $__env->startSection('content'); ?>
<div class="container mx-auto">
    <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
        
            <h2 class="text-2xl text-green-500 font-bold mb-6">Registro de Empresa</h2>

        
        
            <form action="<?php echo e(route('empresa.update', $empresas->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <div class="mb-4">
                    <label for="nombre" class="block font-bold mb-2">Nombre de la Empresa</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo e($empresas->name); ?>"
                        class="w-full border border-gray-300 px-4 py-2 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="correo" class="block font-bold mb-2">Correo de la Empresa</label>
                    <input type="email" name="correo" id="correo" value="<?php echo e($empresas->email); ?>"
                        class="w-full border border-gray-300 px-4 py-2 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="password" class="block font-bold mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" value="" required
                        class="w-full border border-gray-300 px-4 py-2 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="foto" class="block font-bold mb-2">Logo de la Empresa</label>
                    <input type="file" name="foto" id="foto" value="<?php echo e($empresas->profile_photo_path); ?>"
                        class="w-full border border-gray-300 px-4 py-2 rounded-md">
                </div>
                <button class="bg-green-500 text-white px-4 py-2 rounded-md">Registrar Empresa</button>
            </form>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/VistaEmpresa/edit.blade.php ENDPATH**/ ?>