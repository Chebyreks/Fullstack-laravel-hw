<!DOCTYPE html>

<head>
    <title>Доставщики</title>

    <style>
        .main { 
            display: flex; 
            flex-direction: column; 
            align-items: center;
            font-size: large
        }
        .agent_card_list { 
            display: flex; 
            flex-direction: column; 
            align-items: center;
        }
        .button { 
            padding: 1px 6px; 
            border: 1px outset buttonborder; 
            border-radius: 3px; 
            color: black; 
            background-color: white; 
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class = "main">
        <a class="button" href="{{ route('admin.main') }}">
            Вернуться на главную
        </a>
        <div class = "agent_card_list">
            <p>Доставщик | Активен</p>
            @foreach($agents as $agent)
                <div>
                    <div>{{ $agent->name }} | {{ $agent->active ? 'Да' : 'Нет' }}</div>
                </div>
            @endforeach
        </div>
        <a class="button" href="{{ route('admin.agent.create') }}">
            Добавить доставщика
        </a>
    </div>
</body>
