<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление студента</title>
    <style>
        form { margin-top: 20px; }
        div { margin-bottom: 15px; }
        label { display: inline-block; width: 150px; }
        input[type="text"] { 
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
        .group-info { 
            background-color: #f8f9fa; 
            padding: 15px; 
            border-radius: 4px; 
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>
    <h1>Добавление студента в группу</h1>
    
    <div class="group-info">
        <strong>Группа:</strong> {{ $group->title }}<br>
        <strong>Дата начала:</strong> {{ $group->start_from }}
    </div>
    
    <a href="{{ route('groups.show', $group) }}">← Назад к группе</a>
    
    <form action="{{ route('groups.students.store', $group) }}" method="POST">
        @csrf
        <div>
            <label for="surname">Фамилия:</label>
            <input type="text" name="surname" id="surname" required>
        </div>
        <div>
            <label for="name">Имя:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <button type="submit">Добавить студента</button>
    </form>
</body>
</html>