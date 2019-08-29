
## Megaplan client

This library realize megaplan api client and entities managers.

### Client use sample

```php

// Client create 
$client = new MegaplanClient("https://host",
"Login", 
"Password", 
"proxy"); // optional

// Client push
$params = [
    'Model[TypePerson]' => "human",
    'Model[FirstName]' => "Петр",
    'Model[LastName]' => "Петров",
    'Model[MiddleName]' => "Петрович",
    'Model[AdvertisingWay]' => 1,
    'Model[Locations][location]' => ['home'=>'_']
];
$ar = $client->post("/BumsCrmApiV01/Contractor/save.api", $params);

// List tasks query
$ar = $client->get("/BumsTaskApiV01/Task/list.api");

// List clients query
$params = [
    "Offset" => 0,
    "qs" => "Петр Петрович Петров"
];

$ar = $client->get("/BumsCrmApiV01/Contractor/list.api", $params);

```

### Builders use sample

```php
$client = new MegaplanClient("https://host",
"Login", 
"Password", 
"proxy"); // optional

$builder = new ClientModelBuilder();
$builder->firstName("Иван")
    ->lastName("Иванов")
    ->middleName("Иванович")
    ->locations(["n1"=>["Address"=>"Саратов"]])
    ->adversingWay(1);
$result = $manager->create($builder);

$builder->lastName("Петров");
$result = $manager->edit(1000024, $builder);
print_r($result);

$builder = new ClientsListQueryBuilder();
$builder->queryString("Филиппов");
$manager = new ClientsManager($client);
$result = $manager->getList($builder);
```