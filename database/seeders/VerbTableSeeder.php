<?php

namespace Database\Seeders;

use App\Models\Verb;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerbTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // [
        //     'meaning' => 'to learn, study',
        //     'politeForm' => 'べんきょうをします',
        //     'hasLearned' => false,
        //     'shouldKnow' => false,
        //     'timesWrong' => 0,
        //     'timesRight' => 0,
        //     'stem' => 'benkyo',
        //     'verbType' => 'suru',
        //     'meanings' => ['learn', 'study'],
        //     'kanji' => [
        //         'word' => '勉強をします',
        //         'meaning' => 'to learn, study',
        //     ],
        $vocabList = collect([
            [
                'meaning' => 'to learn, study',
                'politeForm' => 'べんきょうをします',
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'benkyo',
                'verbType' => 'suru',
                'meanings' => ['learn', 'study'],
                'kanji' => [
                    'word' => '勉強をします',
                    'meaning' => 'to learn, study',
                ],
            ],
            [
                'meaning' => 'to investigate, inquire',
                'politeForm' => 'ちょうさをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'chousa',
                'verbType' => 'suru',
                'meanings' => ['investigate', 'inquire'],
                'kanji' => [
                    'word' => '調査をします',
                    'meaning' => 'to investigate, inquire',
                ],
            ],
            [
                'meaning' => 'to order (goods)',
                'politeForm' => 'ちゅうもんをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'chuumon',
                'verbType' => 'suru',
                'meanings' => ['order (goods)', 'order goods', 'order'],
                'kanji' => [
                    'word' => '注文をします',
                    'meaning' => 'to order (goods)',
                ],
            ],
            [
                'meaning' => 'to decrease, reduce',
                'politeForm' => 'げんしょうをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'genshou',
                'verbType' => 'suru',
                'meanings' => ['decrease', 'reduce'],
                'kanji' => [
                    'word' => '減少をします',
                    'meaning' => 'to decrease, reduce',
                ],
            ],
            [
                'meaning' => 'to announce, release',
                'politeForm' => 'はっぴょうをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'happyou',
                'verbType' => 'suru',
                'meanings' => ['announce', 'release'],
                'kanji' => [
                    'word' => '発表をします',
                    'meaning' => 'to announce, release',
                ],
            ],
            [
                'meaning' => 'to release, be on sale, launch',
                'politeForm' => 'はつばいをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'hatsubai',
                'verbType' => 'suru',
                'meanings' => ['release', 'be on sale', 'launch'],
                'kanji' => [
                    'word' => '発売をします',
                    'meaning' => 'to release, be on sale, launch',
                ],
            ],
            [
                'meaning' => 'to reply, answer',
                'politeForm' => 'へんじをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'henji',
                'verbType' => 'suru',
                'meanings' => ['reply', 'answer'],
                'kanji' => [
                    'word' => '返事をします',
                    'meaning' => 'to reply, answer',
                ],
            ],
            [
                'meaning' => 'to change',
                'politeForm' => 'へんかをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'henka',
                'verbType' => 'suru',
                'meanings' => ['change'],
                'kanji' => [
                    'word' => '変化をします',
                    'meaning' => 'to change',
                ],
            ],
            [
                'meaning' => 'to translate',
                'politeForm' => 'ほんやくをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'honyaku',
                'verbType' => 'suru',
                'meanings' => ['translate'],
                'kanji' => [
                    'word' => '翻訳をします',
                    'meaning' => 'to translate',
                ],
            ],
            [
                'meaning' => 'to report',
                'politeForm' => 'ほうこくをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'houkoku',
                'verbType' => 'suru',
                'meanings' => ['report'],
                'kanji' => [
                    'word' => '報告をします',
                    'meaning' => 'to report',
                ],
            ],
            [
                'meaning' => 'to print',
                'politeForm' => 'いんさつをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'insatsu',
                'verbType' => 'suru',
                'meanings' => ['print'],
                'kanji' => [
                    'word' => '印刷をします',
                    'meaning' => 'to print',
                ],
            ],
            [
                'meaning' => 'to develop',
                'politeForm' => 'かいはつをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kaihatsu',
                'verbType' => 'suru',
                'meanings' => ['develop'],
                'kanji' => [
                    'word' => '開発をします',
                    'meaning' => 'to develop',
                ],
            ],
            [
                'meaning' => 'to check, confirm',
                'politeForm' => 'かくにんをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kakunin',
                'verbType' => 'suru',
                'meanings' => ['check', 'confirm'],
                'kanji' => [
                    'word' => '確認をします',
                    'meaning' => 'to check, confirm',
                ],
            ],
            [
                'meaning' => 'to manage, control',
                'politeForm' => 'かんりをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kanri',
                'verbType' => 'suru',
                'meanings' => ['manage', 'control'],
                'kanji' => [
                    'word' => '管理をします',
                    'meaning' => 'to manage, control',
                ],
            ],
            [
                'meaning' => 'to complete',
                'politeForm' => 'かんせいをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kansei',
                'verbType' => 'suru',
                'meanings' => ['complete'],
                'kanji' => [
                    'word' => '完成をします',
                    'meaning' => 'to complete',
                ],
            ],
            [
                'meaning' => 'to exchange, replace',
                'politeForm' => 'こうかんをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'koukan',
                'verbType' => 'suru',
                'meanings' => ['exchange', 'replace'],
                'kanji' => [
                    'word' => '交換をします',
                    'meaning' => 'to exchange, replace',
                ],
            ],
            [
                'meaning' => 'to break, damage, hurt',
                'politeForm' => 'こしょうをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'koshou',
                'verbType' => 'suru',
                'meanings' => ['break', 'damage', 'hurt'],
                'kanji' => [
                    'word' => '故障をします',
                    'meaning' => 'to break, damage, hurt',
                ],
            ],
            [
                'meaning' => 'to contact, get in touch, inform',
                'politeForm' => 'れんらくをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'renraku',
                'verbType' => 'suru',
                'meanings' => ['contact', 'get in touch', 'inform'],
                'kanji' => [
                    'word' => '連絡をします',
                    'meaning' => 'to contact, get in touch, inform',
                ],
            ],
            [
                'meaning' => 'to practice, drill, execise, workout',
                'politeForm' => 'れんしゅうをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'renshuu',
                'verbType' => 'suru',
                'meanings' => ['practice', 'drill', 'exercise', 'workout'],
                'kanji' => [
                    'word' => '練習をします',
                    'meaning' => 'to practice, drill, execise, workout',
                ],
            ],
            [
                'meaning' => 'to divorce',
                'politeForm' => 'りこんをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'rikon',
                'verbType' => 'suru',
                'meanings' => ['divorce'],
                'kanji' => [
                    'word' => '離婚をします',
                    'meaning' => 'to divorce',
                ],
            ],
            [
                'meaning' => 'to use',
                'politeForm' => 'りようをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'riyou',
                'verbType' => 'suru',
                'meanings' => ['use'],
                'kanji' => [
                    'word' => '利用をします',
                    'meaning' => 'to use',
                ],
            ],
            [
                'meaning' => 'to travel, make a trip',
                'politeForm' => 'りょこうをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'ryokou',
                'verbType' => 'suru',
                'meanings' => ['travel', 'make a trip', 'take a trip', 'journey'],
                'kanji' => [
                    'word' => '旅行をします',
                    'meaning' => 'to travel, make a trip',
                ],
            ],
            [
                'meaning' => 'to cook',
                'politeForm' => 'りょうりをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'riouri',
                'verbType' => 'suru',
                'meanings' => ['cook'],
                'kanji' => [
                    'word' => '料理をします',
                    'meaning' => 'to cook',
                ],
            ],
            [
                'meaning' => 'to agree, support',
                'politeForm' => 'さんせいをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'sansei',
                'verbType' => 'suru',
                'meanings' => ['agree', 'support', 'approve', 'favour', 'favor'],
                'kanji' => [
                    'word' => '賛成をします',
                    'meaning' => 'to agree, support, favour, favor, approve',
                ],
            ],
            [
                'meaning' => 'to work',
                'politeForm' => 'しごとをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'shigoto',
                'verbType' => 'suru',
                'meanings' => ['work'],
                'kanji' => [
                    'word' => '仕事をします',
                    'meaning' => 'to work',
                ],
            ],
            [
                'meaning' => 'to have a meal',
                'politeForm' => 'しょくじをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'shokuji',
                'verbType' => 'suru',
                'meanings' => ['have a meal'],
                'kanji' => [
                    'word' => '食事をします',
                    'meaning' => 'to have a meal',
                ],
            ],
            [
                'meaning' => 'to go on a business trip',
                'politeForm' => 'しゅっちょうをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'shucchou',
                'verbType' => 'suru',
                'meanings' => ['go on a business trip'],
                'kanji' => [
                    'word' => '出張をします',
                    'meaning' => 'to go on a business trip',
                ],
            ],
            [
                'meaning' => 'to attend, appear, be present',
                'politeForm' => 'しゅっせきをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'shusseki',
                'verbType' => 'suru',
                'meanings' => ['attend', 'appear', 'be present'],
                'kanji' => [
                    'word' => '出席をします',
                    'meaning' => 'to attend, appear, be present',
                ],
            ],
            [
                'meaning' => 'to repair, fix, service',
                'politeForm' => 'しゅうりをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'shuuri',
                'verbType' => 'suru',
                'meanings' => ['repair', 'fix', 'service'],
                'kanji' => [
                    'word' => '修理をします',
                    'meaning' => 'to repair, fix, service',
                ],
            ],
            [
                'meaning' => 'to consult, discuss, talk with',
                'politeForm' => 'そうだんをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'soudan',
                'verbType' => 'suru',
                'meanings' => ['consult', 'discuss', 'talk with'],
                'kanji' => [
                    'word' => '相談をします',
                    'meaning' => 'to consult, discuss, talk with',
                ],
            ],
            [
                'meaning' => 'to graduate',
                'politeForm' => 'そつぎょうをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'sotsugyou',
                'verbType' => 'suru',
                'meanings' => ['graduate'],
                'kanji' => [
                    'word' => '卒業をします',
                    'meaning' => 'to graduate',
                ],
            ],
            [
                'meaning' => 'to eat',
                'politeForm' => 'たべます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'taberu',
                'verbType' => 'ichidan',
                'meanings' => ['eat'],
                'kanji' => [
                    'word' => '食べます',
                    'meaning' => 'to eat',
                ],
            ],
            [
                'meaning' => 'to drink',
                'politeForm' => 'のみます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'nomu',
                'verbType' => 'godan',
                'meanings' => ['drink'],
                'kanji' => [
                    'word' => '飲みます',
                    'meaning' => 'to drink',
                ],
            ],
            [
                'meaning' => 'to buy',
                'politeForm' => 'かいます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kau',
                'verbType' => 'godan',
                'meanings' => ['buy'],
                'kanji' => [
                    'word' => '買います',
                    'meaning' => 'to buy',
                ],
            ],
            [
                'meaning' => 'to watch, look, see',
                'politeForm' => 'みます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'miru',
                'verbType' => 'ichidan',
                'meanings' => ['watch', 'look', 'see'],
                'kanji' => [
                    'word' => '見ます',
                    'meaning' => 'to watch, look, see',
                ],
            ],
            [
                'meaning' => 'to show',
                'politeForm' => 'みせます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'miseru',
                'verbType' => 'ichidan',
                'meanings' => ['show'],
                'kanji' => [
                    'word' => '見せます',
                    'meaning' => 'to show',
                ],
            ],
            [
                'meaning' => 'to write, draw, paint',
                'politeForm' => 'かきます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kaku',
                'verbType' => 'godan',
                'meanings' => ['write', 'draw', 'paint'],
                'kanji' => [
                    'word' => '書きます',
                    'meaning' => 'to write, draw, paint',
                ],
            ],
            [
                'meaning' => 'to send',
                'politeForm' => 'おくります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'okuru',
                'verbType' => 'godan',
                'meanings' => ['send'],
                'kanji' => [
                    'word' => '送ります',
                    'meaning' => 'to send',
                ],
            ],
            [
                'meaning' => 'to make, produce, cook',
                'politeForm' => 'つくります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'tsukuru',
                'verbType' => 'godan',
                'meanings' => ['make', 'produce', 'cook'],
                'kanji' => [
                    'word' => '作ります',
                    'meaning' => 'to make, produce, cook',
                ],
            ],
            [
                'meaning' => 'to use',
                'politeForm' => 'つかいます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'tsukau',
                'verbType' => 'godan',
                'meanings' => ['use'],
                'kanji' => [
                    'word' => '使います',
                    'meaning' => 'to use',
                ],
            ],
            [
                'meaning' => 'to go',
                'politeForm' => 'いきます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'iku',
                'verbType' => 'godan',
                'meanings' => ['go'],
                'kanji' => [
                    'word' => '行きます',
                    'meaning' => 'to go',
                ],
            ],
            [
                'meaning' => 'to talk, speak',
                'politeForm' => 'はなします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'hanasu',
                'verbType' => 'godan',
                'meanings' => ['talk', 'speak'],
                'kanji' => [
                    'word' => '話します',
                    'meaning' => 'to talk, speak',
                ],
            ],
            [
                'meaning' => 'to increase',
                'politeForm' => 'ふえます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'fueru',
                'verbType' => 'ichidan',
                'meanings' => ['increase'],
                'kanji' => [
                    'word' => '増えます',
                    'meaning' => 'to increase',
                ],
            ],
            [
                'meaning' => 'to decrease',
                'politeForm' => 'へります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'heru',
                'verbType' => 'godan',
                'meanings' => ['decrease'],
                'kanji' => [
                    'word' => '減ります',
                    'meaning' => 'to decrease',
                ],
            ],
            [
                'meaning' => 'to learn',
                'politeForm' => 'ならいます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'narau',
                'verbType' => 'godan',
                'meanings' => ['learn'],
                'kanji' => [
                    'word' => '習います',
                    'meaning' => 'to learn',
                ],
            ],
            [
                'meaning' => 'to memorize, learn, master',
                'politeForm' => 'おぼえます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'oboeru',
                'verbType' => 'ichidan',
                'meanings' => ['memorize', 'learn', 'master'],
                'kanji' => [
                    'word' => '覚えます',
                    'meaning' => 'to memorize, learn, master',
                ],
            ],
            [
                'meaning' => 'to teach, inform, notice, let somebody know',
                'politeForm' => 'おしえます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'oshieru',
                'verbType' => 'ichidan',
                'meanings' => ['teach', 'inform', 'notice', 'let somebody know'],
                'kanji' => [
                    'word' => '教えます',
                    'meaning' => 'to teach, inform, notice, let somebody know',
                ],
            ],
            [
                'meaning' => 'to check, investigate',
                'politeForm' => 'しらべます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'shiraberu',
                'verbType' => 'ichidan',
                'meanings' => ['check', 'investigate'],
                'kanji' => [
                    'word' => '調べます',
                    'meaning' => 'to check, investigate',
                ],
            ],
            [
                'meaning' => 'to forget',
                'politeForm' => 'わすれます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'wasureru',
                'verbType' => 'ichidan',
                'meanings' => ['forget'],
                'kanji' => [
                    'word' => '忘れます',
                    'meaning' => 'to forget',
                ],
            ],
            [
                'meaning' => 'to begin, start, open',
                'politeForm' => 'はじまります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'hajimaru',
                'verbType' => 'godan',
                'meanings' => ['begin', 'start', 'open'],
                'kanji' => [
                    'word' => '始まります',
                    'meaning' => 'to begin, start, open',
                ],
            ],
            [
                'meaning' => 'to finish, end',
                'politeForm' => 'おわります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'owaru',
                'verbType' => 'godan',
                'meanings' => ['finish', 'end'],
                'kanji' => [
                    'word' => '終わります',
                    'meaning' => 'to finish, end',
                ],
            ],
            [
                'meaning' => 'to open',
                'politeForm' => 'あけます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'akeru',
                'verbType' => 'ichidan',
                'meanings' => ['open', 'unwrap', 'unlock', 'empty', 'remove', 'make space'],
                'kanji' => [
                    'word' => '開けます',
                    'meaning' => 'to open',
                ],
            ],
            [
                'meaning' => 'to close',
                'politeForm' => 'しめます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'shimeru',
                'verbType' => 'ichidan',
                'meanings' => ['close', 'shut'],
                'kanji' => [
                    'word' => '閉めます',
                    'meaning' => 'to close',
                ],
            ],
            [
                'meaning' => 'to win',
                'politeForm' => 'かちます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'katsu',
                'verbType' => 'godan',
                'meanings' => ['win', 'gain victory'],
                'kanji' => [
                    'word' => '勝ちます',
                    'meaning' => 'to win',
                ],
            ],
            [
                'meaning' => 'to lose (a game)',
                'politeForm' => 'まけます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'makeru',
                'verbType' => 'ichidan',
                'meanings' => ['lose (a game)', 'be defeated', 'succumb', 'give in', 'surrender'],
                'kanji' => [
                    'word' => '負けます',
                    'meaning' => 'to lose (a game)',
                ],
            ],
            [
                'meaning' => 'to turn, curve',
                'politeForm' => 'まがります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'magaru',
                'verbType' => 'godan',
                'meanings' => ['turn', 'curve', 'warp', 'wind', 'twist'],
                'kanji' => [
                    'word' => '曲がります',
                    'meaning' => 'to turn, curve',
                ],
            ],
            [
                'meaning' => 'to get on, ride',
                'politeForm' => 'のります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'noru',
                'verbType' => 'godan',
                'meanings' => ['get on', 'ride', 'board', 'take', 'embark', 'reach', 'go over', 'take part', 'join'],
                'kanji' => [
                    'word' => '乗ります',
                    'meaning' => 'to get on, ride',
                ],
            ],
            [
                'meaning' => 'to get off, descend, go down, disembark, dismount, step down, give up, quit',
                'politeForm' => 'おります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'oriru',
                'verbType' => 'ichidan',
                'meanings' => ['get off', 'descend', 'go down', 'disembark', 'dismount', 'retire', 'step down', 'give up', 'quit'],
                'kanji' => [
                    'word' => '降ります',
                    'meaning' => 'to get off, descend, go down, disembark, dismount, step down, give up, quit',
                ],
            ],
            [
                'meaning' => 'to translate',
                'politeForm' => 'やくします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'yakusu',
                'verbType' => 'godan',
                'meanings' => ['translate', 'interpret'],
                'kanji' => [
                    'word' => '訳します',
                    'meaning' => 'to translate',
                ],
            ],
            [
                'meaning' => 'to lie down, go to bed',
                'politeForm' => 'ねます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'neru',
                'verbType' => 'ichidan',
                'meanings' => ['lie down', ' goto bed', 'sleep (with someone)', 'sleep'],
                'kanji' => [
                    'word' => '寝ます',
                    'meaning' => 'to lie down, go to bed',
                ],
            ],
            [
                'meaning' => 'to get up, wake up, happen, occur',
                'politeForm' => 'おきます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'okiru',
                'verbType' => 'ichidan',
                'meanings' => ['get up', 'wake up', 'happen', 'occur', 'stay awake'],
                'kanji' => [
                    'word' => '起きます',
                    'meaning' => 'to get up, wake up, happen, occur',
                ],
            ],
            [
                'meaning' => 'to break, damage, hurt',
                'politeForm' => 'こわれます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kowareru',
                'verbType' => 'ichidan',
                'meanings' => ['break', 'damage', 'hurt'],
                'kanji' => [
                    'word' => '壊れます',
                    'meaning' => 'to break, damage, hurt',
                ],
            ],
            [
                'meaning' => 'to repair, fix, cure, correct, heal',
                'politeForm' => 'なおします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'naosu',
                'verbType' => 'godan',
                'meanings' => ['repair', 'fix', 'cure', 'heal', 'correct'],
                'kanji' => [
                    'word' => '直します',
                    'meaning' => 'to repair, fix, cure, correct, heal',
                ],
            ],
            [
                'meaning' => 'to borrow, rent, hire, have a loan',
                'politeForm' => 'かります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kariru',
                'verbType' => 'ichidan',
                'meanings' => ['borrow', 'rent', 'hire', 'have a loan'],
                'kanji' => [
                    'word' => '借ります',
                    'meaning' => 'to borrow, rent, hire, have a loan',
                ],
            ],
            [
                'meaning' => 'to go up, rise',
                'politeForm' => 'あがります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'agaru',
                'verbType' => 'godan',
                'meanings' => ['go up', 'rise', 'come up', 'ascend', 'be raised', 'come in', 'go in', 'enter', 'go in', 'increase', 'improve', 'make progress'],
                'kanji' => [
                    'word' => '上がります',
                    'meaning' => 'to go up, rise, come up, ascend, be raised, come in, go in, enter, increase, improve, make progress',
                ],
            ],
            [
                'meaning' => 'to go down, drop',
                'politeForm' => 'さがります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'sagaru',
                'verbType' => 'godan',
                'meanings' => ['go down', 'drop', 'come down', 'fall', 'sink', 'get lower', 'dangle'],
                'kanji' => [
                    'word' => '下がります',
                    'meaning' => 'to go down, drop, come down, fall, sink, get lower, dangle',
                ],
            ],
            [
                'meaning' => 'to sit, have a seat',
                'politeForm' => 'すわります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'suwaru',
                'verbType' => 'godan',
                'meanings' => ['sit', 'have a seat', 'squat', 'hold still'],
                'kanji' => [
                    'word' => '座ります',
                    'meaning' => 'to sit, have a seat, squat, hold still',
                ],
            ],
            [
                'meaning' => 'to wash, cleanse, rinse, purify, investigate, inquire into',
                'politeForm' => 'あらいます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'arau',
                'verbType' => 'godan',
                'meanings' => ['wash', 'cleanse', 'rinse', 'purify', 'invesitgate', 'inquire into'],
                'kanji' => [
                    'word' => '洗います',
                    'meaning' => 'to wash, cleanse, rinse, purify, investigate, inquire into',
                ],
            ],
            [
                'meaning' => 'to grill, bake, roast, toast',
                'politeForm' => 'やきます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'yaku',
                'verbType' => 'godan',
                'meanings' => ['grill', 'bake', 'roast', 'toast', 'burn', 'heat', 'heat up', 'barbecue'],
                'kanji' => [
                    'word' => '焼きます',
                    'meaning' => 'to grill, bake, roast, toast, burn, heat up, barbecue',
                ],
            ],
            [
                'meaning' => 'to cut',
                'politeForm' => 'きります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kiru',
                'verbType' => 'godan',
                'meanings' => ['cut', 'cut through', 'perform (surgery)', 'sever', 'turn off'],
                'kanji' => [
                    'word' => '切ります',
                    'meaning' => 'to cut, sever, perform (surgery), turn off',
                ],
            ],
            [
                'meaning' => 'to come',
                'politeForm' => 'きます*',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kuru',
                'verbType' => 'irregular',
                'meanings' => ['come', 'arrive', 'approach'],
                'kanji' => [
                    'word' => '来ます',
                    'meaning' => 'to come',
                ],
            ],
            [
                'meaning' => 'to take off (shoes, clothes)',
                'politeForm' => 'ぬぎます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'nugu',
                'verbType' => 'godan',
                'meanings' => ['take off clothes', 'undress', 'take off shoes', 'strip'],
                'kanji' => [
                    'word' => '脱ぎます',
                    'meaning' => 'to take off (shoes, clothes), undress, strip',
                ],
            ],
            [
                'meaning' => 'to do, play (something), carry out, perform',
                'politeForm' => 'します*',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'suru',
                'verbType' => 'irregular',
                'meanings' => ['do', 'play (something)', 'carry out', 'perform'],
                'kanji' => [
                    'word' => 'します',
                    'meaning' => 'to do, play (something), carry out, perform',
                ],
            ],
            [
                'meaning' => 'to phone, call (by phone)',
                'politeForm' => 'でんわをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'denwa',
                'verbType' => 'suru',
                'meanings' => ['phone', 'call', 'ring'],
                'kanji' => [
                    'word' => '電話をします',
                    'meaning' => 'to phone, call (by phone), ring',
                ],
            ],
            [
                'meaning' => 'to oppose, to be against',
                'politeForm' => 'はんたいをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'hantai',
                'verbType' => 'suru',
                'meanings' => ['oppose', 'be against'],
                'kanji' => [
                    'word' => '反対をします',
                    'meaning' => 'to oppose, to be against',
                ],
            ],
            [
                'meaning' => 'to get a job',
                'politeForm' => 'しゅうしょくをします',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'shuushoku',
                'verbType' => 'suru',
                'meanings' => ['get a job'],
                'kanji' => [
                    'word' => '就職をします',
                    'meaning' => 'to get a job',
                ],
            ],
            [
                'meaning' => 'to meet / to match, fit',
                'politeForm' => 'あいます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'au',
                'verbType' => 'godan',
                'meanings' => ['meet', 'match', 'fit'],
                'kanji' => [
                    'word' => '会います',
                    'meaning' => 'to meet / to match, fit',
                ],
            ],
            [
                'meaning' => 'return',
                'politeForm' => 'かえります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'kaeru',
                'verbType' => 'godan',
                'meanings' => ['return'],
                'kanji' => [
                    'word' => '帰ります',
                    'meaning' => 'return',
                ],
            ],
            [
                'meaning' => 'to have, be, at, exist (inanimate object)',
                'politeForm' => 'あります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'aru',
                'verbType' => 'godan',
                'meanings' => ['have', 'be', 'at', 'exist (inanimate object)'],
                'kanji' => [
                    'word' => 'あります',
                    'meaning' => 'to have, be, at, exist (inanimate object)',
                ],
            ],
            [
                'meaning' => 'to have, be at, exist (animate object)',
                'politeForm' => 'います',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'iru',
                'verbType' => 'ichidan',
                'meanings' => ['have', 'be at', 'exist (animate object)', 'be', 'exist'],
                'kanji' => [
                    'word' => 'います',
                    'meaning' => 'to have, be at, exist (animate object)',
                ],
            ],
            [
                'meaning' => 'to stop',
                'politeForm' => 'とまります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'tomaru',
                'verbType' => 'godan',
                'meanings' => ['stop', 'perch', 'hault'],
                'kanji' => [
                    'word' => '止まります',
                    'meaning' => 'to stop',
                ],
            ],
            [
                'meaning' => 'to stay (the night), lodge',
                'politeForm' => 'とまります',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'tomaru',
                'verbType' => 'godan',
                'meanings' => ['stay (the night)', 'lodge'],
                'kanji' => [
                    'word' => '泊まります',
                    'meaning' => 'to stop / to stay (the night), lodge',
                ],
            ],
            [
                'meaning' => 'to raise, lift up',
                'politeForm' => 'あげます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'ageru',
                'verbType' => 'ichidan',
                'meanings' => ['raise', 'lift up'],
                'kanji' => [
                    'word' => '上げます',
                    'meaning' => 'to raise, lift up',
                ],
            ],
            [
                'meaning' => 'to recieve, be given',
                'politeForm' => 'もらいます',
                
                
                'timesWrong' => 0,
                'timesRight' => 0,
                'stem' => 'morau',
                'verbType' => 'godan',
                'meanings' => ['recieve', 'be given'],
                'kanji' => [
                    'word' => '貰います',
                    'meaning' => 'to recieve, be given',
                ],
            ],
        ])->map(function ($item) {
            DB::table('verbs')->insert([
            'meaning' => $item['meaning'],
            'politeForm' => $item['politeForm'],
            'timesWrong' => $item['timesWrong'] ?? 0,
            'timesRight' => $item['timesRight'] ?? 0,
            'stem' => $item['stem'],
            'verbType' => $item['verbType'],
            'meanings' => serialize($item['meanings']),
            'kanji' => serialize($item['kanji']),
            'created_at' => '2021-03-01',
            'updated_at' => '2021-03-01'
        ]);

            // return [
            //     'meaning' => $item['meaning'],
            //     'politeForm' => $item['politeForm'],
            //     'timesWrong' => $item['timesWrong'] ?? 0,
            //     'timesRight' => $item['timesRight'] ?? 0,
            //     'stem' => $item['stem'],
            //     'verbType' => $item['verbType'],
            //     'meanings' => serialize($item['meanings']),
            //     'kanji' => serialize($item['kanji'])
            // ];
        });
        // DB::table('verbs')->insert($vocabList);
    }
}
