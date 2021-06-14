<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/js/all.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/uncak7iceokumpnygjknx7jj1mfysniqh98okllbgfy9mhor/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- <script>tinymce.init({selector:'textarea'});</script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="node_modules/simplebar/dist/simplebar.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="resources/splash.png">
    <style>
        .swiper-container {
            width: 70vw;
            height: 400px;
            margin: 0px;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media only screen and (max-width: 700px) {
            .swiper-container{
                width: 100vw;
                padding: 0 10px;
            }
            .swiper-button-next, .swiper-button-prev{
                display: none;
            } 
        }
    </style>
    <title>وەزن و قافییە</title>
</head>

<body>
    <?php
    require_once("nav.php");
    ?>
    <div id='searchSec' class="sections">
        <div class="inputs">
            <label>
                ووشە:
                <input type="text" class="form-control" name="" dir="rtl" id="word" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">ئەو وشەیەی کە دەتەوێت کێش و سەرواکەی بۆ
                    بدۆزیتەوە</small>
            </label>
            <label id="rangeLbl">
                ڕادەی لێکچوون:
                <input type="range" class="form-control-range" name="" min="1" value="1" id="rhymablility" aria-describedby="helpId" placeholder="" oninput="rhymablilityVal.value = rhymablility.value"><output id="rhymablilityVal">1</output>
                <small id="helpId" class="form-text text-muted">ڕادەی لێکچوونی وشەکان</small>
            </label>
        </div>
        <div class="container-fluid">
            <button type="button" id="search-btn" class="btn btn-primary">گەڕان</button>
        </div>
        <div id="results" data-simplebar>
            بە دڵی خۆت ووشەیەک لە سەرەوە داخڵ بکە و ڕادەی لێکچوونی خوازراو دیاری بکە و دەست بکە بە هۆنینەوە<br><span class="smileyFace">:)</span>
        </div>
        <small id="helpId-copy" class="form-text text-muted">کلیک بکە یان پەنجە بنێ بە هەر وشەیەکدا بۆ ڕاستەوخۆ کۆپی
            کردنی</small>
        <hr id="searchHR" class="style14">
    </div>
    <div id='suggestSec' class="sections">
        <div id="suggestWrapper" class="container-fluid">
            <small id="helpId-copy" dir="rtl" class="form-text text-muted">ئەگەرچی <span style="color: #283847;">وەزن و
                    قافیە</span> هێشتا بچووکە،
                بەڵام لەوانەیە تاکە هیوا بێت بۆ شاعیرێک یان گۆرانیبێژێکی تازە دەستپێکردوو کە ئەگەری هەیە تەنیا کێش و
                سەروای
                یەک ووشە بوو بێتە هۆی سنووردارکردنی تواناکانی. <br> تۆش ئەتوانیت یارمەتیدەربیت بە پێشنیارکردنی
                ووشەیەک...</small>

            <form class="inputs">

                <label>ووشە
                    <input type="text" required class="form-control" name="" dir="rtl" id="suggestedWord" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted"> ئەو وشەیەی کە دەتەوێت پێشنیاری بکەیت بە فۆنتی
                        کوردی</small>
                </label>
                <label>ناو
                    <input type="text" required class="form-control" name="" dir="rtl" id="suggester" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted"> ئەو ناوەی کە دەردەکەوێت لە ڕیزبەندی زۆرترین
                        بەشداربوون
                    </small>
                </label>
            </form>
            <button type="button" id="suggest-btn" class="btn btn-secondary">پێشنیار بکە</button>
        </div>
        <div id="topcontributorsWrapper" class="container-fluid">
            <h3 class="heading">زۆرترین بەشداربوون</h3>
            <ul id="topcontributors" class="list-group-item">
                <?php
                require_once("dbConn.php");
                $topConts = $conn->query("SELECT contributor, COUNT(*) AS noOfConts FROM `wordlist` WHERE contributor != 'unknown' GROUP BY contributor ORDER BY 2 DESC LIMIT 3");
                if (mysqli_num_rows($topConts) == 3) {
                    $topCont = $topConts->fetch_assoc();
                    echo    '<li class="list-group-item list-group-item-warning">' . $topCont['contributor'] . '<span class="noOfContributions">' . $topCont['noOfConts'] . '</span></li>';
                    $topCont = $topConts->fetch_assoc();
                    echo    '<li class="list-group-item list-group-item-success">' . $topCont['contributor'] . '<span class="noOfContributions">' . $topCont['noOfConts'] . '</span></li>';
                    $topCont = $topConts->fetch_assoc();
                    echo    '<li class="list-group-item list-group-item-primary">' . $topCont['contributor'] . '<span class="noOfContributions">' . $topCont['noOfConts'] . '</span></li>';
                } else {
                    echo '<li class="list-group-item list-group-item-warning">First place <span class="noOfContributions">42</span></li>
                        <li class="list-group-item list-group-item-success">Second place <span class="noOfContributions">33</span></li>
                        <li class="list-group-item list-group-item-primary">Third place <span class="noOfContributions">23</span></li>';
                }

                ?>

            </ul>
        </div>
        <hr id="contributeHR" class="style14">
    </div>
    <!-- <hr class="style14"> -->
    <div id='showcaseSec' class="sections">
        <div id="showcaseWrapper" class="container-fluid">
            <h4 class="heading">گوڵ بژێرێک لەو هۆنراوانەی بە یارمەتی وەزن و قافیە نووسراون</h3>
                <!-- Swiper -->
                <div dir="rtl" class="swiper-container mySwiper">
                    <div class="swiper-wrapper">
                        <!-- <div class="swiper-slide"> -->
                        <!-- <div id="showcaseContent" class="container-fluid"> -->
                        <?php
                        // $poemQueryPID = $conn->query("SELECT pid FROM poems ORDER BY pid DESC LIMIT 1");
                        // if (mysqli_num_rows($poemQueryPID) == 1) {
                        // $PID = $poemQueryPID->fetch_assoc();
                        // echo "<script>var pid = {$PID['pid']}</script>";
                        // $poemQuery = $conn->query("SELECT * FROM `poems` WHERE pid = {$PID['pid']}");
                        $poemQuery = $conn->query("SELECT * FROM `poems` LIMIT 10");
                        if (mysqli_num_rows($poemQuery) > 0) {
                            while ($poem = $poemQuery->fetch_assoc()) {
                                echo '<div class="swiper-slide"><div id="showcaseContent" class="container-fluid">' . $poem['poem'] . '<h4 id="author">-' . $poem['poet'] . '</h4>' . '</div></div>';
                            }
                        }
                        // }
                        ?>
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <!-- <div id="showcaseContentWrapper">
                    <div id="rightArrow"></div>
                    <div id="showcaseContent" class="container-fluid">
                        <?php
                        // $poemQueryPID = $conn -> query("SELECT pid FROM poems ORDER BY pid DESC LIMIT 1");
                        // if(mysqli_num_rows($poemQueryPID) == 1){
                        //     $PID = $poemQueryPID -> fetch_assoc();
                        //     echo "<script>var pid = {$PID['pid']}</script>";
                        //     $poemQuery = $conn -> query("SELECT * FROM `poems` WHERE pid = {$PID['pid']}");
                        //     if(mysqli_num_rows($poemQuery) == 1){
                        //         $poem = $poemQuery -> fetch_assoc();
                        //         echo $poem['poem'] . '<h4 id="author">-' . $poem['poet'] . '</h4>';
                        //     }
                        // }
                        ?>
                    </div>
                    <div id="leftArrow"></div>
                </div> -->
                <div id="submitPoemWrapper" class="inputs">
                </div>
                <button type="button" name="" id="submitPoem" class="btn btn-dark" btn-lg btn-block">هۆنراوای خۆتمان بۆ
                    بنێرە</button>
        </div>
    </div>


    <!-- Swiper JS -->
    <script defer src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->

    <hr id="showcaseHR" dir="rtl" class="style14">
    <h6> وەزن و قافییە ئامرازێکی بەسوودی ئەدەبییە کە شاعیران و هونەرمەندان ئەتوانن بەکاری بهێنن بۆ دۆزینەوەی کێش و سەروای وشەکان، چ بۆ نووسینی شیعر بێت یان تێکستی گۆرانی.</h6>
    <div id="links" dir='ltr' class="links">
        <a target="_blank" href="https://github.com/ari-99/WaznUQafiya" placeholder="Wazn w Qafiya is open-source! :)"><i class="fab fa-github"></i></a>
        <a target="_blank" href="https://www.facebook.com/WaznWQafiya"><i class="fab fa-facebook"></i></a>
        <a target="_blank" href="https://www.linkedin.com/in/ari99"><i class="fab fa-linkedin"></i></a>
    </div>


    <script defer src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script defer src="node_modules/simplebar/dist/simplebar.js"></script>
    <script defer src="node_modules/clipboard/dist/clipboard.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script defer src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="index.js"></script>
</body>

</html>