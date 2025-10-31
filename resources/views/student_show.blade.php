<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Студент {{ $student->surname }} {{ $student->name }}</title>
    <style>
        .student-info { 
            background-color: #f8f9fa; 
            padding: 20px; 
            border-radius: 4px; 
            margin: 20px 0; 
        }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Информация о студенте</h1>
    
    <a href="{{ route('groups.show', $student->group) }}">← Назад к группе</a>
    <a href="{{ route('students.index') }}" style="margin-left: 20px;">Все студенты</a>
    
    <div class="student-info">
        <p><strong>ID:</strong> {{ $student->id }}</p>
        <p><strong>Фамилия:</strong> {{ $student->surname }}</p>
        <p><strong>Имя:</strong> {{ $student->name }}</p>
        <p><strong>Группа:</strong> {{ $student->group->title }}</p>
        <p><strong>Дата начала обучения группы:</strong> {{ $student->group->start_from }}</p>
        <p><strong>Статус группы:</strong> {{ $student->group->is_active ? 'Активна' : 'Неактивна' }}</p>
        <p><strong>Дата создания:</strong> {{ $student->created_at }}</p>
        <p><strong>Последнее обновление:</strong> {{ $student->updated_at }}</p>
    </div>
</body>
</html>