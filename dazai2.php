<?php
require_once __DIR__ . '/header.php'
?>
    <h1>青森</h1>
    <h4>太宰治</h4>
    <button id="speedUpButton">速くする</button>
    <button id="speedDownButton">遅くする</button>
    <button id="resetSpeedButton">元に戻す</button>
    <button id="increaseFontSizeButton">フォントサイズを大きく</button>
    <button id="decreaseFontSizeButton">フォントサイズを小さく</button>
    <br>
    <br>
    <button id="prevButton">前項</button>
    <button id="displayButton">次項</button>
    <div id="output"></div>
    <audio id="audioPlayer" controls>
        <source src="aomorimori_1.mp3" type="audio/mp3">
    </audio>
    <style>
  /* 音声フォームを非表示にするスタイル */
  #audioPlayer {
    display: none;
  }
</style>
<script>
    var stringArray = [
         "青森には、四年いました。青森中学に通っていたのです。親戚の豊田様のお家に、ずっと世話になっていました。",
         "寺町の呉服屋の、豊田様であります。豊田の、なくなった「お父《ど》さ」は、私にずいぶん力こぶを入れて、何かとはげまして下さいました。私も、「おどさ」に、ずいぶん甘えていました。",
         "「おどさ」は、いい人でした。私が馬鹿な事ばかりやらかして、ちっとも立派な仕事をせぬうちになくなって、残念でなりません。",
         "もう五年、十年生きていてもらって、私が多少でもいい仕事をして、お父《ど》さに喜んでもらいたかった、とそればかり思います。",
         "いま考えると「おどさ」の有難いところばかり思い出され、残念でなりません。私が中学校で少しでも佳《よ》い成績をとると、おどさは、世界中の誰よりも喜んで下さいました。",
         "私が中学の二年生の頃、寺町の小さい花屋に洋画が五、六枚かざられていて、私は子供心にも、その画に少し感心しました。",
         "そのうちの一枚を、二円で買いました。この画はいまにきっと高くなります、と生意気な事を言って、豊田の「おどさ」にあげました。おどさは笑っていました。",
         "あの画は、今も豊田様のお家に、あると思います。いまでは百円でも安すぎるでしょう。棟方志功氏の、初期の傑作でした。",
         "棟方志功氏の姿は、東京で時折、見かけますが、あんまり颯爽《さっそう》と歩いているので、私はいつでも知らぬ振りをしています。",
         "けれども、あの頃の志功氏の画は、なかなか佳かったと思っています。もう、二十年ちかく昔の話になりました。豊田様のお家の、あの画が、もっと、うんと、高くなってくれたらいいと思って居ります。",
         "最後のページです"
    ]

    const audioFiles = [
            "aomori/aomorimori_1.mp3",
            "aomori/aomorimori_2.mp3",
            "aomori/aomorimori_3.mp3",
            "aomori/aomorimori_4.mp3",
            "aomori/aomorimori_5.mp3",
            "aomori/aomorimori_6.mp3",
            "aomori/aomorimori_7.mp3",
            "aomori/aomorimori_8.mp3",
            "aomori/aomorimori_9.mp3",
            "aomori/aomorimori_10.mp3",
            "last.mp3"
        ];
</script>
<?php
require_once __DIR__ . '/footer.php'
?>