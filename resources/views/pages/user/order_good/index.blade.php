<!DOCTYPE html>

<head>
    <title>Добавление товаров</title>

    <style>
        .main { 
            display: flex; 
            flex-direction: column; 
            align-items: center;
            font-size: large
        }
        .smth {
            font-size: larger;
        }
        .button { 
            padding: 1px 6px; 
            border: 1px outset buttonborder; 
            border-radius: 3px; 
            color: black; 
            background-color: white; 
            text-decoration: none;
        }
        td {
            padding: 0px 16px 0px 16px;
        }
    </style>
</head>

<body>
    
    <div class="main">

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1>Добавление товаров в корзину</h1>
        <p class='smth'>Товары:</p>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                @foreach($goods as $good)
                <tr>
                    <td>{{ $good->id }}</td>
                    <td>{{ $good->name }}</td>
                    <td>{{ number_format($good->price, 2) }} ₽</td>
                    <td>
                        <form method="POST" 
                              action="{{ route('user.order_good.store') }}">
                            @csrf
                            <input type="hidden" name="price" value="{{ $good->price }}">
                            <input type="hidden" name="good_id" value="{{ $good->id }}">
                            <input type="hidden" name="order_id" value="{{ $order_id ?? '' }}">
                            
                            <button type="submit">Добавить в заказ</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="button" href="{{ route('user.order.index') }}">Закончить</a>
    </div>
</body>
