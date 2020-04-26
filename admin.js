$('#reject, #accept').click( e => {
    let action = $(e.target).attr('id');
    if($(e.target).attr('data-word')){
        let word = $(e.target).attr('data-word');
        let contributor = $(e.target).attr('data-contributor');
        $.post(
            "acceptReject.php",
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
    }else{
        let poem = $("#accept").parent().siblings('.poem').html();
        let poet = $(e.target).attr('data-poet');
        $.post(
            "acceptReject.php",
            {
                action: action,
                poem: poem,
                poet: poet
            },
            (data, status) => {
                console.log(data);
                $(e.target).closest('tr').fadeOut(500);
            }
        )
    }
})