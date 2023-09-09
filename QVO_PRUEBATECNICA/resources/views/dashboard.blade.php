<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar Tareas') }}
        </h2>
    </x-slot>

    <head>
        <meta charset="UTF-8">
        <title>QVO Prueba Técnica</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">            
                    <table class="table-auto border border-black">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border border-black">Título</th>
                                <th class="px-4 py-2 border border-black">Descripción</th>
                                <th class="px-4 py-2 border border-black">Fecha de Vencimiento</th>
                                <th class="px-4 py-2 border border-black">Completada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="border border-black px-4 py-2">{{ $task->title }}</td>
                                    <td class="border border-black px-4 py-2">{{ $task->description }}</td>
                                    <td class="border border-black px-4 py-2">{{ $task->due_date }}</td>
                                    <td class="border border-black px-4 py-2">
                                        <form action="{{ route('dashboard.update', $task->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="task-button {{ $task->completed ? 'completed' : '' }}" data-task-id="{{ $task->id }}" data-completed="{{ $task->completed ? '1' : '0' }}">
                                                {{ $task->completed ? 'Completado' : 'Pendiente' }}
                                            </button>
                                        </form>
                                    </td>                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br><br>
                    {{ $tasks->links() }}
                    <button class="navigation-button"> <a href="{{ route('crear') }}">
                        Crear Tareas
                    </a></button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
