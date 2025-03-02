<?php
//Вариант 4: Создайте 2 массива с целыми числами через 2 поля формы, объедините два массива
//в один (не используя специальные функции PHP типа array_merge(arr1,arr2)!), Выведите все чётные числа из получившегося массива
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $array1 = explode(',', $_POST['array1']);
    $array2 = explode(',', $_POST['array2']);

    $array1 = array_map('intval', $array1);
    $array2 = array_map('intval', $array2);

    $mergedArray = [];
    foreach ($array1 as $value) {
        $mergedArray[] = $value;
    }
    foreach ($array2 as $value) {
        $mergedArray[] = $value;
    }

    $evenNumbers = [];
    foreach ($mergedArray as $value) {
        if ($value % 2 == 0) {
            $evenNumbers[] = $value;
        }
    }

    echo "Чётные числа: " . implode(', ', $evenNumbers);
} else {
    echo "Некорректный запрос!";
}
?>