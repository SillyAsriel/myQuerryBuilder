# myquerybuilder for mediasoft

- [Описание проекта](#project)
- [Начало](#begin)
- [INSERTINTO](#insert)
- [UPDATE](#update)
- [DELETE](#delete)
- [SELECT](#select)
- [WHERE](#where)
- [ORDERBY](#orderby)
- [LIMIT](#limit)






## Описание проекта
<a name="project"></a>

QueryBuilder

Была разработана обёртка для работы с разными СУБД в едином формате.

Был создан массив, в котором задавалась конфигурация соединения: тип бд, логин, пароль, хост, имя базы.

При создании экземпляра класса создается подключение, при вызове цепочки методов внутри объекта ведется генерация запроса, при вызове execute запрос отправляется на сервер и непосредственно выполняется.

Реализованы базовые методы CRUD: INSERT, UPDATE, DELETE, SELECT, условия, сортировки, лимиты.

## Начало
<a name="begin"></a> 

Перед началом работы с массивом, необходимо подключить myquerrybuilder и autoload.

```php
use DB\MyQueryBuilder;

require_once 'autoload.php';
```

Чтобы начать работу с myquerrybuilder нужно передать массив со следующим содержанием:

```php
[

    'DB_DRIVER'       => 'pgsql', 

    'DB_HOST'       => '127.0.0.1', 

    'DB_PORT'       => порт, 

    'DB_NAME'   =>  название базы данных, 
    
    'DB_USER'   => имя пользователя, 

    'DB_PASSWORD'   => пароль пользователя,
];
```

Создание нового объекта:

```php
$db = new MyQueryBuilder($config);
```

Выполнение запроса и получение результатов:

```php
$result = $db->execute();

dd($result);
```

## INSERTINTO
<a name="insert"></a>


```php
    $db
    ->insertInto('table', [
        'DB_field_1' => 'value_1',
        'DB_field_2' => 'value_2',
        ]);
```

## UPDATE
<a name="update"></a>

```php
    $db
    ->update('table',
        ['DB_field_1' => 'value_1',
         'DB_field_2' => 'value_2',
        ])
    ->where('table.DB_field_1', '=', value_1);
```

## DELETE
<a name="delete"></a>

```php
    $db
    ->delete()
    ->from('table')
    ->where('DB_field_1', '=', value_1);
```

## SELECT
<a name="select"></a>

```php
$db->select()->from('table');
```

```php
$db->select(['DB_field_1', 'DB_field_2'])
```

## WHERE
<a name="where"></a>

```php
    $db->select()->from('table')->where('DB_field_1', '=', value_1);
```

Каждая следующая конструкция созданная с помощью метода where будет добавлена оператора AND. Чтобы добавить OR используется метод orWhere
```php
    $db
    ->select()
    ->from('table')
    ->where('DB_field_1', '=', value_1)
    ->where('DB_field_2', '=', value_2);
```

## ORDERBY
<a name="orderby"></a>

```php
$db
    ->select()
    ->from('table')
    ->orderBy('DB_field_1', 'DESC');
```

## LIMIT
<a name="limit"></a>

```php
$db
    ->select()
    ->from('table')
    ->limit(4);
```

```php
$db
    ->select()
    ->from('table')
    ->limit(4, 2); 
```


