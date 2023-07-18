<?php $__env->startSection('usuario'); ?>
    <div class="my-8 mx-8">
        <div class="container mx-auto">
            <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
                <h2 class="text-2xl text-green-500 font-bold mb-6">Bitacora</h2>
                <select name="combobox">
                    <option value="opcion1">Tipo de Accion</option>
                    <option value="opcion2">Opción 2</option>
                    <option value="opcion3">Opción 3</option>
                  </select>
                  <select name="combobox">
                    <option value="opcion1">Tipo de Usuario</option>
                    <option value="opcion2">Opción 2</option>
                    <option value="opcion3">Opción 3</option>
                  </select>
                  <a href="" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2">Imprimir</a>
                  <table class="min-w-full bg-white">
                    <thead>
                      <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Nombre</th>
                        <th class="py-2 px-4 border-b">Acción</th>
                        <th class="py-2 px-4 border-b">Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="py-2 px-4 border-b">1</td>
                        <td class="py-2 px-4 border-b">Juan</td>
                        <td class="py-2 px-4 border-b">Creo un nuevo producto</td>
                        <td class="py-2 px-4 border-b">11:33 10/07/2023</td>
                      </tr>
                      <tr>
                        <td class="py-2 px-4 border-b">2</td>
                        <td class="py-2 px-4 border-b">Maria</td>
                        <td class="py-2 px-4 border-b">Actualizo un producto</td>
                        <td class="py-2 px-4 border-b">11:33 11/07/2023</td>
                      </tr>
                      <tr>
                        <td class="py-2 px-4 border-b">3</td>
                        <td class="py-2 px-4 border-b">Rene</td>
                        <td class="py-2 px-4 border-b">Registro un proveedor</td>
                        <td class="py-2 px-4 border-b">11:25 13/07/2023</td>
                      </tr>
                      <tr>
                        <td class="py-2 px-4 border-b">4</td>
                        <td class="py-2 px-4 border-b">Mauricio</td>
                        <td class="py-2 px-4 border-b">Creo una orden de compra</td>
                        <td class="py-2 px-4 border-b">11:33 13/07/2023</td>
                      </tr>
                      <tr>
                        <td class="py-2 px-4 border-b">5</td>
                        <td class="py-2 px-4 border-b">Juan</td>
                        <td class="py-2 px-4 border-b">Creo un nuevo rol</td>
                        <td class="py-2 px-4 border-b">11:33 14/07/2023</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mercadoverde\resources\views/VistaUser/index.blade.php ENDPATH**/ ?>