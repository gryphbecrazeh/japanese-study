<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $n5_kanji = [
            [
                'character' => '日',
                'onyomi' => [
                    'ニチ',
                    'ジツ'
                ],
                'kunyomi' => [
                    'ひ',
                    '-び',
                    '-か'
                ],
                'meanings' => [
                    'day',
                    'sun',
                    'Japan',
                    'counter for days'
                ]
            ],
            [
                'character' => '一',
                'onyomi' => [
                    'イチ'
                ],
                'kunyomi' => [
                    'ひと(つ)'
                ],
                'meanings' => [
                    'one'
                ]
            ],
            [
                'character' => '国',
                'onyomi' => [
                    'コク'
                ],
                'kunyomi' => [
                    'くに'
                ],
                'meanings' => [
                    'country'
                ]
            ],
            [
                'character' => '人',
                'onyomi' => [
                    'ジン',
                    'ニン'
                ],
                'kunyomi' => [
                    'ひと'
                ],
                'meanings' => [
                    'person'
                ]
            ],
            [
                'character' => '年',
                'onyomi' => [
                    'ネン'
                ],
                'kunyomi' => [
                    'とし'
                ],
                'meanings' => [
                    'year',
                    'counter for years'
                ]
            ],
            [
                'character' => '大',
                'onyomi' => [
                    'ダイ',
                    'タイ'
                ],
                'kunyomi' => [
                    'おお(きい)'
                ],
                'meanings' => [
                    'large',
                    'big'
                ]
            ],
            [
                'character' => '十',
                'onyomi' => [
                    'ジュウ'
                ],
                'kunyomi' => [
                    'とお',
                    'と'
                ],
                'meanings' => [
                    'ten',
                    '10'
                ]
            ],
            [
                'character' => '二',
                'onyomi' => [
                    'ニ',
                    'ジ'
                ],
                'kunyomi' => [
                    'ふた(つ)',
                    'ふたたび'
                ],
                'meanings' => [
                    'two',
                    '2'
                ]
            ],
            [
                'character' => '本',
                'onyomi' => [
                    'ホン'
                ],
                'kunyomi' => [
                    'もと'
                ],
                'meanings' => [
                    'book',
                    'present',
                    'true',
                    'counter for long cylindrical things'
                ]
            ],
            [
                'character' => '中',
                'onyomi' => [
                    'チュウ'
                ],
                'kunyomi' => [
                    'なか',
                    'うち',
                    'あた(る)'
                ],
                'meanings' => [
                    'in',
                    'inside',
                    'middle',
                    'mean',
                    'center'
                ]
            ],
            [
                'character' => '長',
                'onyomi' => [
                    'チョウ'
                ],
                'kunyomi' => [
                    'なが(い)',
                    'おさ'
                ],
                'meanings' => [
                    'long',
                    'leader',
                    'superior',
                    'senior'
                ]
            ],
            [
                'character' => '出',
                'onyomi' => [
                    'シュツ',
                    'スイ'
                ],
                'kunyomi' => [
                    'で(る)',
                    'だ(す)',
                    'い(でる)'
                ],
                'meanings' => [
                    'exit',
                    'leave',
                    'go out'
                ]
            ],
            [
                'character' => '三',
                'onyomi' => [
                    'サン'
                ],
                'kunyomi' => [
                    'み(つ)'
                ],
                'meanings' => [
                    'three',
                    '3'
                ]
            ],
            [
                'character' => '時',
                'onyomi' => [
                    'ジ'
                ],
                'kunyomi' => [
                    'とき',
                    '-どき'
                ],
                'meanings' => [
                    'time',
                    'hour'
                ]
            ],
            [
                'character' => '行',
                'onyomi' => [
                    'コウ',
                    'ギョウ',
                    'アン'
                ],
                'kunyomi' => [
                    'い(く)',
                    'ゆ(く)',
                    'おこな(う)'
                ],
                'meanings' => [
                    'going',
                    'journey',
                    'carry out',
                    'line',
                    'row'
                ]
            ],
            [
                'character' => '見',
                'onyomi' => [
                    'ケン'
                ],
                'kunyomi' => [
                    'み(る)',
                    'み(せる)'
                ],
                'meanings' => [
                    'see',
                    'hopes',
                    'chances',
                    'idea',
                    'opinion',
                    'look at',
                    'visible'
                ]
            ],
            [
                'character' => '月',
                'onyomi' => [
                    'ゲツ',
                    'ガツ'
                ],
                'kunyomi' => [
                    'つき'
                ],
                'meanings' => [
                    'month',
                    'moon'
                ]
            ],
            [
                'character' => '分',
                'onyomi' => [
                    'ブン',
                    'フン',
                    'ブ'
                ],
                'kunyomi' => [
                    'わ(ける)'
                ],
                'meanings' => [
                    'part',
                    'minute of time',
                    'understand'
                ]
            ],
            [
                'character' => '後',
                'onyomi' => [
                    'ゴ',
                    'コウ'
                ],
                'kunyomi' => [
                    'のち',
                    'うし(ろ)',
                    'あと'
                ],
                'meanings' => [
                    'behind',
                    'back',
                    'later'
                ]
            ],
            [
                'character' => '前',
                'onyomi' => [
                    'ゼン'
                ],
                'kunyomi' => [
                    'まえ'
                ],
                'meanings' => [
                    'in front',
                    'before'
                ]
            ],
            [
                'character' => '生',
                'onyomi' => [
                    'セイ',
                    'ショウ'
                ],
                'kunyomi' => [
                    'い(きる)',
                    'う(む)',
                    'お(う)',
                    'は(える)',
                    'なま'
                ],
                'meanings' => [
                    'life',
                    'genuine',
                    'birth'
                ]
            ],
            [
                'character' => '五',
                'onyomi' => [
                    'ゴ'
                ],
                'kunyomi' => [
                    'いつ(つ)'
                ],
                'meanings' => [
                    'five',
                    '5'
                ]
            ],
            [
                'character' => '間',
                'onyomi' => [
                    'カン',
                    'ケン'
                ],
                'kunyomi' => [
                    'あいだ',
                    'ま',
                    'あい'
                ],
                'meanings' => [
                    'interval',
                    'space'
                ]
            ],
            [
                'character' => '上',
                'onyomi' => [
                    'ジョウ',
                    'ショウ',
                    'シャン'
                ],
                'kunyomi' => [
                    'うえ',
                    'うわ-',
                    'かみ',
                    'あ(げる)',
                    'のぼ(る)',
                    'たてまつ(る)'
                ],
                'meanings' => [
                    'above',
                    'up'
                ]
            ],
            [
                'character' => '東',
                'onyomi' => [
                    'トウ'
                ],
                'kunyomi' => [
                    'ひがし'
                ],
                'meanings' => [
                    'east'
                ]
            ],
            [
                'character' => '四',
                'onyomi' => [
                    'シ'
                ],
                'kunyomi' => [
                    'よ(つ)',
                    'よん'
                ],
                'meanings' => [
                    'four',
                    '4'
                ]
            ],
            [
                'character' => '今',
                'onyomi' => [
                    'コン',
                    'キン'
                ],
                'kunyomi' => [
                    'いま'
                ],
                'meanings' => [
                    'now; the present'
                ]
            ],
            [
                'character' => '金',
                'onyomi' => [
                    'キン',
                    'コン',
                    'ゴン'
                ],
                'kunyomi' => [
                    'かね',
                    'かな-',
                    '-がね'
                ],
                'meanings' => [
                    'gold'
                ]
            ],
            [
                'character' => '九',
                'onyomi' => [
                    'キュウ',
                    'ク'
                ],
                'kunyomi' => [
                    'ここの(つ)'
                ],
                'meanings' => [
                    'nine',
                    '9'
                ]
            ],
            [
                'character' => '入',
                'onyomi' => [
                    'ニュウ'
                ],
                'kunyomi' => [
                    'い(る)',
                    'はい(る)'
                ],
                'meanings' => [
                    'enter',
                    'insert'
                ]
            ],
            [
                'character' => '学',
                'onyomi' => [
                    'ガク'
                ],
                'kunyomi' => [
                    'まな(ぶ)'
                ],
                'meanings' => [
                    'study',
                    'learning',
                    'science'
                ]
            ],
            [
                'character' => '高',
                'onyomi' => [
                    'コウ'
                ],
                'kunyomi' => [
                    'たか(い)'
                ],
                'meanings' => [
                    'tall',
                    'high',
                    'expensive'
                ]
            ],
            [
                'character' => '円',
                'onyomi' => [
                    'エン'
                ],
                'kunyomi' => [
                    'まる(い)'
                ],
                'meanings' => [
                    'circle',
                    'yen',
                    'round'
                ]
            ],
            [
                'character' => '子',
                'onyomi' => [
                    'シ',
                    'ス',
                    'ツ'
                ],
                'kunyomi' => [
                    'こ',
                    'ね'
                ],
                'meanings' => [
                    'child'
                ]
            ],
            [
                'character' => '外',
                'onyomi' => [
                    'ガイ',
                    'ゲ'
                ],
                'kunyomi' => [
                    'そと',
                    'ほか',
                    'はず(す)',
                    'と-'
                ],
                'meanings' => [
                    'outside'
                ]
            ],
            [
                'character' => '八',
                'onyomi' => [
                    'ハチ'
                ],
                'kunyomi' => [
                    'や(つ)',
                    'よう'
                ],
                'meanings' => [
                    'eight',
                    '8'
                ]
            ],
            [
                'character' => '六',
                'onyomi' => [
                    'ロク'
                ],
                'kunyomi' => [
                    'む(つ)',
                    'むい'
                ],
                'meanings' => [
                    'six',
                    '6'
                ]
            ],
            [
                'character' => '下',
                'onyomi' => [
                    'カ',
                    'ゲ'
                ],
                'kunyomi' => [
                    'した',
                    'しも',
                    'もと',
                    'さ(げる)',
                    'くだ(る)',
                    'お(ろす)'
                ],
                'meanings' => [
                    'below',
                    'down',
                    'descend',
                    'give',
                    'low',
                    'inferior'
                ]
            ],
            [
                'character' => '来',
                'onyomi' => [
                    'ライ',
                    'タイ'
                ],
                'kunyomi' => [
                    'く.る',
                    'きた.る',
                    'き',
                    'こ'
                ],
                'meanings' => [
                    'come',
                    'due',
                    'next',
                    'cause',
                    'become'
                ]
            ],
            [
                'character' => '気',
                'onyomi' => [
                    'キ',
                    'ケ'
                ],
                'kunyomi' => [
                    'いき'
                ],
                'meanings' => [
                    'spirit',
                    'mind',
                    'air',
                    'atmosphere',
                    'mood'
                ]
            ],
            [
                'character' => '小',
                'onyomi' => [
                    'ショウ'
                ],
                'kunyomi' => [
                    'ちい(さい)',
                    'こ-',
                    'お-',
                    'さ-'
                ],
                'meanings' => [
                    'little',
                    'small'
                ]
            ],
            [
                'character' => '七',
                'onyomi' => [
                    'シチ'
                ],
                'kunyomi' => [
                    'なな(つ)',
                    'なの'
                ],
                'meanings' => [
                    'seven',
                    '7'
                ]
            ],
            [
                'character' => '山',
                'onyomi' => [
                    'サン',
                    'セン'
                ],
                'kunyomi' => [
                    'やま'
                ],
                'meanings' => [
                    'mountain'
                ]
            ],
            [
                'character' => '話',
                'onyomi' => [
                    'ワ'
                ],
                'kunyomi' => [
                    'はな(す)',
                    'はなし'
                ],
                'meanings' => [
                    'tale',
                    'talk'
                ]
            ],
            [
                'character' => '女',
                'onyomi' => [
                    'ジョ'
                ],
                'kunyomi' => [
                    'おんな',
                    'め'
                ],
                'meanings' => [
                    'woman',
                    'female'
                ]
            ],
            [
                'character' => '北',
                'onyomi' => [
                    'ホク'
                ],
                'kunyomi' => [
                    'きた'
                ],
                'meanings' => [
                    'north'
                ]
            ],
            [
                'character' => '午',
                'onyomi' => [
                    'ゴ'
                ],
                'kunyomi' => [
                    'うま'
                ],
                'meanings' => [
                    'noon',
                    'sign of the horse'
                ]
            ],
            [
                'character' => '百',
                'onyomi' => [
                    'ヒャク',
                    'ビャク'
                ],
                'kunyomi' => [
                    'もも'
                ],
                'meanings' => [
                    'hundred'
                ]
            ],
            [
                'character' => '書',
                'onyomi' => [
                    'ショ'
                ],
                'kunyomi' => [
                    'か(く)'
                ],
                'meanings' => [
                    'write'
                ]
            ],
            [
                'character' => '先',
                'onyomi' => [
                    'セン'
                ],
                'kunyomi' => [
                    'さき',
                    'ま(ず)'
                ],
                'meanings' => [
                    'before',
                    'ahead',
                    'previous',
                    'future',
                    'precedence'
                ]
            ],
            [
                'character' => '名',
                'onyomi' => [
                    'メイ',
                    'ミョウ'
                ],
                'kunyomi' => [
                    'な'
                ],
                'meanings' => [
                    'name',
                    'noted',
                    'distinguished',
                    'reputation'
                ]
            ],
            [
                'character' => '川',
                'onyomi' => [
                    'セン'
                ],
                'kunyomi' => [
                    'かわ'
                ],
                'meanings' => [
                    'river',
                    'stream'
                ]
            ],
            [
                'character' => '千',
                'onyomi' => [
                    'セン'
                ],
                'kunyomi' => [
                    'ち'
                ],
                'meanings' => [
                    'thousand'
                ]
            ],
            [
                'character' => '水',
                'onyomi' => [
                    'スイ'
                ],
                'kunyomi' => [
                    'みず'
                ],
                'meanings' => [
                    'water'
                ]
            ],
            [
                'character' => '半',
                'onyomi' => [
                    'ハン'
                ],
                'kunyomi' => [
                    'なか(ば)'
                ],
                'meanings' => [
                    'half',
                    'middle',
                    'odd number',
                    'semi-'
                ]
            ],
            [
                'character' => '男',
                'onyomi' => [
                    'ダン',
                    'ナン'
                ],
                'kunyomi' => [
                    'おとこ',
                    'お'
                ],
                'meanings' => [
                    'male; man'
                ]
            ],
            [
                'character' => '西',
                'onyomi' => [
                    'セイ',
                    'サイ'
                ],
                'kunyomi' => [
                    'にし'
                ],
                'meanings' => [
                    'west'
                ]
            ],
            [
                'character' => '電',
                'onyomi' => [
                    'デン'
                ],
                'kunyomi' => [
                    ''
                ],
                'meanings' => [
                    'electricity; electric powered'
                ]
            ],
            [
                'character' => '校',
                'onyomi' => [
                    'コウ'
                ],
                'kunyomi' => [
                    ''
                ],
                'meanings' => [
                    'school',
                    'exam'
                ]
            ],
            [
                'character' => '語',
                'onyomi' => [
                    'ゴ'
                ],
                'kunyomi' => [
                    'かた(る)'
                ],
                'meanings' => [
                    'word',
                    'speech',
                    'language'
                ]
            ],
            [
                'character' => '土',
                'onyomi' => [
                    'ド',
                    'ト'
                ],
                'kunyomi' => [
                    'つち'
                ],
                'meanings' => [
                    'soil',
                    'earth',
                    'ground'
                ]
            ],
            [
                'character' => '木',
                'onyomi' => [
                    'ボク',
                    'モク'
                ],
                'kunyomi' => [
                    'き',
                    'こ-'
                ],
                'meanings' => [
                    'tree',
                    'wood'
                ]
            ],
            [
                'character' => '聞',
                'onyomi' => [
                    'ブン',
                    'モン'
                ],
                'kunyomi' => [
                    'き(く)'
                ],
                'meanings' => [
                    'to hear; to listen; to ask'
                ]
            ],
            [
                'character' => '食',
                'onyomi' => [
                    'ショク',
                    'ジキ'
                ],
                'kunyomi' => [
                    'く(う)',
                    'た(べる)',
                    'は(む)'
                ],
                'meanings' => [
                    'eat',
                    'food'
                ]
            ],
            [
                'character' => '車',
                'onyomi' => [
                    'シャ'
                ],
                'kunyomi' => [
                    'くるま'
                ],
                'meanings' => [
                    'car',
                    'wheel'
                ]
            ],
            [
                'character' => '何',
                'onyomi' => [
                    'カ'
                ],
                'kunyomi' => [
                    'なに',
                    'なん'
                ],
                'meanings' => [
                    'what'
                ]
            ],
            [
                'character' => '南',
                'onyomi' => [
                    'ナン',
                    'ナ'
                ],
                'kunyomi' => [
                    'みなみ'
                ],
                'meanings' => [
                    'south'
                ]
            ],
            [
                'character' => '万',
                'onyomi' => [
                    'マン',
                    'バン'
                ],
                'kunyomi' => [
                    ''
                ],
                'meanings' => [
                    'ten thousand',
                    '10',
                    '000'
                ]
            ],
            [
                'character' => '毎',
                'onyomi' => [
                    'マイ'
                ],
                'kunyomi' => [
                    'ごと(に)'
                ],
                'meanings' => [
                    'every'
                ]
            ],
            [
                'character' => '白',
                'onyomi' => [
                    'ハク',
                    'ビャク'
                ],
                'kunyomi' => [
                    'しろ(い)'
                ],
                'meanings' => [
                    'white'
                ]
            ],
            [
                'character' => '天',
                'onyomi' => [
                    'テン'
                ],
                'kunyomi' => [
                    'あまつ'
                ],
                'meanings' => [
                    'heavens',
                    'sky',
                    'imperial'
                ]
            ],
            [
                'character' => '母',
                'onyomi' => [
                    'ボ'
                ],
                'kunyomi' => [
                    'はは',
                    'かあ'
                ],
                'meanings' => [
                    'mother'
                ]
            ],
            [
                'character' => '火',
                'onyomi' => [
                    'カ'
                ],
                'kunyomi' => [
                    'ひ',
                    '-び',
                    'ほ-'
                ],
                'meanings' => [
                    'fire'
                ]
            ],
            [
                'character' => '右',
                'onyomi' => [
                    'ウ',
                    'ユウ'
                ],
                'kunyomi' => [
                    'みぎ'
                ],
                'meanings' => [
                    'right'
                ]
            ],
            [
                'character' => '読',
                'onyomi' => [
                    'ドク',
                    'トク',
                    'トウ'
                ],
                'kunyomi' => [
                    'よ(む)'
                ],
                'meanings' => [
                    'to read'
                ]
            ],
            [
                'character' => '友',
                'onyomi' => [
                    'ユウ'
                ],
                'kunyomi' => [
                    'とも'
                ],
                'meanings' => [
                    'friend'
                ]
            ],
            [
                'character' => '左',
                'onyomi' => [
                    'サ',
                    'シャ'
                ],
                'kunyomi' => [
                    'ひだり'
                ],
                'meanings' => [
                    'left'
                ]
            ],
            [
                'character' => '休',
                'onyomi' => [
                    'キュウ'
                ],
                'kunyomi' => [
                    'やす(む)'
                ],
                'meanings' => [
                    'rest',
                    'day off',
                    'retire',
                    'sleep'
                ]
            ],
            [
                'character' => '父',
                'onyomi' => [
                    'フ'
                ],
                'kunyomi' => [
                    'ちち',
                    'とう'
                ],
                'meanings' => [
                    'father'
                ]
            ],
            [
                'character' => '雨',
                'onyomi' => [
                    'ウ'
                ],
                'kunyomi' => [
                    'あめ',
                    'あま'
                ],
                'meanings' => [
                    'rain'
                ]
            ]
        ];
        $n4_kanji = [
            [
                "character" => "会",
                "onyomi" => [
                    "カイ"
                ],
                "kunyomi" => [
                    "あ(う)"
                ],
                "meanings" => [
                    "meeting; meet"
                ]
            ],
            [
                "character" => "同",
                "onyomi" => [
                    "ドウ"
                ],
                "kunyomi" => [
                    "おな(じ)"
                ],
                "meanings" => [
                    "same",
                    "agree",
                    "equal"
                ]
            ],
            [
                "character" => "事",
                "onyomi" => [
                    "ジ"
                ],
                "kunyomi" => [
                    "こと"
                ],
                "meanings" => [
                    "matter",
                    "thing",
                    "fact",
                    "business",
                    "reason",
                    "possibly"
                ]
            ],
            [
                "character" => "自",
                "onyomi" => [
                    "ジ",
                    "シ"
                ],
                "kunyomi" => [
                    "みずか(ら)"
                ],
                "meanings" => [
                    "oneself"
                ]
            ],
            [
                "character" => "社",
                "onyomi" => [
                    "シャ"
                ],
                "kunyomi" => [
                    "やしろ"
                ],
                "meanings" => [
                    "company",
                    "firm",
                    "office",
                    "association",
                    "shrine"
                ]
            ],
            [
                "character" => "発",
                "onyomi" => [
                    "ハツ",
                    "ホツ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "departure",
                    "discharge",
                    "emit",
                    "start from"
                ]
            ],
            [
                "character" => "者",
                "onyomi" => [
                    "シャ"
                ],
                "kunyomi" => [
                    "もの"
                ],
                "meanings" => [
                    "someone",
                    "person"
                ]
            ],
            [
                "character" => "地",
                "onyomi" => [
                    "チ",
                    "ジ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "ground",
                    "earth"
                ]
            ],
            [
                "character" => "業",
                "onyomi" => [
                    "ギョウ"
                ],
                "kunyomi" => [
                    "わざ"
                ],
                "meanings" => [
                    "business",
                    "vocation",
                    "arts",
                    "performance"
                ]
            ],
            [
                "character" => "方",
                "onyomi" => [
                    "ホウ"
                ],
                "kunyomi" => [
                    "かた"
                ],
                "meanings" => [
                    "direction",
                    "person",
                    "alternative"
                ]
            ],
            [
                "character" => "新",
                "onyomi" => [
                    "シン"
                ],
                "kunyomi" => [
                    "あたら(しい)",
                    "あら(た)"
                ],
                "meanings" => [
                    "new"
                ]
            ],
            [
                "character" => "場",
                "onyomi" => [
                    "ジョウ"
                ],
                "kunyomi" => [
                    "ば"
                ],
                "meanings" => [
                    "location",
                    "place"
                ]
            ],
            [
                "character" => "員",
                "onyomi" => [
                    "イン"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "employee",
                    "member",
                    "number",
                    "the one in charge"
                ]
            ],
            [
                "character" => "立",
                "onyomi" => [
                    "リツ"
                ],
                "kunyomi" => [
                    "た(つ)"
                ],
                "meanings" => [
                    "stand up",
                    "rise"
                ]
            ],
            [
                "character" => "開",
                "onyomi" => [
                    "カイ"
                ],
                "kunyomi" => [
                    "ひら(く)",
                    "あ(ける)"
                ],
                "meanings" => [
                    "open",
                    "unfold",
                    "unseal"
                ]
            ],
            [
                "character" => "手",
                "onyomi" => [
                    "シュ"
                ],
                "kunyomi" => [
                    "て"
                ],
                "meanings" => [
                    "hand"
                ]
            ],
            [
                "character" => "力",
                "onyomi" => [
                    "リョク",
                    "リキ"
                ],
                "kunyomi" => [
                    "ちから"
                ],
                "meanings" => [
                    "power",
                    "strength",
                    "strong",
                    "strain",
                    "bear up",
                    "exert"
                ]
            ],
            [
                "character" => "問",
                "onyomi" => [
                    "モン"
                ],
                "kunyomi" => [
                    "と(う)"
                ],
                "meanings" => [
                    "question",
                    "ask",
                    "problem"
                ]
            ],
            [
                "character" => "代",
                "onyomi" => [
                    "ダイ"
                ],
                "kunyomi" => [
                    "か(わり)"
                ],
                "meanings" => [
                    "substitute",
                    "change",
                    "convert",
                    "replace",
                    "period"
                ]
            ],
            [
                "character" => "明",
                "onyomi" => [
                    "メイ",
                    "ミョウ"
                ],
                "kunyomi" => [
                    "あか(るい)"
                ],
                "meanings" => [
                    "bright",
                    "light"
                ]
            ],
            [
                "character" => "動",
                "onyomi" => [
                    "ドウ"
                ],
                "kunyomi" => [
                    "うご(く)"
                ],
                "meanings" => [
                    "move",
                    "motion",
                    "change"
                ]
            ],
            [
                "character" => "京",
                "onyomi" => [
                    "キョウ",
                    "ケイ",
                    "キン"
                ],
                "kunyomi" => [
                    "みやこ"
                ],
                "meanings" => [
                    "capital"
                ]
            ],
            [
                "character" => "目",
                "onyomi" => [
                    "モク",
                    "ボク"
                ],
                "kunyomi" => [
                    "め"
                ],
                "meanings" => [
                    "eye",
                    "class",
                    "look",
                    "insight",
                    "experience"
                ]
            ],
            [
                "character" => "通",
                "onyomi" => [
                    "ツウ"
                ],
                "kunyomi" => [
                    "とお(る)",
                    "かよ(う)"
                ],
                "meanings" => [
                    "traffic",
                    "pass through",
                    "avenue",
                    "commute"
                ]
            ],
            [
                "character" => "言",
                "onyomi" => [
                    "ゲン",
                    "ゴン"
                ],
                "kunyomi" => [
                    "い（う）",
                    "こと"
                ],
                "meanings" => [
                    "say",
                    "word"
                ]
            ],
            [
                "character" => "理",
                "onyomi" => [
                    "リ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "logic",
                    "arrangement",
                    "reason",
                    "justice",
                    "truth"
                ]
            ],
            [
                "character" => "体",
                "onyomi" => [
                    "タイ"
                ],
                "kunyomi" => [
                    "からだ"
                ],
                "meanings" => [
                    "body",
                    "substance",
                    "object",
                    "reality"
                ]
            ],
            [
                "character" => "田",
                "onyomi" => [
                    "デン"
                ],
                "kunyomi" => [
                    "た"
                ],
                "meanings" => [
                    "rice field",
                    "rice paddy"
                ]
            ],
            [
                "character" => "主",
                "onyomi" => [
                    "シュ"
                ],
                "kunyomi" => [
                    "ぬし",
                    "おも"
                ],
                "meanings" => [
                    "lord",
                    "chief",
                    "master",
                    "main thing",
                    "principal"
                ]
            ],
            [
                "character" => "題",
                "onyomi" => [
                    "ダイ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "topic",
                    "subject"
                ]
            ],
            [
                "character" => "意",
                "onyomi" => [
                    "イ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "idea",
                    "mind",
                    "heart",
                    "taste",
                    "thought"
                ]
            ],
            [
                "character" => "不",
                "onyomi" => [
                    "フ",
                    "ブ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "negative",
                    "non-",
                    "bad"
                ]
            ],
            [
                "character" => "作",
                "onyomi" => [
                    "サク",
                    "サ"
                ],
                "kunyomi" => [
                    "つく(る)"
                ],
                "meanings" => [
                    "make",
                    "production",
                    "prepare",
                    "build"
                ]
            ],
            [
                "character" => "用",
                "onyomi" => [
                    "ヨウ"
                ],
                "kunyomi" => [
                    "もち(いる)"
                ],
                "meanings" => [
                    "utilize",
                    "business",
                    "service",
                    "use",
                    "employ"
                ]
            ],
            [
                "character" => "度",
                "onyomi" => [
                    "ド",
                    "タク"
                ],
                "kunyomi" => [
                    "たび",
                    "た(い)"
                ],
                "meanings" => [
                    "degrees",
                    "occurrence",
                    "time",
                    "counter for occurrences"
                ]
            ],
            [
                "character" => "強",
                "onyomi" => [
                    "キョウ",
                    "ゴウ"
                ],
                "kunyomi" => [
                    "つよ(い)"
                ],
                "meanings" => [
                    "strong"
                ]
            ],
            [
                "character" => "公",
                "onyomi" => [
                    "コウ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "public",
                    "prince",
                    "official",
                    "governmental"
                ]
            ],
            [
                "character" => "持",
                "onyomi" => [
                    "ジ"
                ],
                "kunyomi" => [
                    "も(つ)"
                ],
                "meanings" => [
                    "hold",
                    "have"
                ]
            ],
            [
                "character" => "野",
                "onyomi" => [
                    "ヤ"
                ],
                "kunyomi" => [
                    "の"
                ],
                "meanings" => [
                    "plains",
                    "field",
                    "rustic",
                    "civilian life"
                ]
            ],
            [
                "character" => "以",
                "onyomi" => [
                    "イ"
                ],
                "kunyomi" => [
                    "もっ(て)"
                ],
                "meanings" => [
                    "by means of",
                    "because",
                    "in view of",
                    "compared with"
                ]
            ],
            [
                "character" => "思",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    "おも(う)"
                ],
                "meanings" => [
                    "think"
                ]
            ],
            [
                "character" => "家",
                "onyomi" => [
                    "カ"
                ],
                "kunyomi" => [
                    "いえ",
                    "や",
                    "うち"
                ],
                "meanings" => [
                    "house",
                    "home",
                    "family",
                    "professional",
                    "expert"
                ]
            ],
            [
                "character" => "世",
                "onyomi" => [
                    "セイ",
                    "セ"
                ],
                "kunyomi" => [
                    "よ"
                ],
                "meanings" => [
                    "generation",
                    "world",
                    "society",
                    "public"
                ]
            ],
            [
                "character" => "多",
                "onyomi" => [
                    "タ"
                ],
                "kunyomi" => [
                    "おお(い)"
                ],
                "meanings" => [
                    "many",
                    "frequent",
                    "much"
                ]
            ],
            [
                "character" => "正",
                "onyomi" => [
                    "セイ",
                    "ショウ"
                ],
                "kunyomi" => [
                    "ただ(しい)",
                    "まさ(に)"
                ],
                "meanings" => [
                    "correct",
                    "justice",
                    "righteous"
                ]
            ],
            [
                "character" => "安",
                "onyomi" => [
                    "アン"
                ],
                "kunyomi" => [
                    "やす(い)"
                ],
                "meanings" => [
                    "safe",
                    "peaceful",
                    "cheap"
                ]
            ],
            [
                "character" => "院",
                "onyomi" => [
                    "イン"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "institution",
                    "temple",
                    "mansion",
                    "school"
                ]
            ],
            [
                "character" => "心",
                "onyomi" => [
                    "シン"
                ],
                "kunyomi" => [
                    "こころ"
                ],
                "meanings" => [
                    "heart",
                    "mind",
                    "spirit"
                ]
            ],
            [
                "character" => "界",
                "onyomi" => [
                    "カイ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "world",
                    "boundary"
                ]
            ],
            [
                "character" => "教",
                "onyomi" => [
                    "キョウ"
                ],
                "kunyomi" => [
                    "おし(える)",
                    "おそ(わる)"
                ],
                "meanings" => [
                    "teach",
                    "faith",
                    "doctrine"
                ]
            ],
            [
                "character" => "文",
                "onyomi" => [
                    "ブン",
                    "モン"
                ],
                "kunyomi" => [
                    "ふみ"
                ],
                "meanings" => [
                    "sentence",
                    "literature",
                    "style",
                    "art"
                ]
            ],
            [
                "character" => "元",
                "onyomi" => [
                    "ゲン",
                    "ガン"
                ],
                "kunyomi" => [
                    "もと"
                ],
                "meanings" => [
                    "beginning",
                    "former time",
                    "origin"
                ]
            ],
            [
                "character" => "重",
                "onyomi" => [
                    "ジュウ",
                    "チョウ"
                ],
                "kunyomi" => [
                    "おも(い)",
                    "かさ(ねる)"
                ],
                "meanings" => [
                    "heavy",
                    "important",
                    "esteem",
                    "respect"
                ]
            ],
            [
                "character" => "近",
                "onyomi" => [
                    "キン"
                ],
                "kunyomi" => [
                    "ちか(い)"
                ],
                "meanings" => [
                    "near",
                    "early",
                    "akin",
                    "tantamount"
                ]
            ],
            [
                "character" => "考",
                "onyomi" => [
                    "コウ"
                ],
                "kunyomi" => [
                    "かんが(える)"
                ],
                "meanings" => [
                    "consider",
                    "think over"
                ]
            ],
            [
                "character" => "画",
                "onyomi" => [
                    "ガ",
                    "カク"
                ],
                "kunyomi" => [
                    "かく(する)"
                ],
                "meanings" => [
                    "brush-stroke",
                    "picture"
                ]
            ],
            [
                "character" => "海",
                "onyomi" => [
                    "カイ"
                ],
                "kunyomi" => [
                    "うみ"
                ],
                "meanings" => [
                    "sea",
                    "ocean"
                ]
            ],
            [
                "character" => "売",
                "onyomi" => [
                    "バイ"
                ],
                "kunyomi" => [
                    "う(る)"
                ],
                "meanings" => [
                    "sell"
                ]
            ],
            [
                "character" => "知",
                "onyomi" => [
                    "チ"
                ],
                "kunyomi" => [
                    "し(る)"
                ],
                "meanings" => [
                    "know",
                    "wisdom"
                ]
            ],
            [
                "character" => "道",
                "onyomi" => [
                    "ドウ"
                ],
                "kunyomi" => [
                    "みち"
                ],
                "meanings" => [
                    "road-way",
                    "street",
                    "district",
                    "journey",
                    "course"
                ]
            ],
            [
                "character" => "集",
                "onyomi" => [
                    "シュウ"
                ],
                "kunyomi" => [
                    "あつ(める)"
                ],
                "meanings" => [
                    "gather",
                    "meet"
                ]
            ],
            [
                "character" => "別",
                "onyomi" => [
                    "ベツ"
                ],
                "kunyomi" => [
                    "わか(れる)",
                    "わ(ける)"
                ],
                "meanings" => [
                    "separate",
                    "branch off",
                    "diverge"
                ]
            ],
            [
                "character" => "物",
                "onyomi" => [
                    "ブツ",
                    "モツ"
                ],
                "kunyomi" => [
                    "もの"
                ],
                "meanings" => [
                    "thing",
                    "object",
                    "matter"
                ]
            ],
            [
                "character" => "使",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    "つか(う)"
                ],
                "meanings" => [
                    "use",
                    "order",
                    "messenger",
                    "ambassador"
                ]
            ],
            [
                "character" => "品",
                "onyomi" => [
                    "ヒン"
                ],
                "kunyomi" => [
                    "しな"
                ],
                "meanings" => [
                    "goods",
                    "refinement",
                    "dignity",
                    "article"
                ]
            ],
            [
                "character" => "計",
                "onyomi" => [
                    "ケイ"
                ],
                "kunyomi" => [
                    "はか(る)"
                ],
                "meanings" => [
                    "plot",
                    "plan",
                    "scheme",
                    "measure"
                ]
            ],
            [
                "character" => "死",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    "し(ぬ)"
                ],
                "meanings" => [
                    "death",
                    "die"
                ]
            ],
            [
                "character" => "特",
                "onyomi" => [
                    "トク"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "special"
                ]
            ],
            [
                "character" => "私",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    "わたくし",
                    "わたし"
                ],
                "meanings" => [
                    "private",
                    "I",
                    "me"
                ]
            ],
            [
                "character" => "始",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    "はじ(める)"
                ],
                "meanings" => [
                    "commence",
                    "begin"
                ]
            ],
            [
                "character" => "朝",
                "onyomi" => [
                    "チョウ"
                ],
                "kunyomi" => [
                    "あさ"
                ],
                "meanings" => [
                    "morning"
                ]
            ],
            [
                "character" => "運",
                "onyomi" => [
                    "ウン"
                ],
                "kunyomi" => [
                    "はこ(ぶ)"
                ],
                "meanings" => [
                    "carry",
                    "luck",
                    "destiny",
                    "fate",
                    "transport"
                ]
            ],
            [
                "character" => "終",
                "onyomi" => [
                    "シュウ"
                ],
                "kunyomi" => [
                    "お(わる)"
                ],
                "meanings" => [
                    "end",
                    "finish"
                ]
            ],
            [
                "character" => "台",
                "onyomi" => [
                    "ダイ",
                    "タイ"
                ],
                "kunyomi" => [
                    "うてな"
                ],
                "meanings" => [
                    "pedestal",
                    "a stand",
                    "counter for machines and vehicles"
                ]
            ],
            [
                "character" => "広",
                "onyomi" => [
                    "コウ"
                ],
                "kunyomi" => [
                    "ひろ(い)"
                ],
                "meanings" => [
                    "wide",
                    "broad",
                    "spacious"
                ]
            ],
            [
                "character" => "住",
                "onyomi" => [
                    "ジュウ",
                    "チュウ"
                ],
                "kunyomi" => [
                    "す(む)"
                ],
                "meanings" => [
                    "dwell",
                    "reside",
                    "live",
                    "inhabit"
                ]
            ],
            [
                "character" => "無",
                "onyomi" => [
                    "ム",
                    "ブ"
                ],
                "kunyomi" => [
                    "な(い)"
                ],
                "meanings" => [
                    "nothingness",
                    "none",
                    "ain't",
                    "nothing",
                    "nil",
                    "not"
                ]
            ],
            [
                "character" => "真",
                "onyomi" => [
                    "シン"
                ],
                "kunyomi" => [
                    "ま",
                    "まこと"
                ],
                "meanings" => [
                    "true",
                    "reality",
                    "Buddhist sect"
                ]
            ],
            [
                "character" => "有",
                "onyomi" => [
                    "ユウ",
                    "ウ"
                ],
                "kunyomi" => [
                    "あ(る)"
                ],
                "meanings" => [
                    "possess",
                    "have",
                    "exist",
                    "happen"
                ]
            ],
            [
                "character" => "口",
                "onyomi" => [
                    "コウ"
                ],
                "kunyomi" => [
                    "くち"
                ],
                "meanings" => [
                    "mouth"
                ]
            ],
            [
                "character" => "少",
                "onyomi" => [
                    "ショウ"
                ],
                "kunyomi" => [
                    "すく(ない)",
                    "すこ(し)"
                ],
                "meanings" => [
                    "few",
                    "little"
                ]
            ],
            [
                "character" => "町",
                "onyomi" => [
                    "チョウ"
                ],
                "kunyomi" => [
                    "まち"
                ],
                "meanings" => [
                    "town",
                    "village",
                    "block",
                    "street"
                ]
            ],
            [
                "character" => "料",
                "onyomi" => [
                    "リョウ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "fee",
                    "materials"
                ]
            ],
            [
                "character" => "工",
                "onyomi" => [
                    "コウ",
                    "ク",
                    "グ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "craft",
                    "construction"
                ]
            ],
            [
                "character" => "建",
                "onyomi" => [
                    "ケン",
                    "コン"
                ],
                "kunyomi" => [
                    "た(てる)"
                ],
                "meanings" => [
                    "build"
                ]
            ],
            [
                "character" => "空",
                "onyomi" => [
                    "クウ"
                ],
                "kunyomi" => [
                    "そら",
                    "から",
                    "あ(く)",
                    "す(く)",
                    "むな(しい)"
                ],
                "meanings" => [
                    "empty",
                    "sky",
                    "void",
                    "vacant",
                    "vacuum"
                ]
            ],
            [
                "character" => "急",
                "onyomi" => [
                    "キュウ"
                ],
                "kunyomi" => [
                    "いそ(ぐ)"
                ],
                "meanings" => [
                    "hurry",
                    "emergency",
                    "sudden",
                    "steep"
                ]
            ],
            [
                "character" => "止",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    "と(まる)",
                    "とど(まる)",
                    "や(める)",
                    "よ(す)"
                ],
                "meanings" => [
                    "stop",
                    "halt"
                ]
            ],
            [
                "character" => "送",
                "onyomi" => [
                    "ソウ"
                ],
                "kunyomi" => [
                    "おく(る)"
                ],
                "meanings" => [
                    "escort",
                    "send"
                ]
            ],
            [
                "character" => "切",
                "onyomi" => [
                    "セツ",
                    "サイ"
                ],
                "kunyomi" => [
                    "き(る)"
                ],
                "meanings" => [
                    "cut",
                    "cutoff",
                    "be sharp"
                ]
            ],
            [
                "character" => "転",
                "onyomi" => [
                    "テン"
                ],
                "kunyomi" => [
                    "ころ(がる)"
                ],
                "meanings" => [
                    "revolve",
                    "turn around",
                    "change"
                ]
            ],
            [
                "character" => "研",
                "onyomi" => [
                    "ケン"
                ],
                "kunyomi" => [
                    "と(ぐ)"
                ],
                "meanings" => [
                    "polish",
                    "study of",
                    "sharpen"
                ]
            ],
            [
                "character" => "足",
                "onyomi" => [
                    "ソク"
                ],
                "kunyomi" => [
                    "あし",
                    "た(りる)"
                ],
                "meanings" => [
                    "leg",
                    "foot",
                    "be sufficient"
                ]
            ],
            [
                "character" => "究",
                "onyomi" => [
                    "キュウ"
                ],
                "kunyomi" => [],
                "meanings" => [
                    "research",
                    "study"
                ]
            ],
            [
                "character" => "楽",
                "onyomi" => [
                    "ガク",
                    "ラク"
                ],
                "kunyomi" => [
                    "たの(しい)"
                ],
                "meanings" => [
                    "music",
                    "comfort",
                    "ease"
                ]
            ],
            [
                "character" => "起",
                "onyomi" => [
                    "キ"
                ],
                "kunyomi" => [
                    "お(きる)",
                    "おこ(す)"
                ],
                "meanings" => [
                    "wake up",
                    "get up; rouse"
                ]
            ],
            [
                "character" => "着",
                "onyomi" => [
                    "チャク"
                ],
                "kunyomi" => [
                    "き(る)",
                    "つ(く)"
                ],
                "meanings" => [
                    "arrive",
                    "wear",
                    "counter for suits of clothing"
                ]
            ],
            [
                "character" => "店",
                "onyomi" => [
                    "テン"
                ],
                "kunyomi" => [
                    "みせ"
                ],
                "meanings" => [
                    "store",
                    "shop"
                ]
            ],
            [
                "character" => "病",
                "onyomi" => [
                    "ビョウ"
                ],
                "kunyomi" => [
                    "や(む)"
                ],
                "meanings" => [
                    "ill",
                    "sick"
                ]
            ],
            [
                "character" => "質",
                "onyomi" => [
                    "シツ",
                    "シチ"
                ],
                "kunyomi" => [
                    "たち",
                    "ただ(す)"
                ],
                "meanings" => [
                    "substance",
                    "quality",
                    "matter",
                    "temperament"
                ]
            ]
        ];
        $n3_kanji = [
            [
                "character" => "政",
                "onyomi" => [
                    "セイ"
                ],
                "kunyomi" => [
                    "まつりごと"
                ],
                "meanings" => [
                    "politics",
                    "government"
                ]
            ],
            [
                "character" => "議",
                "onyomi" => [
                    "ギ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "deliberation",
                    "consultation",
                    "debate"
                ]
            ],
            [
                "character" => "民",
                "onyomi" => [
                    "ミン"
                ],
                "kunyomi" => [
                    "たみ"
                ],
                "meanings" => [
                    "people",
                    "nation",
                    "subjects"
                ]
            ],
            [
                "character" => "連",
                "onyomi" => [
                    "レン"
                ],
                "kunyomi" => [
                    "つら(なる)",
                    "つ(れる)"
                ],
                "meanings" => [
                    "take along",
                    "lead",
                    "join",
                    "connect"
                ]
            ],
            [
                "character" => "対",
                "onyomi" => [
                    "タイ",
                    "ツイ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "opposite",
                    "even",
                    "equal",
                    "versus",
                    "anti-",
                    "compare"
                ]
            ],
            [
                "character" => "部",
                "onyomi" => [
                    "ブ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "section",
                    "bureau",
                    "dept",
                    "class",
                    "copy",
                    "part",
                    "portion"
                ]
            ],
            [
                "character" => "合",
                "onyomi" => [
                    "ゴウ",
                    "ガッ",
                    "カッ"
                ],
                "kunyomi" => [
                    "あ(う)",
                    "あい"
                ],
                "meanings" => [
                    "fit",
                    "suit",
                    "join",
                    "0.1"
                ]
            ],
            [
                "character" => "市",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    "いち"
                ],
                "meanings" => [
                    "market",
                    "city",
                    "town"
                ]
            ],
            [
                "character" => "内",
                "onyomi" => [
                    "ナイ"
                ],
                "kunyomi" => [
                    "うち"
                ],
                "meanings" => [
                    "inside",
                    "within",
                    "between",
                    "among",
                    "house",
                    "home"
                ]
            ],
            [
                "character" => "相",
                "onyomi" => [
                    "ソウ",
                    "ショウ"
                ],
                "kunyomi" => [
                    "あい"
                ],
                "meanings" => [
                    "inter-",
                    "mutual",
                    "together",
                    "each other",
                    "minister of state"
                ]
            ],
            [
                "character" => "定",
                "onyomi" => [
                    "テイ",
                    "ジョウ"
                ],
                "kunyomi" => [
                    "さだ(める)"
                ],
                "meanings" => [
                    "determine",
                    "fix",
                    "establish",
                    "decide"
                ]
            ],
            [
                "character" => "回",
                "onyomi" => [
                    "カイ"
                ],
                "kunyomi" => [
                    "まわ(す)"
                ],
                "meanings" => [
                    "-times",
                    "round",
                    "revolve",
                    "counter"
                ]
            ],
            [
                "character" => "選",
                "onyomi" => [
                    "セン"
                ],
                "kunyomi" => [
                    "えら(ぶ)"
                ],
                "meanings" => [
                    "elect",
                    "select",
                    "choose",
                    "prefer"
                ]
            ],
            [
                "character" => "米",
                "onyomi" => [
                    "ベイ",
                    "マイ",
                    "メエトル"
                ],
                "kunyomi" => [
                    "こめ"
                ],
                "meanings" => [
                    "rice",
                    "USA",
                    "meter"
                ]
            ],
            [
                "character" => "実",
                "onyomi" => [
                    "ジツ"
                ],
                "kunyomi" => [
                    "み",
                    "みの(る)",
                    "まこと"
                ],
                "meanings" => [
                    "reality",
                    "truth"
                ]
            ],
            [
                "character" => "関",
                "onyomi" => [
                    "カン"
                ],
                "kunyomi" => [
                    "せき",
                    "かか(わる)"
                ],
                "meanings" => [
                    "connection",
                    "barrier",
                    "gateway",
                    "involve",
                    "concerning"
                ]
            ],
            [
                "character" => "決",
                "onyomi" => [
                    "ケツ"
                ],
                "kunyomi" => [
                    "き(める)"
                ],
                "meanings" => [
                    "decide",
                    "fix",
                    "agree upon",
                    "appoint"
                ]
            ],
            [
                "character" => "全",
                "onyomi" => [
                    "ゼン"
                ],
                "kunyomi" => [
                    "まった(く)",
                    "すべ(て)"
                ],
                "meanings" => [
                    "whole",
                    "entire",
                    "all",
                    "complete",
                    "fulfill"
                ]
            ],
            [
                "character" => "表",
                "onyomi" => [
                    "ヒョウ"
                ],
                "kunyomi" => [
                    "おもて",
                    "あらわ(す)"
                ],
                "meanings" => [
                    "surface",
                    "table",
                    "chart",
                    "diagram"
                ]
            ],
            [
                "character" => "戦",
                "onyomi" => [
                    "セン"
                ],
                "kunyomi" => [
                    "いくさ",
                    "たたか(う)"
                ],
                "meanings" => [
                    "war",
                    "battle",
                    "match"
                ]
            ],
            [
                "character" => "経",
                "onyomi" => [
                    "ケイ"
                ],
                "kunyomi" => [
                    "へ(る)",
                    "た(つ)"
                ],
                "meanings" => [
                    "longitude",
                    "pass thru",
                    "expire",
                    "warp"
                ]
            ],
            [
                "character" => "最",
                "onyomi" => [
                    "サイ"
                ],
                "kunyomi" => [
                    "もっと(も)"
                ],
                "meanings" => [
                    "utmost",
                    "most",
                    "extreme"
                ]
            ],
            [
                "character" => "現",
                "onyomi" => [
                    "ゲン"
                ],
                "kunyomi" => [
                    "あらわ(れる)",
                    "うつ(つ)"
                ],
                "meanings" => [
                    "present",
                    "existing",
                    "actual"
                ]
            ],
            [
                "character" => "調",
                "onyomi" => [
                    "チョウ"
                ],
                "kunyomi" => [
                    "しら(べる)",
                    "ととの(う)"
                ],
                "meanings" => [
                    "tune",
                    "tone",
                    "meter",
                    "prepare",
                    "investigate"
                ]
            ],
            [
                "character" => "化",
                "onyomi" => [
                    "カ",
                    "ケ"
                ],
                "kunyomi" => [
                    "ば(ける)",
                    "ふ(ける)"
                ],
                "meanings" => [
                    "change",
                    "take the form of",
                    "influence",
                    "enchant",
                    "delude",
                    "-ization"
                ]
            ],
            [
                "character" => "当",
                "onyomi" => [
                    "トウ"
                ],
                "kunyomi" => [
                    "あ(たる)"
                ],
                "meanings" => [
                    "hit",
                    "right",
                    "appropriate"
                ]
            ],
            [
                "character" => "約",
                "onyomi" => [
                    "ヤク"
                ],
                "kunyomi" => [
                    "つづ(まる)"
                ],
                "meanings" => [
                    "promise",
                    "approximately",
                    "shrink"
                ]
            ],
            [
                "character" => "首",
                "onyomi" => [
                    "シュ"
                ],
                "kunyomi" => [
                    "くび"
                ],
                "meanings" => [
                    "neck"
                ]
            ],
            [
                "character" => "法",
                "onyomi" => [
                    "ホウ"
                ],
                "kunyomi" => [
                    "のり"
                ],
                "meanings" => [
                    "method",
                    "law",
                    "rule",
                    "principle",
                    "model",
                    "system"
                ]
            ],
            [
                "character" => "性",
                "onyomi" => [
                    "セイ",
                    "ショウ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "sex",
                    "gender",
                    "nature"
                ]
            ],
            [
                "character" => "的",
                "onyomi" => [
                    "テキ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "mark",
                    "target",
                    "object",
                    "adjective ending"
                ]
            ],
            [
                "character" => "要",
                "onyomi" => [
                    "ヨウ"
                ],
                "kunyomi" => [
                    "い(る)",
                    "かなめ"
                ],
                "meanings" => [
                    "need",
                    "main point",
                    "essence",
                    "pivot"
                ]
            ],
            [
                "character" => "制",
                "onyomi" => [
                    "セイ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "system",
                    "law",
                    "rule"
                ]
            ],
            [
                "character" => "治",
                "onyomi" => [
                    "ジ",
                    "チ"
                ],
                "kunyomi" => [
                    "おさ(める)",
                    "なお(る)"
                ],
                "meanings" => [
                    "reign",
                    "cure",
                    "heal"
                ]
            ],
            [
                "character" => "務",
                "onyomi" => [
                    "ム"
                ],
                "kunyomi" => [
                    "つと(める)"
                ],
                "meanings" => [
                    "task",
                    "duties"
                ]
            ],
            [
                "character" => "成",
                "onyomi" => [
                    "セイ",
                    "ジョウ"
                ],
                "kunyomi" => [
                    "な(る)"
                ],
                "meanings" => [
                    "turn into",
                    "become",
                    "get",
                    "grow",
                    "elapse"
                ]
            ],
            [
                "character" => "期",
                "onyomi" => [
                    "キ",
                    "ゴ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "period",
                    "time",
                    "date",
                    "term"
                ]
            ],
            [
                "character" => "取",
                "onyomi" => [
                    "シュ"
                ],
                "kunyomi" => [
                    "と(る)"
                ],
                "meanings" => [
                    "take",
                    "fetch"
                ]
            ],
            [
                "character" => "都",
                "onyomi" => [
                    "ト",
                    "ツ"
                ],
                "kunyomi" => [
                    "みやこ"
                ],
                "meanings" => [
                    "metropolis",
                    "capital"
                ]
            ],
            [
                "character" => "和",
                "onyomi" => [
                    "ワ",
                    "オ"
                ],
                "kunyomi" => [
                    "やわ(らぐ)",
                    "なご(む)"
                ],
                "meanings" => [
                    "harmony",
                    "Japanese style",
                    "peace"
                ]
            ],
            [
                "character" => "機",
                "onyomi" => [
                    "キ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "machine",
                    "airplane",
                    "opportunity"
                ]
            ],
            [
                "character" => "平",
                "onyomi" => [
                    "ヘイ",
                    "ビョウ"
                ],
                "kunyomi" => [
                    "たい(ら)",
                    "ひら"
                ],
                "meanings" => [
                    "even",
                    "flat",
                    "peace"
                ]
            ],
            [
                "character" => "加",
                "onyomi" => [
                    "カ"
                ],
                "kunyomi" => [
                    "くわ(える)"
                ],
                "meanings" => [
                    "add",
                    "addition",
                    "increase",
                    "join"
                ]
            ],
            [
                "character" => "受",
                "onyomi" => [
                    "ジュ"
                ],
                "kunyomi" => [
                    "う(ける)"
                ],
                "meanings" => [
                    "accept",
                    "undergo",
                    "answer (phone)",
                    "take"
                ]
            ],
            [
                "character" => "続",
                "onyomi" => [
                    "ゾク"
                ],
                "kunyomi" => [
                    "つづ(く)"
                ],
                "meanings" => [
                    "continue",
                    "series",
                    "sequel"
                ]
            ],
            [
                "character" => "進",
                "onyomi" => [
                    "シン"
                ],
                "kunyomi" => [
                    "すす(む)"
                ],
                "meanings" => [
                    "advance",
                    "proceed"
                ]
            ],
            [
                "character" => "数",
                "onyomi" => [
                    "スウ"
                ],
                "kunyomi" => [
                    "かず",
                    "かぞ(える)"
                ],
                "meanings" => [
                    "number",
                    "strength",
                    "fate",
                    "law",
                    "figures"
                ]
            ],
            [
                "character" => "記",
                "onyomi" => [
                    "キ"
                ],
                "kunyomi" => [
                    "しる(す)"
                ],
                "meanings" => [
                    "scribe",
                    "account",
                    "narrative"
                ]
            ],
            [
                "character" => "初",
                "onyomi" => [
                    "ショ"
                ],
                "kunyomi" => [
                    "はじ(め)",
                    "はつ"
                ],
                "meanings" => [
                    "first time",
                    "beginning"
                ]
            ],
            [
                "character" => "指",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    "ゆび",
                    "さ(す)"
                ],
                "meanings" => [
                    "finger",
                    "point to",
                    "indicate"
                ]
            ],
            [
                "character" => "権",
                "onyomi" => [
                    "ケン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "authority",
                    "power",
                    "rights"
                ]
            ],
            [
                "character" => "支",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    "ささ(える)"
                ],
                "meanings" => [
                    "branch",
                    "support",
                    "sustain"
                ]
            ],
            [
                "character" => "産",
                "onyomi" => [
                    "サン"
                ],
                "kunyomi" => [
                    "う(む)",
                    "む(す)"
                ],
                "meanings" => [
                    "products",
                    "bear",
                    "give birth"
                ]
            ],
            [
                "character" => "点",
                "onyomi" => [
                    "テン"
                ],
                "kunyomi" => [
                    "つ(ける)"
                ],
                "meanings" => [
                    "spot",
                    "point",
                    "mark"
                ]
            ],
            [
                "character" => "報",
                "onyomi" => [
                    "ホウ"
                ],
                "kunyomi" => [
                    "むく(いる)"
                ],
                "meanings" => [
                    "report",
                    "news",
                    "reward"
                ]
            ],
            [
                "character" => "済",
                "onyomi" => [
                    "サイ",
                    "セイ"
                ],
                "kunyomi" => [
                    "す(む)"
                ],
                "meanings" => [
                    "settle",
                    "relieve",
                    "finish"
                ]
            ],
            [
                "character" => "活",
                "onyomi" => [
                    "カツ"
                ],
                "kunyomi" => [
                    "い(きる)"
                ],
                "meanings" => [
                    "living"
                ]
            ],
            [
                "character" => "原",
                "onyomi" => [
                    "ゲン"
                ],
                "kunyomi" => [
                    "はら"
                ],
                "meanings" => [
                    "original",
                    "primitive",
                    "field"
                ]
            ],
            [
                "character" => "共",
                "onyomi" => [
                    "キョウ"
                ],
                "kunyomi" => [
                    "とも"
                ],
                "meanings" => [
                    "together",
                    "both",
                    "neither"
                ]
            ],
            [
                "character" => "得",
                "onyomi" => [
                    "トク"
                ],
                "kunyomi" => [
                    "え(る)"
                ],
                "meanings" => [
                    "gain",
                    "get",
                    "find",
                    "earn",
                    "acquire",
                    "can",
                    "may",
                    "able to",
                    "profit"
                ]
            ],
            [
                "character" => "解",
                "onyomi" => [
                    "カイ",
                    "ゲ"
                ],
                "kunyomi" => [
                    "と(く)",
                    "ほど(く)"
                ],
                "meanings" => [
                    "unravel",
                    "explanation"
                ]
            ],
            [
                "character" => "交",
                "onyomi" => [
                    "コウ"
                ],
                "kunyomi" => [
                    "まじ(わる)",
                    "ま(ぜる)",
                    "か(わす)"
                ],
                "meanings" => [
                    "mingle",
                    "mixing",
                    "association",
                    "coming & going"
                ]
            ],
            [
                "character" => "資",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "assets",
                    "resources",
                    "capital",
                    "funds",
                    "data",
                    "be conducive to"
                ]
            ],
            [
                "character" => "予",
                "onyomi" => [
                    "ヨ",
                    "シャ"
                ],
                "kunyomi" => [
                    "あらかじ(め)"
                ],
                "meanings" => [
                    "beforehand",
                    "previous",
                    "myself",
                    "I"
                ]
            ],
            [
                "character" => "向",
                "onyomi" => [
                    "コウ"
                ],
                "kunyomi" => [
                    "む(く)",
                    "むか(い)"
                ],
                "meanings" => [
                    "facing",
                    "beyond"
                ]
            ],
            [
                "character" => "際",
                "onyomi" => [
                    "サイ"
                ],
                "kunyomi" => [
                    "きわ"
                ],
                "meanings" => [
                    "occasion",
                    "time"
                ]
            ],
            [
                "character" => "勝",
                "onyomi" => [
                    "ショウ"
                ],
                "kunyomi" => [
                    "か(つ)",
                    "まさ(る)"
                ],
                "meanings" => [
                    "victory",
                    "win"
                ]
            ],
            [
                "character" => "面",
                "onyomi" => [
                    "メン"
                ],
                "kunyomi" => [
                    "おも",
                    "おもて",
                    "つら"
                ],
                "meanings" => [
                    "mask",
                    "face",
                    "features",
                    "surface"
                ]
            ],
            [
                "character" => "告",
                "onyomi" => [
                    "コク"
                ],
                "kunyomi" => [
                    "つ(げる)"
                ],
                "meanings" => [
                    "revelation",
                    "inform"
                ]
            ],
            [
                "character" => "反",
                "onyomi" => [
                    "ハン",
                    "ホン",
                    "タン",
                    "ホ"
                ],
                "kunyomi" => [
                    "そ(る)",
                    "かえ(す)"
                ],
                "meanings" => [
                    "anti-"
                ]
            ],
            [
                "character" => "判",
                "onyomi" => [
                    "ハン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "judgement",
                    "signature"
                ]
            ],
            [
                "character" => "認",
                "onyomi" => [
                    "ニン"
                ],
                "kunyomi" => [
                    "みと(める)",
                    "したた(める)"
                ],
                "meanings" => [
                    "acknowledge",
                    "witness",
                    "recognize"
                ]
            ],
            [
                "character" => "参",
                "onyomi" => [
                    "サン"
                ],
                "kunyomi" => [
                    "まい(る)"
                ],
                "meanings" => [
                    "going",
                    "coming",
                    "participate"
                ]
            ],
            [
                "character" => "利",
                "onyomi" => [
                    "リ"
                ],
                "kunyomi" => [
                    "き(く)"
                ],
                "meanings" => [
                    "profit",
                    "advantage",
                    "benefit"
                ]
            ],
            [
                "character" => "組",
                "onyomi" => [
                    "ソ"
                ],
                "kunyomi" => [
                    "く(む)",
                    "くみ"
                ],
                "meanings" => [
                    "association",
                    "assemble",
                    "unite"
                ]
            ],
            [
                "character" => "信",
                "onyomi" => [
                    "シン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "faith",
                    "truth",
                    "trust"
                ]
            ],
            [
                "character" => "在",
                "onyomi" => [
                    "ザイ"
                ],
                "kunyomi" => [
                    "あ(る)"
                ],
                "meanings" => [
                    "exist",
                    "outskirts"
                ]
            ],
            [
                "character" => "件",
                "onyomi" => [
                    "ケン"
                ],
                "kunyomi" => [
                    "くだん"
                ],
                "meanings" => [
                    "affair",
                    "case",
                    "matter"
                ]
            ],
            [
                "character" => "側",
                "onyomi" => [
                    "ソク"
                ],
                "kunyomi" => [
                    "がわ",
                    "そば"
                ],
                "meanings" => [
                    "side",
                    "lean",
                    "oppose"
                ]
            ],
            [
                "character" => "任",
                "onyomi" => [
                    "ニン"
                ],
                "kunyomi" => [
                    "まか(せる)"
                ],
                "meanings" => [
                    "responsibility",
                    "duty"
                ]
            ],
            [
                "character" => "引",
                "onyomi" => [
                    "イン"
                ],
                "kunyomi" => [
                    "ひ(く)"
                ],
                "meanings" => [
                    "pull",
                    "tug",
                    "jerk"
                ]
            ],
            [
                "character" => "求",
                "onyomi" => [
                    "キュウ"
                ],
                "kunyomi" => [
                    "もと(める)"
                ],
                "meanings" => [
                    "request",
                    "want",
                    "demand"
                ]
            ],
            [
                "character" => "所",
                "onyomi" => [
                    "ショ"
                ],
                "kunyomi" => [
                    "ところ"
                ],
                "meanings" => [
                    "place",
                    "extent"
                ]
            ],
            [
                "character" => "次",
                "onyomi" => [
                    "ジ",
                    "シ"
                ],
                "kunyomi" => [
                    "つ(ぐ)",
                    "つぎ"
                ],
                "meanings" => [
                    "next",
                    "order"
                ]
            ],
            [
                "character" => "昨",
                "onyomi" => [
                    "サク"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "yesterday",
                    "previous"
                ]
            ],
            [
                "character" => "論",
                "onyomi" => [
                    "ロン"
                ],
                "kunyomi" => [
                    "あげつら(う)"
                ],
                "meanings" => [
                    "argument",
                    "discourse"
                ]
            ],
            [
                "character" => "官",
                "onyomi" => [
                    "カン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "bureaucrat",
                    "the government",
                    "organ"
                ]
            ],
            [
                "character" => "増",
                "onyomi" => [
                    "ゾウ"
                ],
                "kunyomi" => [
                    "ま(す)",
                    "ふ(える)"
                ],
                "meanings" => [
                    "increase",
                    "add"
                ]
            ],
            [
                "character" => "係",
                "onyomi" => [
                    "ケイ"
                ],
                "kunyomi" => [
                    "かか(る)",
                    "かかり"
                ],
                "meanings" => [
                    "person in charge",
                    "connection"
                ]
            ],
            [
                "character" => "感",
                "onyomi" => [
                    "カン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "emotion",
                    "feeling",
                    "sensation"
                ]
            ],
            [
                "character" => "情",
                "onyomi" => [
                    "ジョウ",
                    "セイ"
                ],
                "kunyomi" => [
                    "なさ(け)"
                ],
                "meanings" => [
                    "feelings",
                    "emotion",
                    "passion"
                ]
            ],
            [
                "character" => "投",
                "onyomi" => [
                    "トウ"
                ],
                "kunyomi" => [
                    "な(げる)"
                ],
                "meanings" => [
                    "throw",
                    "discard"
                ]
            ],
            [
                "character" => "示",
                "onyomi" => [
                    "ジ",
                    "シ"
                ],
                "kunyomi" => [
                    "しめ(す)"
                ],
                "meanings" => [
                    "show",
                    "indicate",
                    "display"
                ]
            ],
            [
                "character" => "変",
                "onyomi" => [
                    "ヘン"
                ],
                "kunyomi" => [
                    "か(わる)"
                ],
                "meanings" => [
                    "unusual",
                    "change",
                    "strange"
                ]
            ],
            [
                "character" => "打",
                "onyomi" => [
                    "ダ"
                ],
                "kunyomi" => [
                    "う(つ)",
                    "ぶ(つ)"
                ],
                "meanings" => [
                    "strike",
                    "hit",
                    "knock"
                ]
            ],
            [
                "character" => "直",
                "onyomi" => [
                    "チョク",
                    "ジキ"
                ],
                "kunyomi" => [
                    "ただ(ちに)",
                    "す(ぐ)",
                    "なお(す)"
                ],
                "meanings" => [
                    "straightaway",
                    "honesty",
                    "frankness",
                    "fix",
                    "repair"
                ]
            ],
            [
                "character" => "両",
                "onyomi" => [
                    "リョウ"
                ],
                "kunyomi" => [
                    "ふたつ"
                ],
                "meanings" => [
                    "both"
                ]
            ],
            [
                "character" => "式",
                "onyomi" => [
                    "シキ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "style",
                    "ceremony"
                ]
            ],
            [
                "character" => "確",
                "onyomi" => [
                    "カク"
                ],
                "kunyomi" => [
                    "たし(か)"
                ],
                "meanings" => [
                    "assurance",
                    "firm",
                    "confirm"
                ]
            ],
            [
                "character" => "果",
                "onyomi" => [
                    "カ"
                ],
                "kunyomi" => [
                    "は(たす)"
                ],
                "meanings" => [
                    "fruit",
                    "reward",
                    "carry out",
                    "achieve",
                    "complete"
                ]
            ]
        ];
        $n2_kanji = [
            [
                "character" => "党",
                "onyomi" => [
                    "トウ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "party",
                    "faction",
                    "clique"
                ]
            ],
            [
                "character" => "協",
                "onyomi" => [
                    "キョウ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "co-",
                    "cooperation"
                ]
            ],
            [
                "character" => "総",
                "onyomi" => [
                    "ソウ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "general",
                    "whole",
                    "all"
                ]
            ],
            [
                "character" => "区",
                "onyomi" => [
                    "ク"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "ward",
                    "district"
                ]
            ],
            [
                "character" => "領",
                "onyomi" => [
                    "リョウ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "jurisdiction",
                    "dominion"
                ]
            ],
            [
                "character" => "県",
                "onyomi" => [
                    "ケン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "prefecture"
                ]
            ],
            [
                "character" => "設",
                "onyomi" => [
                    "セツ"
                ],
                "kunyomi" => [
                    "もう(ける)"
                ],
                "meanings" => [
                    "establishment",
                    "provision"
                ]
            ],
            [
                "character" => "保",
                "onyomi" => [
                    "ホ",
                    "ホウ"
                ],
                "kunyomi" => [
                    "たも(つ)"
                ],
                "meanings" => [
                    "protect",
                    "guarantee",
                    "keep"
                ]
            ],
            [
                "character" => "改",
                "onyomi" => [
                    "カイ"
                ],
                "kunyomi" => [
                    "あらた(める)"
                ],
                "meanings" => [
                    "reformation",
                    "change",
                    "modify"
                ]
            ],
            [
                "character" => "第",
                "onyomi" => [
                    "ダイ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "No.",
                    "number"
                ]
            ],
            [
                "character" => "結",
                "onyomi" => [
                    "ケツ"
                ],
                "kunyomi" => [
                    "むす(ぶ)",
                    "ゆ(う)"
                ],
                "meanings" => [
                    "tie",
                    "bind",
                    "contract"
                ]
            ],
            [
                "character" => "派",
                "onyomi" => [
                    "ハ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "faction",
                    "group",
                    "party"
                ]
            ],
            [
                "character" => "府",
                "onyomi" => [
                    "フ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "borough",
                    "urban prefecture",
                    "govt office"
                ]
            ],
            [
                "character" => "査",
                "onyomi" => [
                    "サ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "investigate"
                ]
            ],
            [
                "character" => "委",
                "onyomi" => [
                    "イ"
                ],
                "kunyomi" => [
                    "ゆだ(ねる)"
                ],
                "meanings" => [
                    "committee",
                    "entrust to"
                ]
            ],
            [
                "character" => "軍",
                "onyomi" => [
                    "グン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "army",
                    "force",
                    "troops"
                ]
            ],
            [
                "character" => "案",
                "onyomi" => [
                    "アン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "plan",
                    "suggestion",
                    "draft"
                ]
            ],
            [
                "character" => "策",
                "onyomi" => [
                    "サク"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "scheme",
                    "plan",
                    "policy"
                ]
            ],
            [
                "character" => "団",
                "onyomi" => [
                    "ダン",
                    "トン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "group",
                    "association"
                ]
            ],
            [
                "character" => "各",
                "onyomi" => [
                    "カク"
                ],
                "kunyomi" => [
                    "おのおの"
                ],
                "meanings" => [
                    "each; every; either"
                ]
            ],
            [
                "character" => "島",
                "onyomi" => [
                    "トウ"
                ],
                "kunyomi" => [
                    "しま"
                ],
                "meanings" => [
                    "island"
                ]
            ],
            [
                "character" => "革",
                "onyomi" => [
                    "カク"
                ],
                "kunyomi" => [
                    "かわ"
                ],
                "meanings" => [
                    "leather; skin; reform; become serious"
                ]
            ],
            [
                "character" => "村",
                "onyomi" => [
                    "ソン"
                ],
                "kunyomi" => [
                    "むら"
                ],
                "meanings" => [
                    "village; town"
                ]
            ],
            [
                "character" => "勢",
                "onyomi" => [
                    "セイ"
                ],
                "kunyomi" => [
                    "いきお(い)"
                ],
                "meanings" => [
                    "forces; energy; military strength"
                ]
            ],
            [
                "character" => "減",
                "onyomi" => [
                    "ゲン"
                ],
                "kunyomi" => [
                    "へ(る)"
                ],
                "meanings" => [
                    "dwindle; decrease; reduce"
                ]
            ],
            [
                "character" => "再",
                "onyomi" => [
                    "サイ",
                    "サ"
                ],
                "kunyomi" => [
                    "ふたた(び)"
                ],
                "meanings" => [
                    "again",
                    "twice",
                    "second time"
                ]
            ],
            [
                "character" => "税",
                "onyomi" => [
                    "ゼイ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "tax; duty"
                ]
            ],
            [
                "character" => "営",
                "onyomi" => [
                    "エイ"
                ],
                "kunyomi" => [
                    "いとな(む)"
                ],
                "meanings" => [
                    "occupation; camp; perform; build; conduct (business)"
                ]
            ],
            [
                "character" => "比",
                "onyomi" => [
                    "ヒ"
                ],
                "kunyomi" => [
                    "くら(べる)"
                ],
                "meanings" => [
                    "compare; race; ratio"
                ]
            ],
            [
                "character" => "防",
                "onyomi" => [
                    "ボウ"
                ],
                "kunyomi" => [
                    "ふせ(ぐ)"
                ],
                "meanings" => [
                    "ward off; defend; protect; resist"
                ]
            ],
            [
                "character" => "補",
                "onyomi" => [
                    "ホ"
                ],
                "kunyomi" => [
                    "おぎな(う)"
                ],
                "meanings" => [
                    "supplement; supply; offset; compensate"
                ]
            ],
            [
                "character" => "境",
                "onyomi" => [
                    "キョウ"
                ],
                "kunyomi" => [
                    "さかい"
                ],
                "meanings" => [
                    "boundary",
                    "border",
                    "region"
                ]
            ],
            [
                "character" => "導",
                "onyomi" => [
                    "ドウ"
                ],
                "kunyomi" => [
                    "みちび(く)"
                ],
                "meanings" => [
                    "guidance; leading; conduct; usher"
                ]
            ],
            [
                "character" => "副",
                "onyomi" => [
                    "フク"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "vice-; assistant; aide; duplicate; copy"
                ]
            ],
            [
                "character" => "算",
                "onyomi" => [
                    "サン"
                ],
                "kunyomi" => [
                    "そろ"
                ],
                "meanings" => [
                    "calculate; divining; number; probability"
                ]
            ],
            [
                "character" => "輸",
                "onyomi" => [
                    "ユ",
                    "シュ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "transport",
                    "send",
                    "be inferior"
                ]
            ],
            [
                "character" => "述",
                "onyomi" => [
                    "ジュツ"
                ],
                "kunyomi" => [
                    "の(べる)"
                ],
                "meanings" => [
                    "mention; state; speak"
                ]
            ],
            [
                "character" => "線",
                "onyomi" => [
                    "セン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "line; track"
                ]
            ],
            [
                "character" => "農",
                "onyomi" => [
                    "ノウ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "agriculture; farmers"
                ]
            ],
            [
                "character" => "州",
                "onyomi" => [
                    "シュウ"
                ],
                "kunyomi" => [
                    "す"
                ],
                "meanings" => [
                    "state; province"
                ]
            ],
            [
                "character" => "武",
                "onyomi" => [
                    "ブ",
                    "ム"
                ],
                "kunyomi" => [
                    "たけ(し)"
                ],
                "meanings" => [
                    "warrior; military; chivalry; arms"
                ]
            ],
            [
                "character" => "象",
                "onyomi" => [
                    "ショウ",
                    "ゾウ"
                ],
                "kunyomi" => [
                    "かたど(る)"
                ],
                "meanings" => [
                    "elephant; pattern after; image; shape"
                ]
            ],
            [
                "character" => "域",
                "onyomi" => [
                    "イキ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "range; region; limits; stage; level"
                ]
            ],
            [
                "character" => "額",
                "onyomi" => [
                    "ガク"
                ],
                "kunyomi" => [
                    "ひたい"
                ],
                "meanings" => [
                    "forehead; tablet; framed picture; sum; amount; volume"
                ]
            ],
            [
                "character" => "欧",
                "onyomi" => [
                    "オウ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "Europe"
                ]
            ],
            [
                "character" => "担",
                "onyomi" => [
                    "タン"
                ],
                "kunyomi" => [
                    "かつ(ぐ)",
                    "にな(う)"
                ],
                "meanings" => [
                    "shouldering; carry; raise; bear"
                ]
            ],
            [
                "character" => "準",
                "onyomi" => [
                    "ジュン"
                ],
                "kunyomi" => [
                    "じゅん(じる)",
                    "なぞら(える)"
                ],
                "meanings" => [
                    "semi-; correspond to; imitate"
                ]
            ],
            [
                "character" => "賞",
                "onyomi" => [
                    "ショウ"
                ],
                "kunyomi" => [
                    "ほ(める)"
                ],
                "meanings" => [
                    "prize; reward; praise"
                ]
            ],
            [
                "character" => "辺",
                "onyomi" => [
                    "ヘン"
                ],
                "kunyomi" => [
                    "あた(り)",
                    "ほと(り)"
                ],
                "meanings" => [
                    "environs; boundary; border; vicinity"
                ]
            ],
            [
                "character" => "造",
                "onyomi" => [
                    "ゾウ"
                ],
                "kunyomi" => [
                    "つく(る)"
                ],
                "meanings" => [
                    "create; make; structure; physique"
                ]
            ],
            [
                "character" => "被",
                "onyomi" => [
                    "ヒ"
                ],
                "kunyomi" => [
                    "こうむ(る)",
                    "かぶ(る)"
                ],
                "meanings" => [
                    "incur; cover; shelter; wear; put on"
                ]
            ],
            [
                "character" => "技",
                "onyomi" => [
                    "ギ"
                ],
                "kunyomi" => [
                    "わざ"
                ],
                "meanings" => [
                    "skill; art; craft; ability; vocation; arts"
                ]
            ],
            [
                "character" => "低",
                "onyomi" => [
                    "テイ"
                ],
                "kunyomi" => [
                    "ひく(い)"
                ],
                "meanings" => [
                    "lower; short; humble"
                ]
            ],
            [
                "character" => "復",
                "onyomi" => [
                    "フク"
                ],
                "kunyomi" => [
                    "また"
                ],
                "meanings" => [
                    "restore",
                    "return to",
                    "revert"
                ]
            ],
            [
                "character" => "移",
                "onyomi" => [
                    "イ"
                ],
                "kunyomi" => [
                    "うつ(る)"
                ],
                "meanings" => [
                    "shift",
                    "move",
                    "change"
                ]
            ],
            [
                "character" => "個",
                "onyomi" => [
                    "コ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "individual; counter for articles"
                ]
            ],
            [
                "character" => "門",
                "onyomi" => [
                    "モン"
                ],
                "kunyomi" => [
                    "かど",
                    "と"
                ],
                "meanings" => [
                    "gate"
                ]
            ],
            [
                "character" => "課",
                "onyomi" => [
                    "カ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "chapter",
                    "lesson",
                    "section",
                    "department"
                ]
            ],
            [
                "character" => "脳",
                "onyomi" => [
                    "ノウ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "brain; memory"
                ]
            ],
            [
                "character" => "極",
                "onyomi" => [
                    "キョク",
                    "ゴク"
                ],
                "kunyomi" => [
                    "きわ(める)"
                ],
                "meanings" => [
                    "poles; settlement; conclusion; end"
                ]
            ],
            [
                "character" => "含",
                "onyomi" => [
                    "ガン"
                ],
                "kunyomi" => [
                    "ふく(む)"
                ],
                "meanings" => [
                    "contain; include"
                ]
            ],
            [
                "character" => "蔵",
                "onyomi" => [
                    "ゾウ"
                ],
                "kunyomi" => [
                    "くら"
                ],
                "meanings" => [
                    "storehouse; hide; own; have; possess"
                ]
            ],
            [
                "character" => "量",
                "onyomi" => [
                    "リョウ"
                ],
                "kunyomi" => [
                    "はか(る)"
                ],
                "meanings" => [
                    "quantity; measure; weight; amount"
                ]
            ],
            [
                "character" => "型",
                "onyomi" => [
                    "ケイ"
                ],
                "kunyomi" => [
                    "かた"
                ],
                "meanings" => [
                    "type; model"
                ]
            ],
            [
                "character" => "況",
                "onyomi" => [
                    "キョウ"
                ],
                "kunyomi" => [
                    "まし(て)"
                ],
                "meanings" => [
                    "condition; situation"
                ]
            ],
            [
                "character" => "針",
                "onyomi" => [
                    "シン"
                ],
                "kunyomi" => [
                    "はり"
                ],
                "meanings" => [
                    "needle; pin; staple; stinger"
                ]
            ],
            [
                "character" => "専",
                "onyomi" => [
                    "セン"
                ],
                "kunyomi" => [
                    "もっぱ(ら)"
                ],
                "meanings" => [
                    "specialty; exclusive; mainly; solely"
                ]
            ],
            [
                "character" => "谷",
                "onyomi" => [
                    "コク"
                ],
                "kunyomi" => [
                    "たに",
                    "きわ(まる)"
                ],
                "meanings" => [
                    "valley"
                ]
            ],
            [
                "character" => "史",
                "onyomi" => [
                    "シ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "history; chronicle"
                ]
            ],
            [
                "character" => "階",
                "onyomi" => [
                    "カイ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "stair; counter for building story"
                ]
            ],
            [
                "character" => "管",
                "onyomi" => [
                    "カン"
                ],
                "kunyomi" => [
                    "くだ"
                ],
                "meanings" => [
                    "pipe; tube; wind instrument; control; jurisdiction"
                ]
            ],
            [
                "character" => "兵",
                "onyomi" => [
                    "ヘイ",
                    "ヒョウ"
                ],
                "kunyomi" => [
                    "つわもの"
                ],
                "meanings" => [
                    "soldier; private; troops; army"
                ]
            ],
            [
                "character" => "接",
                "onyomi" => [
                    "セツ"
                ],
                "kunyomi" => [
                    "つ(ぐ)"
                ],
                "meanings" => [
                    "touch; contact; adjoin; piece together"
                ]
            ],
            [
                "character" => "細",
                "onyomi" => [
                    "サイ"
                ],
                "kunyomi" => [
                    "ほそ(い)",
                    "こま(かい)"
                ],
                "meanings" => [
                    "slender; narrow; detailed; precise"
                ]
            ],
            [
                "character" => "効",
                "onyomi" => [
                    "コウ"
                ],
                "kunyomi" => [
                    "き(く)"
                ],
                "meanings" => [
                    "merit; efficacy; efficiency; benefit"
                ]
            ],
            [
                "character" => "丸",
                "onyomi" => [
                    "ガン"
                ],
                "kunyomi" => [
                    "まる",
                    "まる(い)"
                ],
                "meanings" => [
                    "round; full (month); perfection"
                ]
            ],
            [
                "character" => "湾",
                "onyomi" => [
                    "ワン"
                ],
                "kunyomi" => [
                    "いりえ"
                ],
                "meanings" => [
                    "gulf; bay; inlet"
                ]
            ],
            [
                "character" => "録",
                "onyomi" => [
                    "ロク"
                ],
                "kunyomi" => [
                    "と(る)"
                ],
                "meanings" => [
                    "record"
                ]
            ],
            [
                "character" => "省",
                "onyomi" => [
                    "セイ",
                    "ショウ"
                ],
                "kunyomi" => [
                    "かえり(みる)",
                    "はぶ(く)"
                ],
                "meanings" => [
                    "focus; government ministry; conserve"
                ]
            ],
            [
                "character" => "旧",
                "onyomi" => [
                    "キュウ"
                ],
                "kunyomi" => [
                    "ふる(い)",
                    "もと"
                ],
                "meanings" => [
                    "old times; old things; former; ex-"
                ]
            ],
            [
                "character" => "橋",
                "onyomi" => [
                    "キョウ"
                ],
                "kunyomi" => [
                    "はし"
                ],
                "meanings" => [
                    "bridge"
                ]
            ],
            [
                "character" => "岸",
                "onyomi" => [
                    "ガン"
                ],
                "kunyomi" => [
                    "きし"
                ],
                "meanings" => [
                    "beach"
                ]
            ],
            [
                "character" => "周",
                "onyomi" => [
                    "シュウ"
                ],
                "kunyomi" => [
                    "まわ(り)"
                ],
                "meanings" => [
                    "circumference; circuit; lap"
                ]
            ],
            [
                "character" => "材",
                "onyomi" => [
                    "ザイ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "lumber",
                    "log",
                    "timber",
                    "wood"
                ]
            ],
            [
                "character" => "戸",
                "onyomi" => [
                    "コ"
                ],
                "kunyomi" => [
                    "と"
                ],
                "meanings" => [
                    "door; counter for houses"
                ]
            ],
            [
                "character" => "央",
                "onyomi" => [
                    "オウ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "center; middle"
                ]
            ],
            [
                "character" => "券",
                "onyomi" => [
                    "ケン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "ticket"
                ]
            ],
            [
                "character" => "編",
                "onyomi" => [
                    "ヘン"
                ],
                "kunyomi" => [
                    "あ(む)"
                ],
                "meanings" => [
                    "compilation; knit; braid; twist; editing"
                ]
            ],
            [
                "character" => "捜",
                "onyomi" => [
                    "ソウ"
                ],
                "kunyomi" => [
                    "さが(す)"
                ],
                "meanings" => [
                    "search; look for; locate"
                ]
            ],
            [
                "character" => "竹",
                "onyomi" => [
                    "チク"
                ],
                "kunyomi" => [
                    "たけ"
                ],
                "meanings" => [
                    "bamboo"
                ]
            ],
            [
                "character" => "超",
                "onyomi" => [
                    "チョウ"
                ],
                "kunyomi" => [
                    "こ(える)"
                ],
                "meanings" => [
                    "transcend; super-; ultra-"
                ]
            ],
            [
                "character" => "並",
                "onyomi" => [
                    "ヘイ"
                ],
                "kunyomi" => [
                    "な(み)",
                    "なみ",
                    "なら(べる)"
                ],
                "meanings" => [
                    "row",
                    "and",
                    "besides"
                ]
            ],
            [
                "character" => "療",
                "onyomi" => [
                    "リョウ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "heal; cure"
                ]
            ],
            [
                "character" => "採",
                "onyomi" => [
                    "サイ"
                ],
                "kunyomi" => [
                    "と(る)"
                ],
                "meanings" => [
                    "pick; take; fetch; take up"
                ]
            ],
            [
                "character" => "森",
                "onyomi" => [
                    "シン"
                ],
                "kunyomi" => [
                    "もり"
                ],
                "meanings" => [
                    "forest",
                    "woods"
                ]
            ],
            [
                "character" => "競",
                "onyomi" => [
                    "キョウ",
                    "ケイ"
                ],
                "kunyomi" => [
                    "きそ(う)",
                    "せ(る)"
                ],
                "meanings" => [
                    "compete with; bid; contest; race"
                ]
            ],
            [
                "character" => "介",
                "onyomi" => [
                    "カイ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "jammed in; shellfish; mediate"
                ]
            ],
            [
                "character" => "根",
                "onyomi" => [
                    "コン"
                ],
                "kunyomi" => [
                    "ね"
                ],
                "meanings" => [
                    "root; radical"
                ]
            ],
            [
                "character" => "販",
                "onyomi" => [
                    "ハン"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "marketing",
                    "sell",
                    "trade"
                ]
            ],
            [
                "character" => "歴",
                "onyomi" => [
                    "レキ"
                ],
                "kunyomi" => [
                    ""
                ],
                "meanings" => [
                    "curriculum; continuation; passage of time"
                ]
            ]
        ];

        $n5_kanji = collect($n5_kanji)->map(function ($kanji) {
            $kanji['meanings'] = serialize($kanji['meanings']);
            $kanji['onyomi'] = serialize($kanji['onyomi']);
            $kanji['kunyomi'] = serialize($kanji['kunyomi']);
            $kanji['proficiency'] = 'n5';
            return $kanji;
        })->toArray();
        $n4_kanji = collect($n4_kanji)->map(function ($kanji) {
            $kanji['meanings'] = serialize($kanji['meanings']);
            $kanji['onyomi'] = serialize($kanji['onyomi']);
            $kanji['kunyomi'] = serialize($kanji['kunyomi']);
            $kanji['proficiency'] = 'n4';
            return $kanji;
        })->toArray();
        $n3_kanji = collect($n3_kanji)->map(function ($kanji) {
            $kanji['meanings'] = serialize($kanji['meanings']);
            $kanji['onyomi'] = serialize($kanji['onyomi']);
            $kanji['kunyomi'] = serialize($kanji['kunyomi']);
            $kanji['proficiency'] = 'n3';
            return $kanji;
        })->toArray();
        $n2_kanji = collect($n2_kanji)->map(function ($kanji) {
            $kanji['meanings'] = serialize($kanji['meanings']);
            $kanji['onyomi'] = serialize($kanji['onyomi']);
            $kanji['kunyomi'] = serialize($kanji['kunyomi']);
            $kanji['proficiency'] = 'n2';
            return $kanji;
        })->toArray();
        $kanji_dictionary = array_merge($n5_kanji, $n4_kanji, $n3_kanji, $n2_kanji);
        DB::table('kanjis')->insert($kanji_dictionary);


        $this->call(UserTableSeeder::class);
        $this->call(VerbTableSeeder::class);
    }
}
