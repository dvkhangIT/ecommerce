function formatDateTime(dateTimeString) {
    const options = {
        year: 'numeric',
        month: 'short',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit'
    }
    const formatDateTime = new Intl.DateTimeFormat('en-us', options).format(new Date(dateTimeString));
    return formatDateTime;
}

function scrollBottom() {
    mainChatInbox.scrollTop(mainChatInbox.prop('scrollHeight'));
}

window.Echo.private('message.' + USER.id).listen(
    "MessageEvent", (e) => {
        let mainChatBox = $('.wsus__chat_area_body');
        var message = `
            <div class="wsus__chat_single single_chat_1">
                    <div class="wsus__chat_single_img">
                    <img
                        src="${e.sender_image}"
                        alt="user" class="img-fluid">
                    </div>
                    <div class="wsus__chat_single_text">
                    <p>${e.message}</p>
                    <span${formatDateTime(e.date_time)}</span>
                    </div>
                </div>
                `
        mainChatBox.append(message);
        scrollBottom();
    }
);