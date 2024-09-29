<div>
   <h1 >LOGIN</h1> <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div>
<?php
$nums=[2, 5, 11, 15,1,7,9,2,1,0];
// Определяем функцию twoSum
function twoSum($nums, $target) {
    $numToIndex = [];

    foreach ($nums as $index => $num) {
        $complement = $target - $num;
        if (array_key_exists($complement, $numToIndex)) {
            return [$numToIndex[$complement], $index];
        }
        $numToIndex[$num] = $index;
    }

    return null;  // Если решение не найдено
}

// Вызов функции с параметрами
$result = twoSum($nums, 9);

// Вывод результата
dd($result);
?>
