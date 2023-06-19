<?php $__env->startSection('content'); ?>


    <div class="w-full lg:w-1/2 mx-auto mb-4">
        <div class="overflow-x-auto my-6 shadow-md rounded">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">#</th>
                        <th class="py-2 px-4 border-b text-left">Marca</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center py-2 px-4 border-b">
                                <p class="font-semibold text-left">
                                    <?php echo e($stock->id); ?></p>
                            </td>

                            <td class="text-center py-2 px-4 border-b">
                                <p class="font-semibold text-left">
                                    <?php echo e($stock->cantidad); ?>

                                </p>
                            </td>



                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <td class="text-center py-2 px-4 border-b">id</td>
                        <td class="text-center py-2 px-4 border-b">nombre</td>
                        
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/VistaStock/index.blade.php ENDPATH**/ ?>