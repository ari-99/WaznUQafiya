// $("span.word").click(e => {
//     let clickedWord = $(e.target).text();
//     new ClipboardJS(clickedWord);
// })
// var words = document.querySelectorAll("span.word");
var clipboard = new ClipboardJS(".word");

clipboard.on('success', function (e) {
    console.log(e);
    $(".word").css("border", "")
    $(e.trigger).css("border", "1px solid #283847");
});
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
// $(window).scroll(function (e) {
//     console.log(window.pageYOffset)
//     if (window.pageYOffset > 1) {
//         $("div.header").stop();
//         $("div.header").animate({
//             height: '10px'
//         });
//     } else if(window.pageYOffset == 0) {
//         $("div.header").stop();
//         $(window).scrollTop();
//         $("div.header").animate({
//             height: '170px'
//           });
//     }
// });
$("#word").keyup(e => { 
    let currLength = $(e.target).val().length;
    $("#rhymablility").attr("max", currLength);
    $("#rhymablility").val(0);
    $("#rhymablilityVal").text("0");
    console.log(currLength);
});

$("#search-btn").click(() => {
    if($("#word").val() && $("#rhymablility").val() != '0'){
        let word = $("#word").val();
        let rhymablility = Number($("#rhymablility").val());
        let substr = word.substr(word.length - rhymablility);
        //Not sure if rhymability is a word :/
        $.post("getWords.php",
        {
            substr: substr,
            lettersNo: rhymablility
        },
        (data, status) => {
            console.log(data)
            if(data){
                $("#results .simplebar-content").html(data);
            } else {
                $("#results .simplebar-content").html(" ....بەداخەوە! هیچ ووشەیەک نەدۆزرایەوە");
            }
        })
    }else{
        $("#results .simplebar-content").html("تکایە وشەیەکی گونجاو لەگەڵ ڕادەی لێکچوون دیاری بکە");
    }
});
$("#suggest-btn").click(() => {
    if($("#suggestedWord").val() && $("#suggester").val()){
        if($("#suggestedWord").val().length > 1){
            let suggestedWord = $("#suggestedWord").val();
            let suggester = $("#suggester").val();
            $.post("Contribute.php",
            {
                word: suggestedWord,
                suggester: suggester
            },
            (data, status) => {
                console.log(data);
                if(data == 'success'){
                    alert("پێشنیارەکەت بە سەرکەوتوویی داخڵ کرا!\n...بە زووترین کات لەلایەن ئەدمینەکانەوە پێداچونەوەی بۆ دەکرێت\n!سوپاس بۆ هاوکاریکردنت")    
                }else if(data == 'duplicate entry'){
                    alert("سوپاس بۆ هاوکاریکردنت بەڵام ئەم ووشەیە پێشتر داخڵ کراوە!\nچاوەڕێی ئەدمینەکان ببە هەتا ئەوکاتەی پێداچوونەوەی بۆ دەکەن...");
                }else if(data == 'duplicate db entry'){
                    alert("سوپاس بۆ هاوکاریکردنت بەڵام ئەم ووشەیە پێشتر داخڵ کراوە!");
                }
            })
        }else{
            alert("!ووشەکە نابێت لە 2 پیت کەمتر بێت");
        }
    } else{
        alert("تکایە هەموو بۆکسەکان پڕبکەرەوە")
    }
});