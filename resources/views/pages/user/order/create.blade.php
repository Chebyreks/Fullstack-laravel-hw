<!DOCTYPE html>
<html>
<head>
    <title>Добавить заказ</title>
    
    <style>
        body {
            display: flex; 
            flex-direction: column; 
            align-items: center;
            gap: 2rem;
            font-size: large
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

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Добавить новый заказ</h1>
    <p>Для заполнения заказа нужно его создать</p>
    <form method="POST" action="{{ route('user.order.store') }}">
        @csrf
        
        <p>Выберите доставщика:</p>
        <select name="delivery_agent_id" required>
            @foreach($agents as $agent)
                <option value="{{ $agent->id }}" 
                    {{ old('delivery_agent_id') == $agent->id ? 'selected' : '' }}>
                    {{ $agent->name }} (ID: {{ $agent->id }})
                </option>
            @endforeach
        </select>

        <button type="submit">Создать заказ</button>
    </form>

    <div>
        <a class="button" href="{{ route('user.order.index') }}">Вернуться к списку товаров</a>
    </div>
</body>
</html>