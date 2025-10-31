<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список студентов</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Список всех студентов</h1>
    
    <a href="{{ route('groups.index') }}">← Назад к списку групп</a>
    
    @if($students->count() > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Группа</th>
                <th>Дата создания</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->surname }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->group->title }}</td>
                <td>{{ $student->created_at->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('groups.students.show', [$student->group, $student]) }}">Просмотр</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Студенты пока не добавлены.</p>
    @endif
</body>
</html>