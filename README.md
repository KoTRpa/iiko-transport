# IIKO Transport API Library

Requirements:
- php >=8.1
- Laravel 8+

### Installation

- add to ```repositories``` section of your ```composer.json```
```json
{
    "type": "vcs",
    "url": "https://github.com/KoTRpa/iiko-transport"
}
```
- install via ```php composer install kma/iiko-transport```
- add to ```.env``` 
```dotenv
IIKO_LOGIN=your_apiLogin
```
- optional add to ```.env``` url to iiko api (default is ```https://api-ru.iiko.services/api/1/```)
```dotenv
IIKO_URL="url_to_iiko_api"
```

### Using

In Laravel, you can use Service Provider 
```php
use IikoTransport;
...
public function myFunction()
{
    IikoTransport::nomenclature();
}
```

or dependency injection
```php
public function myFunction(IikoTransport $iiko)
{
    $iiko->nomenclature();
}
```

### Available API methods

> Iiko Transport API documentation lives [here](https://api-ru.iiko.services/)

All methods require a *Request* entity as param and returns *Response* entity

All entities can be created by different ways:

- directly with ```new``` and after assign attributes
```php
$entity = new EntityName;
$entity->id = 'id';
```

- you can path to constructor a prepared array
```php
$data = [
    'id' => 'id'
];

$entity = new EntityName($data);
```

- or using static calls (recommended)
```php
$entity = EntityName::fromArray($data);
$entity = EntityName::fromJson($jsonString);
```

Also, all entities has some convert methods to json or array

```php
$entity->toArray();
$entity->toJson();
```

##### Organizations

[Available request options](https://api-ru.iiko.services/#tag/Organizations/paths/~1api~11~1organizations/post)

```php
use KMA\IikoTransport\Endpoints\General\Organizations\OrganizationsRequest;
use KMA\IikoTransport\Endpoints\General\Organizations\OrganizationsResponse;
...
$response = IikoTransport::organizations(new OrganizationsRequest);
```

##### Menu / nomenclature

[Available request options](https://api-ru.iiko.services/#tag/Menu/paths/~1api~11~1nomenclature/post)

```php
use KMA\IikoTransport\Endpoints\General\Menu\NomenclatureRequest;
use KMA\IikoTransport\Endpoints\General\Menu\NomenclatureResponse;
...
$response = IikoTransport::nomenclature(new NomenclatureRequest);
```

##### Terminal Groups

[Available request options](https://api-ru.iiko.services/#tag/Terminal-groups/paths/~1api~11~1terminal_groups/post)

```php
use KMA\IikoTransport\Endpoints\General\TerminalGroups\TerminalGroupsRequest;
use KMA\IikoTransport\Endpoints\General\TerminalGroups\TerminalGroupsResponse;
...
$response = IikoTransport::terminalGroups(new TerminalGroupsRequest);
```

continue...

