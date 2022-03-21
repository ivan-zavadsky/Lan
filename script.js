document.addEventListener('DOMContentLoaded', function (event) {
    App.init();
});

let App =
{
    submitButton: null,
    journalsArea: null,
    issuesArea: null,
    journalsLoadPictureDiv: null,
    // issuesLoadPictureDiv: null,
    init: () => {
        App.submitButton = document.getElementById('button');
        App.submitButton.addEventListener('click', App.getJournals);
        App.journalsArea = document.getElementById('journals');
        App.journalsArea.addEventListener('click', App.getIssues);
        App.journalsLoadPictureDiv = document.getElementById('journals-loader');
        App.journalsLoadPictureDiv.style.display = 'none';
        App.issuesLoadPictureDiv = document.getElementById('issues-loader');
    },
    getIssues: (event) => {
        let token = document.getElementById('load').value;
        let journalId = event.target.dataset.id.split('-')[1];
        let issuesLoaderPictureDiv = document.getElementById('loader-issues-for-' + journalId);
        issuesLoaderPictureDiv.style.display = 'block';
        let currentIssuesArea = document.getElementById('issues-for-' + journalId);
        currentIssuesArea.innerHTML = '';
        let options = {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        }
        fetch('/getIssues/' + journalId + '/' + token,options)
            .then(res => res.json())
            .then(res => App.putDataToCurrentIssuesArea(res, journalId))
            .catch(err => console.error(err));

    },
    getJournals: () => {
        let token = document.getElementById('load').value;
        App.journalsLoadPictureDiv.style.display = 'block';
        App.journalsArea.innerHTML = '';
        let options = {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        }

        fetch('/getJournals/' + token, options)
            .then(res => res.json())
            .then(res => App.putDataToJournalsArea(res))
            .catch(err => console.error(err));

    },
    putDataToJournalsArea: (string) => {
        if (!string) {
            string = 'Неверный токен';
        }

        App.journalsArea.innerHTML = string;
        App.journalsLoadPictureDiv.style.display = 'none';

    },
    putDataToCurrentIssuesArea : (string, journalId) => {
        if (!string) {
            string = 'Неверный токен';
        }

        let issuesArea = document.getElementById('issues-for-' + journalId)
        issuesArea.innerHTML = string;
        let issuesLoaderPictureDiv = document.getElementById('loader-issues-for-' + journalId);
        issuesLoaderPictureDiv.style.display = 'none';
    },
}
