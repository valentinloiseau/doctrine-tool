<?php

namespace Val\DoctrineTool;

use Doctrine\ORM\QueryBuilder;

class StringFunctions
{
	public static function getIndexStringStartBy(QueryBuilder $qb, string $field, string $startBy, ?string $alias = 'startByIndex', bool $hidden = true): string
	{
		$hiddenString = $hidden ? 'HIDDEN ' : '';

		return "(CASE WHEN {$qb->expr()->like($field, $startBy)} THEN 0 ELSE 1 END) AS $hiddenString$alias";
	}
}
