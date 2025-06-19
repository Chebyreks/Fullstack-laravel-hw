<!DOCTYPE html>

<head>
    <title>Корзины</title>

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
        <a class="button" href="{{ route('user.main') }}">
            Вернуться на главную
        </a>
        <div class = "agent_card_list">
            <p>Номер заказа | Суммарная цена | Доставщик Id</p>
            @foreach($orders as $order)
                <div>
                    <div>{{ $order->id }} | {{ $order->sum_price}} руб. | {{ $order->delivery_agent_id}}</div>
                </div>
            @endforeach
        </div>
        <a class="button" href="{{ route('user.order.create') }}">
            Добавить корзину
        </a>
    </div>
</body>
