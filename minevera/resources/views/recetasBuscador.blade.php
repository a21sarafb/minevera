<!DOCTYPE html>
<html>
<head>
    <title>Recetas</title>
</head>
<body>
    <h1>Recetas</h1>

    <ul>
        @foreach ($recetas as $receta)
            <li>
                <h2>{{ $receta['title'] }}</h2>
                <ul>
                    @foreach ($receta['ingredients'] as $ingredient)
                        <li>{{ $ingredient['name'] }}: {{ $ingredient['amount'] }}</li>
                    @endforeach
                </ul>
                <p>{{ $receta['description'] }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
