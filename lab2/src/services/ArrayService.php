<?php
// services/ArrayService.php

class ArrayService {
    /**
     * Преобразует строку с числами, разделенными запятыми, в массив целых чисел
     */
    public function parseArray(string $input): array {
        $items = explode(',', $input);
        return array_map('intval', $items);
    }

    /**
     * Объединяет два массива в один (без использования array_merge)
     */
    public function mergeArrays(array $array1, array $array2): array {
        $mergedArray = [];

        foreach ($array1 as $value) {
            $mergedArray[] = $value;
        }

        foreach ($array2 as $value) {
            $mergedArray[] = $value;
        }

        return $mergedArray;
    }

    /**
     * Фильтрует массив, оставляя только четные числа
     */
    public function filterEvenNumbers(array $array): array {
        $evenNumbers = [];

        foreach ($array as $value) {
            if ($value % 2 == 0) {
                $evenNumbers[] = $value;
            }
        }

        return $evenNumbers;
    }

    /**
     * Обрабатывает два массива: объединяет и фильтрует четные числа
     */
    public function processArrays(string $input1, string $input2): array {
        $array1 = $this->parseArray($input1);
        $array2 = $this->parseArray($input2);

        $mergedArray = $this->mergeArrays($array1, $array2);
        $evenNumbers = $this->filterEvenNumbers($mergedArray);

        return [
            'merged' => $mergedArray,
            'even' => $evenNumbers
        ];
    }
}
