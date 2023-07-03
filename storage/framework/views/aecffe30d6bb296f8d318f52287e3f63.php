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
                    <h2 class="text-2xl font-bold mb-4">Nota de Compra</h2>

                    <div class="bg-white shadow-md rounded px-8 py-6 mb-4">
                        <p class="text-gray-700"><strong>JLY COMPANY</strong></p>
                        <p class="text-gray-700"><strong>Fecha:</strong> <?php echo e(Carbon::parse($compras[0]['fecha'])->format('d/m/Y')); ?>

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
                                        <th class="bg-gray-100 text-left px-6 py-3">Proveedor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <tr>
                                        <td class="border-t px-6 py-4"><?php echo e($compra['contador']); ?></td>
                                        <td class="border-t px-6 py-4"><?php echo e($compra['cantidad']); ?></td>
                                        <td class="border-t px-6 py-4">


                                        <p class="font-semibold text-left"><?php echo e($compra['producto_nombre']); ?></p>
                                        <p class="text-xs text-left">Descripción: <?php echo e($compra['producto_descripcion']); ?></p>
                                        <p class="text-xs text-left"></p>
                                        </td>
                                        <td class="border-t px-6 py-4"><?php echo e($compra['proveedor']); ?></td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
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
            ventana.document.write('<html><head><title>Impresión</title><link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"><style>table {border-collapse: separate; border-spacing: 0; width: 100%;} th, td {border: 1px solid #ddd; padding: 12px; text-align: center; font-size: 14px;} th {background-color: #FCE7D4;} .bg-gray-100 {background-color: #F9FAFB;}</style></head><body class="bg-gray-100">' + contenido + '</body></html>');
            ventana.document.close();
            ventana.print();
            ventana.close();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/VistaCompra/nota.blade.php ENDPATH**/ ?>