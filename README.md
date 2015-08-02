# PhpTimeStringGenerator
Practically generate time string for Php instead of manually using strtotime() function

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
 // Output: string '2015-08-02 21:15:46' (length=19)

 var_dump($timeString->day(20)->future()->get());
 // Output: string '2015-08-02 21:15:46 +20 days' (length=28)

 var_dump($timeString->from('2014-10-10')->day(10)->future()->get());
 // Output: string '2014-10-10 +10 days' (length=19)

 var_dump($timeString->past()->get());
 // Output: string '2014-10-10 -10 days' (length=19)

 /*
  * Reset definitions
  */
 $timeString->reset();

 /*
  * Print datetime
  */
 var_dump($timeString->from('1991-10-15 15:40:00')->year(24)->hour(2)->second(20)->future()->getDate());
 // Output: string '2015-10-15 17:40:20' (length=19)

 /*
  * Print timestamp
  */
 var_dump($timeString->getTime());
 // Output: int 1444920020
```
