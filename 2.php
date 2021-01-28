<?php

/** ЗАДАНИЕ
 * • Как исправить скрипт, чтобы экземпляр класса b выводил корректную информацию о
 * себе?
 * <?
 * class a
 * {
 * const TYPE = 'A Class';
 * public function getType() {
 * echo 'This is class: '. __CLASS__ .', type '. self::TYPE;
 * }
 * }
 * class b extends a
 * {
 * const TYPE = 'B Class';
 * }
 * $a = new a();
 * $b = new b();
 * $a->getType();
 * $b->getType();
 * ?>
 */


/** РЕШЕНИЕ:
 * замена self:: на static::
 * замена __CLASS__ на get_class($this);
 */
class a
{
    const TYPE = 'A Class';

    public function getType()
    {
        echo 'This is class: ' . get_class($this) . ', type ' . static::TYPE;
    }
}

class b extends a
{
    const TYPE = 'B Class';
}

$a = new a();
$b = new b();
$a->getType();
$b->getType();
