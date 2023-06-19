<?php $__env->startSection('cliente'); ?>
    <?php
        use Carbon\Carbon;
    ?>

    <div id="contenido-a-imprimir" class="container mx-auto mt-8">
        <div class="max-w-3xl mx-auto">
            <div class="flex justify-start my-4">

            </div>
            <div class="overflow-x-auto">

                <div class="container mx-auto p-4">
                    <h2 class="text-2xl font-bold mb-4">Nota de Venta</h2>

                    <div class="bg-white shadow-md rounded px-8 py-6 mb-4">
                        <p class="text-gray-700"><strong>Restaurante:</strong> Organic Food</p>
                        <p class="text-gray-700"><strong>Cliente:</strong> <?php echo e($ventas[0]->cliente); ?></p>
                        <p class="text-gray-700"><strong>Fecha:</strong> <?php echo e(Carbon::parse($ventas[0]->fecha)->format('d/m/Y')); ?>

                        </p>

                        <!-- Aquí puedes añadir más detalles de la venta -->
                    </div>

                    <div class="container mx-auto px-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full border border-gray-200">
                                <thead>
                                    <tr>
                                        <th class="bg-gray-100 text-left px-6 py-3">Item</th>
                                        <th class="bg-gray-100 text-left px-6 py-3">Cantidad</th>
                                        <th class="bg-gray-100 text-left px-6 py-3">Descripción</th>
                                        <th class="bg-gray-100 text-left px-6 py-3">P. Unitario</th>
                                        <th class="bg-gray-100 text-left px-6 py-3">P. Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <tr>
                                        <td class="border-t px-6 py-4">1</td>
                                        <td class="border-t px-6 py-4"><?php echo e($venta->cantidad); ?></td>
                                        <td class="border-t px-6 py-4">


                                        <p class="font-semibold text-left"><?php echo e($venta->nombre); ?></p>
                                        <p class="text-xs text-left">Descripción: <?php echo e($venta->descripcion); ?></p>
                                        <p class="text-xs text-left">Restaurante: <?php echo e($venta->empresa); ?></p>
                                        </td>
                                        <td class="border-t px-6 py-4"><?php echo e($venta->punit); ?></td>
                                        <td class="border-t px-6 py-4"><?php echo e($venta->precio); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="border-t text-right pr-6 py-3 font-bold">Total General:</td>
                                        <td class="border-t px-6 py-3 font-bold"><?php echo e($venta->total); ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div>
                        <button onclick="imprimirContenido()"
                            class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Imprimir
                        </button>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function imprimirContenido() {
            var contenido = document.getElementById("contenido-a-imprimir").innerHTML;
            var ventana = window.open("", "_blank");
            ventana.document.write('<html><head><title>Impresión</title></head><body>' + contenido + '</body></html>');
            ventana.document.close();
            ventana.print();
            ventana.close();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mauricio\mercadoverde\resources\views/VistaCarrito/nota.blade.php ENDPATH**/ ?>