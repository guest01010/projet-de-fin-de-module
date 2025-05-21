<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Profil de {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
            <h3 class="text-lg font-bold">{{ $user->title }}</h3>
            <p class="text-gray-700">{{ $user->bio }}</p>

            <h4 class="mt-6 font-semibold">Projets</h4>
            <ul class="list-disc list-inside text-gray-800">
                @foreach ($user->projects as $project)
                    <li>
                        <strong>{{ $project->title }}</strong> – {{ $project->description }}
                        @if($project->link)
                            (<a href="{{ $project->link }}" class="text-blue-500 underline" target="_blank">Lien</a>)
                        @endif
                    </li>
                @endforeach
            </ul>

            <h4 class="mt-6 font-semibold">Compétences</h4>
            <ul class="flex flex-wrap gap-2 mt-2">
                @foreach ($user->skills as $skill)
                    <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded">{{ $skill->name }}</span>
                @endforeach
            </ul>

            <div class="mt-6">
                <a href="{{ route('pdf.generate', $user->username) }}" 
   >
   Télécharger CV
</a>

            </div>
        </div>
    </div>
</x-app-layout>
