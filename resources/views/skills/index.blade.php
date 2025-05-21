<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Mes compétences
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('skills.create') }}">
                   
                    + Ajouter une compétence
</a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <ul class="divide-y divide-gray-200">
                    @forelse ($skills as $skill)
                        <li class="p-4 flex justify-between items-center">
                            <span>{{ $skill->name }}</span>
                            <form action="{{ route('skills.destroy', $skill) }}" method="POST"
                                  onsubmit="return confirm('Supprimer cette compétence ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        >
                                    Supprimer
                                </button>
                            </form>
                        </li>
                    @empty
                        <li >Aucune compétence enregistrée.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
