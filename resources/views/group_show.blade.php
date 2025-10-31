<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Группа {{ $group->title }}</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .active { color: green; font-weight: bold; }
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
    <h1>Группа: {{ $group->title }}</h1>
    
    <div class="group-info">
        <p><strong>Дата начала:</strong> {{ $group->start_from }}</p>
        <p><strong>Статус:</strong> <span class="{{ $group->is_active ? 'active' : '' }}">{{ $group->is_active ? 'Активна' : 'Неактивна' }}</span></p>
        <p><strong>Создана:</strong> {{ $group->created_at->format('d.m.Y H:i') }}</p>
    </div>
    
    <a href="{{ route('groups.index') }}">← Назад к списку групп</a>
    <a href="{{ route('students.index') }}" style="margin-left: 20px;">Все студенты</a>
    <a href="{{ route('groups.students.create', $group) }}" style="margin-left: 20px;">Добавить студента</a>
    
    <h2>Студенты группы ({{ $group->students->count() }})</h2>
    
    @if($group->students->count() > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($group->students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->surname }}</td>
                <td>{{ $student->name }}</td>
                <td>
                    <a href="{{ route('groups.students.show', [$group, $student]) }}">Просмотр</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>В этой группе пока нет студентов.</p>
    @endif
</body>
</html>