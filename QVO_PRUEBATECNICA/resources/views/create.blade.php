<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar Tareas') }}
        </h2>
    </x-slot>

    <head>
        <meta charset="UTF-8">
        <title>Tu Página</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/create.css') }}">
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <table >
                        <!-- Esta accion crea la tarea del usuario -->
                        <form action="{{ route('crear.store') }}" method="POST" name="accion" value="correoCreate">
                            @csrf
                            <tr>
                                <td class="column1"><label>Título: </label></td>
                                <td class="column2"><input type="text" name="title" required class="info-box"></td>
                            </tr>
                            <tr>
                                <td class="column1"><label>Descripción: </label></td>
                                <td class="columnDescription"><textarea type="text" name="description" class="box-descrip"></textarea></td>
                            </tr>
                            <tr>
                                <td class="column1"><label>Fecha de Vencimiento:</label></td>
                                <td class="column2"><input type="date" name="due_date" required class="info-box"></td>
                            </tr>
                            <tr>
                                <td class="row3"><button class="navigation-button">Agregar</button></td>
                        </form>
                            <td class="row3">
                                <button class="navigation-button"><a
                                        href="{{ route('dashboard') }}">Regresar</a></button>
                            </td>
                        </tr>
                    </table>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
