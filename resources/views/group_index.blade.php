<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список групп</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .active { color: green; font-weight: bold; }
        .inactive { color: red; }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Список учебных групп</h1>
    
    <a href="{{ route('groups.create') }}">Создать новую группу</a>
    
    @if($groups->count() > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Название группы</th>
                <th>Дата начала обучения</th>
                <th>Статус</th>
                <th>Количество студентов</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ $group->title }}</td>
                <td>{{ $group->start_from }}</td>
                <td class="{{ $group->is_active ? 'active' : 'inactive' }}">
                    {{ $group->is_active ? 'Активна' : 'Неактивна' }}
                </td>
                <td>{{ $group->students->count() }}</td>
                <td>
                    <a href="{{ route('groups.show', $group) }}">Просмотр</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Группы пока не созданы.</p>
    @endif
</body>
</html>