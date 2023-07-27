


@extends('dashboard')




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Obtén los inputs de fecha
        var startDateInput = $('#start_date');
        var endDateInput = $('#end_date');

        // Detecta los cambios en los inputs de fecha
        startDateInput.on('change', fetchFilteredActivities);
        endDateInput.on('change', fetchFilteredActivities);

        // Función para obtener los resultados filtrados mediante una solicitud AJAX
        function fetchFilteredActivities() {
            // Obtén los valores de fecha
            var startDate = startDateInput.val();
            var endDate = endDateInput.val();

            // Realiza la solicitud AJAX
            $.ajax({
                url: '{{ route('bitacora.index') }}',
                method: 'GET',
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(response) {
                    // Actualiza la tabla con los resultados filtrados
                    $('#activities_table').html(response.view);
                }
            });
        }
    });
</script>

<script>
    function imprimirContenido() {
        var contenido = document.getElementById("activities_table").innerHTML;
        var ventana = window.open("", "_blank");
        ventana.document.write('<html><head><title>Impresión</title><link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"><style>table {border-collapse: separate; border-spacing: 0; width: 100%;} th, td {border: 1px solid #ddd; padding: 12px; text-align: center; font-size: 14px;} th {background-color: #FCE7D4;} .bg-gray-100 {background-color: #F9FAFB;}</style></head><body class="bg-gray-100">' + contenido + '</body></html>');
        ventana.document.close();
        ventana.print();
        ventana.close();
    }
</script>



@section('usuario')
    <div class="my-8 mx-8">
        <div class="container mx-auto">
            <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
                <h2 class="text-2xl text-green-500 font-bold mb-6">Bitacora</h2>
                <div>
                    <div class="mb-4" style="display: inline-block;">
                        <label for="start_date">Fecha de inicio:</label>
                        <input type="date" id="start_date" name="start_date" route="{{ route('bitacora.index') }}">


                    </div>

                    <div class="mb-4" style="display: inline-block;">
                        <label for="end_date">Fecha de fin:</label>
                        <input type="date" id="end_date" name="end_date" route="{{ route('bitacora.index') }}">
                    </div>
                    <button onclick="imprimirContenido()" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Imprimir
                    </button>

                </div>
                <div id="activities_table">
                    @include('partials.activities_table')
                </div>

            </div>
        </div>
    </div>
@endsection
