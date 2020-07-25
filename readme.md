## ArrayHelper 0.1.2

##### Установка

```
composer require u89man/array-helper
```

##### Примеры

```php
use U89Man\Helpers\ArrayHelper; 
```

```php
$a1 = [];

// $a1 = ['k1' = 'v1']
ArrayHelper::set($a1, 'k1', 'v1');

$a2 = [];

// $a2 = ['k2' => ['k3' => 'v3']]
ArrayHelper::set($a2, 'k2.k3', 'v3'); 
```

```php
$a3 = ['k4' => 'v4'];

// $b1 = true
$b1 = ArrayHelper::has($a3, 'k4'); 

// $b2 = false
$b2 = ArrayHelper::has($a3, 'k5'); 
```

```php
$a4 = ['k6' => 'v6'];

// $v6 = "v6"
$v6 = ArrayHelper::get($a4, 'k6');

// $v7 = null
$v7 = ArrayHelper::get($a4, 'k7');

// $v8 = "dv8"
$v8 = ArrayHelper::get($a4, 'k8', 'dv8');
```

```php
$a5 = ['k9' => 'v9'];

// $a5 = []
ArrayHelper::remove($a5, 'k9');
```

```php
// $aw1 = []
$aw1 = ArrayHelper::wrap();

// $aw2 = ['k10' => 'v10']
$aw2 = ArrayHelper::wrap(['k10' => 'v10']);

// $aw3 = [0 => 'v11']
$aw3 = ArrayHelper::wrap('v11');
```

