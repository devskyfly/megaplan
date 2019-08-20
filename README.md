
## Megaplan client

Realize get and post request methods with params.

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