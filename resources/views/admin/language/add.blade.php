@extends('admin.layout.default')
@section('content')
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2">{{ trans('labels.languages') }}</h5>
        @include('admin.layout.breadcrumb')
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card border-0 my-3">
            <div class="card-body">
                <form method="post" action="{{URL::to('admin/language-settings/language/store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3 col-md-12">
                            <div class="form-group mb-3">
                                <input type="hidden" name="name" id="language">
                                <label for="language" class="col-form-label">{{trans('labels.languages')}}</label>
                                <select name="code" class="form-control code-dropdown" id="code">
                                    <option value="" selected>{{trans('labels.select')}}</option>
                                    <option value="ab"{{ old('code') == "ab" ? 'selected' : '' }} data-language-name="Abkhaz" >Abkhaz - ab (аҧсуа)</option>
                                    <option value="aa"{{ old('code') == "aa" ? 'selected' : '' }} data-language-name="Afar" >Afar - aa (Afaraf)</option>
                                    <option value="af"{{ old('code') == "af" ? 'selected' : '' }} data-language-name="Afrikaans" >Afrikaans - af (Afrikaans)</option>
                                    <option value="ak"{{ old('code') == "ak" ? 'selected' : '' }} data-language-name="Akan" >Akan - ak (Akan)</option>
                                    <option value="sq"{{ old('code') == "sq" ? 'selected' : '' }} data-language-name="Albanian" >Albanian - sq (Shqip)</option>
                                    <option value="am"{{ old('code') == "am" ? 'selected' : '' }} data-language-name="Amharic" >Amharic - am (አማርኛ)</option>
                                    <option value="ar"{{ old('code') == "ar" ? 'selected' : '' }} data-language-name="Arabic" >Arabic - ar (العربية)</option>
                                    <option value="an"{{ old('code') == "an" ? 'selected' : '' }} data-language-name="Aragonese" >Aragonese - an (Aragonés)</option>
                                    <option value="hy"{{ old('code') == "hy" ? 'selected' : '' }} data-language-name="Armenian" >Armenian - hy (Հայերեն)</option>
                                    <option value="as"{{ old('code') == "as" ? 'selected' : '' }} data-language-name="Assamese" >Assamese - as (অসমীয়া)</option>
                                    <option value="av"{{ old('code') == "av" ? 'selected' : '' }} data-language-name="Avaric" >Avaric - av (авар мацӀ, магӀарул мацӀ)</option>
                                    <option value="ae"{{ old('code') == "ae" ? 'selected' : '' }} data-language-name="Avestan" >Avestan - ae (avesta)</option>
                                    <option value="ay"{{ old('code') == "ay" ? 'selected' : '' }} data-language-name="Aymara" >Aymara - ay (aymar aru)</option>
                                    <option value="az"{{ old('code') == "az" ? 'selected' : '' }} data-language-name="Azerbaijani" >Azerbaijani - az (azərbaycan dili)</option>
                                    <option value="bm"{{ old('code') == "bm" ? 'selected' : '' }} data-language-name="Bambara" >Bambara - bm (bamanankan)</option>
                                    <option value="ba"{{ old('code') == "ba" ? 'selected' : '' }} data-language-name="Bashkir" >Bashkir - ba (башҡорт теле)</option>
                                    <option value="eu"{{ old('code') == "eu" ? 'selected' : '' }} data-language-name="Basque" >Basque - eu (euskara, euskera)</option>
                                    <option value="be"{{ old('code') == "be" ? 'selected' : '' }} data-language-name="Belarusian" >Belarusian - be (Беларуская)</option>
                                    <option value="bn"{{ old('code') == "bn" ? 'selected' : '' }} data-language-name="Bengali" >Bengali - bn (বাংলা)</option>
                                    <option value="bh"{{ old('code') == "bh" ? 'selected' : '' }} data-language-name="Bihari" >Bihari - bh (भोजपुरी)</option>
                                    <option value="bi"{{ old('code') == "bi" ? 'selected' : '' }} data-language-name="Bislama" >Bislama - bi (Bislama)</option>
                                    <option value="bs"{{ old('code') == "bs" ? 'selected' : '' }} data-language-name="Bosnian" >Bosnian - bs (bosanski jezik)</option>
                                    <option value="br"{{ old('code') == "br" ? 'selected' : '' }} data-language-name="Breton" >Breton - br (brezhoneg)</option>
                                    <option value="bg"{{ old('code') == "bg" ? 'selected' : '' }} data-language-name="Bulgarian" >Bulgarian - bg (български език)</option>
                                    <option value="my"{{ old('code') == "my" ? 'selected' : '' }} data-language-name="Burmese" >Burmese - my (ဗမာစာ)</option>
                                    <option value="ca"{{ old('code') == "ca" ? 'selected' : '' }} data-language-name="Catalan; Valencian" >Catalan; Valencian - ca (Català)</option>
                                    <option value="ch"{{ old('code') == "ch" ? 'selected' : '' }} data-language-name="Chamorro" >Chamorro - ch (Chamoru)</option>
                                    <option value="ce"{{ old('code') == "ce" ? 'selected' : '' }} data-language-name="Chechen" >Chechen - ce (нохчийн мотт)</option>
                                    <option value="ny"{{ old('code') == "ny" ? 'selected' : '' }} data-language-name="Chichewa; Chewa; Nyanja" >Chichewa; Chewa; Nyanja - ny (chiCheŵa, chinyanja)</option>
                                    <option value="zh"{{ old('code') == "zh" ? 'selected' : '' }} data-language-name="Chinese" >Chinese - zh (中文 (Zhōngwén), 汉语, 漢語)</option>
                                    <option value="cv"{{ old('code') == "cv" ? 'selected' : '' }} data-language-name="Chuvash" >Chuvash - cv (чӑваш чӗлхи)</option>
                                    <option value="kw"{{ old('code') == "kw" ? 'selected' : '' }} data-language-name="Cornish" >Cornish - kw (Kernewek)</option>
                                    <option value="co"{{ old('code') == "co" ? 'selected' : '' }} data-language-name="Corsican" >Corsican - co (corsu, lingua corsa)</option>
                                    <option value="cr"{{ old('code') == "cr" ? 'selected' : '' }} data-language-name="Cree" >Cree - cr (ᓀᐦᐃᔭᐍᐏᐣ)</option>
                                    <option value="hr"{{ old('code') == "hr" ? 'selected' : '' }} data-language-name="Croatian" >Croatian - hr (hrvatski)</option>
                                    <option value="cs"{{ old('code') == "cs" ? 'selected' : '' }} data-language-name="Czech" >Czech - cs (česky, čeština)</option>
                                    <option value="da"{{ old('code') == "da" ? 'selected' : '' }} data-language-name="Danish" >Danish - da (dansk)</option>
                                    <option value="dv"{{ old('code') == "dv" ? 'selected' : '' }} data-language-name="Divehi; Dhivehi; Maldivian;" >Divehi; Dhivehi; Maldivian; - dv (ދިވެހި)</option>
                                    <option value="nl"{{ old('code') == "nl" ? 'selected' : '' }} data-language-name="Dutch" >Dutch - nl (Nederlands, Vlaams)</option>
                                    <option value="en"{{ old('code') == "en" ? 'selected' : '' }} data-language-name="English" >English - en (English)</option>
                                    <option value="eo"{{ old('code') == "eo" ? 'selected' : '' }} data-language-name="Esperanto" >Esperanto - eo (Esperanto)</option>
                                    <option value="et"{{ old('code') == "et" ? 'selected' : '' }} data-language-name="Estonian" >Estonian - et (eesti, eesti keel)</option>
                                    <option value="ee"{{ old('code') == "ee" ? 'selected' : '' }} data-language-name="Ewe" >Ewe - ee (Eʋegbe)</option>
                                    <option value="fo"{{ old('code') == "fo" ? 'selected' : '' }} data-language-name="Faroese" >Faroese - fo (føroyskt)</option>
                                    <option value="fj"{{ old('code') == "fj" ? 'selected' : '' }} data-language-name="Fijian" >Fijian - fj (vosa Vakaviti)</option>
                                    <option value="fi"{{ old('code') == "fi" ? 'selected' : '' }} data-language-name="Finnish" >Finnish - fi (suomi, suomen kieli)</option>
                                    <option value="fr"{{ old('code') == "fr" ? 'selected' : '' }} data-language-name="French" >French - fr (français, langue française)</option>
                                    <option value="ff"{{ old('code') == "ff" ? 'selected' : '' }} data-language-name="Fula; Fulah; Pulaar; Pular" >Fula; Fulah; Pulaar; Pular - ff (Fulfulde, Pulaar, Pular)</option>
                                    <option value="gl"{{ old('code') == "gl" ? 'selected' : '' }} data-language-name="Galician" >Galician - gl (Galego)</option>
                                    <option value="ka"{{ old('code') == "ka" ? 'selected' : '' }} data-language-name="Georgian" >Georgian - ka (ქართული)</option>
                                    <option value="de"{{ old('code') == "de" ? 'selected' : '' }} data-language-name="German" >German - de (Deutsch)</option>
                                    <option value="el"{{ old('code') == "el" ? 'selected' : '' }} data-language-name="Greek, Modern" >Greek, Modern - el (Ελληνικά)</option>
                                    <option value="gn"{{ old('code') == "gn" ? 'selected' : '' }} data-language-name="Guaraní" >Guaraní - gn (Avañeẽ)</option>
                                    <option value="gu"{{ old('code') == "gu" ? 'selected' : '' }} data-language-name="Gujarati" >Gujarati - gu (ગુજરાતી)</option>
                                    <option value="ht"{{ old('code') == "ht" ? 'selected' : '' }} data-language-name="Haitian; Haitian Creole" >Haitian; Haitian Creole - ht (Kreyòl ayisyen)</option>
                                    <option value="ha"{{ old('code') == "ha" ? 'selected' : '' }} data-language-name="Hausa" >Hausa - ha (Hausa, هَوُسَ)</option>
                                    <option value="he"{{ old('code') == "he" ? 'selected' : '' }} data-language-name="Hebrew (modern)" >Hebrew (modern) - he (עברית)</option>
                                    <option value="hz"{{ old('code') == "hz" ? 'selected' : '' }} data-language-name="Herero" >Herero - hz (Otjiherero)</option>
                                    <option value="hi"{{ old('code') == "hi" ? 'selected' : '' }} data-language-name="Hindi" >Hindi - hi (हिन्दी, हिंदी)</option>
                                    <option value="ho"{{ old('code') == "ho" ? 'selected' : '' }} data-language-name="Hiri Motu" >Hiri Motu - ho (Hiri Motu)</option>
                                    <option value="hu"{{ old('code') == "hu" ? 'selected' : '' }} data-language-name="Hungarian" >Hungarian - hu (Magyar)</option>
                                    <option value="ia"{{ old('code') == "ia" ? 'selected' : '' }} data-language-name="Interlingua" >Interlingua - ia (Interlingua)</option>
                                    <option value="id"{{ old('code') == "id" ? 'selected' : '' }} data-language-name="Indonesian" >Indonesian - id (Bahasa Indonesia)</option>
                                    <option value="ie"{{ old('code') == "ie" ? 'selected' : '' }} data-language-name="Interlingue" >Interlingue - ie (Originally called Occidental; then Interlingue after WWII)</option>
                                    <option value="ga"{{ old('code') == "ga" ? 'selected' : '' }} data-language-name="Irish" >Irish - ga (Gaeilge)</option>
                                    <option value="ig"{{ old('code') == "ig" ? 'selected' : '' }} data-language-name="Igbo" >Igbo - ig (Asụsụ Igbo)</option>
                                    <option value="ik"{{ old('code') == "ik" ? 'selected' : '' }} data-language-name="Inupiaq" >Inupiaq - ik (Iñupiaq, Iñupiatun)</option>
                                    <option value="io"{{ old('code') == "io" ? 'selected' : '' }} data-language-name="Ido" >Ido - io (Ido)</option>
                                    <option value="is"{{ old('code') == "is" ? 'selected' : '' }} data-language-name="Icelandic" >Icelandic - is (Íslenska)</option>
                                    <option value="it"{{ old('code') == "it" ? 'selected' : '' }} data-language-name="Italian" >Italian - it (Italiano)</option>
                                    <option value="iu"{{ old('code') == "iu" ? 'selected' : '' }} data-language-name="Inuktitut" >Inuktitut - iu (ᐃᓄᒃᑎᑐᑦ)</option>
                                    <option value="ja"{{ old('code') == "ja" ? 'selected' : '' }} data-language-name="Japanese" >Japanese - ja (日本語 (にほんご／にっぽんご))</option>
                                    <option value="jv"{{ old('code') == "jv" ? 'selected' : '' }} data-language-name="Javanese" >Javanese - jv (basa Jawa)</option>
                                    <option value="kl"{{ old('code') == "kl" ? 'selected' : '' }} data-language-name="Kalaallisut, Greenlandic" >Kalaallisut, Greenlandic - kl (kalaallisut, kalaallit oqaasii)</option>
                                    <option value="kn"{{ old('code') == "kn" ? 'selected' : '' }} data-language-name="Kannada" >Kannada - kn (ಕನ್ನಡ)</option>
                                    <option value="kr"{{ old('code') == "kr" ? 'selected' : '' }} data-language-name="Kanuri" >Kanuri - kr (Kanuri)</option>
                                    <option value="ks"{{ old('code') == "ks" ? 'selected' : '' }} data-language-name="Kashmiri" >Kashmiri - ks (कश्मीरी, كشميري‎)</option>
                                    <option value="kk"{{ old('code') == "kk" ? 'selected' : '' }} data-language-name="Kazakh" >Kazakh - kk (Қазақ тілі)</option>
                                    <option value="km"{{ old('code') == "km" ? 'selected' : '' }} data-language-name="Khmer" >Khmer - km (ភាសាខ្មែរ)</option>
                                    <option value="ki"{{ old('code') == "ki" ? 'selected' : '' }} data-language-name="Kikuyu, Gikuyu" >Kikuyu, Gikuyu - ki (Gĩkũyũ)</option>
                                    <option value="rw"{{ old('code') == "rw" ? 'selected' : '' }} data-language-name="Kinyarwanda" >Kinyarwanda - rw (Ikinyarwanda)</option>
                                    <option value="ky"{{ old('code') == "ky" ? 'selected' : '' }} data-language-name="Kirghiz, Kyrgyz" >Kirghiz, Kyrgyz - ky (кыргыз тили)</option>
                                    <option value="kv"{{ old('code') == "kv" ? 'selected' : '' }} data-language-name="Komi" >Komi - kv (коми кыв)</option>
                                    <option value="kg"{{ old('code') == "kg" ? 'selected' : '' }} data-language-name="Kongo" >Kongo - kg (KiKongo)</option>
                                    <option value="ko"{{ old('code') == "ko" ? 'selected' : '' }} data-language-name="Korean" >Korean - ko (한국어 (韓國語), 조선말 (朝鮮語))</option>
                                    <option value="ku"{{ old('code') == "ku" ? 'selected' : '' }} data-language-name="Kurdish" >Kurdish - ku (Kurdî, كوردی‎)</option>
                                    <option value="kj"{{ old('code') == "kj" ? 'selected' : '' }} data-language-name="Kwanyama, Kuanyama" >Kwanyama, Kuanyama - kj (Kuanyama)</option>
                                    <option value="la"{{ old('code') == "la" ? 'selected' : '' }} data-language-name="Latin" >Latin - la (latine, lingua latina)</option>
                                    <option value="lb"{{ old('code') == "lb" ? 'selected' : '' }} data-language-name="Luxembourgish, Letzeburgesch" >Luxembourgish, Letzeburgesch - lb (Lëtzebuergesch)</option>
                                    <option value="lg"{{ old('code') == "lg" ? 'selected' : '' }} data-language-name="Luganda" >Luganda - lg (Luganda)</option>
                                    <option value="li"{{ old('code') == "li" ? 'selected' : '' }} data-language-name="Limburgish, Limburgan, Limburger" >Limburgish, Limburgan, Limburger - li (Limburgs)</option>
                                    <option value="ln"{{ old('code') == "ln" ? 'selected' : '' }} data-language-name="Lingala" >Lingala - ln (Lingála)</option>
                                    <option value="lo"{{ old('code') == "lo" ? 'selected' : '' }} data-language-name="Lao" >Lao - lo (ພາສາລາວ)</option>
                                    <option value="lt"{{ old('code') == "lt" ? 'selected' : '' }} data-language-name="Lithuanian" >Lithuanian - lt (lietuvių kalba)</option>
                                    <option value="lu"{{ old('code') == "lu" ? 'selected' : '' }} data-language-name="Luba-Katanga" >Luba-Katanga - lu (        "nativeName":"")</option>
                                    <option value="lv"{{ old('code') == "lv" ? 'selected' : '' }} data-language-name="Latvian" >Latvian - lv (latviešu valoda)</option>
                                    <option value="gv"{{ old('code') == "gv" ? 'selected' : '' }} data-language-name="Manx" >Manx - gv (Gaelg, Gailck)</option>
                                    <option value="mk"{{ old('code') == "mk" ? 'selected' : '' }} data-language-name="Macedonian" >Macedonian - mk (македонски јазик)</option>
                                    <option value="mg"{{ old('code') == "mg" ? 'selected' : '' }} data-language-name="Malagasy" >Malagasy - mg (Malagasy fiteny)</option>
                                    <option value="ms"{{ old('code') == "ms" ? 'selected' : '' }} data-language-name="Malay" >Malay - ms (bahasa Melayu, بهاس ملايو‎)</option>
                                    <option value="ml"{{ old('code') == "ml" ? 'selected' : '' }} data-language-name="Malayalam" >Malayalam - ml (മലയാളം)</option>
                                    <option value="mt"{{ old('code') == "mt" ? 'selected' : '' }} data-language-name="Maltese" >Maltese - mt (Malti)</option>
                                    <option value="mi"{{ old('code') == "mi" ? 'selected' : '' }} data-language-name="Māori" >Māori - mi (te reo Māori)</option>
                                    <option value="mr"{{ old('code') == "mr" ? 'selected' : '' }} data-language-name="Marathi (Marāṭhī)" >Marathi (Marāṭhī) - mr (मराठी)</option>
                                    <option value="mh"{{ old('code') == "mh" ? 'selected' : '' }} data-language-name="Marshallese" >Marshallese - mh (Kajin M̧ajeļ)</option>
                                    <option value="mn"{{ old('code') == "mn" ? 'selected' : '' }} data-language-name="Mongolian" >Mongolian - mn (монгол)</option>
                                    <option value="na"{{ old('code') == "na" ? 'selected' : '' }} data-language-name="Nauru" >Nauru - na (Ekakairũ Naoero)</option>
                                    <option value="nv"{{ old('code') == "nv" ? 'selected' : '' }} data-language-name="Navajo, Navaho" >Navajo, Navaho - nv (Diné bizaad, Dinékʼehǰí)</option>
                                    <option value="nb"{{ old('code') == "nb" ? 'selected' : '' }} data-language-name="Norwegian Bokmål" >Norwegian Bokmål - nb (Norsk bokmål)</option>
                                    <option value="nd"{{ old('code') == "nd" ? 'selected' : '' }} data-language-name="North Ndebele" >North Ndebele - nd (isiNdebele)</option>
                                    <option value="ne"{{ old('code') == "ne" ? 'selected' : '' }} data-language-name="Nepali" >Nepali - ne (नेपाली)</option>
                                    <option value="ng"{{ old('code') == "ng" ? 'selected' : '' }} data-language-name="Ndonga" >Ndonga - ng (Owambo)</option>
                                    <option value="nn"{{ old('code') == "nn" ? 'selected' : '' }} data-language-name="Norwegian Nynorsk" >Norwegian Nynorsk - nn (Norsk nynorsk)</option>
                                    <option value="no"{{ old('code') == "no" ? 'selected' : '' }} data-language-name="Norwegian" >Norwegian - no (Norsk)</option>
                                    <option value="ii"{{ old('code') == "ii" ? 'selected' : '' }} data-language-name="Nuosu" >Nuosu - ii (ꆈꌠ꒿ Nuosuhxop)</option>
                                    <option value="nr"{{ old('code') == "nr" ? 'selected' : '' }} data-language-name="South Ndebele" >South Ndebele - nr (isiNdebele)</option>
                                    <option value="oc"{{ old('code') == "oc" ? 'selected' : '' }} data-language-name="Occitan" >Occitan - oc (Occitan)</option>
                                    <option value="oj"{{ old('code') == "oj" ? 'selected' : '' }} data-language-name="Ojibwe, Ojibwa" >Ojibwe, Ojibwa - oj (ᐊᓂᔑᓈᐯᒧᐎᓐ)</option>
                                    <option value="cu"{{ old('code') == "cu" ? 'selected' : '' }} data-language-name="Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic" >Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic - cu (ѩзыкъ словѣньскъ)</option>
                                    <option value="om"{{ old('code') == "om" ? 'selected' : '' }} data-language-name="Oromo" >Oromo - om (Afaan Oromoo)</option>
                                    <option value="or"{{ old('code') == "or" ? 'selected' : '' }} data-language-name="Oriya" >Oriya - or (ଓଡ଼ିଆ)</option>
                                    <option value="os"{{ old('code') == "os" ? 'selected' : '' }} data-language-name="Ossetian, Ossetic" >Ossetian, Ossetic - os (ирон æвзаг)</option>
                                    <option value="pa"{{ old('code') == "pa" ? 'selected' : '' }} data-language-name="Panjabi, Punjabi" >Panjabi, Punjabi - pa (ਪੰਜਾਬੀ, پنجابی‎)</option>
                                    <option value="pi"{{ old('code') == "pi" ? 'selected' : '' }} data-language-name="Pāli" >Pāli - pi (पाऴि)</option>
                                    <option value="fa"{{ old('code') == "fa" ? 'selected' : '' }} data-language-name="Persian" >Persian - fa (فارسی)</option>
                                    <option value="pl"{{ old('code') == "pl" ? 'selected' : '' }} data-language-name="Polish" >Polish - pl (polski)</option>
                                    <option value="ps"{{ old('code') == "ps" ? 'selected' : '' }} data-language-name="Pashto, Pushto" >Pashto, Pushto - ps (پښتو)</option>
                                    <option value="pt"{{ old('code') == "pt" ? 'selected' : '' }} data-language-name="Portuguese" >Portuguese - pt (Português)</option>
                                    <option value="qu"{{ old('code') == "qu" ? 'selected' : '' }} data-language-name="Quechua" >Quechua - qu (Runa Simi, Kichwa)</option>
                                    <option value="rm"{{ old('code') == "rm" ? 'selected' : '' }} data-language-name="Romansh" >Romansh - rm (rumantsch grischun)</option>
                                    <option value="rn"{{ old('code') == "rn" ? 'selected' : '' }} data-language-name="Kirundi" >Kirundi - rn (kiRundi)</option>
                                    <option value="ro"{{ old('code') == "ro" ? 'selected' : '' }} data-language-name="Romanian, Moldavian, Moldovan" >Romanian, Moldavian, Moldovan - ro (română)</option>
                                    <option value="ru"{{ old('code') == "ru" ? 'selected' : '' }} data-language-name="Russian" >Russian - ru (русский язык)</option>
                                    <option value="sa"{{ old('code') == "sa" ? 'selected' : '' }} data-language-name="Sanskrit (Saṁskṛta)" >Sanskrit (Saṁskṛta) - sa (संस्कृतम्)</option>
                                    <option value="sc"{{ old('code') == "sc" ? 'selected' : '' }} data-language-name="Sardinian" >Sardinian - sc (sardu)</option>
                                    <option value="sd"{{ old('code') == "sd" ? 'selected' : '' }} data-language-name="Sindhi" >Sindhi - sd (सिन्धी, سنڌي، سندھی‎)</option>
                                    <option value="se"{{ old('code') == "se" ? 'selected' : '' }} data-language-name="Northern Sami" >Northern Sami - se (Davvisámegiella)</option>
                                    <option value="sm"{{ old('code') == "sm" ? 'selected' : '' }} data-language-name="Samoan" >Samoan - sm (gagana faa Samoa)</option>
                                    <option value="sg"{{ old('code') == "sg" ? 'selected' : '' }} data-language-name="Sango" >Sango - sg (yângâ tî sängö)</option>
                                    <option value="sr"{{ old('code') == "sr" ? 'selected' : '' }} data-language-name="Serbian" >Serbian - sr (српски језик)</option>
                                    <option value="gd"{{ old('code') == "gd" ? 'selected' : '' }} data-language-name="Scottish Gaelic; Gaelic" >Scottish Gaelic; Gaelic - gd (Gàidhlig)</option>
                                    <option value="sn"{{ old('code') == "sn" ? 'selected' : '' }} data-language-name="Shona" >Shona - sn (chiShona)</option>
                                    <option value="si"{{ old('code') == "si" ? 'selected' : '' }} data-language-name="Sinhala, Sinhalese" >Sinhala, Sinhalese - si (සිංහල)</option>
                                    <option value="sk"{{ old('code') == "sk" ? 'selected' : '' }} data-language-name="Slovak" >Slovak - sk (slovenčina)</option>
                                    <option value="sl"{{ old('code') == "sl" ? 'selected' : '' }} data-language-name="Slovene" >Slovene - sl (slovenščina)</option>
                                    <option value="so"{{ old('code') == "so" ? 'selected' : '' }} data-language-name="Somali" >Somali - so (Soomaaliga, af Soomaali)</option>
                                    <option value="st"{{ old('code') == "st" ? 'selected' : '' }} data-language-name="Southern Sotho" >Southern Sotho - st (Sesotho)</option>
                                    <option value="es"{{ old('code') == "es" ? 'selected' : '' }} data-language-name="Spanish; Castilian" >Spanish; Castilian - es (español, castellano)</option>
                                    <option value="su"{{ old('code') == "su" ? 'selected' : '' }} data-language-name="Sundanese" >Sundanese - su (Basa Sunda)</option>
                                    <option value="sw"{{ old('code') == "sw" ? 'selected' : '' }} data-language-name="Swahili" >Swahili - sw (Kiswahili)</option>
                                    <option value="ss"{{ old('code') == "ss" ? 'selected' : '' }} data-language-name="Swati" >Swati - ss (SiSwati)</option>
                                    <option value="sv"{{ old('code') == "sv" ? 'selected' : '' }} data-language-name="Swedish" >Swedish - sv (svenska)</option>
                                    <option value="ta"{{ old('code') == "ta" ? 'selected' : '' }} data-language-name="Tamil" >Tamil - ta (தமிழ்)</option>
                                    <option value="te"{{ old('code') == "te" ? 'selected' : '' }} data-language-name="Telugu" >Telugu - te (తెలుగు)</option>
                                    <option value="tg"{{ old('code') == "tg" ? 'selected' : '' }} data-language-name="Tajik" >Tajik - tg (тоҷикӣ, toğikī, تاجیکی‎)</option>
                                    <option value="th"{{ old('code') == "th" ? 'selected' : '' }} data-language-name="Thai" >Thai - th (ไทย)</option>
                                    <option value="ti"{{ old('code') == "ti" ? 'selected' : '' }} data-language-name="Tigrinya" >Tigrinya - ti (ትግርኛ)</option>
                                    <option value="bo"{{ old('code') == "bo" ? 'selected' : '' }} data-language-name="Tibetan Standard, Tibetan, Central" >Tibetan Standard, Tibetan, Central - bo (བོད་ཡིག)</option>
                                    <option value="tk"{{ old('code') == "tk" ? 'selected' : '' }} data-language-name="Turkmen" >Turkmen - tk (Türkmen, Түркмен)</option>
                                    <option value="tl"{{ old('code') == "tl" ? 'selected' : '' }} data-language-name="Tagalog" >Tagalog - tl (Wikang Tagalog, ᜏᜒᜃᜅ᜔ ᜆᜄᜎᜓᜄ᜔)</option>
                                    <option value="tn"{{ old('code') == "tn" ? 'selected' : '' }} data-language-name="Tswana" >Tswana - tn (Setswana)</option>
                                    <option value="to"{{ old('code') == "to" ? 'selected' : '' }} data-language-name="Tonga (Tonga Islands)" >Tonga (Tonga Islands) - to (faka Tonga)</option>
                                    <option value="tr"{{ old('code') == "tr" ? 'selected' : '' }} data-language-name="Turkish" >Turkish - tr (Türkçe)</option>
                                    <option value="ts"{{ old('code') == "ts" ? 'selected' : '' }} data-language-name="Tsonga" >Tsonga - ts (Xitsonga)</option>
                                    <option value="tt"{{ old('code') == "tt" ? 'selected' : '' }} data-language-name="Tatar" >Tatar - tt (татарча, tatarça, تاتارچا‎)</option>
                                    <option value="tw"{{ old('code') == "tw" ? 'selected' : '' }} data-language-name="Twi" >Twi - tw (Twi)</option>
                                    <option value="ty"{{ old('code') == "ty" ? 'selected' : '' }} data-language-name="Tahitian" >Tahitian - ty (Reo Tahiti)</option>
                                    <option value="ug"{{ old('code') == "ug" ? 'selected' : '' }} data-language-name="Uighur, Uyghur" >Uighur, Uyghur - ug (Uyƣurqə, ئۇيغۇرچە‎)</option>
                                    <option value="uk"{{ old('code') == "uk" ? 'selected' : '' }} data-language-name="Ukrainian" >Ukrainian - uk (українська)</option>
                                    <option value="ur"{{ old('code') == "ur" ? 'selected' : '' }} data-language-name="Urdu" >Urdu - ur (اردو)</option>
                                    <option value="uz"{{ old('code') == "uz" ? 'selected' : '' }} data-language-name="Uzbek" >Uzbek - uz (zbek, Ўзбек, أۇزبېك‎)</option>
                                    <option value="ve"{{ old('code') == "ve" ? 'selected' : '' }} data-language-name="Venda" >Venda - ve (Tshivenḓa)</option>
                                    <option value="vi"{{ old('code') == "vi" ? 'selected' : '' }} data-language-name="Vietnamese" >Vietnamese - vi (Tiếng Việt)</option>
                                    <option value="vo"{{ old('code') == "vo" ? 'selected' : '' }} data-language-name="Volapük" >Volapük - vo (Volapük)</option>
                                    <option value="wa"{{ old('code') == "wa" ? 'selected' : '' }} data-language-name="Walloon" >Walloon - wa (Walon)</option>
                                    <option value="cy"{{ old('code') == "cy" ? 'selected' : '' }} data-language-name="Welsh" >Welsh - cy (Cymraeg)</option>
                                    <option value="wo"{{ old('code') == "wo" ? 'selected' : '' }} data-language-name="Wolof" >Wolof - wo (Wollof)</option>
                                    <option value="fy"{{ old('code') == "fy" ? 'selected' : '' }} data-language-name="Western Frisian" >Western Frisian - fy (Frysk)</option>
                                    <option value="xh"{{ old('code') == "xh" ? 'selected' : '' }} data-language-name="Xhosa" >Xhosa - xh (isiXhosa)</option>
                                    <option value="yi"{{ old('code') == "yi" ? 'selected' : '' }} data-language-name="Yiddish" >Yiddish - yi (ייִדיש)</option>
                                    <option value="yo"{{ old('code') == "yo" ? 'selected' : '' }} data-language-name="Yoruba" >Yoruba - yo (Yorùbá)</option>
                                    <option value="za"{{ old('code') == "za" ? 'selected' : '' }} data-language-name="Zhuang, Chuang" >Zhuang, Chuang - za (Saɯ cueŋƅ, Saw cuengh)</option>
                                </select>
                                @error('code') <span class="text-danger">{{ $message }}</span> <br> @enderror
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="layout" class="col-form-label">{{trans('labels.layout')}}</label>
                                <select name="layout" class="form-control layout-dropdown" id="layout">
                                    <option value="" selected>{{trans('labels.select')}}</option>
                                    <option value="1"{{ old('layout') == "1" ? 'selected' : '' }} >{{ trans('labels.ltr') }}</option>
                                    <option value="2"{{ old('layout') == "2" ? 'selected' : '' }} >{{ trans('labels.rtl') }}</option>
                                </select>
                                @error('layout') <br><span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="layout" class="col-form-label">{{trans('labels.image')}}</label>
                                <input type="file" class="form-control" name="image">
                                @error('image') <br><span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-sm-3">
                                <label class="form-label"
                                    for="">{{ trans('labels.default') }} </label>
                                <input id="default-switch" type="checkbox"
                                    class="checkbox-switch" name="default" value="1">
                                <label for="default-switch" class="switch">
                                    <span class="{{session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle'}}"><span
                                            class="switch__circle-inner"></span></span>
                                    <span class="switch__left {{session()->get('direction') == 2 ? 'pe-2' : 'ps-2'}}">{{ trans('labels.off') }}</span>
                                    <span class="switch__right {{session()->get('direction') == 2 ? 'ps-2' : 'pe-2'}}">{{ trans('labels.on') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{URL::to('admin/language-settings')}}" class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                        <button
                        @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                        class="btn btn-success btn-succes m-1">{{ trans('labels.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        "user strict";
        $(".code-dropdown").change(function () {
            $('#language').val($(this).find(':selected').attr('data-language-name'));
        }).change();
    });
</script>
@endsection