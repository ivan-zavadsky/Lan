<?php

namespace Ivan\Lan\View;

class IssuesView
{
    public static function render($issuesAndArticles)
    {
        $issuesView = '';
        foreach ($issuesAndArticles['issues'] as $number => $issue) {
            $issuesView .=
                "<div> "
                    . $number + 1 . ". Выпуск: $issue->name
                    <div class='margined'>id: $issue->id</div>
                    <div class='margined'>
                        Год: $issue->year
                    </div>
                </div>
                </br>";

            foreach ($issuesAndArticles['articles'][$issue->id] as $index => $article) {
                $issuesView .=
                    "<div class='margined'> "
                        . $index + 1 . ". $article->name
                        <div class='margined2'>
                            id: $article->id
                        </div>
                        <div class='margined2'>
                            Авторы: $article->authors
                        </div>
                    </div>    
                    <br/>";
            }
        }

        echo json_encode($issuesView);
    }

}