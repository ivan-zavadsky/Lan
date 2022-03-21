<?php

namespace Ivan\Lan;

class IssueModel extends Model
{
    public function getItems(int $journalId): array
    {
        $secondPart = "1.0/resource/journal/$journalId";
        $parameters = "?limit=10";

        $issues = $this->queryApi($this->token, $secondPart, $parameters);

        $articles = [];
        foreach ($issues as $issue) {
            $secondPartArticles = "1.0/resource/journal/issue/$issue->id";
            $parametersArticles = "?limit=10";

            $articles[$issue->id] = $this->queryApi(
                $this->token,
                $secondPartArticles
                , $parametersArticles
            );
        }

        return [
            'issues' => $issues,
            'articles' => $articles,
        ];
    }

}