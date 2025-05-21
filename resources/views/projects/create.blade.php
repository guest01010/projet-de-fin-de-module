<x-app-layout>
    <x-slot name="header">
        <h2 class="ml-2 text-blue-500 underline">
            Ajouter un projet
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700">Titre</label>
                    <input type="text" name="title" class="w-full mt-1 p-2 border rounded"
                           value="{{ old('title') }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Description</label>
                    <textarea name="description" rows="4" class="w-full mt-1 p-2 border rounded"
                              required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Lien (optionnel)</label>
                    <input type="url" name="link" class="w-full mt-1 p-2 border rounded"
                           value="{{ old('link') }}">
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
