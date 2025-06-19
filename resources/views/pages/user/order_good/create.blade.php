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
    <div class="main">
        <h1>Добавить товар в заказ</h1>
        
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $good->name }}</h5>
                <p class="card-text">
                    Цена: {{ number_format($good->price, 2) }} ₽<br>
                    Категория: {{ $good->category->name ?? 'Без категории' }}
                </p>
            </div>
        </div>
        
        <form method="POST" action="{{ route('user.order_good.store') }}">
            @csrf
            <input type="hidden" name="good_id" value="{{ $good->id }}">
            
            <div class="mb-3">
                <label for="order_id" class="form-label">Номер заказа</label>
                <select class="form-select" id="order_id" name="order_id" required>
                    @foreach($orders as $order)
                        <option value="{{ $order->id }}">
                            Заказ #{{ $order->id }} ({{ $order->created_at }})
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="quantity" class="form-label">Количество</label>
                <input type="number" class="form-control" id="quantity" 
                    name="quantity" value="1" min="1" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Добавить в заказ</button>
        </form>
    </div>
</body>