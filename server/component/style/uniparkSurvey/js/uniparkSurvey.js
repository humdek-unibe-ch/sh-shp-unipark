$(document).ready(function () {
    initUniparkSurvey();
});

function receiveUniparkMessage(event) {
    if (event.data && event.data['method'] && event.data['method'] == 'saveData') {
        $.post(window.location.href, event.data, function (result) { });
    }
}

function initUniparkSurvey() {
    $(".uniparkSurveyFrame").on('load', function () {
        window.addEventListener("message", receiveUniparkMessage, false);
        iFrameResize({
            log: false,
            heightCalculationMethod: 'taggedElement'
        });
    });
}