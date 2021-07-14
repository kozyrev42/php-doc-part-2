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

<!-- Преобразование в целое -->
<!-- Для явного преобразования в int, используйте приведение (int) или (integer).
Однако, в большинстве случаев, в приведении типа нет необходимости,
так как значение будет автоматически преобразовано, если оператор,
функция или управляющая структура требует аргумент типа int. 
Значение также может быть преобразовано в int с помощью функции intval(). -->

<!-- Из булевого типа  -->
<!-- false преобразуется в 0 (ноль), а true - в 1 (единицу). -->

<!-- Из чисел с плавающей точкой -->
<!-- При преобразовании из float в int, число будет округлено в сторону нуля. 
Начиная с PHP 8.1.0, при неявном преобразовании неинтегрального числа 
с плавающей точкой (float) в целое число (int), которое теряет точность, 
выдаётся уведомление об устаревании. -->
<?php

function foo($value): int {
  return $value;
}

var_dump(foo(8.1)); // "Deprecated: Implicit conversion from float 8.1 to int loses precision" начиная с PHP 8.1.0
var_dump(foo(8.1)); // 8 до PHP 8.1.0
var_dump(foo(8.0)); // 8 в обоих случаях

var_dump((int)8.1); // 8 в обоих случаях
var_dump(intval(8.1)); // 8 в обоих случаях
?>



<!-- Числа с плавающей точкой -->
<!-- Числа с плавающей точкой или числа с плавающей запятой
(также известные как "float", "double" или "real") могут быть 
определены следующими синтаксисами: -->
<?php
$a = 1.234;
$b = 1.2e3;
$c = 7E-10;
$d = 1_234.567; // начиная с PHP 7.4.0
?>

<!-- Точность чисел с плавающей точкой -->
<!-- Так что никогда не доверяйте точности чисел с плавающей точкой 
до последней цифры и не проверяйте напрямую их равенство. 
Если вам действительно необходима высокая точность, используйте 
математические функции произвольной точности и gmp-функции.-->

<!-- NaN -->
<!-- Некоторые числовые операции могут возвращать значение, 
представляемое константой NAN. Данный результат означает 
неопределённое или непредставимое значение в операциях с плавающей точкой. 
Любое строгое или нестрогое сравнение данного значения с другим значением, 
кроме true, включая его самого, возвратит false. -->

<!-- Так как NAN представляет собой неограниченное количество различных значений, 
то NAN не следует сравнивать с другими значениями, включая её саму. 
Вместо этого, для определения её наличия необходимо использовать функцию is_nan(). -->

<!-- Строки -->
<!-- Строка (тип string) - это набор символов, где символ - это то же самое, 
что и байт. Это значит, что PHP поддерживает ровно 256 различных символов, 
а также то, что в PHP нет встроенной поддержки Unicode. 
Смотрите также подробности реализации строкового типа. -->
<?php
echo 'это простая строка';

echo 'Также вы можете вставлять в строки
символ новой строки вот так,
это нормально';

// Выводит: Однажды Арнольд сказал: "I'll be back"
echo 'Однажды Арнольд сказал: "I\'ll be back"';

// Выводит: Вы удалили C:\*.*?
echo 'Вы удалили C:\\*.*?';

// Выводит: Вы удалили C:\*.*?
echo 'Вы удалили C:\*.*?';

// Выводит: Это не будет развёрнуто: \n новая строка
echo 'Это не будет развёрнуто: \n новая строка';

// Выводит: Переменные $expand также $either не разворачиваются
echo 'Переменные $expand также $either не разворачиваются';
?>