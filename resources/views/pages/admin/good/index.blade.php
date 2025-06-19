<!DOCTYPE html>

<head>
    <title>Товары</title>

    <style>
        .main { 
            display: flex; 
            flex-direction: column; 
            align-items: center;
            font-size: large
        }
        .good_card_list { 
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
        <div class = "good_card_list">
            <p>Название товара | Цена</p>
            @foreach($goods as $good)
                <div class = "good_card">
                    <div>{{ $good->name }} | {{ $good->price }} руб.</div>
                </div>
            @endforeach
        </div>
        <a class="button" href="{{ route('admin.good.create') }}">
            Добавить товар
        </a>
    </div>
</body>
