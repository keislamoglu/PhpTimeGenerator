# PhpTimeStringGenerator
Practically generate time string and manipulate datetime for Php instead of manually using strtotime() function

**Usage examples**

```php
/*
 * Create object
 */
$timeString = new TimeStringGenerator();

/*
 * Print generated raw string
 */
var_dump($timeString->get());
// Output: string '2015-08-03 13:16:37' (length=19)

var_dump($timeString->addDay(20)->get());
// Output: string '2015-08-03 13:16:37 20 days' (length=27)

var_dump($timeString->from('2014-10-10')->addDay(10)->get());
// Output: string '2014-10-10 10 days' (length=18)

var_dump($timeString->subDay(10)->get());
// Output: string '2014-10-10 -10 days' (length=19)

/*
 * Reset definitions
 */
$timeString->reset();

/*
 * Print datetime
 */
var_dump($timeString->from('1991-10-15 15:40:00')->addYear(24)->addHour(2)->subSecond(20)->getDate());
// Output: string '2015-10-15 17:39:40' (length=19)

/*
 * Print timestamp
 */
var_dump($timeString->getTime());
// Output: int 1444919980
```
