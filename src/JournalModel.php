<?php

namespace Ivan\Lan;

class JournalModel extends Model
{
    public function getItems(): array
    {
        $secondPart = '1.0/resource/journal';
        $parameters = '?limit=20' . '&fields=publisher%2Cyear%2Cname';

        return $this->queryApi($this->token, $secondPart, $parameters);
    }

}