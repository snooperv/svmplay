@extends('layouts.layout')

@section('title')
    {{ "Мои записи" }}
@endsection

@section('content')
    <div class="orders">
        <h1>Мои записи</h1>
        <!--{{ $myOrders }} Проверочная переменная-->
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
                    $orders = (array)$value;
                }
                return $orders;
            }
            $myOrders = upToArr($myOrders);

            for ($i = 0; $i < count($myOrders) / 4; $i++) {
                echo "<tr>";
                echo "<td>" . $myOrders["id"] . "</td>";
                echo "<td>" . $myOrders["order_time"] . "</td>";
                echo "<td>" . $myOrders["master_name"] . "</td>";
                echo "<td>" . $myOrders["comment"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
@endsection
