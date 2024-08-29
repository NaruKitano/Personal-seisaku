<script>
    var currentIndex = -1;
        var isDisplaying = false;
        var displaySpeed = 150; // デフォルトの表示速度（ms単位）
        var interval; // setInterval のインスタンスを保持する変数
        var fontSize = 16; // デフォルトのフォントサイズ

        // 文字列を一文字ずつ表示する共通の関数
        function displayStringOneByOne() {
            var currentString = stringArray[currentIndex];
            var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = ''; // 既存の文字列を削除
            outputDiv.style.fontSize = fontSize + 'px'; // フォントサイズを設定

            var index = 0;
            clearInterval(interval); // 既存のインターバルをクリア
            interval = setInterval(function() {
                isDisplaying = true; // 表示中のフラグをセット
                var currentChar = currentString[index];
        if (currentChar !== undefined) { // ここでundefinedをチェックして対処
            outputDiv.innerHTML += currentChar;
            index++;
        } else {
            clearInterval(interval); // 不要なインターバルをクリア
            isDisplaying = false; // 表示中のフラグをリセット

            }
            }, displaySpeed); // 表示速度を変数から読み込む
            var audioPlayer = document.getElementById('audioPlayer');
            audioPlayer.src = audioFiles[currentIndex];
            audioPlayer.currentTime = 0;
            audioPlayer.play();
        }


        // 表示を継続する関数
        function continueDisplaying() {
            if (isDisplaying) {
                clearInterval(interval);
                isDisplaying = false;
                displayStringOneByOne();
                // currentIndex が配列の長さ以上の場合、追加の文字列を表示しない
                if (currentIndex >= stringArray.length) {
                currentIndex = stringArray.length - 1;
                clearInterval(interval);
                isDisplaying = false;
            }
            }
            }
        

        document.getElementById('displayButton').addEventListener('click', function() {
    if (isDisplaying) {
        currentIndex++;
        if (currentIndex >= stringArray.length) {
            currentIndex = stringArray.length - 1;
            displayStringOneByOne();
        } else {
            displayStringOneByOne();
        }
        return;
    }

    currentIndex++;

    // 最後の文字列に達した場合、最初の文字列に戻る
    if (currentIndex >= stringArray.length) {
        currentIndex == 0;
    }

    displayStringOneByOne();
});



document.getElementById('prevButton').addEventListener('click', function() {
    if (isDisplaying) {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = 0;
            displayStringOneByOne();
        } else {
            displayStringOneByOne();
        }
        return;
    }

    currentIndex--;

    // インデックスが負の場合、最後の文字列に移動する代わりに、最初の文字列に戻る
    if (currentIndex < 0) {
        currentIndex = stringArray.length - 1;
    }

    displayStringOneByOne();
});

// 速度変更時に音声再生速度も変更する関数
function changePlaybackSpeed(speed) {
    var audioPlayer = document.getElementById('audioPlayer');
    audioPlayer.playbackRate = speed;
}

    document.getElementById('speedUpButton').addEventListener('click', function() {
            displaySpeed -= 10; // 速くする
            if (displaySpeed < 10) {
                displaySpeed = 10; // 最速設定
            }
            if (isDisplaying) {
                displayStringOneByOne(); // 速度変更後、再度表示を開始
                changePlaybackSpeed(1.0 / (displaySpeed / 100)); // 音声再生速度
            }
        });

    document.getElementById('speedDownButton').addEventListener('click', function() {
            displaySpeed += 10; // 遅くする
            if (displaySpeed > 1000) {
                displaySpeed = 1000; // 最遅設定
            }
            if (isDisplaying) {
                displayStringOneByOne(); // 速度変更後、再度表示を開始
                changePlaybackSpeed(1.0 / (displaySpeed / 100)); // 音声再生速度を変更
            }
        });
    document.getElementById('resetSpeedButton').addEventListener('click', function() {
            displaySpeed = 150; // デフォルトの表示速度に戻す
            if (isDisplaying) {
                displayStringOneByOne(); // 速度変更後、再度表示を開始
                changePlaybackSpeed(1.0 / (displaySpeed / 100)); // 音声再生速度を変更
                }
        });
        
        document.getElementById('increaseFontSizeButton').addEventListener('click', function() {
        fontSize += 2; // フォントサイズを大きくする
        var outputDiv = document.getElementById('output');
        outputDiv.style.fontSize = fontSize + 'px'; // フォントサイズを設定
    });

    document.getElementById('decreaseFontSizeButton').addEventListener('click', function() {
        fontSize -= 2; // フォントサイズを小さくする
        var outputDiv = document.getElementById('output');
        outputDiv.style.fontSize = fontSize + 'px'; // フォントサイズを設定
    });
</script>

<br>
<button onclick="location.href='menu.html'">一覧へ戻る</button>
<hr>
0J03014北野就
</body>

</html>