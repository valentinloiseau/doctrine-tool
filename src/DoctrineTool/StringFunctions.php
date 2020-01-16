<?php

namespace Val\DoctrineTool;

use Doctrine\ORM\QueryBuilder;

class StringFunctions
{
    public static function getIndexStringStartBy(QueryBuilder $qb, $fields, string $startBy, ?string $alias = 'indexStartBy', bool $hidden = true): string
    {
        $hiddenString = $hidden ? 'HIDDEN ' : '';
        $key = Utils::randomString();

        $qb->setParameter($key, "$startBy%");

        if (is_string($fields)) {
        	$condition = $qb->expr()->like($fields, ":$key");
		} elseif (is_array($fields)) {
			$condition = $qb->expr()->orX();
			foreach ($fields as $field) {
				$condition->add($qb->expr()->like($field, ":$key"));
			}
		} else {
        	throw new \LogicException(gettype($fields).' type is not allowed here.');
		}

        return "(CASE WHEN $condition THEN 0 ELSE 1 END) AS $hiddenString$alias";
    }
}
