# PhpTimeGenerator
Practically generate and manipulate datetime for Php

**Usage examples**

```php
<?php
require_once("TimeGenerator.php");
/*
 * Create object
 */
$time = new TimeGenerator();
/*
 * Print datetime
 */
var_dump($time->getDate());
// 2015-08-03 13:16:37

var_dump($time->addDay(20)->getDate());
// 2015-08-23 13:16:37

var_dump($time->from('2014-10-10 02:15:00')->addDay(10)->getDate());
// 2014-10-20 02:15:00

var_dump($time->subDay(10)->getDate());
// 2014-09-30 02:15:00

/*
 * Reset definitions
 */
$time->reset();

var_dump($time->from('1991-10-15 15:40:00')->addYear(24)->addHour(2)->subSecond(20)->getDate());
// 2015-10-15 17:39:40

/*
 * Print timestamp
 */
var_dump($time->getTime());
// 1444919980
```
