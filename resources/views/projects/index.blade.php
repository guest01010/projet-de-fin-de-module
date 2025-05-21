<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Mes projets
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('projects.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    + Ajouter un projet
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <ul class="divide-y divide-gray-200">
                    @forelse ($projects as $project)
                        <li class="p-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-bold">{{ $project->title }}</h3>
                                    <p class="text-gray-600">{{ $project->description }}</p>
                                    @if($project->link)
                                        <a href="{{ $project->link }}" target="_blank" class="text-blue-500 underline">
                                            Voir le projet
                                        </a>
                                    @endif
                                </div>


                            </div>
                        </li>
                    @empty
                        <li class="p-4 text-gray-600">Aucun projet enregistré.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
