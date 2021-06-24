@extends('layouts.layout')

@section('title')
    {{ "Мои записи" }}
@endsection

@section('content')
    <div class="orders">
        <h1>Мои записи</h1>
        <br>
        <table>
            <tr>
                <td>ID</td>
                <td>Время</td>
                <td>Имя мастера</td>
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
            $myOrders = upToArr($myOrders);

            foreach ($myOrders as $value) {
                echo "<tr>";
                echo "<td>" . $value["id"] . "</td>";
                echo "<td>" . $value["order_time"] . "</td>";
                echo "<td>" . $value["master_name"] . "</td>";
                echo "<td>" . $value["comment"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
@endsection
