<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Modifier mon profil
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Nom</label>
                    <input type="text" name="name"
                           class="w-full mt-1 p-2 border rounded shadow-sm focus:ring focus:border-blue-400"
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Titre professionnel</label>
                    <input type="text" name="title"
                           class="w-full mt-1 p-2 border rounded shadow-sm focus:ring focus:border-blue-400"
                           value="{{ old('title', $user->title) }}">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Biographie</label>
                    <textarea name="bio" rows="4"
                              class="w-full mt-1 p-2 border rounded shadow-sm focus:ring focus:border-blue-400">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold">Nom d'utilisateur (username)</label>
                    <input type="text" name="username"
                           class="w-full mt-1 p-2 border rounded shadow-sm focus:ring focus:border-blue-400"
                           value="{{ old('username', $user->username) }}">
                    <small class="text-gray-500">Ce champ doit être unique. Il servira pour l'URL publique du profil.</small>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                            >
                        ✅ Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
