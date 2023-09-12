<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.languages')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card border-0 my-3">
            <div class="card-body">
                <form method="post" action="<?php echo e(URL::to('admin/language-settings/language/store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-3 col-md-12">
                            <div class="form-group mb-3">
                                <input type="hidden" name="name" id="language">
                                <label for="language" class="col-form-label"><?php echo e(trans('labels.languages')); ?></label>
                                <select name="code" class="form-control code-dropdown" id="code">
                                    <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                    <option value="ab"<?php echo e(old('code') == "ab" ? 'selected' : ''); ?> data-language-name="Abkhaz" >Abkhaz - ab (аҧсуа)</option>
                                    <option value="aa"<?php echo e(old('code') == "aa" ? 'selected' : ''); ?> data-language-name="Afar" >Afar - aa (Afaraf)</option>
                                    <option value="af"<?php echo e(old('code') == "af" ? 'selected' : ''); ?> data-language-name="Afrikaans" >Afrikaans - af (Afrikaans)</option>
                                    <option value="ak"<?php echo e(old('code') == "ak" ? 'selected' : ''); ?> data-language-name="Akan" >Akan - ak (Akan)</option>
                                    <option value="sq"<?php echo e(old('code') == "sq" ? 'selected' : ''); ?> data-language-name="Albanian" >Albanian - sq (Shqip)</option>
                                    <option value="am"<?php echo e(old('code') == "am" ? 'selected' : ''); ?> data-language-name="Amharic" >Amharic - am (አማርኛ)</option>
                                    <option value="ar"<?php echo e(old('code') == "ar" ? 'selected' : ''); ?> data-language-name="Arabic" >Arabic - ar (العربية)</option>
                                    <option value="an"<?php echo e(old('code') == "an" ? 'selected' : ''); ?> data-language-name="Aragonese" >Aragonese - an (Aragonés)</option>
                                    <option value="hy"<?php echo e(old('code') == "hy" ? 'selected' : ''); ?> data-language-name="Armenian" >Armenian - hy (Հայերեն)</option>
                                    <option value="as"<?php echo e(old('code') == "as" ? 'selected' : ''); ?> data-language-name="Assamese" >Assamese - as (অসমীয়া)</option>
                                    <option value="av"<?php echo e(old('code') == "av" ? 'selected' : ''); ?> data-language-name="Avaric" >Avaric - av (авар мацӀ, магӀарул мацӀ)</option>
                                    <option value="ae"<?php echo e(old('code') == "ae" ? 'selected' : ''); ?> data-language-name="Avestan" >Avestan - ae (avesta)</option>
                                    <option value="ay"<?php echo e(old('code') == "ay" ? 'selected' : ''); ?> data-language-name="Aymara" >Aymara - ay (aymar aru)</option>
                                    <option value="az"<?php echo e(old('code') == "az" ? 'selected' : ''); ?> data-language-name="Azerbaijani" >Azerbaijani - az (azərbaycan dili)</option>
                                    <option value="bm"<?php echo e(old('code') == "bm" ? 'selected' : ''); ?> data-language-name="Bambara" >Bambara - bm (bamanankan)</option>
                                    <option value="ba"<?php echo e(old('code') == "ba" ? 'selected' : ''); ?> data-language-name="Bashkir" >Bashkir - ba (башҡорт теле)</option>
                                    <option value="eu"<?php echo e(old('code') == "eu" ? 'selected' : ''); ?> data-language-name="Basque" >Basque - eu (euskara, euskera)</option>
                                    <option value="be"<?php echo e(old('code') == "be" ? 'selected' : ''); ?> data-language-name="Belarusian" >Belarusian - be (Беларуская)</option>
                                    <option value="bn"<?php echo e(old('code') == "bn" ? 'selected' : ''); ?> data-language-name="Bengali" >Bengali - bn (বাংলা)</option>
                                    <option value="bh"<?php echo e(old('code') == "bh" ? 'selected' : ''); ?> data-language-name="Bihari" >Bihari - bh (भोजपुरी)</option>
                                    <option value="bi"<?php echo e(old('code') == "bi" ? 'selected' : ''); ?> data-language-name="Bislama" >Bislama - bi (Bislama)</option>
                                    <option value="bs"<?php echo e(old('code') == "bs" ? 'selected' : ''); ?> data-language-name="Bosnian" >Bosnian - bs (bosanski jezik)</option>
                                    <option value="br"<?php echo e(old('code') == "br" ? 'selected' : ''); ?> data-language-name="Breton" >Breton - br (brezhoneg)</option>
                                    <option value="bg"<?php echo e(old('code') == "bg" ? 'selected' : ''); ?> data-language-name="Bulgarian" >Bulgarian - bg (български език)</option>
                                    <option value="my"<?php echo e(old('code') == "my" ? 'selected' : ''); ?> data-language-name="Burmese" >Burmese - my (ဗမာစာ)</option>
                                    <option value="ca"<?php echo e(old('code') == "ca" ? 'selected' : ''); ?> data-language-name="Catalan; Valencian" >Catalan; Valencian - ca (Català)</option>
                                    <option value="ch"<?php echo e(old('code') == "ch" ? 'selected' : ''); ?> data-language-name="Chamorro" >Chamorro - ch (Chamoru)</option>
                                    <option value="ce"<?php echo e(old('code') == "ce" ? 'selected' : ''); ?> data-language-name="Chechen" >Chechen - ce (нохчийн мотт)</option>
                                    <option value="ny"<?php echo e(old('code') == "ny" ? 'selected' : ''); ?> data-language-name="Chichewa; Chewa; Nyanja" >Chichewa; Chewa; Nyanja - ny (chiCheŵa, chinyanja)</option>
                                    <option value="zh"<?php echo e(old('code') == "zh" ? 'selected' : ''); ?> data-language-name="Chinese" >Chinese - zh (中文 (Zhōngwén), 汉语, 漢語)</option>
                                    <option value="cv"<?php echo e(old('code') == "cv" ? 'selected' : ''); ?> data-language-name="Chuvash" >Chuvash - cv (чӑваш чӗлхи)</option>
                                    <option value="kw"<?php echo e(old('code') == "kw" ? 'selected' : ''); ?> data-language-name="Cornish" >Cornish - kw (Kernewek)</option>
                                    <option value="co"<?php echo e(old('code') == "co" ? 'selected' : ''); ?> data-language-name="Corsican" >Corsican - co (corsu, lingua corsa)</option>
                                    <option value="cr"<?php echo e(old('code') == "cr" ? 'selected' : ''); ?> data-language-name="Cree" >Cree - cr (ᓀᐦᐃᔭᐍᐏᐣ)</option>
                                    <option value="hr"<?php echo e(old('code') == "hr" ? 'selected' : ''); ?> data-language-name="Croatian" >Croatian - hr (hrvatski)</option>
                                    <option value="cs"<?php echo e(old('code') == "cs" ? 'selected' : ''); ?> data-language-name="Czech" >Czech - cs (česky, čeština)</option>
                                    <option value="da"<?php echo e(old('code') == "da" ? 'selected' : ''); ?> data-language-name="Danish" >Danish - da (dansk)</option>
                                    <option value="dv"<?php echo e(old('code') == "dv" ? 'selected' : ''); ?> data-language-name="Divehi; Dhivehi; Maldivian;" >Divehi; Dhivehi; Maldivian; - dv (ދިވެހި)</option>
                                    <option value="nl"<?php echo e(old('code') == "nl" ? 'selected' : ''); ?> data-language-name="Dutch" >Dutch - nl (Nederlands, Vlaams)</option>
                                    <option value="en"<?php echo e(old('code') == "en" ? 'selected' : ''); ?> data-language-name="English" >English - en (English)</option>
                                    <option value="eo"<?php echo e(old('code') == "eo" ? 'selected' : ''); ?> data-language-name="Esperanto" >Esperanto - eo (Esperanto)</option>
                                    <option value="et"<?php echo e(old('code') == "et" ? 'selected' : ''); ?> data-language-name="Estonian" >Estonian - et (eesti, eesti keel)</option>
                                    <option value="ee"<?php echo e(old('code') == "ee" ? 'selected' : ''); ?> data-language-name="Ewe" >Ewe - ee (Eʋegbe)</option>
                                    <option value="fo"<?php echo e(old('code') == "fo" ? 'selected' : ''); ?> data-language-name="Faroese" >Faroese - fo (føroyskt)</option>
                                    <option value="fj"<?php echo e(old('code') == "fj" ? 'selected' : ''); ?> data-language-name="Fijian" >Fijian - fj (vosa Vakaviti)</option>
                                    <option value="fi"<?php echo e(old('code') == "fi" ? 'selected' : ''); ?> data-language-name="Finnish" >Finnish - fi (suomi, suomen kieli)</option>
                                    <option value="fr"<?php echo e(old('code') == "fr" ? 'selected' : ''); ?> data-language-name="French" >French - fr (français, langue française)</option>
                                    <option value="ff"<?php echo e(old('code') == "ff" ? 'selected' : ''); ?> data-language-name="Fula; Fulah; Pulaar; Pular" >Fula; Fulah; Pulaar; Pular - ff (Fulfulde, Pulaar, Pular)</option>
                                    <option value="gl"<?php echo e(old('code') == "gl" ? 'selected' : ''); ?> data-language-name="Galician" >Galician - gl (Galego)</option>
                                    <option value="ka"<?php echo e(old('code') == "ka" ? 'selected' : ''); ?> data-language-name="Georgian" >Georgian - ka (ქართული)</option>
                                    <option value="de"<?php echo e(old('code') == "de" ? 'selected' : ''); ?> data-language-name="German" >German - de (Deutsch)</option>
                                    <option value="el"<?php echo e(old('code') == "el" ? 'selected' : ''); ?> data-language-name="Greek, Modern" >Greek, Modern - el (Ελληνικά)</option>
                                    <option value="gn"<?php echo e(old('code') == "gn" ? 'selected' : ''); ?> data-language-name="Guaraní" >Guaraní - gn (Avañeẽ)</option>
                                    <option value="gu"<?php echo e(old('code') == "gu" ? 'selected' : ''); ?> data-language-name="Gujarati" >Gujarati - gu (ગુજરાતી)</option>
                                    <option value="ht"<?php echo e(old('code') == "ht" ? 'selected' : ''); ?> data-language-name="Haitian; Haitian Creole" >Haitian; Haitian Creole - ht (Kreyòl ayisyen)</option>
                                    <option value="ha"<?php echo e(old('code') == "ha" ? 'selected' : ''); ?> data-language-name="Hausa" >Hausa - ha (Hausa, هَوُسَ)</option>
                                    <option value="he"<?php echo e(old('code') == "he" ? 'selected' : ''); ?> data-language-name="Hebrew (modern)" >Hebrew (modern) - he (עברית)</option>
                                    <option value="hz"<?php echo e(old('code') == "hz" ? 'selected' : ''); ?> data-language-name="Herero" >Herero - hz (Otjiherero)</option>
                                    <option value="hi"<?php echo e(old('code') == "hi" ? 'selected' : ''); ?> data-language-name="Hindi" >Hindi - hi (हिन्दी, हिंदी)</option>
                                    <option value="ho"<?php echo e(old('code') == "ho" ? 'selected' : ''); ?> data-language-name="Hiri Motu" >Hiri Motu - ho (Hiri Motu)</option>
                                    <option value="hu"<?php echo e(old('code') == "hu" ? 'selected' : ''); ?> data-language-name="Hungarian" >Hungarian - hu (Magyar)</option>
                                    <option value="ia"<?php echo e(old('code') == "ia" ? 'selected' : ''); ?> data-language-name="Interlingua" >Interlingua - ia (Interlingua)</option>
                                    <option value="id"<?php echo e(old('code') == "id" ? 'selected' : ''); ?> data-language-name="Indonesian" >Indonesian - id (Bahasa Indonesia)</option>
                                    <option value="ie"<?php echo e(old('code') == "ie" ? 'selected' : ''); ?> data-language-name="Interlingue" >Interlingue - ie (Originally called Occidental; then Interlingue after WWII)</option>
                                    <option value="ga"<?php echo e(old('code') == "ga" ? 'selected' : ''); ?> data-language-name="Irish" >Irish - ga (Gaeilge)</option>
                                    <option value="ig"<?php echo e(old('code') == "ig" ? 'selected' : ''); ?> data-language-name="Igbo" >Igbo - ig (Asụsụ Igbo)</option>
                                    <option value="ik"<?php echo e(old('code') == "ik" ? 'selected' : ''); ?> data-language-name="Inupiaq" >Inupiaq - ik (Iñupiaq, Iñupiatun)</option>
                                    <option value="io"<?php echo e(old('code') == "io" ? 'selected' : ''); ?> data-language-name="Ido" >Ido - io (Ido)</option>
                                    <option value="is"<?php echo e(old('code') == "is" ? 'selected' : ''); ?> data-language-name="Icelandic" >Icelandic - is (Íslenska)</option>
                                    <option value="it"<?php echo e(old('code') == "it" ? 'selected' : ''); ?> data-language-name="Italian" >Italian - it (Italiano)</option>
                                    <option value="iu"<?php echo e(old('code') == "iu" ? 'selected' : ''); ?> data-language-name="Inuktitut" >Inuktitut - iu (ᐃᓄᒃᑎᑐᑦ)</option>
                                    <option value="ja"<?php echo e(old('code') == "ja" ? 'selected' : ''); ?> data-language-name="Japanese" >Japanese - ja (日本語 (にほんご／にっぽんご))</option>
                                    <option value="jv"<?php echo e(old('code') == "jv" ? 'selected' : ''); ?> data-language-name="Javanese" >Javanese - jv (basa Jawa)</option>
                                    <option value="kl"<?php echo e(old('code') == "kl" ? 'selected' : ''); ?> data-language-name="Kalaallisut, Greenlandic" >Kalaallisut, Greenlandic - kl (kalaallisut, kalaallit oqaasii)</option>
                                    <option value="kn"<?php echo e(old('code') == "kn" ? 'selected' : ''); ?> data-language-name="Kannada" >Kannada - kn (ಕನ್ನಡ)</option>
                                    <option value="kr"<?php echo e(old('code') == "kr" ? 'selected' : ''); ?> data-language-name="Kanuri" >Kanuri - kr (Kanuri)</option>
                                    <option value="ks"<?php echo e(old('code') == "ks" ? 'selected' : ''); ?> data-language-name="Kashmiri" >Kashmiri - ks (कश्मीरी, كشميري‎)</option>
                                    <option value="kk"<?php echo e(old('code') == "kk" ? 'selected' : ''); ?> data-language-name="Kazakh" >Kazakh - kk (Қазақ тілі)</option>
                                    <option value="km"<?php echo e(old('code') == "km" ? 'selected' : ''); ?> data-language-name="Khmer" >Khmer - km (ភាសាខ្មែរ)</option>
                                    <option value="ki"<?php echo e(old('code') == "ki" ? 'selected' : ''); ?> data-language-name="Kikuyu, Gikuyu" >Kikuyu, Gikuyu - ki (Gĩkũyũ)</option>
                                    <option value="rw"<?php echo e(old('code') == "rw" ? 'selected' : ''); ?> data-language-name="Kinyarwanda" >Kinyarwanda - rw (Ikinyarwanda)</option>
                                    <option value="ky"<?php echo e(old('code') == "ky" ? 'selected' : ''); ?> data-language-name="Kirghiz, Kyrgyz" >Kirghiz, Kyrgyz - ky (кыргыз тили)</option>
                                    <option value="kv"<?php echo e(old('code') == "kv" ? 'selected' : ''); ?> data-language-name="Komi" >Komi - kv (коми кыв)</option>
                                    <option value="kg"<?php echo e(old('code') == "kg" ? 'selected' : ''); ?> data-language-name="Kongo" >Kongo - kg (KiKongo)</option>
                                    <option value="ko"<?php echo e(old('code') == "ko" ? 'selected' : ''); ?> data-language-name="Korean" >Korean - ko (한국어 (韓國語), 조선말 (朝鮮語))</option>
                                    <option value="ku"<?php echo e(old('code') == "ku" ? 'selected' : ''); ?> data-language-name="Kurdish" >Kurdish - ku (Kurdî, كوردی‎)</option>
                                    <option value="kj"<?php echo e(old('code') == "kj" ? 'selected' : ''); ?> data-language-name="Kwanyama, Kuanyama" >Kwanyama, Kuanyama - kj (Kuanyama)</option>
                                    <option value="la"<?php echo e(old('code') == "la" ? 'selected' : ''); ?> data-language-name="Latin" >Latin - la (latine, lingua latina)</option>
                                    <option value="lb"<?php echo e(old('code') == "lb" ? 'selected' : ''); ?> data-language-name="Luxembourgish, Letzeburgesch" >Luxembourgish, Letzeburgesch - lb (Lëtzebuergesch)</option>
                                    <option value="lg"<?php echo e(old('code') == "lg" ? 'selected' : ''); ?> data-language-name="Luganda" >Luganda - lg (Luganda)</option>
                                    <option value="li"<?php echo e(old('code') == "li" ? 'selected' : ''); ?> data-language-name="Limburgish, Limburgan, Limburger" >Limburgish, Limburgan, Limburger - li (Limburgs)</option>
                                    <option value="ln"<?php echo e(old('code') == "ln" ? 'selected' : ''); ?> data-language-name="Lingala" >Lingala - ln (Lingála)</option>
                                    <option value="lo"<?php echo e(old('code') == "lo" ? 'selected' : ''); ?> data-language-name="Lao" >Lao - lo (ພາສາລາວ)</option>
                                    <option value="lt"<?php echo e(old('code') == "lt" ? 'selected' : ''); ?> data-language-name="Lithuanian" >Lithuanian - lt (lietuvių kalba)</option>
                                    <option value="lu"<?php echo e(old('code') == "lu" ? 'selected' : ''); ?> data-language-name="Luba-Katanga" >Luba-Katanga - lu (        "nativeName":"")</option>
                                    <option value="lv"<?php echo e(old('code') == "lv" ? 'selected' : ''); ?> data-language-name="Latvian" >Latvian - lv (latviešu valoda)</option>
                                    <option value="gv"<?php echo e(old('code') == "gv" ? 'selected' : ''); ?> data-language-name="Manx" >Manx - gv (Gaelg, Gailck)</option>
                                    <option value="mk"<?php echo e(old('code') == "mk" ? 'selected' : ''); ?> data-language-name="Macedonian" >Macedonian - mk (македонски јазик)</option>
                                    <option value="mg"<?php echo e(old('code') == "mg" ? 'selected' : ''); ?> data-language-name="Malagasy" >Malagasy - mg (Malagasy fiteny)</option>
                                    <option value="ms"<?php echo e(old('code') == "ms" ? 'selected' : ''); ?> data-language-name="Malay" >Malay - ms (bahasa Melayu, بهاس ملايو‎)</option>
                                    <option value="ml"<?php echo e(old('code') == "ml" ? 'selected' : ''); ?> data-language-name="Malayalam" >Malayalam - ml (മലയാളം)</option>
                                    <option value="mt"<?php echo e(old('code') == "mt" ? 'selected' : ''); ?> data-language-name="Maltese" >Maltese - mt (Malti)</option>
                                    <option value="mi"<?php echo e(old('code') == "mi" ? 'selected' : ''); ?> data-language-name="Māori" >Māori - mi (te reo Māori)</option>
                                    <option value="mr"<?php echo e(old('code') == "mr" ? 'selected' : ''); ?> data-language-name="Marathi (Marāṭhī)" >Marathi (Marāṭhī) - mr (मराठी)</option>
                                    <option value="mh"<?php echo e(old('code') == "mh" ? 'selected' : ''); ?> data-language-name="Marshallese" >Marshallese - mh (Kajin M̧ajeļ)</option>
                                    <option value="mn"<?php echo e(old('code') == "mn" ? 'selected' : ''); ?> data-language-name="Mongolian" >Mongolian - mn (монгол)</option>
                                    <option value="na"<?php echo e(old('code') == "na" ? 'selected' : ''); ?> data-language-name="Nauru" >Nauru - na (Ekakairũ Naoero)</option>
                                    <option value="nv"<?php echo e(old('code') == "nv" ? 'selected' : ''); ?> data-language-name="Navajo, Navaho" >Navajo, Navaho - nv (Diné bizaad, Dinékʼehǰí)</option>
                                    <option value="nb"<?php echo e(old('code') == "nb" ? 'selected' : ''); ?> data-language-name="Norwegian Bokmål" >Norwegian Bokmål - nb (Norsk bokmål)</option>
                                    <option value="nd"<?php echo e(old('code') == "nd" ? 'selected' : ''); ?> data-language-name="North Ndebele" >North Ndebele - nd (isiNdebele)</option>
                                    <option value="ne"<?php echo e(old('code') == "ne" ? 'selected' : ''); ?> data-language-name="Nepali" >Nepali - ne (नेपाली)</option>
                                    <option value="ng"<?php echo e(old('code') == "ng" ? 'selected' : ''); ?> data-language-name="Ndonga" >Ndonga - ng (Owambo)</option>
                                    <option value="nn"<?php echo e(old('code') == "nn" ? 'selected' : ''); ?> data-language-name="Norwegian Nynorsk" >Norwegian Nynorsk - nn (Norsk nynorsk)</option>
                                    <option value="no"<?php echo e(old('code') == "no" ? 'selected' : ''); ?> data-language-name="Norwegian" >Norwegian - no (Norsk)</option>
                                    <option value="ii"<?php echo e(old('code') == "ii" ? 'selected' : ''); ?> data-language-name="Nuosu" >Nuosu - ii (ꆈꌠ꒿ Nuosuhxop)</option>
                                    <option value="nr"<?php echo e(old('code') == "nr" ? 'selected' : ''); ?> data-language-name="South Ndebele" >South Ndebele - nr (isiNdebele)</option>
                                    <option value="oc"<?php echo e(old('code') == "oc" ? 'selected' : ''); ?> data-language-name="Occitan" >Occitan - oc (Occitan)</option>
                                    <option value="oj"<?php echo e(old('code') == "oj" ? 'selected' : ''); ?> data-language-name="Ojibwe, Ojibwa" >Ojibwe, Ojibwa - oj (ᐊᓂᔑᓈᐯᒧᐎᓐ)</option>
                                    <option value="cu"<?php echo e(old('code') == "cu" ? 'selected' : ''); ?> data-language-name="Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic" >Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic - cu (ѩзыкъ словѣньскъ)</option>
                                    <option value="om"<?php echo e(old('code') == "om" ? 'selected' : ''); ?> data-language-name="Oromo" >Oromo - om (Afaan Oromoo)</option>
                                    <option value="or"<?php echo e(old('code') == "or" ? 'selected' : ''); ?> data-language-name="Oriya" >Oriya - or (ଓଡ଼ିଆ)</option>
                                    <option value="os"<?php echo e(old('code') == "os" ? 'selected' : ''); ?> data-language-name="Ossetian, Ossetic" >Ossetian, Ossetic - os (ирон æвзаг)</option>
                                    <option value="pa"<?php echo e(old('code') == "pa" ? 'selected' : ''); ?> data-language-name="Panjabi, Punjabi" >Panjabi, Punjabi - pa (ਪੰਜਾਬੀ, پنجابی‎)</option>
                                    <option value="pi"<?php echo e(old('code') == "pi" ? 'selected' : ''); ?> data-language-name="Pāli" >Pāli - pi (पाऴि)</option>
                                    <option value="fa"<?php echo e(old('code') == "fa" ? 'selected' : ''); ?> data-language-name="Persian" >Persian - fa (فارسی)</option>
                                    <option value="pl"<?php echo e(old('code') == "pl" ? 'selected' : ''); ?> data-language-name="Polish" >Polish - pl (polski)</option>
                                    <option value="ps"<?php echo e(old('code') == "ps" ? 'selected' : ''); ?> data-language-name="Pashto, Pushto" >Pashto, Pushto - ps (پښتو)</option>
                                    <option value="pt"<?php echo e(old('code') == "pt" ? 'selected' : ''); ?> data-language-name="Portuguese" >Portuguese - pt (Português)</option>
                                    <option value="qu"<?php echo e(old('code') == "qu" ? 'selected' : ''); ?> data-language-name="Quechua" >Quechua - qu (Runa Simi, Kichwa)</option>
                                    <option value="rm"<?php echo e(old('code') == "rm" ? 'selected' : ''); ?> data-language-name="Romansh" >Romansh - rm (rumantsch grischun)</option>
                                    <option value="rn"<?php echo e(old('code') == "rn" ? 'selected' : ''); ?> data-language-name="Kirundi" >Kirundi - rn (kiRundi)</option>
                                    <option value="ro"<?php echo e(old('code') == "ro" ? 'selected' : ''); ?> data-language-name="Romanian, Moldavian, Moldovan" >Romanian, Moldavian, Moldovan - ro (română)</option>
                                    <option value="ru"<?php echo e(old('code') == "ru" ? 'selected' : ''); ?> data-language-name="Russian" >Russian - ru (русский язык)</option>
                                    <option value="sa"<?php echo e(old('code') == "sa" ? 'selected' : ''); ?> data-language-name="Sanskrit (Saṁskṛta)" >Sanskrit (Saṁskṛta) - sa (संस्कृतम्)</option>
                                    <option value="sc"<?php echo e(old('code') == "sc" ? 'selected' : ''); ?> data-language-name="Sardinian" >Sardinian - sc (sardu)</option>
                                    <option value="sd"<?php echo e(old('code') == "sd" ? 'selected' : ''); ?> data-language-name="Sindhi" >Sindhi - sd (सिन्धी, سنڌي، سندھی‎)</option>
                                    <option value="se"<?php echo e(old('code') == "se" ? 'selected' : ''); ?> data-language-name="Northern Sami" >Northern Sami - se (Davvisámegiella)</option>
                                    <option value="sm"<?php echo e(old('code') == "sm" ? 'selected' : ''); ?> data-language-name="Samoan" >Samoan - sm (gagana faa Samoa)</option>
                                    <option value="sg"<?php echo e(old('code') == "sg" ? 'selected' : ''); ?> data-language-name="Sango" >Sango - sg (yângâ tî sängö)</option>
                                    <option value="sr"<?php echo e(old('code') == "sr" ? 'selected' : ''); ?> data-language-name="Serbian" >Serbian - sr (српски језик)</option>
                                    <option value="gd"<?php echo e(old('code') == "gd" ? 'selected' : ''); ?> data-language-name="Scottish Gaelic; Gaelic" >Scottish Gaelic; Gaelic - gd (Gàidhlig)</option>
                                    <option value="sn"<?php echo e(old('code') == "sn" ? 'selected' : ''); ?> data-language-name="Shona" >Shona - sn (chiShona)</option>
                                    <option value="si"<?php echo e(old('code') == "si" ? 'selected' : ''); ?> data-language-name="Sinhala, Sinhalese" >Sinhala, Sinhalese - si (සිංහල)</option>
                                    <option value="sk"<?php echo e(old('code') == "sk" ? 'selected' : ''); ?> data-language-name="Slovak" >Slovak - sk (slovenčina)</option>
                                    <option value="sl"<?php echo e(old('code') == "sl" ? 'selected' : ''); ?> data-language-name="Slovene" >Slovene - sl (slovenščina)</option>
                                    <option value="so"<?php echo e(old('code') == "so" ? 'selected' : ''); ?> data-language-name="Somali" >Somali - so (Soomaaliga, af Soomaali)</option>
                                    <option value="st"<?php echo e(old('code') == "st" ? 'selected' : ''); ?> data-language-name="Southern Sotho" >Southern Sotho - st (Sesotho)</option>
                                    <option value="es"<?php echo e(old('code') == "es" ? 'selected' : ''); ?> data-language-name="Spanish; Castilian" >Spanish; Castilian - es (español, castellano)</option>
                                    <option value="su"<?php echo e(old('code') == "su" ? 'selected' : ''); ?> data-language-name="Sundanese" >Sundanese - su (Basa Sunda)</option>
                                    <option value="sw"<?php echo e(old('code') == "sw" ? 'selected' : ''); ?> data-language-name="Swahili" >Swahili - sw (Kiswahili)</option>
                                    <option value="ss"<?php echo e(old('code') == "ss" ? 'selected' : ''); ?> data-language-name="Swati" >Swati - ss (SiSwati)</option>
                                    <option value="sv"<?php echo e(old('code') == "sv" ? 'selected' : ''); ?> data-language-name="Swedish" >Swedish - sv (svenska)</option>
                                    <option value="ta"<?php echo e(old('code') == "ta" ? 'selected' : ''); ?> data-language-name="Tamil" >Tamil - ta (தமிழ்)</option>
                                    <option value="te"<?php echo e(old('code') == "te" ? 'selected' : ''); ?> data-language-name="Telugu" >Telugu - te (తెలుగు)</option>
                                    <option value="tg"<?php echo e(old('code') == "tg" ? 'selected' : ''); ?> data-language-name="Tajik" >Tajik - tg (тоҷикӣ, toğikī, تاجیکی‎)</option>
                                    <option value="th"<?php echo e(old('code') == "th" ? 'selected' : ''); ?> data-language-name="Thai" >Thai - th (ไทย)</option>
                                    <option value="ti"<?php echo e(old('code') == "ti" ? 'selected' : ''); ?> data-language-name="Tigrinya" >Tigrinya - ti (ትግርኛ)</option>
                                    <option value="bo"<?php echo e(old('code') == "bo" ? 'selected' : ''); ?> data-language-name="Tibetan Standard, Tibetan, Central" >Tibetan Standard, Tibetan, Central - bo (བོད་ཡིག)</option>
                                    <option value="tk"<?php echo e(old('code') == "tk" ? 'selected' : ''); ?> data-language-name="Turkmen" >Turkmen - tk (Türkmen, Түркмен)</option>
                                    <option value="tl"<?php echo e(old('code') == "tl" ? 'selected' : ''); ?> data-language-name="Tagalog" >Tagalog - tl (Wikang Tagalog, ᜏᜒᜃᜅ᜔ ᜆᜄᜎᜓᜄ᜔)</option>
                                    <option value="tn"<?php echo e(old('code') == "tn" ? 'selected' : ''); ?> data-language-name="Tswana" >Tswana - tn (Setswana)</option>
                                    <option value="to"<?php echo e(old('code') == "to" ? 'selected' : ''); ?> data-language-name="Tonga (Tonga Islands)" >Tonga (Tonga Islands) - to (faka Tonga)</option>
                                    <option value="tr"<?php echo e(old('code') == "tr" ? 'selected' : ''); ?> data-language-name="Turkish" >Turkish - tr (Türkçe)</option>
                                    <option value="ts"<?php echo e(old('code') == "ts" ? 'selected' : ''); ?> data-language-name="Tsonga" >Tsonga - ts (Xitsonga)</option>
                                    <option value="tt"<?php echo e(old('code') == "tt" ? 'selected' : ''); ?> data-language-name="Tatar" >Tatar - tt (татарча, tatarça, تاتارچا‎)</option>
                                    <option value="tw"<?php echo e(old('code') == "tw" ? 'selected' : ''); ?> data-language-name="Twi" >Twi - tw (Twi)</option>
                                    <option value="ty"<?php echo e(old('code') == "ty" ? 'selected' : ''); ?> data-language-name="Tahitian" >Tahitian - ty (Reo Tahiti)</option>
                                    <option value="ug"<?php echo e(old('code') == "ug" ? 'selected' : ''); ?> data-language-name="Uighur, Uyghur" >Uighur, Uyghur - ug (Uyƣurqə, ئۇيغۇرچە‎)</option>
                                    <option value="uk"<?php echo e(old('code') == "uk" ? 'selected' : ''); ?> data-language-name="Ukrainian" >Ukrainian - uk (українська)</option>
                                    <option value="ur"<?php echo e(old('code') == "ur" ? 'selected' : ''); ?> data-language-name="Urdu" >Urdu - ur (اردو)</option>
                                    <option value="uz"<?php echo e(old('code') == "uz" ? 'selected' : ''); ?> data-language-name="Uzbek" >Uzbek - uz (zbek, Ўзбек, أۇزبېك‎)</option>
                                    <option value="ve"<?php echo e(old('code') == "ve" ? 'selected' : ''); ?> data-language-name="Venda" >Venda - ve (Tshivenḓa)</option>
                                    <option value="vi"<?php echo e(old('code') == "vi" ? 'selected' : ''); ?> data-language-name="Vietnamese" >Vietnamese - vi (Tiếng Việt)</option>
                                    <option value="vo"<?php echo e(old('code') == "vo" ? 'selected' : ''); ?> data-language-name="Volapük" >Volapük - vo (Volapük)</option>
                                    <option value="wa"<?php echo e(old('code') == "wa" ? 'selected' : ''); ?> data-language-name="Walloon" >Walloon - wa (Walon)</option>
                                    <option value="cy"<?php echo e(old('code') == "cy" ? 'selected' : ''); ?> data-language-name="Welsh" >Welsh - cy (Cymraeg)</option>
                                    <option value="wo"<?php echo e(old('code') == "wo" ? 'selected' : ''); ?> data-language-name="Wolof" >Wolof - wo (Wollof)</option>
                                    <option value="fy"<?php echo e(old('code') == "fy" ? 'selected' : ''); ?> data-language-name="Western Frisian" >Western Frisian - fy (Frysk)</option>
                                    <option value="xh"<?php echo e(old('code') == "xh" ? 'selected' : ''); ?> data-language-name="Xhosa" >Xhosa - xh (isiXhosa)</option>
                                    <option value="yi"<?php echo e(old('code') == "yi" ? 'selected' : ''); ?> data-language-name="Yiddish" >Yiddish - yi (ייִדיש)</option>
                                    <option value="yo"<?php echo e(old('code') == "yo" ? 'selected' : ''); ?> data-language-name="Yoruba" >Yoruba - yo (Yorùbá)</option>
                                    <option value="za"<?php echo e(old('code') == "za" ? 'selected' : ''); ?> data-language-name="Zhuang, Chuang" >Zhuang, Chuang - za (Saɯ cueŋƅ, Saw cuengh)</option>
                                </select>
                                <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <br> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="layout" class="col-form-label"><?php echo e(trans('labels.layout')); ?></label>
                                <select name="layout" class="form-control layout-dropdown" id="layout">
                                    <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                    <option value="1"<?php echo e(old('layout') == "1" ? 'selected' : ''); ?> ><?php echo e(trans('labels.ltr')); ?></option>
                                    <option value="2"<?php echo e(old('layout') == "2" ? 'selected' : ''); ?> ><?php echo e(trans('labels.rtl')); ?></option>
                                </select>
                                <?php $__errorArgs = ['layout'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="layout" class="col-form-label"><?php echo e(trans('labels.image')); ?></label>
                                <input type="file" class="form-control" name="image">
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group col-sm-3">
                                <label class="form-label"
                                    for=""><?php echo e(trans('labels.default')); ?> </label>
                                <input id="default-switch" type="checkbox"
                                    class="checkbox-switch" name="default" value="1">
                                <label for="default-switch" class="switch">
                                    <span class="<?php echo e(session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle'); ?>"><span
                                            class="switch__circle-inner"></span></span>
                                    <span class="switch__left <?php echo e(session()->get('direction') == 2 ? 'pe-2' : 'ps-2'); ?>"><?php echo e(trans('labels.off')); ?></span>
                                    <span class="switch__right <?php echo e(session()->get('direction') == 2 ? 'ps-2' : 'pe-2'); ?>"><?php echo e(trans('labels.on')); ?></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="<?php echo e(URL::to('admin/language-settings')); ?>" class="btn btn-danger btn-cancel m-1"><?php echo e(trans('labels.cancel')); ?></a>
                        <button
                        <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                        class="btn btn-success btn-succes m-1"><?php echo e(trans('labels.save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function () {
        "user strict";
        $(".code-dropdown").change(function () {
            $('#language').val($(this).find(':selected').attr('data-language-name'));
        }).change();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/language/add.blade.php ENDPATH**/ ?>