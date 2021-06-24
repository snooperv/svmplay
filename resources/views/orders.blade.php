@extends('layouts.layout')

@section('title')
    {{ "Мои записи" }}
@endsection

@section('content')
    <?php
    function upToArr($obj)
    {
        $orders = array();
        foreach ($obj as $item => $value) {
            array_push($orders, (array)$value);
        }
        return $orders;
    }
    ?>
    <div class="orders">
        @if (Auth::user()->role == 'MASTER')
            <h1>Записи клиентов назначенные на меня</h1>
            <table>
                <tr>
                    <td>№</td>
                    <td>Дата</td>
                    <td>Время</td>
                    <td>Имя клиента</td>
                    <td>Комментарий</td>
                </tr>
                @foreach (upToArr($ordersAssignedToMe) as $value)
                    <tr>
                        <td>{{ $value["id"] }}</td>
                        <td>{{ $value["order_date"] }}</td>
                        <td>{{ $value["order_time"] }}</td>
                        <td>{{ $value["name"] }}</td>
                        <td>{{ $value["comment"] }}</td>
                    </tr>
                @endforeach
            </table>
        @endif

        <?php
        if (Auth::user()->role == 'CLIENT' || Auth::user()->role == 'MASTER') {
            echo "<h1>Мои записи</h1>";
        } else if (Auth::user()->role == 'ADMIN') {
            echo "<h1>Все записи клиентов</h1>";
        }
        ?>
        <table>
            <tr>
                <td>№</td>
                <td>Дата</td>
                <td>Время</td>
                <td>Имя мастера</td>
                @if (Auth::user()->role == 'ADMIN')
                    <td>Имя клиента</td>
                @endif
                <td>Комментарий</td>
            </tr>


            @foreach (upToArr($myOrders) as $value)
                <tr>
                    <td>{{ $value["id"] }}</td>
                    <td>{{ $value["order_date"] }}</td>
                    <td>{{ $value["order_time"] }}</td>
                    <td>{{ $value["master_name"] }}</td>
                    <td>{{ $value["comment"] }}</td>
                    <td>
                        <form method="post" action="orders/ {{ $value["id"] }}" onclick="return confirm('Вы действительно хотите удалить запись?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="but_delete">Удалить запись</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if (Auth::user()->role == 'ADMIN')
                @foreach (upToArr($allOrders) as $value)
                    <tr>
                        <td>{{ $value["id"] }}</td>
                        <td>{{ $value["order_date"] }}</td>
                        <td>{{ $value["order_time"] }}</td>
                        <td>{{ $value["master_name"] }}</td>
                        <td>{{ $value["user_name"] }}</td>
                        <td>{{ $value["comment"] }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection
