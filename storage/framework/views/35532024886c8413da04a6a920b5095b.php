<?php $__env->startSection('cliente'); ?>
    <div class="container mx-auto">
        <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
            
            <h2 class="text-2xl text-green-500 font-bold mb-6">Carrito de Compras</h2>
            <!-- Tabla de productos -->
            <center>
                <div class="w-full sm:w-3/4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="py-3 px-4 text-left">Nombre Producto</th>
                                <th class="py-3 px-4 text-left">Cantidad</th>
                                <th class="py-3 px-4 text-left">P. Unit</th>
                                <th class="py-3 px-4 text-left">P. Total</th>
                                <th class="py-3 px-4 text-left">Eliminar Producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                            
                            <?php $__currentLoopData = $detalle_carrito; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="py-3 px-4">
                                        <p class="font-semibold text-left"><?php echo e($producto->nombre); ?></p>
                                        <p class="text-xs text-left">Descripción: <?php echo e($producto->descripcion); ?></p>
                                        <p class="text-xs text-left"></p>
                                    </td>
                                    <td class="py-3 px-4"><?php echo e($producto->cantidad); ?></td>
                                    <td class="py-3 px-4"><?php echo e($producto->precio); ?></td>
                                    <td class="py-3 px-4"><?php echo e($producto->cantidad * $producto->precio); ?></td>
                                    <td class="py-3 px-4">
                                        
                                        <form action="<?php echo e(route('carrito.destroy', $producto->id)); ?>" method="post">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <input type="text" name="producto_id" hidden
                                                value="<?php echo e($producto->producto_id); ?>">
                                            <input type="text" name="precio" hidden value="<?php echo e($producto->precio); ?>">
                                            <input type="text" name="cantidad" hidden value="<?php echo e($producto->cantidad); ?>">
                                            <button type="submit"
                                                class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <tfoot>
                        <div class="flex col-span-2 justify-between w-full sm:w-3/4 mt-8">
                            <div>
                                <!-- Botón Pagar -->
                                
                                <form action="<?php echo e(route('venta.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" name="carrito" hidden value="<?php echo e($carrito->id); ?>">
                                    <?php
                                        $c = 0;
                                    ?>
                                    <?php $__currentLoopData = $detalle_carrito; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="text" name="producto<?php echo e($c); ?>" hidden
                                            value="<?php echo e($dp->producto_id); ?>">
                                        <?php
                                            $c++;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <button type="submit"
                                        class="bg-green-500 text-white px-4 py-2 rounded mx-4 sm:mt-0">Pagar</button>
                                </form>
                            </div>
                            <!-- Total -->
                            <div class="py-2">
                                <span class="font-bold">Total:</span>
                                <span>BOB <?php echo e($carrito->total); ?></span>
                            </div>
                        </div>
                    </tfoot>
                </div>
            </center>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/VistaCarrito/index.blade.php ENDPATH**/ ?>