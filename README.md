# PhpTimeGenerator
Practically generate and manipulate datetime for Php

**Usage examples**

```php
/*
 * Create object
 */
$time = new TimeGenerator();

/*
 * Print generated raw string
 */
var_dump($time->getDate());
// Output: string '2015-08-03 13:16:37' (length=19)

var_dump($time->addDay(20)->getString());
// Output: string '2015-08-03 13:16:37 20 days' (length=27)

var_dump($time->from('2014-10-10')->addDay(10)->getString());
// Output: string '2014-10-10 10 days' (length=18)

var_dump($time->subDay(10)->getString());
// Output: string '2014-10-10 -10 days' (length=19)

/*
 * Reset definitions
 */
$time->reset();

/*
 * Print datetime
 */
var_dump($time->from('1991-10-15 15:40:00')->addYear(24)->addHour(2)->subSecond(20)->getDate());
// Output: string '2015-10-15 17:39:40' (length=19)

/*
 * Print timestamp
 */
var_dump($time->getTime());
// Output: int 1444919980
```
