<!-- Булев / Логический тип-->
<!-- Это простейший тип. bool выражает истинность значения. Он может быть либо true, либо false. -->

<!-- Для указания bool, используйте константы true или false. Они обе регистронезависимы. -->

<!-- Для явного преобразования в bool, используйте (bool) или (boolean). -->
<!-- При преобразовании в bool, следующие значения рассматриваются как false:

само значение boolean false
-integer 0 (ноль)
-float 0.0 (ноль) и -0.0 (минус ноль)
-пустая строка, и строка "0"
-массив без элементов
-особый тип NULL (включая неустановленные переменные)
-объекты SimpleXML, созданные из пустых элементов без атрибутов, то есть элементов, не имеющих ни дочерних элементов, ни атрибутов. -->
<?php
var_dump((bool) "");        // bool(false)
var_dump((bool) "0");       // bool(false)
var_dump((bool) 1);         // bool(true)
var_dump((bool) -2);        // bool(true)
var_dump((bool) "foo");     // bool(true)
var_dump((bool) 2.3e5);     // bool(true)
var_dump((bool) array(12)); // bool(true)
var_dump((bool) array());   // bool(false)
var_dump((bool) "false");   // bool(true)
?>



<!-- Целые числа -->
<!-- Целые числа (int) могут быть указаны в десятичной (основание 10), шестнадцатеричной (основание 16),
восьмеричной (основание 8) или двоичной (основание 2) системе счисления.
Для задания отрицательных целых (int) используется Оператор отрицания -->
<?php
$a = 1234; // десятичное число
$a = 0123; // восьмеричное число (эквивалентно 83 в десятичной системе)
$a = 0o123; // восьмеричное число (начиная с PHP 8.1.0)
$a = 0x1A; // шестнадцатеричное число (эквивалентно 26 в десятичной системе)
$a = 0b11111111; // двоичное число (эквивалентно 255 в десятичной системе)
$a = 1_234_567; // десятичное число (с PHP 7.4.0)
?>

<!-- Переполнение целых чисел -->
<!-- Если PHP обнаружил, что число превышает размер типа int,
он будет интерпретировать его в качестве float. Аналогично,
если результат операции лежит за границами типа int, он будет преобразован в float. -->

<!-- Пример #2 Переполнение целых на 32-битных системах -->
<?php
$large_number = 2147483647;
var_dump($large_number);                     // int(2147483647)
$large_number = 2147483648;
var_dump($large_number);                     // float(2147483648)
$million = 1000000;
$large_number =  50000 * $million;
var_dump($large_number);                     // float(50000000000)
?>

<!-- Пример #3 Переполнение целых на 64-битных системах -->
<?php
$large_number = 9223372036854775807;
var_dump($large_number);                     // int(9223372036854775807)
$large_number = 9223372036854775808;
var_dump($large_number);                     // float(9.2233720368548E+18)
$million = 1000000;
$large_number =  50000000000000 * $million;
var_dump($large_number);                     // float(5.0E+19)
?>