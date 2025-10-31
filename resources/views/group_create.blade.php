<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание группы</title>
    <style>
        form { margin-top: 20px; }
        div { margin-bottom: 15px; }
        label { display: inline-block; width: 200px; }
        input[type="text"], input[type="date"] { 
            padding: 8px; 
            width: 300px; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
        }
        button { 
            padding: 10px 20px; 
            background-color: #007bff; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        }
        button:hover { background-color: #0056b3; }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Создание новой группы</h1>
    
    <a href="{{ route('groups.index') }}">← Назад к списку групп</a>
    
    <form action="{{ route('groups.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Название группы:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="start_from">Дата начала обучения:</label>
            <input type="date" name="start_from" id="start_from" required>
        </div>
        <div>
            <label>
                <input type="checkbox" name="is_active" value="1" checked>
                Активная группа
            </label>
        </div>
        <button type="submit">Создать группу</button>
    </form>
</body>
</html>