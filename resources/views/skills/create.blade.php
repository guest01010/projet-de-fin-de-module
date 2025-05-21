<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Ajouter une compétence
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <form action="{{ route('skills.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700">Nom de la compétence</label>
                    <input type="text" name="name" class="w-full mt-1 p-2 border rounded"
                           value="{{ old('name') }}" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                            >
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
