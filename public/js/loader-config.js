function runWaitMe(selector,effect = 'bounce') {
    $(selector).waitMe({
        effect: effect,
        text: '',
        bg: 'rgba(255,255,255,0.7)',
        color: '#000',
        maxSize: '',
        waitTime: -1,
        source: '',
        textPos: 'vertical',
        fontSize: '',
    });
}

function runWaitMeClose(selector) {
    $(selector).waitMe('hide')
}
