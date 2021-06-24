@extends('layouts.layout')

@section('title')
    {{ "Мои записи" }}
@endsection

@section('content')
    <div class="orders">
        <?php
        use Illuminate\Support\Facades\Auth;

        if (Auth::user()->role == 'MASTER') {
            echo "<h1>Записи клиентов назначенные на меня</h1>";
            echo "<table>";
            echo "<tr>";
            echo "<td>№</td>";
            echo "<td>Время</td>";
            echo "<td>Имя клиента</td>";
            echo "<td>Комментарий</td>";
            echo "</tr>";

            foreach (upToArr($ordersAssignedToMe) as $value) {
                echo "<tr>";
                echo "<td>" . $value["id"] . "</td>";
                echo "<td>" . $value["order_time"] . "</td>";
                echo "<td>" . $value["name"] . "</td>";
                echo "<td>" . $value["comment"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        if (Auth::user()->role == 'CLIENT' || Auth::user()->role == 'MASTER') {
            echo "<h1>Мои записи</h1>";
        } else if (Auth::user()->role == 'ADMIN') {
            echo "<h1>Все записи клиентов</h1>";
        }
        ?>
        <table>
            <tr>
                <td>№</td>
                <td>Время</td>
                <td>Имя мастера</td>
                <?php
                if (Auth::user()->role == 'ADMIN') {
                    echo "<td>Имя клиента</td>";
                }
                ?>
                <td>Комментарий</td>
            </tr>
            <?php
            function upToArr($obj)
            {
                $orders = array();
                foreach ($obj as $item => $value) {
                    array_push($orders, (array)$value);
                }
                return $orders;
            }

            foreach (upToArr($myOrders) as $value) {
                echo "<tr>";
                echo "<td>" . $value["id"] . "</td>";
                echo "<td>" . $value["order_time"] . "</td>";
                echo "<td>" . $value["master_name"] . "</td>";
                echo "<td>" . $value["comment"] . "</td>";
                echo "</tr>";
            }

            if (Auth::user()->role == 'ADMIN') {
                foreach (upToArr($allOrders) as $value) {
                    echo "<tr>";
                    echo "<td>" . $value["id"] . "</td>";
                    echo "<td>" . $value["order_time"] . "</td>";
                    echo "<td>" . $value["master_name"] . "</td>";
                    echo "<td>" . $value["user_name"] . "</td>";
                    echo "<td>" . $value["comment"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
@endsection
