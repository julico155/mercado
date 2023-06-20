<?php $__env->startSection('cliente'); ?>
    <div class="my-8 mx-8">
        <div class="container mx-auto">
            <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
                <h2 class="text-2xl text-green-500 font-bold mb-6">Lista de Usuarios</h2>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Nombre</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo e($user->id); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo e($user->name); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo e($user->email); ?></td>
                            <td class="py-2 px-4 border-b">
                                <a href="<?php echo e(route('user.edit', $user->id)); ?>"
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                                    Editar
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/VistaUser/index.blade.php ENDPATH**/ ?>