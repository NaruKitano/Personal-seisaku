<?php
require_once __DIR__ . '/header.php'
?>
    <h1>噓<h1>
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
        <source src="uso1.mp3" type="audio/mp3">
    </audio>
    <style>
  /* 音声フォームを非表示にするスタイル */
  #audioPlayer {
    display: none;
  }
</style>
<script>
    var stringArray = [
            "「戦争が終ったら、こんどはまた急に何々主義だの、何々主義だの、あさましく騒ぎまわって、演説なんかしているけれども、私は何一つ信用できない気持です。",
            "主義も、思想も、へったくれも要《い》らない。男は嘘《うそ》をつく事をやめて、女は慾を捨てたら、それでもう日本の新しい建設が出来ると思う。」",
            "私は焼け出されて津軽の生家の居候《いそうろう》になり、鬱々《うつうつ》として楽しまず、ひょっこり訪ねて来た小学時代の同級生でいまはこの町の名誉職の人に向って、そのような八つ当りの愚論を吐いた。",
            "名誉職は笑って、「いや、ごもっとも。しかし、それは、逆じゃありませんか。男が慾を捨て、女が嘘をつく事をやめる、とこう来なくてはいけません。」といやにはっきり反対する。",
            "私はたじろぎ、「そりゃまた、なぜです。」「まあ、どっちでも、同じ様なものですが、しかし、女の嘘は凄《すご》いものです。私はことしの正月、いやもう、身の毛もよだつような思いをしました。",
            "それ以来、私は、てんで女というものを信用しなくなりました。うちの女房なんか、あんな薄汚い婆でも、あれで案外、ほかに男をこしらえているかも知れない。いや、それは本当に、わからないものですよ。」と笑わずに言って、",
            "次のように田舎《いなか》の秘話を語り聞かせてくれた。以下「私」というのは、その当年三十七歳の名誉職御自身の事である。",
            "今だから、こんな話も公開できるのですが、当時はそれこそ極秘の事件で、この町でこの事件に就《つ》いて多少でも知っていたのは、ここの警察署長と（この署長さんは、それから間もなく転任になりましたが、いい人でした）それから、この私と、もうそれくらいのものでした。",
            "ことしのお正月は、日本全国どこでもそのようでしたが、この地方も何十年振りかの大雪で、往来の電線に手がとどきそうになるほど雪が積り、庭木はへし折られ、塀《へい》は押し倒され、",
            "またぺしゃんこに潰《つぶ》された家などもあり、ほとんど大洪水みたいな被害で、連日の猛吹雪のため、このあたり一帯の交通が二十日も全くと絶えてしまいました。その頃の事です。",
            "夜の八時ちょっと前くらいだったでしょうか、私が上の女の子に算術を教えていたら、ほとんどもう雪だるまそっくりの恰好《かっこう》で、警察署長がやって来ました。",
            "何やら、どうも、ただならぬ気配です。あがれ、と言っても、あがりません。この署長はひどく酒が好きで、私とはいい飲み相手で、もとから遠慮も何も無い仲だったのですが、",
            "その夜は、いつになく他人行儀で、土間に突立ったまま、もじもじして、「いや、きょうは、」と言い、「お願いがあって来たのです。」と思いつめたような口調で言う。これはいよいよ、ただ事でないと、私も緊張しました。",
            "私は下駄《げた》をつっかけて土間へ降り、無言で鶏小屋へ案内しました。雛《ひな》の保温のために、その小屋には火鉢を置いてあるのです。私たちは真暗い鶏小屋にこっそりはいります。",
            "私たちがはいって行っても、鶏どもが少しも騒がなかったほど、それほどこっそり忍び込んだのです。私たちは火鉢を中にして、向い合って突立っていました。",
            "「絶対に秘密にして置いて下さい。脱走事件です。」と署長は言う。警察の留置場から誰か脱走したのだろう、と私は、はじめはそう思いました。黙って、次の説明を待っていました。",
            "「たぶん、この町には、先例の無かった事でしょう。あなたの御親戚《ごしんせき》の圭吾《けいご》さん、ね、入隊していないんです。」私は頭から、ひや水をぶっ掛けられたような気がしました。",
            "「いや、しかし、あれは、」と私は、ほとんど夢中で言いました。「あれは、たしかに私が、青森の部隊の営門まで送りとどけた筈《はず》ですが。」",
            "「そうです。それは私も知っています。しかし、向うの憲兵隊から、彼は、はじめから来ていない、という電話です。いったいならば、憲兵がこちらへ捜査に来る筈なのですが、この大雪で、どうにもならぬ。",
            "依《よ》って、まず先に内々の捜査を言いつけて来たのです。それで私は、あなたに一つ、お願いがあるのです。」圭吾ってのは、どんな男だか、あなたなどは東京にばかりいらっしゃったのだから、何も御存じないでしょうし、",
            "また、いまはこんな時代になって、何を公表しても差支《さしつか》えないわけでしょうから、それはどこの誰だと、はっきり明かしてしまってもいいとはいうものの、でも、",
            "いずれにしても、これは美談というわけのものでもないのですから、やっぱりどうも、あれの氏素姓をこれ以上くわしく説明するのは、私にはつらくていけません。まあ、ぼんやり、圭吾とだけ覚えていて下さい。私の遠縁の男なんです。嫁をもらったばかりの若い百姓です。",
            "そいつに召集令状が来て、まるでもう汽車に乗った事もないような田舎者《いなかもの》なのですから、私が青森の部隊の営門まで送りとどけてやったのですが、それが、入隊してないというのです。",
            "いったん、営門にはいって、それから、すぐにまたひょいと逃げ出したのでしょうか。署長の願いというのは、とにかくあの圭吾は逃げ出したって他に行くところも無い。この吹雪の中を、幾日かかっても山越えして、家へ帰って来るに違いない。",
            "死にやしない。必ず家へ帰って来る。何せ、あれの嫁は、あれには不似合いなほどの美人なんだから、必ず家へ帰る。そこで、あなたに一つお願いがある。あなたは、あの夫婦の媒妁人《ばいしゃくにん》だった筈だし、",
            "また、かねてからあの夫婦は、あなたを非常に尊敬している。いや、ひやかしているのでは、ありません。まじめな話です。それで、今夜あなたは御苦労だが、あれの家へ行って、嫁によくよく説き聞かせ、決して悪いようにはせぬから、",
            "もし圭吾が家に帰って来たなら、こっそりあなたに知らせてくれるように、しっかりと言いつけてやって下さい。ここ二、三日中に、圭吾が見つかったならば、私は、圭吾に何の罰もかからないように取りはからう事が出来ます。何せこの大雪で、交通機関がめちゃ滅茶なのですから、",
            "私はあれが入隊におくれた理由を、そこは何とかうまく報告できるつもりです。脱走兵を出したとあっては、この町全体の不名誉です。この町の名誉のために、一つ御苦労でもたのむ、というような事でした。",
            "私は署長と一緒に吹雪の中を、あれの家へ出掛けました。かなり遠いのです。どうも人間の一生には、いろいろな事があると思いましたよ。私のような兵役免除の丁種《ていしゅ》が、帝国軍人の妻たる者の心掛けを説こうというのは、どう考えたって少し無理ですよ。",
            "あれの家の前で署長と無言で別れ、私はあれの家の土間にはいって行きました。あなたがこれまで東京に永くいらっしゃったと言っても、やはりこの土地の生れなのですから、このへんの農家の構造はご存じでしょう。",
            "土間へはいると、左手は馬小屋で、右手は居間と台所兼用の板敷の部屋で大きい炉《ろ》なんかあって、まあ、圭吾の家もだいたいあれ式なのです。嫁はまだ起きていて、炉傍《ろばた》で縫い物をしていました。",
            "「ほう、感心だのう。おれのうちの女房などは、晩げのめし食うとすぐに赤ん坊に添寝《そいね》して、それっきりぐうぐう大鼾《おおいびき》だ。夜なべもくそもありやしねえ。お前は、さすがに出征兵士の妻だけあって、感心だ、感心だ。」",
            "などと、まことに下手《へた》なほめ方をして外套《がいとう》を脱ぎ、もともと、もう礼儀も何も不要な身内の家なのですから、のこのこ上り込んで炉傍に大あぐらをかき、「ばばちゃは、寝たか。」とたずねます。",
            "圭吾には、盲目の母があるのです。「ばばちゃは、寝て夢でも見るのが、一ばんの楽しみだべ。」と嫁は、縫い物をつづけながら少し笑って答えます。「うん、まあそんなところかも知れない。お前も、なかなか苦労が多いの。しかし、いまの時代は、日本国中に仕合せな人は、ひとりもねえのだからな、つらくても、しばらくの我慢だ。何か思いに余る心配事でも起った時には、おれのところへ相談に来ればいいし、のう。」",
            "「有難うごす。きょうはまた、どこからかのお帰りですか。おそいねす。」「おれか？ いや、どこの帰りでもねえ。まっすぐに、ここさ来たのだ。」",
            "どうも私は駈引《かけひ》きという事がきらいで、いや、駈引きしたいと思っても、めんどうくさくて、とても出来ないたちですので、ちょっと気まずくても、ありのままを言う事にしているのです。そのために、思わぬ難儀が振りかかって来た事もありますが、",
            "しかし、駈引きして成功しても永続きはしないような気がするのです。その時も、私は、下手な小細工《こざいく》をしたって仕様が無いと思って、「まっすぐに、ここさ来た」と本当の事を言ったのですが、嫁は別にそれを気にとめる様子も無く、あたらしい薪《まき》を二本、炉にくべて、また縫い物を続けます。",
            "へんな事をおたずねするようですが、あなたと私とは小学校の同級生ですから、同じとしの三十七、いやもう二、三週間すると昭和二十一年になって、三十八。ところでどうです、このとしになっても、やはり、色気はあるでしょう、いや、冗談でなく、私はいつか誰かに聞いてみたいと思っていた事なのです。",
            "まさか、私は、このとおり頭が禿《は》げて、子供が四人もあって、手の皮なんかもこんなに厚くなって、ひびだらけでささくれ立って、こんな手で女の柔い着物などにさわったら、手の皮がひっかかっていけないでしょう、",
            "このようなていたらくで、愛だの恋だのを囁《ささや》く勇気は流石《さすが》にありませんが、しかし、色気というのは案外なもので、ちょっと綺麗《きれい》な女とふたり切りで、よもやまの話などをしているうちに、何か妙な気がして来る事があるのです。",
            "あなたは、どうでしょう。いや、私は普通よりも少し色気が強いのかも知れません。実は、私はこんな薄汚い親爺《おやじ》になり下がっていながら、たいていの女と平気で話が出来ないたちなんです。まさか私は、その話相手の女に、惚《ほ》れるの惚れられるの、",
            "そんな馬鹿な事は考えませんが、どうも何だか心にこだわりが出て来るのです。窮屈なんです。どうしても、男同士で話合うように、さっぱりとはまいりません。自分の胸の中のどこかに、もやもやと濁っているものがあるような気がしていけません。",
            "あれは、やはり、私の色気のせいだと思うのですが、どんなものでしょうか。しかしまた、私にそんなこだわりを全然、感じさせない女のひとも、たまにはあるのです。八十歳の婆とか、五歳の娘とか、それは問題になりませんが、",
            "女盛りの年頃で、しかもなかなかの美人でありながら、ちっとも私に窮屈な思いをさせず、私もからりとした非常に楽な気持で対坐している事が出来る、そんな女のひとも、たまにはあるのです。あれはいったい、どういうものでしょう。",
            "私は、このごろはまた何が何やら、わからなくなってしまいましたが、以前はまあ、こんな具合いに考えていたのです。私に窮屈な思いをさせないというのは、つまり、私にみじんも色気を感じさせないという事なのだから、きっとその女のひとの精神が気高いのだろう、",
            "話をしてこだわりを感じさせる女には、まさか、好くの好かれるのというはっきりした気持などはないでしょうが、自身でも気のつかない、あてもないぼんやりしたお色気があって、それが話相手にからまって、へんに相手を窮屈にさせてしまうのではないだろうか、とまあ、そんなふうに考えていたのでした。",
            "要するに私は、話をして落ちつかない気持を起させる女は、みだら、とは言えないまでも、多少のお色気のある女として感服せず、そうして、平気で話合える女を、心の正しい人として尊敬していました。",
            "ところで、その圭吾の嫁は、ほかのひとにはどうかわかりませんが、私には、これまで一度も、全く少しのこだわりも感じさせない女だったのです。いまはもう、地主も小作人もあったものではありませんが、もともとこの嫁は、私の家の代々の小作人の娘で、小さい頃からちょっとこう思案深そうな顔つきをしていました。",
            "百姓には珍らしく、からだつきがほっそりして、色が白く、おとなになったら顔がちょっとしゃくれて来て、悪く言えば般若面《はんにゃめん》に似たところもありましたが、しかし、なかなかの美人という町の評判で、口数も少く、よく働き、それに何よりも、私に全然れいのこだわりを感じさせぬところが気にいって、私は親戚の圭吾にもらってやったのでした。",
            "どんなに親しい間柄とは言っても、私とその嫁とは他人なのだし、私だって、まだよぼよぼの老人というわけではなし、まして相手は若い美人で、しかも亭主が出征中に、夜おそくのこのこ訪ねて行って、そうして二人きりで炉傍で話をするというのは、普通ならば、あまりおだやかな事でも無いのでしょうが、",
            "しかし私は、あの嫁に対してだけは、ちっともうしろめたいものを感ぜず、そうしてそれは、その女の人格が高潔なせいであるとばかり解していたのですから、なに、一向に平気で、悠々《ゆうゆう》と話込みました。",
            "「実はの、きょうはお前に大事なお願いがあって来たのだ。」",
            "「はあ。」と言って、嫁は縫い物の手を休め、ぼんやり私の顔を見守ります。",
            "「いや、針仕事をしながらでいい、落ちついて聞いてくれ。これは、お国のため、というよりは、この町のため、いや、お前たち一家のために是非とも、聞きいれてくれろ。だいいちには、圭吾自身のため、またお前のため、またばばちゃのため、それから、お前たちの祖先、子孫のため、何としても、こんどのおれの願い一つだけは、聞きいれてくれねばいけねえ。」",
            "「なんだべ、ねす。」嫁は針仕事を続けながら、小声で言いました。別に心配そうな顔もしていません。",
            "「驚いてはいけねえ、とは言っても、いや、誰だって驚くに違いないが、実はな、さきほど警察の署長さんが、おれの家へおいでになって、」と私は、駈引きも小細工も何もせず、署長から言われた事をそのまま伝えて、",
            "「のう、圭吾も心得違いしたものだが、しかし、どんな人でも、いちどは魔がさすというか、魔がつくというか、妙な間違いを起したがるものだ。これは、ハシカのようなもので、人間の持って生れた心の毒を、いちどは外へ吹き出さなければならねえものらしい。だから、起した間違いは仕方のねえ事として、その間違いをそれ以上に大きな騒ぎにしないように努めるのが、",
            "お前やおれの、まごころというものでないか。署長さんも、決して悪いようにはしないと言っている。あれは、ひとをだましたりなどしない人だ。この町の名誉のため、ここ二、三日中に圭吾が見つかりさえすれば、何とかうまく全然おかみのお叱《しか》りのないように取りはからうと言っている。",
            "署長もおれも、黙っている。この町の誰にも、絶対に言わぬ。どうか、たのむ。圭吾は、きっとお前のところへ、帰って来る。帰って来たら、もう何も考える事は要《い》らない、すぐにおれのところへ知らせに来てくれ。それが、だいいちに圭吾のため、お前のため、ばばちゃのため、祖先、子孫のためだ。」",
            "嫁は、顔色もかえず、縫い物をつづけながら黙って聞いていましたが、その時、肩で深く息をついて、「なんぼう、馬鹿だかのう。」と言って、左手の甲で涙を拭きました。",
            "「お前も、つらいところだ。それは重々、察している。しかし、いま日本では、お前よりも何倍もつらい思いをしているひとが、かず限りなくあるのだから、お前も、ここは、こらえてくれろ。必ず必ず、圭吾が帰って来たら、おれのところに知らせてくれ。たのむ！ ",
            "おれは今までお前たちに、ものを頼んだ事はいちども無かったが、こんどだけは、これ、このとおり、おれは、手をついてお前にお願いする。」",
            "私は、お辞儀をしました。吹雪の音にまじって、馬小屋のほうから小さい咳《せき》ばらいが聞えました。私は顔を挙げて、",
            "「いま、お前は、咳をしたか。」",
            "「いいえ。」嫁は私の顔をけげんそうに見て、静かに答えます。",
            "「それでは、いまの咳は誰のだ。お前には、聞えなかったか。」",
            "「さあ、べつに、なんにも。」と言って、うすら笑いをしました。",
            "私は、その時、なぜだか、全身鳥肌立つほど、ぞっとしました。",
            "「来てるんでないか。おい、お前、だましてはだめだ。圭吾は、あの馬小屋にいるんでないか？」",
            "私のあわてて騒ぐ様子が、よっぽど滑稽《こっけい》なものだったと見えて、嫁は、膝の上の縫い物をわきにのけ、顔を膝に押しつけるようにして、うふふふと笑い咽《むせ》んでしまいました。しばらくして顔を挙げ、笑いをこらえているように、",
            "下唇を噛《か》んで、ぽっと湯上りくらいに赤らんでいる顔を仰向けて、乱れた髪を掻《か》きあげ、それから、急にまじめになって私のほうにまっすぐに向き直り、",
            "「安心してけせ。わたしも、馬鹿でごいせん。来たら来たと、かならずあなたのところさ、知らせに行きます。その時は、どうか、よろしくお願いします。」",
            "「おう、そうか、」と私は苦笑して、「さっきの咳ばらいは、おれの空耳であったべな。こうなると、どうも、男よりも女子《おなご》のほうが、しっかりしている。それでは、どうか、よろしくたのむよ。」",
            "「はあ、承知しました。」たのもしげに、首肯《うなず》きます。",
            "私は、ほっとして、それでは帰ろうかと腰を浮かしかけた途端に、馬小屋のほうで、「馬鹿！ 命をそまつにするな！」と、あきらかに署長の声です。続いて、おそろしく大きい物音が。",
            "名誉職は、そこまで語って、それから火鉢の火を火箸《ひばし》でいじくりながら、しばらく黙っていた。「で？どうしたのです。」と私は、さいそくした。「いたのですか？」",
            "「いるも、いないも、」と言って、彼は火箸をぐさと灰に深く突き刺し、「二日も前から来ていたんですよ。ひどいじゃありませんか。二日も前に帰って来て、そうして、嫁と相談して、馬小屋の屋根裏の、この辺ではマギと言っていますが、まあ乾草や何かを入れて置くところですな、そこへ隠れていたのです。",
            "もちろん、嫁の入智慧《いれぢえ》です。母は盲目だし、いい加減にだまして、そうしてこっそり馬小屋のマギに圭吾をかくし、三度々々の食事をそこへ運んでいたのだそうですよ。あとで、圭吾がそう言っていました。なに、あの嫁なんか一言も何も言いません。",
            "いまもって、知らん振りです。あの晩に、私が行って嫁にあれほど腹の底を打ち割った話をして、そうして、男一匹、手をついてお願いしたのにまあ、あの落ちつき払った顔。かえって馬小屋のマギで聞いていた圭吾のほうで、申しわけ無くなって、あなた、馬小屋の梁《はり》に縄をかけ、首をくくって死のうとしたのです。",
            "署長は私と別れてからも商売柄、その辺をうろついて見張っていたのでしょう、馬小屋でたしかに人の気配がするので、土間からそっと覗《のぞ》いてみると、圭吾がぶらりです。そこでもって、馬鹿！ 命をそまつにするな！ と叫び、ひきずりおろしたところへ、私たちが駈けつけたというわけでしたが、",
            "その、署長の、馬鹿！ という声と共に私たちは立ち上り、思わず顔を見合せ、その時の、嫁のまるでもう余念なさそうに首をかしげて馬小屋の物音に耳を澄ました恰好《かっこう》は、いやもう、ほとんど神《しん》の如《ごと》くでした。おそろしいものです。",
            "そうして、私たちは馬小屋へ駈けつけ、圭吾は署長にとらえられて、もう嫁のまっかな嘘が眼前にばれているのに、嫁は私のうしろから圭吾のほうを覗いて見て、",
            "『いつ、もどったのだべ。』と小声で言い、私は、あとで圭吾から二日前に既に帰っていたという事を聞かなかったら、この嫁が圭吾の帰宅をその時までまったく知らなかったのだと永遠に信じていたでしょう、きっと、そうです。",
            "嫁は、もうそれっきり何も言わず、時々うすら笑いさえ顔に浮べ、何を考えているのやら、何と思っているのやら、まるでもうわかりません。色気を感じさせないところが偉いと私は尊敬をしていたのですが、やっぱり、ちょっと男に色気を起させるくらいの女のほうが、善良で正直なのかも知れません。何が何やら、もう私は女の言う事は、てんで信用しない事にしました。",
            "圭吾は、すぐに署長の証明書を持って、青森に出かけ、何事も無く勤務して終戦になってすぐ帰宅し、いまはまた夫婦仲良さそうに暮していますが、私は、あの嫁には呆《あき》れてしまいましたから、めったに圭吾の家へはまいりません。よくまあ、しかし、あんなに洒唖々々《しゃあしゃあ》と落ちついて嘘をつけたものです。女が、あんなに平気で嘘をつく間は、日本はだめだと思いますが、どうでしょうか。」",
            "「それは、女は、日本ばかりでなく、世界中どこでも同じ事でしょう。しかし、」と私は、頗《すこぶ》る軽薄な感想を口走った。「そのお嫁さんはあなたに惚《ほ》れてやしませんか？」",
            "名誉職は笑わずに首をかしげた。それから、まじめにこう答えた。",
            "「そんな事はありません。」とはっきり否定し、そうして、いよいよまじめに（私は過去の十五年間の東京生活で、こんな正直な響きを持った言葉を聞いた事がなかった）小さい溜息《ためいき》さえもらして、「しかし、うちの女房とあの嫁とは、仲が悪かったです。」",
            "私は微笑した。",
            "最後のページです"
        ]
        
        const audioFiles = [
            "uso/uso1.mp3",
            "uso/uso2.mp3",
            "uso/uso3.mp3",
            "uso/uso4.mp3",
            "uso/uso5.mp3",
            "uso/uso6.mp3",
            "uso/uso7.mp3",
            "uso/uso8.mp3",
            "uso/uso9.mp3",
            "uso/uso10.mp3",
            "uso/uso11.mp3",
            "uso/uso12.mp3",
            "uso/uso13.mp3",
            "uso/uso14.mp3",
            "uso/uso15.mp3",
            "uso/uso16.mp3",
            "uso/uso17.mp3",
            "uso/uso18.mp3",
            "uso/uso19.mp3",
            "uso/uso20.mp3",
            "uso/uso21.mp3",
            "uso/uso22.mp3",
            "uso/uso23.mp3",
            "uso/uso24.mp3",
            "uso/uso25.mp3",
            "uso/uso26.mp3",
            "uso/uso27.mp3",
            "uso/uso28.mp3",
            "uso/uso29.mp3",
            "uso/uso30.mp3",
            "uso/uso31.mp3",
            "uso/uso32.mp3",
            "uso/uso33.mp3",
            "uso/uso34.mp3",
            "uso/uso35.mp3",
            "uso/uso36.mp3",
            "uso/uso37.mp3",
            "uso/uso38.mp3",
            "uso/uso39.mp3",
            "uso/uso40.mp3",
            "uso/uso41.mp3",
            "uso/uso42.mp3",
            "uso/uso43.mp3",
            "uso/uso44.mp3",
            "uso/uso45.mp3",
            "uso/uso46.mp3",
            "uso/uso47.mp3",
            "uso/uso48.mp3",
            "uso/uso49.mp3",
            "uso/uso50.mp3",
            "uso/uso51.mp3",
            "uso/uso52.mp3",
            "uso/uso53.mp3",
            "uso/uso54.mp3",
            "uso/uso55.mp3",
            "uso/uso56.mp3",
            "uso/uso57.mp3",
            "uso/uso58.mp3",
            "uso/uso59.mp3",
            "uso/uso60.mp3",
            "uso/uso61.mp3",
            "uso/uso62.mp3",
            "uso/uso63.mp3",
            "uso/uso64.mp3",
            "uso/uso65.mp3",
            "uso/uso66.mp3",
            "uso/uso67.mp3",
            "uso/uso68.mp3",
            "uso/uso69.mp3",
            "uso/uso70.mp3",
            "uso/uso71.mp3",
            "uso/uso72.mp3",
            "uso/uso73.mp3",
            "uso/uso74.mp3",
            "uso/uso75.mp3",
            "uso/uso76.mp3",
            "uso/uso77.mp3",
            "uso/uso78.mp3",
            "uso/uso79.mp3",
            "uso/uso80.mp3",
            "uso/uso81.mp3",
            "uso/uso82.mp3",
            "uso/uso83.mp3",
            "uso/uso84.mp3",
            "uso/uso85.mp3",
            "uso/uso86.mp3",
            "uso/uso87.mp3",
            "uso/uso88.mp3",
            "last.mp3"
        ];
</script>

    


<?php
require_once __DIR__ . '/footer.php'
?>