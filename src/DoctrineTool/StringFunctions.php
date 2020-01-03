<?php

namespace Val\DoctrineTool;

use Doctrine\ORM\QueryBuilder;

class StringFunctions
{
    public static function getIndexStringStartBy(QueryBuilder $qb, string $field, string $startBy, ?string $alias = 'indexStartBy', bool $hidden = true): string
    {
        $hiddenString = $hidden ? 'HIDDEN ' : '';
        $key = Utils::randomString();

        $qb->setParameter($key, "$startBy%");

        return "(CASE WHEN {$qb->expr()->like($field, ":$key")} THEN 0 ELSE 1 END) AS $hiddenString$alias";
    }
}
