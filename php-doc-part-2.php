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