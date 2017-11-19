-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(10) unsigned NOT NULL,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1,	'Frontend'),
(2,	'Backend'),
(3,	'Övrigt');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `category` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `posts` (`id`, `title`, `body`, `category`) VALUES
(267,	'HTML',	'Element:  Det man fÃ¶rsÃ¶ker strukturera eller mÃ¤rka upp. \r\nTaggar:  Det som avgÃ¶r bÃ¶rjan eller slutet pÃ¥ ett element. \r\n<br><br>\r\n Attribut â€”> id =\"headline\" : tilldelar taggar ytterligare vÃ¤rden som tillÃ¥ter elementet att Ã¤ndra sitt beteende pÃ¥ olika vis. \r\n<br><br>\r\n Document type declaration: < \"! DOCTYPE html\" > \r\n<br><br>\r\nFÃ¶r att webblÃ¤saren ska fÃ¶rstÃ¥ vad det Ã¤r fÃ¶r version av html den lÃ¤ser in sÃ¥ mÃ¥ste man alltid bÃ¶rja med att deklarera detta i toppen av html-dokumentet. \r\n<br>\r\n<br>\r\n HTML-element: <\"html\">\r\n<br>\r\n<br>\r\nDetta instruerar webblÃ¤saren att att det som Ã¤r innanfÃ¶r detta elementets taggar Ã¤r just html-markup. Root-elementet fÃ¶r ett HTML-dokument. \r\n<br><br>\r\n Head-elementet: <\"head\">\r\n<br><br>\r\nDen innehÃ¥ller ofta det man kallar fÃ¶r metadata om det nuvarande dokumentet. \r\n<br><br>\r\n Title-element:<\"title\">\r\n<br><br>\r\nTitel pÃ¥ html-dokumentet',	1),
(268,	'Responsiv design',	'Media queries - i css bara ett definitionsblock som ligger runt flera andra css regler. De slÃ¥r alltsÃ¥ inte igenom sÃ¥vida kraven i media-queryn alla Ã¤r sanna.\r\n<br><br>\r\nDet gÃ¥r att lÃ¤gga in mÃ¥nga olika media-querys efter varandra\r\n<br><br>\r\n Gridsystem och flexbox \r\n<br><br>\r\n Gridsystem Ã¤r ett tillvÃ¤gagÃ¥ngssÃ¤tt fÃ¶r att introducera en struktur i hur man kan stapla innehÃ¥ll bÃ¥de vertikalt och horisontellt pÃ¥ ett konsekvent och enkelt sÃ¤tt. \r\n\r\n- Ã¶kar produktiviteten\r\n- de Ã¤r allsidiga\r\n- de Ã¤r ideala fÃ¶r responsiva layouter\r\n\r\nInnehÃ¥ller tvÃ¥ nyckelkomponenter rader och kolumner. Vissa innehÃ¥ller Ã¤ven containers. \r\n\r\n- box-sizing property i css kan Ã¥terstÃ¤lla box-modellen. \r\n\r\n.row,\r\n.column {\r\nbox-sizing: border-box;\r\n}\r\n\r\n \"clearfix\" - ta bort floatproblem som kan uppstÃ¥.\r\n\r\n.row.before,\r\n.row.after {\r\n content: \" \";\r\n display: table;\r\n}\r\n\r\n.row.after {\r\n clear: both;\r\n}\r\n\r\n.column {\r\n position: relative;\r\n float: left;\r\n}',	1),
(270,	'TillgÃ¤nglighet inom webb',	'TillgÃ¤nglighet - accesabilty\r\n<br><br>\r\nA11y\r\n<br><br>\r\n- en satsning av open.source communityn flr att glra tillgÃ¤nglighetsanpassning fÃ¶r webbsidor och applikationer enklare.\r\n- listar mÃ¶nster fÃ¶r layout, verktyg, bÃ¶cker mm pÃ¥ ett och samma stÃ¤lle\r\n- Finns pÃ¥ github\r\n<br><br>\r\nAria och wai-aria\r\n<br><br>\r\n aria: beskriver en uppsÃ¤ttning av speciella tillgÃ¤nglighetsattribut som kan lÃ¤ggas till vilket mÃ¤rksprÃ¥k som helst men sÃ¤rskilt lÃ¤mpad fÃ¶r HTML. Attributet role def vad den allmÃ¤nna typen av objektet Ã¤r. \r\n<br><br>\r\n wai-aria: standardiserad samling av rekommendationer, tillvÃ¤gagÃ¥ngssÃ¤tt och verktyg som Ã¤r uppsatta av w3c.\r\n- tangentborsstÃ¶d\r\n- utÃ¶ka tillgÃ¤nglighetsinformationen som kan tillhandahÃ¥llas av fÃ¶rfattaren\r\n- fÃ¶rbÃ¤ttra tillgÃ¤ngligheten fÃ¶r dynamiskt innehÃ¥ll som genereras av skript\r\n-tillhandahÃ¥lla driftskompabilitet med hjÃ¤lpteknik.',	1),
(271,	' JavaScript / ECMAScript',	'KÃ¤llkod: uppsÃ¤ttning av instruktioner som sÃ¤ger till datorn vad fÃ¶r uppgifter den ska utfÃ¶ra. Regler fÃ¶r formattering och kombination av instruktioner kallas fÃ¶r ett datorsprÃ¥k, Ã¤ven kallat syntax. \r\n<br><br>\r\n- statement: grupp ord, nummer och operatorer.\r\n<br><br>\r\n a = b * 2;<br>\r\n a och b  representerar variabler som kan ses som lÃ¥dor i vilka man kan lagra vad man vill i. I program innehÃ¥ller variabler vÃ¤rden som kan anvÃ¤ndas av programmet.<br>\r\n\r\n 2:an i ex kallar man ett literal value eftersom det stÃ¥r fÃ¶r sig sjÃ¤lv utan att vara lagrat i en variabel. <br>\r\n = och * kallas fÃ¶r operatorer. De utfÃ¶r handlingar med variablerna. De flesta statements i JavaScript avslutas med ett semikolon;<br>\r\n<br>\r\n- expressions: statments bestÃ¥r av ett eller flera expressions. Ett expression Ã¤r en referens till en varibael eller ett vÃ¤rde.\r\n<br><br>\r\n a = b * 2; \r\n<br><br>\r\n2 - literal value expression<br>\r\nb - variabel expression<br>\r\nb * 2 - aritmatisk expression\r\n<br><br>\r\nFÃ¶r att fÃ¥ datorn att gÃ¶ra som vi vill mÃ¥ste vi exekvera programmet. Datorn har en interpreter eller en compiler och Ã¶versÃ¤tter koden till ett format som datorn fÃ¶rstÃ¥r.\r\n<br><br>\r\n Operatorer - anvÃ¤nds fÃ¶r att utfÃ¶ra Ã¤ndringar pÃ¥ variabler och vÃ¤rden. \r\n- assignment<br>\r\n- matematik<br>\r\n- compound assignment: += -= /=<br>\r\n- increment/decrement: ++/ - -<br>\r\n- object property access: . <br>\r\n- equality: == (loose-equals) === (strict equals) != (loose not-equals) !== (strict not-equals)<br>\r\n- comparison: < (mindre Ã¤n) <= (mindre Ã¤n eller lika med) >= (stÃ¶rre...)<br>\r\n- logical: && (and/och) || (or/eller) \r\n<br><br>\r\n\r\n Typer av variabel vÃ¤rden \r\n<br><br>\r\n1. string - fÃ¶r text<br>\r\n2. number - nummer<br>\r\n3. boolean - true/false<br>\r\n4. null - lik undefined - men explicit satt till null<br>\r\n5. undefined - gjort en lÃ¥da men inget intierat vÃ¤rde<br>\r\n6. object - typ som hÃ¤nvisar till en samling av properties dÃ¤r en property Ã¤r en association mellan ett namn (key) och ett vÃ¤rde.<br> \r\n7. symbol - anvÃ¤nds fÃ¶r att skapa egenskaper pÃ¥ objekt<br>\r\n<br><br>\r\nDet finns inbyggda vÃ¤rdemetoder i JavaScript, nÃ¥gra exempel: \r\n<br><br>\r\n.length : Hur mÃ¥nga bokstÃ¤ver/ord finns i variabeln \r\n<br><br>\r\n.toUpperCase : gÃ¶r om bokstÃ¤ver till versaler \r\n<br><br>\r\n.toFixed: avrundar vÃ¤rden\r\n<br><br>\r\nDet finns sÃ¤tt att jÃ¤mfÃ¶ra vÃ¤rden pÃ¥: equality (a == b; / a === b;) strict = samma typ av vÃ¤rde ocksÃ¥ inte bara implicit. Inequality (a < b; / b <c;) . Resultatet av en sÃ¥dan jÃ¤mfÃ¶relse Ã¤r alltid en boolean, oavsett vilka vÃ¤rden som jÃ¤mfÃ¶rs. \r\n<br><br>\r\n\r\nexplicit coercion : Man sÃ¤ger att man vill omvandla string till number. ex var b = number(a);\r\n<br><br>\r\nimplicit coercion : javascript omvandlar automatiskt string till nummer',	1),
(272,	'PHP',	'- Mest anvÃ¤nda i backend.\r\n<br><br>\r\nskriptsprÃ¥k som kan bÃ¤ddas in i HTML. Flexibelt sprÃ¥k som gÃ¥r att anvÃ¤nda i servern, i kommandotolken (terminalen) eller fÃ¶r att gÃ¶ra desktop applikationer. Brett stÃ¶d fÃ¶r olika typer av operativsystem, webbservrar och databaser.\r\n<br><br>\r\nFÃ¶r att skriva php-kod â€”> <?php och slutar med ?> . Det magiska med php Ã¤r att man kan blanda den med bÃ¥de HTML, CSS och javascript. \r\n<br><br>\r\ndatatyper - skalÃ¤ra\r\n<br><br>\r\n- boolean: true/false<br>\r\n- integers: numeriska vÃ¤rden utan decimalvÃ¤rde<br>\r\n- floating point numbers eller float - nr med decimal<br>\r\n- strings\r\n<br><br>\r\ndatatyper - sammansatta\r\n<br><br>\r\n- arrays<br>\r\n- objects<br>\r\n- callable - callbacks<br>\r\n- iterable - anvÃ¤nds fÃ¶r att iterera Ã¶ver dataset (kallas fÃ¶r pseudokod)',	2),
(273,	'Objekt i PHP',	'- endast relaterade till hur man strukturerar klasser och Ã¤r inte en datastruktur som vi definierar pÃ¥ samma sÃ¤tt som i tex JS\r\n<br><br>\r\nfunktionsargument:\r\n<br><br>\r\n- funktionen fÃ¥r in info till sig via argument<br>\r\n- det gÃ¥r att definiera mÃ¥nga eller inga<br>\r\n- argumentet behÃ¶ver ett namn fÃ¶r att kunna hÃ¤nvisas till i funktionskroppen<br>\r\n- endast kopior om man inte skickar argumentet med en referens (&$) inte bara vÃ¤rdet utan hela funktionen.\r\n<br><br>\r\nen funktion kan ha flera return statements. \r\n<br><br>\r\n- type hinting<br>\r\n- return type\r\n<br><br>\r\ndeclare(strict_types =1); [//Tar](//tar) man bort denna sÃ¥ fÃ¶rstÃ¥r PHP nÃ¤r det Ã¤r \'2\' istÃ¤llet fÃ¶r 2 annars mÃ¥ste den vara exakt. \r\n<br><br>\r\nfunction addNumbers (int $a, int $b, bool $sprintSum): int <â€” Visar att funktionen kommer returnera int\r\n<br><br>\r\nOptional parameters - sett argument till sant eller falskt och en if-sats i kroppen fÃ¶r att returnera vÃ¤rde. \r\n<br><br>\r\n- Inte stÃ¶d fÃ¶r overloaded functions<br>\r\n- argument till funktioner kan gÃ¶ras optional, men om de finns mÃ¥ste de skickas med nÃ¤r funktionen anropas, i korrekt ordning<br>\r\n- argument Ã¤r kopior by default<br>\r\n- return gÃ¶r att PHP hoppar ur en funktion och returnerar ett vÃ¤rde, kan vi hinta om bÃ¥de typer fÃ¶r argumenten men Ã¤ven typen fÃ¶r vad som returneras ifrÃ¥n en funktion.<br>',	2),
(274,	'MVC',	'Model view controller. FÃ¶r att ge mer struktur. Ett arkitetoniskt mÃ¶nster, hjÃ¤lper oss komma ifrÃ¥n problemet med att blanda HTML och PHP i en och samma fil. \r\n<br><br>\r\n- models: hanterar data<br>\r\n- views: innehÃ¥ller mallar fÃ¶r hur vÃ¥r data ska representeras visuellt (tex i HTML)<br>\r\n- controllers: hanterar och bearbetar requests, avgÃ¶r vilken data som ska anvÃ¤ndas och hur en lÃ¤mplig template ska renderas.\r\n<br><br>\r\nVi fÃ¶rlitar oss pÃ¥ http fÃ¶r requests och responses. $_GET och $_POST. -> dynamiskt istÃ¤llet fÃ¶r att behÃ¶va skriva flera gÃ¥nger.\r\n<br><br>\r\n$_SERVER global array som innehÃ¥ller domÃ¤nen och pathen. \r\n<br><br>\r\nControllers ansvarar fÃ¶r att hantera och bearbeta alla request, dÃ¤r en god praxis att gruppera dessa kring deras funktionalitet.. ex alla metoder som relaterar till requests som har med bÃ¶cker att gÃ¶ra lÃ¤gger vi tex i en BookController klass. Routes: beskrivning av fÃ¶rhÃ¥llandet mellan URL och controller.\r\n<br><br>\r\nRouter: centrala delen som avgÃ¶r vilken controller som ska kÃ¶ras beroende pÃ¥ vilken URL som requesten innehÃ¥ller. BehÃ¶ver gÃ¶ra 3 saker:\r\n<br><br>\r\n1. Matcha URL med regular expression.<br>\r\n2. Ta ut argument frÃ¥n en URL.<br>\r\n3. VÃ¤lja vilken kontroller som ska kÃ¶ras baserat pÃ¥ tillgÃ¤ngliga routes vi har definierat.',	2),
(275,	'Versionshantering (Git)',	'GitHub Ã¤r inte Git\r\n<br><br>\r\n Git begrepp:\r\n<br><br>\r\n1. init<br>\r\n2. staging area<br>\r\n3. status<br>\r\n4. add<br>\r\n5. commit<br>\r\n6. log<br>\r\n<br><br>\r\n5/9\r\n<br><br>\r\n1.  Clone . HÃ¤mtar en kopia av koden och all dess historik.<br>\r\n2.  Pull. HÃ¤mtar commits frÃ¥n ett remote repository.<br>\r\n3.  Diff. Visar vad och hur filer har Ã¤ndrats frÃ¥n en commit till en annan.<br>\r\n4.  Branch . En separat gren av ens nuvarande repository som innehÃ¥ller en full kopia av repot i sig. <br>\r\n5.  Merge . kombinera ens egna Ã¤ndringar med en annan utvecklares.',	3),
(276,	'Agila metoder (Scrum, Kanban, Extreme Programming)',	'Iterativt, flexibelt. Viktigt att man fokusera pÃ¥ rÃ¤tt sak, sÃ¥ man gÃ¶r minsta mÃ¶jliga och mest enkla lÃ¶sningen. \r\n<br><br>\r\n- Scrum - arbetar effektivt i intervall 2-3v, stannar upp - review av bestÃ¤llare\r\n<br><br>\r\n - planing<br>\r\n - retrospective reflektion av hur processen gÃ¥r.<br>\r\n Ex Kravspec spikas ej, backlog med punkter av innehÃ¥ll i ordning efter affÃ¤rsnytta, Ã¶ppet.\r\n<br><br>\r\nIstÃ¤llet fÃ¶r projektledare - scrum-master, en av personerna i teamet som har extra ansvar. Ska max ta 10% av tiden, ser till sÃ¥ att teamet fungerar. ProduktÃ¤gare ser till produktbacklog finns. Har kontakt med teamet, frÃ¤mst SM och har kontakt med kunden. Teamet har sin sprint backlog och bestÃ¤mmer Ã¶ver den. \r\n<br><br>\r\n\r\nIstÃ¤llet fÃ¶r att prata om timmar och dagar - poÃ¤ng som stÃ¥r fÃ¶r fÃ¶rhÃ¥llandet av storleken pÃ¥ arbetet. Summan av poÃ¤ng i varje sprint - arbetet. \r\n<br><br>\r\nAlla jobbar med samma story, viktigt att de Ã¶versta i BL blir fÃ¤rdiga fÃ¶rst sÃ¥ man kan presentera resultat. \r\n<br><br>\r\nChecklista pÃ¥ DOD, nÃ¤r de har gÃ¥tts igenom sÃ¥ Ã¤r man klar, dÃ¥ forsÃ¤tter man inte jobba med storyn. Daily scrum, team tar 5 min och gÃ¥r igenom vad har jag gjort, vad ska jag gÃ¶ra, vad finns det fÃ¶r hinder sÃ¥ man kan se om man kan hjÃ¤lpas Ã¥t med nÃ¥got och sÃ¥ att man fÃ¥r en Ã¶verblick. \r\n<br><br>\r\n- Kanban<br>\r\n- LEAN<br>\r\n- Extreme programming - hur programmerare arbetar mest effektivt.',	3),
(277,	'Personas och mÃ¥lgruppsanalys',	'Personas underlÃ¤ttar fÃ¶r dseigners att skapa olika designfÃ¶rslag fÃ¶r specifika personas, snarare Ã¤n att tÃ¤nka fÃ¶r \"alla\". \r\n<br><br>\r\n- Ofta ett dokument A4 eller A3<br>\r\n- sÃ¤llan mer Ã¤n en sida<br>\r\n- fokus Ã¤r inte dokumentet i sig utan fÃ¶rstÃ¥elsen av anvÃ¤ndaren och dess Ã¶nskemÃ¥l, behov, karaktÃ¤rsdrag och andra egenskaper.\r\n<br><br>\r\nAlan Cooper <â€”\r\n<br><br>\r\n1. intervjuer - representativa mÃ¤nniskor.<br>\r\n2. hitta mÃ¶nster i intervjuobjektens svar och handlingar, grupperar efter dessa.<br>\r\n3. skapa arketyper (personas) fÃ¶r dessa grupper.<br>\r\n4. frÃ¥n fÃ¶rstÃ¥elsen av dessa anvÃ¤ndare och modellen av den fÃ¶rstÃ¥elsen sÃ¥ skapas anvÃ¤ndarspecifika designfÃ¶rslag.<br>\r\n5. modeller, antaganden, fÃ¶rundersÃ¶kningar delas och nyttjas av andra gruppmedlemmar och projektÃ¤gare.',	3);

DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE `post_tags` (
  `posts_id` int(10) unsigned NOT NULL,
  `tags_id` int(10) unsigned NOT NULL,
  KEY `tags_id` (`tags_id`),
  KEY `posts_id` (`posts_id`),
  CONSTRAINT `post_tags_ibfk_3` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_tags_ibfk_2` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `post_tags` (`posts_id`, `tags_id`) VALUES
(267,	1),
(268,	2),
(270,	1),
(271,	3),
(272,	6),
(273,	6),
(274,	6),
(275,	8),
(276,	7),
(277,	5);

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `tag_id` int(10) unsigned NOT NULL,
  `tag_name` varchar(30) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1,	'HTML'),
(2,	'CSS'),
(3,	'JavaScript'),
(4,	'Avancerad JavaScript'),
(5,	'UX & Design'),
(6,	'PHP'),
(7,	'Projektmetodik'),
(8,	'Programmeringsmetodik');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `firstname`, `surname`, `email`, `password`) VALUES
(1,	'Eleni',	'Nikou',	'eleni.nikou@chasacademy.se',	'');

-- 2017-11-19 21:25:30
