<?php

namespace Ivan\Lan;

use Ivan\Lan\View\IssuesView;
use Ivan\Lan\View\JournalsView;

class Controller
{
    private Model $model;

    public function run()
    {
        $rout = explode('/', substr($_SERVER['REQUEST_URI'], 1));

        if (!$rout[0]) {
            InitialView::render();
            return;
        }
        $command = Helper::validateString($rout[0]);

        $token = isset($rout[count($rout) - 1])
            ? Helper::validateString($rout[count($rout) - 1])
            : '';
        if (!Helper::isValid($token)) {
            echo 'false';
            return;
        }

        if ($command == 'getJournals') {
            $this->model = new JournalModel($token);
            $this->renderJournals();
        } elseif ($command == 'getIssues') {
            $this->model = new IssueModel($token);
            $journalId = Helper::validateString($rout[1]);
            $this->renderIssuesByJournalAction($journalId);
        }
    }

    private function renderIssuesByJournalAction($journalId): void
    {
        IssuesView::render($this->model->getItems($journalId));
    }

    private function renderJournals(): void
    {
        JournalsView::render($this->model->getItems());
    }
}