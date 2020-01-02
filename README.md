Doctrine Tool
===================

Installation
------------
```bash
$ composer require valentinloiseau/doctrine-tool
```

Usage
-----
```php
$qb = $this->createQueryBuilder('foo');

$result = $qb
    ->addSelect(
        Val\DoctrineTool\StringFunctions::getIndexStringStartBy($qb, 'foo.bar', ':startBy')
    )
    ->orderBy('startByIndex')
    ->setParameter('startBy', "$startBy%")
    ->getQuery()
    ->getResult();
```