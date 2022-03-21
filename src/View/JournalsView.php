<?php

namespace Ivan\Lan\View;


class JournalsView
{
    public static function render(array $journals): void
    {
        $journalsView = '';
        foreach ($journals as $number => $journal) {
            $journalsView .=
                "<div id='div-journal-$journal->id'> "
                    . $number + 1 . ". $journal->name
                    <div class='margined'>
                        id: $journal->id
                    </div>
                    <div class='margined'>
                        Издательство: $journal->publisher
                    </div>
                    <div class='margined'>
                        Год издания: $journal->year
                    </div>
                    <button 
                        class='margined' 
                        id='journal-$journal->id' 
                        data-id='journal-$journal->id'
                    >
                        Загрузить выпуски журнала
                    </button>
                </div>
                </br>
                <div id='loader-issues-for-$journal->id' style='display: none;'>
                    <img src='../load-loading.gif' width='100px' height='100px' >
                </div>
                <div id='issues-for-$journal->id' class='margined'>
                    
                </div>";
        }

        echo json_encode($journalsView);
    }

}
