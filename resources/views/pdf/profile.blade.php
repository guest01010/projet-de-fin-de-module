<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CV de {{ $user->name }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; margin: 20px; }
        h1 { font-size: 24px; margin-bottom: 0; }
        h2 { font-size: 18px; margin-top: 20px; }
        ul { padding-left: 15px; }
    </style>
</head>
<body>
    <h1>{{ $user->name }}</h1>
    <h2>{{ $user->title }}</h2>
    <p>{{ $user->bio }}</p>

    <h2>Projets</h2>
    <ul>
        @foreach ($user->projects as $project)
            <li><strong>{{ $project->title }}</strong> – {{ $project->description }}</li>
        @endforeach
    </ul>

    <h2>Compétences</h2>
    <ul>
        @foreach ($user->skills as $skill)
            <li>{{ $skill->name }}</li>
        @endforeach
    </ul>
</body>
</html>
