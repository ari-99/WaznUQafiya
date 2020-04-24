$('#reject, #accept').click( e => {
    let action = $(e.target).attr('id');
    let word = $(e.target).attr('data-word');
    let contributor = $(e.target).attr('data-contributor');
    $.post(
        "acceptRejectWords.php",
        {
            action: action,
            word: word,
            contributor: contributor
        },
        (data, status) => {
            console.log(data);
            $(e.target).closest('tr').fadeOut(500);
        }
    )
})