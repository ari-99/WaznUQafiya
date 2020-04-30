var clipboard = new ClipboardJS(".word");

clipboard.on('success', function (e) {
    console.log(e);
    $(".word").css("border", "")
    $(e.trigger).css("border", "1px solid #283847");
});

$("#submitPoem").click(() => {
    $("#submitPoem").text('ناردن');
    $("#submitPoemWrapper").html(`<label id="poetLbl">ناو
    <input type="text" required class="form-control" name="" dir="rtl" id="poet"
        aria-describedby="helpId" placeholder="">
    <small id="helpId" class="form-text text-muted">ناوی شاعیر
        </small>
    </label>
    <label id="TA">هۆنراوە
    <textarea name="" id="" class="form-control" cols="10" rows="10"></textarea>
    <small id="helpId" class="form-text text-muted">هۆنراوەکەت بە فۆنتی کوردی
        </small>
    </label>`);
    tinymce.init({
        selector: 'textarea',
        language: 'ku_IQ',
        directionality: 'rtl',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Ari Qaradaghi',
        mobile: {
            theme: 'mobile', 
            menubar: false
        },
    });
    // $(this).closest('.sections').css('height', 'max-content')
    $("#submitPoem").off();
    $("#submitPoem").click(() => {
        if (tinyMCE.activeEditor.getContent() && $("#poet").val()) {
            let poem = tinyMCE.activeEditor.getContent();
            let poet = $("#poet").val();
            $.post("sendPoem.php", {
                    poem: poem,
                    poet: poet
                },
                (data, status) => {
                    console.log(data);
                    if (data == 'success') {
                        alert("!هۆنراوەکەت بە سەرکەوتوویی داخڵ کرا\n...بە زووترین کات لەلایەن ئەدمینەکانەوە پێداچونەوەی بۆ دەکرێت\n!سوپاس بۆ هاوکاریکردنت")
                        tinyMCE.activeEditor.setContent('');
                        $("#poet").val('');
                    } else if (data == 'duplicate entry') {
                        alert("!سوپاس بۆ هاوکاریکردنت بەڵام ئەم هۆنراوەیە پێشتر داخڵ کراوە\n...چاوەڕێی ئەدمینەکان ببە هەتا ئەوکاتەی پێداچوونەوەی بۆ دەکەن");
                    } else if (data == 'duplicate db entry') {
                        alert("!سوپاس بۆ هاوکاریکردنت بەڵام ئەم هۆنراوەیە هەیە لە داتابەیسەکەدا");
                    }
                })
        } else {
            alert("تکایە هەموو بۆکسەکان پڕبکەرەوە")
        }
    });
    
})
// $(".word").on("mouseout", e => {
//     $(".word").css("opacity", "");

// });
// $(".word").on("mouseenter", e => {
//     $(".word").css("opacity", "0");
//     $(e.target).css("opacity", "");
// })

clipboard.on('error', function (e) {
    console.log(e);
});

$("#word").keyup(e => {
    let currLength = $(e.target).val().length;
    $("#rhymablility").attr("max", currLength);
    $("#rhymablility").val(1);
    $("#rhymablilityVal").text("1");
    console.log(currLength);
});

$("#search-btn").click(() => {
    if ($("#word").val() && $("#rhymablility").val() != '0') {
        $("#results .simplebar-content").html('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
        let word = $("#word").val();
        let rhymablility = Number($("#rhymablility").val());
        let substr = word.substr(word.length - rhymablility);
        //Not sure if rhymability is a word :/
        $.post("getWords.php", {
                substr: substr,
                lettersNo: rhymablility
            },
            (data, status) => {
                console.log(data)
                if (data) {
                    $("#results .simplebar-content").html(data);
                } else {
                    $("#results .simplebar-content").html(" ....بەداخەوە! هیچ ووشەیەک نەدۆزرایەوە");
                }
            })
    } else {
        $("#results .simplebar-content").html("تکایە وشەیەکی گونجاو لەگەڵ ڕادەی لێکچوون دیاری بکە");
    }
});
$("#suggest-btn").click(() => {
    if ($("#suggestedWord").val() && $("#suggester").val()) {
        if ($("#suggestedWord").val().length > 1) {
            if ($("#suggestedWord").val().includes(' ')) {
                let suggestedWord = $("#suggestedWord").val();
                let suggester = $("#suggester").val();
                $.post("Contribute.php", {
                        word: suggestedWord,
                        suggester: suggester
                    },
                    (data, status) => {
                        console.log(data);
                        if (data == 'success') {
                            alert("!پێشنیارەکەت بە سەرکەوتوویی داخڵ کرا\n...بە زووترین کات لەلایەن ئەدمینەکانەوە پێداچونەوەی بۆ دەکرێت\n!سوپاس بۆ هاوکاریکردنت")
                        } else if (data == 'duplicate entry') {
                            alert("!سوپاس بۆ هاوکاریکردنت بەڵام ئەم ووشەیە پێشتر داخڵ کراوە\n...چاوەڕێی ئەدمینەکان ببە هەتا ئەوکاتەی پێداچوونەوەی بۆ دەکەن");
                        } else if (data == 'duplicate db entry') {
                            alert("!سوپاس بۆ هاوکاریکردنت بەڵام ئەم ووشەیە هەیە لە داتابەیسەکەدا");
                        }
                    })
            } else {
                alert("!تکایە دەبێت تەنیا یەک ووشە بێت بەبێ بوونی سپەیس");
            }
        } else {
            alert("!ووشەکە نابێت لە 2 پیت کەمتر بێت");
        }
    } else {
        alert("تکایە هەموو بۆکسەکان پڕبکەرەوە")
    }
});

$("#rightArrow, #leftArrow").click(e => {
    let currPoem = $("#showcaseContent").html();
    let arrow = $(e.target).attr('id');
    $("#showcaseContent ").html('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>')
    $.post(
        'GETpoem.php', {
            arrow: arrow,
            pid: pid
        },
        (data, status) => {
            console.log(status);
            console.log(pid);
            if (data != 'none') {
                $("#showcaseContent ").html(data);
                if (arrow.includes('right')) {
                    $("#leftArrow").toggle(true);
                } else {
                    $("#rightArrow").toggle(true);
                }
            } else {
                $("#showcaseContent ").html(currPoem);
                if (arrow.includes('right')) {
                    $("#rightArrow").toggle(false);
                } else {
                    $("#leftArrow").toggle(false);
                }
            }
        }
    )
});