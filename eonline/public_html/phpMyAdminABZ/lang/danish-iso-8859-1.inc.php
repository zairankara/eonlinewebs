<?php
/* $Id: danish-iso-8859-1.inc.php,v 2.8.2.1 2004/01/29 14:34:04 lem9 Exp $ */

$charset = 'iso-8859-1';
$text_dir = 'ltr';
$left_font_family = 'verdana, arial, helvetica, geneva, sans-serif';
$right_font_family = 'arial, helvetica, geneva, sans-serif';
$number_thousands_separator = '.';
$number_decimal_separator = ',';

// shortcuts for Byte, Kilo, Mega, Giga, Tera, Peta, Exa
$byteUnits = array('Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB');

$day_of_week = array('S�n', 'Man', 'Tir', 'Ons', 'Tor', 'Fre', 'L�r');
$month = array('Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec');
// See http://www.php.net/manual/en/function.strftime.php
// to define the variable below
$datefmt = '%d/%m %Y kl. %H:%M:%S';
$timespanfmt = '%s dage, %s timer, %s minutter og %s sekunder';

$strAPrimaryKey = 'Der er f�jet en prim�r n�gle til %s';
$strAbortedClients = 'Afbrudt';
$strAbsolutePathToDocSqlDir = 'Indtast venligst absolut sti p� webserveren til docSQL mappen';
$strAccessDenied = 'Adgang N�gtet';
$strAccessDeniedExplanation = 'phpMyAdmin fors�gte at forbinde til MySQL-serveren, og serveren afviste forbindelsen. Du b�r tjekke host, brugernavn og kodeord i config.inc.php og sikre dig at de svarer til den information du har f�et af administratoren af MySQL-serveren.';
$strAction = 'Handling';
$strAddAutoIncrement = 'Tilf�j AUTO_INCREMENT v�rdi';
$strAddConstraints = 'Tilf�j begr�nsninger';
$strAddDeleteColumn = 'Tilf�j/Slet felt kolonne';
$strAddDeleteRow = 'Tilf�j/Slet kriterie r�kke';
$strAddDropDatabase = 'Tilf�j DROP DATABASE';
$strAddIntoComments = 'Tilf�j til kommentarer';
$strAddNewField = 'Tilf�j nyt felt';
$strAddPriv = 'Tilf�j nyt privilegium';
$strAddPrivMessage = 'Du har tilf�jet et nyt privilegium.';
$strAddPrivilegesOnDb = 'Tilf�j privilegier p� f�lgende database';
$strAddPrivilegesOnTbl = 'Tilf�j privileges p� f�lgende tabel';
$strAddSearchConditions = 'Tilf�j s�gekriterier (kroppen af "WHERE" s�tningen):';
$strAddToIndex = 'F�j til indeks &nbsp;%s&nbsp;kolonne(r)';
$strAddUser = 'Tilf�j en ny bruger';
$strAddUserMessage = 'Du har tilf�jet en ny bruger.';
$strAddedColumnComment = 'Tilf�jet kommentar for kolonne';
$strAddedColumnRelation = 'Tilf�jet relation for kolonne';
$strAdministration = 'Administration';
$strAffectedRows = 'Ber�rte r�kker:';
$strAfter = 'Efter %s';
$strAfterInsertBack = 'Retur';
$strAfterInsertNewInsert = 'Inds�t en ny record';
$strAll = 'Alle';
$strAllTableSameWidth = 'vis alle tabeller med samme bredde?';
$strAlterOrderBy = 'Arranger r�kkeorden efter';
$strAnIndex = 'Der er tilf�jet et indeks til %s';
$strAnalyzeTable = 'Analyser tabel';
$strAnd = 'Og';
$strAny = 'Enhver';
$strAnyColumn = 'Enhver kolonne';
$strAnyDatabase = 'Enhver database';
$strAnyHost = 'Enhver v�rt';
$strAnyTable = 'Enhver tabel';
$strAnyUser = 'Enhver bruger';
$strArabic = 'Arabisk';
$strArmenian = 'Armensk';
$strAscending = 'Stigende';
$strAtBeginningOfTable = 'I begyndelsen af tabel';
$strAtEndOfTable = 'I slutningen af tabel';
$strAttr = 'Attributter';
$strAutodetect = 'Fastsl� automatisk';
$strAutomaticLayout = 'Automatisk layout';

$strBack = 'Tilbage';
$strBaltic = 'Baltisk';
$strBeginCut = 'BEGYND KLIP';
$strBeginRaw = 'BEGYND R�';
$strBinary = ' Bin�rt ';
$strBinaryDoNotEdit = ' Bin�rt - m� ikke �ndres ';
$strBookmarkAllUsers = 'Lad alle brugere f� adgang til bogm�rket';
$strBookmarkDeleted = 'Bogm�rket er fjernet.';
$strBookmarkLabel = 'M�rke';
$strBookmarkOptions = 'Indstillinger for bogm�rke';
$strBookmarkQuery = 'SQL-foresp�rgsel med bogm�rke';
$strBookmarkThis = 'Lav bogm�rke til denne SQL-foresp�rgsel';
$strBookmarkView = 'Kun oversigt';
$strBrowse = 'Vis';
$strBrowseForeignValues = 'Bladr i udenlandske v�rdier';
$strBulgarian = 'Bulgarsk';
$strBzError = 'phpMyAdmin kunne ikke komprimere dumpet pga. en �delagt Bz2-udvidelse i denne php-version. Det anbefales st�rkt at s�tte <code>$cfg[\'BZipDump\']</code>-direktivet i din phpMyAdmin konfigurationsfil til <code>FALSE</code>. HVis du vil bruge Bz2 komprimeringsudvidelser, b�r du opdatere til en nyere php version. Se php bug report %s for detaljer.';
$strBzip = '"bzipped"';

$strCSVOptions = 'CSV indstillinger';
$strCannotLogin = 'Kan ikke logge ind p� MySQL-serveren';
$strCantLoad = 'kan ikke indl�se udvidelsen %s,<br />check PHP-konfigurationen!';
$strCantLoadMySQL = 'MySQL udvidelser kan ikke loades,<br />check PHP konfigurationen.';
$strCantLoadRecodeIconv = 'Kan ikke indl�se iconv eller omkode n�dvendig udvidelse til karakters�t-konvertering, konfigurer php til at tillade brug af disse udvidelser eller sl� karakters�t-konvertering fra i phpMyAdmin.';
$strCantRenameIdxToPrimary = 'Kan ikke omd�be indeks til PRIMARY!';
$strCantUseRecodeIconv = 'Kan ikke bruge iconv ejheller libiconv eller recode_string funktionen omend udvidelsen ser ud til at v�re indl�st. Check din php-konfiguration.';
$strCardinality = 'Kardinalitet';
$strCarriage = 'Carriage return: \\r';
$strCaseInsensitive = 'ingen forskel p� store/sm� bogstaver';
$strCaseSensitive = 'forskel p� store/sm� bogstaver';
$strCentralEuropean = 'Centraleurop�isk';
$strChange = '�ndre';
$strChangeCopyMode = 'Opret en bruger med samme privilegier og ...';
$strChangeCopyModeCopy = '... behold den gamle.';
$strChangeCopyModeDeleteAndReload = ' ... slet den gamle fra brugertabellerne og genindl�s privilegierne efterf�lgende.';
$strChangeCopyModeJustDelete = ' ... slet den gamle fra brugertabellerne.';
$strChangeCopyModeRevoke = ' ... tilbagekald alle aktive privilegier fra den gamle og slet den efterf�lgende.';
$strChangeCopyUser = 'Ret Login Information / Kopi�r bruger';
$strChangeDisplay = 'V�lg felt der skal vises';
$strChangePassword = '�ndre password';
$strCharset = 'Karakters�t';
$strCharsetOfFile = 'Karakters�t for filen:';
$strCharsets = 'Karakters�t';
$strCharsetsAndCollations = 'Karakters�t og kollationer (Collations)';
$strCheckAll = 'Afm�rk alt';
$strCheckDbPriv = 'Tjek database privilegier';
$strCheckOverhead = 'Mark�r tabeller med overhead';
$strCheckPrivs = 'Check Privilegier';
$strCheckPrivsLong = 'Check privilegier for database &quot;%s&quot;.';
$strCheckTable = 'Tjek tabel';
$strChoosePage = 'V�lg en side der skal redigeres';
$strColComFeat = 'Viser kolonne-kommentarer';
$strCollation = 'Kollation (Collation)';
$strColumn = 'Kolonne';
$strColumnNames = 'Kolonne navne';
$strColumnPrivileges = 'Kolonne-specifikke privilegier';
$strCommand = 'Kommando';
$strComments = 'Kommentarer';
$strCompleteInserts = 'Lav komplette inserts';
$strCompression = 'Komprimering';
$strConfigFileError = 'phpMyAdmin kunne ikke l�se din konfigurationsfil!<br />Dette kan ske hvis php finder en parser-fejl i den, eller php kan ikke finde filen.<br />Kald konfigurationsfilen direkte fra nedenst�ende link og l�s de(n) phpfejlmeddelse(r) du f�r. I de fleste tilf�lde mangler der et anf�rselstegn eller et semikolon et sted.<br />Hvis du f�r en blank side, er alt i orden.';
$strConfigureTableCoord = 'Konfigur�r venligst koordinaterne for tabel %s';
$strConfirm = 'Ikke du sikker p� at du vil g�re det?';
$strConnections = 'Forbindelser';
$strConstraintsForDumped = 'Begr�nsninger for dumpede tabeller';
$strConstraintsForTable = 'Begr�nsninger for tabel';
$strCookiesRequired = 'Herefter skal cookies v�re sat til.';
$strCopyTable = 'Kopier tabel til (database<b>.</b>tabel):';
$strCopyTableOK = 'Tabellen %s er nu kopieret til: %s.';
$strCopyTableSameNames = 'Kan ikke kopiere tabellen til den samme!';
$strCouldNotKill = 'phpMyAdmin kunne ikke dr�be tr�den %s. Den er sandsynligvis allerede lukket.';
$strCreate = 'Opret';
$strCreateIndex = 'Dan et indeks p�&nbsp;%s&nbsp;kolonner';
$strCreateIndexTopic = 'Lav et nyt indeks';
$strCreateNewDatabase = 'Opret ny database';
$strCreateNewTable = 'Opret ny tabel i database %s';
$strCreatePage = 'Opret en ny side';
$strCreatePdfFeat = 'Oprettelse af PDFer';
$strCreationDates = 'Oprettet/Opdateret/Check datoer';
$strCriteria = 'Kriterier';
$strCroatian = 'Kroatisk';
$strCyrillic = 'Kyrillisk';
$strCzech = 'Tjekkisk';
$strCzechSlovak = 'Tjekkisk-Slovakisk';

$strDBComment = 'Database kommentar: ';
$strDBGContext = 'Sammenh�ng';
$strDBGContextID = 'Sammenh�ng-ID';
$strDBGHits = 'Hits';
$strDBGLine = 'Linie';
$strDBGMaxTimeMs = 'Max tid, ms';
$strDBGMinTimeMs = 'Min tid, ms';
$strDBGModule = 'Modul';
$strDBGTimePerHitMs = 'Tid/Hit, ms';
$strDBGTotalTimeMs = 'Total tid, ms';
$strDanish = 'Dansk';
$strData = 'Data';
$strDataDict = 'Data Dictionary';
$strDataOnly = 'Kun data';
$strDatabase = 'Database: ';
$strDatabaseExportOptions = 'Database eksport indstillinger';
$strDatabaseHasBeenDropped = 'Database %s er slettet.';
$strDatabaseNoTable = 'Denne database indeholder ikke nogen tabel!';
$strDatabaseWildcard = 'Database (jokertegn tilladt):';
$strDatabases = 'Databaser';
$strDatabasesDropped = '%s databaser er blevet droppet korrekt.';
$strDatabasesStats = 'Database statistik';
$strDatabasesStatsDisable = 'Sl� Statistikker fra';
$strDatabasesStatsEnable = 'Sl� Statistikker til';
$strDatabasesStatsHeavyTraffic = 'Bem�rk: At sl� databasestatistikkerne til her kan for�rsage tung trafik mellem webserveren og MySQL-serveren.';
$strDbPrivileges = 'Database-specifikke privilegier';
$strDbSpecific = 'database-specifik';
$strDefault = 'Standardv�rdi';
$strDefaultValueHelp = 'For standardv�rdier, indtast venligst kun en enkelt v�rdi, uden backslash escaping eller quotes, ud fra f�lgende format: a';
$strDelOld = 'Nuv�rende side har referencer til tabeller der ikke l�ngere eksisterer. Vil du slette disse referencer?';
$strDelayedInserts = 'Brug forsinkede inds�ttelser';
$strDelete = 'Slet';
$strDeleteAndFlush = 'Slet brugerne og genindl�s privilegier bagefter.';
$strDeleteAndFlushDescr = 'Dette er den sikreste metode, men genindl�sning af privilegierne kan tage noget tid.';
$strDeleteFailed = 'Kan ikke slette!';
$strDeleteUserMessage = 'Du har slettet brugeren %s.';
$strDeleted = 'R�kken er slettet!';
$strDeletedRows = 'Slettede r�kker:';
$strDeleting = 'Sletter %s';
$strDescending = 'Faldende';
$strDescription = 'Beskrivelse';
$strDictionary = 'ordbog';
$strDisabled = 'Sl�et fra';
$strDisplay = 'Vis';
$strDisplayFeat = 'Vis muligheder';
$strDisplayOrder = 'R�kkef�lge af visning:';
$strDisplayPDF = 'Vis PDF skematik';
$strDoAQuery = 'K�r en foresp�rgsel p� felter (jokertegn: "%")';
$strDoYouReally = 'Er du sikker p� at du vil ';
$strDocu = 'Dokumentation';
$strDrop = 'Slet';
$strDropDB = 'Slet database %s';
$strDropSelectedDatabases = 'Drop (slet) valgte Databaser';
$strDropTable = 'Slet tabel';
$strDropUsersDb = 'Drop databaser der har samme navne som brugernes.';
$strDumpComments = 'Inklud�r kolonnekommentarer som inline SQL-kommentarer';
$strDumpSaved = 'Dump er blevet gemt i filen %s.';
$strDumpXRows = 'Dump %s r�kker startende med r�kke %s.';
$strDumpingData = 'Data dump for tabellen';
$strDynamic = 'dynamisk';

$strEdit = 'Ret';
$strEditPDFPages = 'Redig�r PDF-sider';
$strEditPrivileges = 'Ret privilegier';
$strEffective = 'Effektiv';
$strEmpty = 'T�m';
$strEmptyResultSet = 'MySQL returnerede ingen data (fx ingen r�kker).';
$strEnabled = 'Sl�et til';
$strEnd = 'Slut';
$strEndCut = 'SLUT KLIP';
$strEndRaw = 'SLUT R�';
$strEnglish = 'Engelsk';
$strEnglishPrivileges = ' NB: Navne p� MySQL privilegier er p� engelsk ';
$strError = 'Fejl';
$strEstonian = 'Estisk';
$strExcelEdition = 'Excel-udgave';
$strExcelOptions = 'Excel-indstillinger';
$strExecuteBookmarked = 'Udf�r foresp�rgsel iflg. bogm�rke';
$strExplain = 'Forklar SQL';
$strExport = 'Eksport';
$strExportToXML = 'Eksport�r til XML-format';
$strExtendedInserts = 'Udvidede inserts';
$strExtra = 'Ekstra';

$strFailedAttempts = 'Mislykkede fors�g';
$strField = 'Feltnavn';
$strFieldHasBeenDropped = 'Felt %s er slettet';
$strFields = 'Felter';
$strFieldsEmpty = ' Felttallet har ingen v�rdi! ';
$strFieldsEnclosedBy = 'Felter indrammet med';
$strFieldsEscapedBy = 'Felter escaped med';
$strFieldsTerminatedBy = 'Felter afsluttet med';
$strFileAlreadyExists = 'Filen %s findes allerede p� serveren, �ndr filnavn eller tillad at der overskrives.';
$strFileCouldNotBeRead = 'Filen kunne ikke l�ses';
$strFileNameTemplate = 'Skabelon for Filnavn';
$strFileNameTemplateHelp = 'Brug __DB__ for databasenavn, __TABLE__ for tabelnavn og %senhver strftime%s sammens�tning for tidsspecifikation, extension (filefternavn) tilf�jes automagisk. Al anden tekst bevares.';
$strFileNameTemplateRemember = 'husk skabelonen';
$strFixed = 'ordnet';
$strFlushPrivilegesNote = 'Bem�rk: phpMyAdmin henter brugernes privilegier direkte fra MySQL\'s privilegietabeller. Indholdet af disse tabeller kan v�re forskelligt fra privilegierne serveren bruger hvis der er lavet manuelle �ndringer i den. Hvis det er tilf�ldet, b�r du %sgenindl�se privilegierne%s f�r du forts�tter.';
$strFlushTable = 'Flush tabellen ("FLUSH")';
$strFormEmpty = 'Ingen v�rdi i formularen !';
$strFormat = 'Format';
$strFullText = 'Komplette tekster';
$strFunction = 'Funktion';

$strGenBy = 'Genereret af';
$strGenTime = 'Genereringstidspunkt';
$strGeneralRelationFeat = 'Generelle relationsmuligheder';
$strGeorgian = 'Georgisk';
$strGerman = 'Tysk';
$strGlobal = 'global';
$strGlobalPrivileges = 'Globale privilegier';
$strGlobalValue = 'Global v�rdi';
$strGo = 'Udf�r';
$strGrantOption = 'Tildel';
$strGrants = 'Tildelinger';
$strGreek = 'Gr�sk';
$strGzip = '"gzipped"';

$strHasBeenAltered = 'er �ndret.';
$strHasBeenCreated = 'er oprettet.';
$strHaveToShow = 'Du skal v�lge mindst en kolonne der skal vises';
$strHebrew = 'Hebr�isk';
$strHome = 'Hjem';
$strHomepageOfficial = 'Officiel phpMyAdmin hjemmeside ';
$strHomepageSourceforge = 'Ny phpMyAdmin hjemmeside ';
$strHost = 'V�rt';
$strHostEmpty = 'Der er intet v�rtsnavn!';
$strHungarian = 'Ungarsk';

$strId = 'ID'; 
$strIdxFulltext = 'Fuldtekst';
$strIfYouWish = 'Hvis du kun �nsker at importere nogle af tabellens kolonner, angives de med en kommasepareret felt liste.';
$strIgnore = 'Ignorer';
$strIgnoringFile = 'Ignorerer fil %s';
$strImportDocSQL = 'Importer docSQL Filer';
$strImportFiles = 'Import�r filer';
$strImportFinished = 'Import f�rdig';
$strInUse = 'i brug';
$strIndex = 'Indeks';
$strIndexHasBeenDropped = 'Indeks %s er blevet slettet';
$strIndexName = 'Indeks navn&nbsp;:';
$strIndexType = 'Indeks type&nbsp;:';
$strIndexes = 'Indekser';
$strInnodbStat = 'InnoDB Status';
$strInsecureMySQL = 'Din konfigurationsfil indeholder indstillinger (root og uden kodeord) som svarer til en standard MySQL priviligeret brugerkonto. Din MySQL server k�rer med denne standardindstilling, <u>er �ben for indtr�ngen</u>, og du b�r virkelig g�re noget ved dette sikkerhedshul.';
$strInsert = 'Inds�t';
$strInsertAsNewRow = 'Inds�t som ny r�kke';
$strInsertNewRow = 'Inds�t ny r�kke';
$strInsertTextfiles = 'Importer tekstfil til tabellen';
$strInsertedRowId = 'Indsat r�kke-id:';
$strInsertedRows = 'Indsatte r�kker:';
$strInstructions = 'Instruktioner';
$strInternalNotNecessary = '* En intern relation er ikke n�dvendig n�r den ogs� eksisterer i InnoDB.';
$strInternalRelations = 'Interne relationer';
$strInvalidName = '"%s" er et reserveret ord, du kan ikke bruge det som database-, tabel- eller feltnavn.';

$strJapanese = 'Japansk';
$strJumpToDB = 'Hop til database &quot;%s&quot;.';
$strJustDelete = 'Bare slet brugerne fra privilegietabellerne.';
$strJustDeleteDescr = 'De &quot;slettede&quot; brugere kan stadig tilg� serveren som de plejer indtil privilegierne genindl�ses.';

$strKeepPass = 'Password m� ikke �ndres';
$strKeyname = 'N�gle';
$strKill = 'Kill';
$strKorean = 'Koreansk';

$strLaTeX = 'LaTeX';
$strLaTeXOptions = 'LaTeX indstillinger';
$strLandscape = 'Liggende';
$strLatexCaption = 'Tabeloverskrift';
$strLatexContent = 'Indhold af tabel __TABLE__';
$strLatexContinued = '(forts�ttes)';
$strLatexContinuedCaption = 'Fortsat tabeloverskrift';
$strLatexIncludeCaption = 'Inkluder tabeloverskrift';
$strLatexLabel = 'M�rke n�gle';
$strLatexStructure = 'Struktur for tabel __TABLE__';
$strLength = 'L�ngde';
$strLengthSet = 'L�ngde/V�rdi*';
$strLimitNumRows = 'poster pr. side';
$strLineFeed = 'Linefeed: \\n';
$strLines = 'Linier';
$strLinesTerminatedBy = 'Linier afsluttet med';
$strLinkNotFound = 'Link ikke fundet';
$strLinksTo = 'Linker til';
$strLithuanian = 'Litauisk';
$strLoadExplanation = 'Den bedste metode er markeret som standard, men du kan �ndre den hvis det svigter.';
$strLoadMethod = 'LOAD metode';
$strLocalhost = 'Lokal';
$strLocationTextfile = 'Tekstfilens placering';
$strLogPassword = 'Password:';
$strLogServer = 'Server'; 
$strLogUsername = 'Brugernavn:';
$strLogin = 'Login';
$strLoginInformation = 'Login Information';
$strLogout = 'Log af';

$strMaximumSize = 'Maksimum st�rrelse: %s%s';
$strMIME_MIMEtype = 'MIME-type';
$strMIME_available_mime = 'Tilg�ngelige MIME-typer';
$strMIME_available_transform = 'Tilg�ngelige transformationer';
$strMIME_description = 'Beskrivelse';
$strMIME_file = 'Filnavn';
$strMIME_nodescription = 'Der er ingen beskrivelse af denne transformation.<br />Sp�rg venligst forfatteren, hvad %s g�r.';
$strMIME_transformation = 'Browser transformation';
$strMIME_transformation_options = 'Transformationsindstillinger';
$strMIME_transformation_options_note = 'Indtast v�rdier for transformationsindstillinger ud fra f�lgende format: \'a\',\'b\',\'c\'...<br />Skulle du f� brug for at inds�tte en backslash ("\") eller en apostrof ("\'") i v�rdierne, backslash det (for eksempel \'\\\\xyz\' eller \'a\\\'b\').';
$strMIME_transformation_note = 'For en liste over mulige transformationsindstillinger og deres MIME-type transformationer, klik p� %stransformationsbeskrivelser%s';
$strMIME_without = 'MIME-typer skrevet med kursiv har ikke en separat transformationsfunktion';
$strMissingBracket = 'Manglende Bracket';
$strModifications = 'Rettelserne er gemt!';
$strModify = 'Ret';
$strModifyIndexTopic = '�ndring af et indeks';
$strMoreStatusVars = 'Flere statusvariabler';
$strMoveTable = 'Flyt tabel til (database<b>.</b>tabel):';
$strMoveTableOK = 'Tabel %s er flyttet til %s.';
$strMoveTableSameNames = 'Kan ikke flytte tabellen til den samme!';
$strMultilingual = 'flersproget';
$strMustSelectFile = 'V�lg en fil du vil inds�tte.';
$strMySQLCharset = 'MySQL Karakters�t';
$strMySQLReloaded = 'MySQL genstartet.';
$strMySQLSaid = 'MySQL returnerede: ';
$strMySQLServerProcess = 'MySQL %pma_s1% k�rer p� %pma_s2% som %pma_s3%';
$strMySQLShowProcess = 'Vis tr�de';
$strMySQLShowStatus = 'Vis MySQL runtime information';
$strMySQLShowVars = 'Vis MySQL system variable';

$strName = 'Navn';
$strNext = 'N�ste';
$strNo = 'Nej';
$strNoDatabases = 'Ingen databaser';
$strNoDatabasesSelected = 'Ingen databaser valgt.';
$strNoDescription = 'ingen beskrivelse';
$strNoDropDatabases = '"DROP DATABASE" erkl�ringer kan ikke bruges.';
$strNoExplain = 'Spring over Forklar SQL';
$strNoFrames = 'phpMyAdmin er mere brugervenlig med en browser, der kan klare <b>frames</b>.';
$strNoIndex = 'Intet indeks defineret!';
$strNoIndexPartsDefined = 'Ingen dele af indeks er definerede!';
$strNoModification = 'Ingen �ndring';
$strNoOptions = 'Dette format har ingen indstillinger';
$strNoPassword = 'Intet password';
$strNoPermission = 'Webserveren har ikke tilladelse til at gemme filen %s.';
$strNoPhp = 'uden PHP-kode';
$strNoPrivileges = 'Ingen privilegier';
$strNoQuery = 'Ingen SQL foresp�rgsel!';
$strNoRights = 'Du har ikke tilstr�kkelige rettigheder til at v�re her!';
$strNoSpace = 'Utilstr�kkeligt plads til at gemme filen %s.';
$strNoTablesFound = 'Ingen tabeller fundet i databasen.';
$strNoUsersFound = 'Ingen bruger(e) fundet.';
$strNoUsersSelected = 'Ingen brugere valgt.';
$strNoValidateSQL = 'Spring over Valid�r SQL';
$strNone = 'Intet';
$strNotNumber = 'Dette er ikke et tal!';
$strNotOK = 'ikke OK';
$strNotSet = 'Tabel <b>%s</b> findes ikke eller er ikke sat i %s';
$strNotValidNumber = ' er ikke et gyldigt r�kkenummer!';
$strNull = 'Nulv�rdi';
$strNumSearchResultsInTable = '%s hit(s) i tabel <i>%s</i>';
$strNumSearchResultsTotal = '<b>Total:</b> <i>%s</i> hit(s)';
$strNumTables = 'Tabeller';

$strOK = 'OK';
$strOftenQuotation = 'Ofte anf�rselstegn. OPTIONALLY betyder at kun char og varchar felter er omsluttet med det valgte "tekstkvalifikator"-tegn.'; //skal muligvis �ndres
$strOperations = 'Operationer';
$strOptimizeTable = 'Optimer tabel';
$strOptionalControls = 'Valgfrit. Kontrollerer hvordan specialtegn skrives eller l�ses.';
$strOptionally = 'OPTIONALLY';
$strOptions = 'Indstillinger';
$strOr = 'Eller';
$strOverhead = 'Overhead';
$strOverwriteExisting = 'Overskriv eksisterende fil(er)';

$strPHP40203 = 'Du bruger PHP 4.2.3, som har en alvorlig fejl med multi-byte strenge (mbstring). Se PHP bug report 19404. Denne version af PHP kan ikke anbefales at bruge med phpMyAdmin.';
$strPHPVersion = 'PHP version';
$strPageNumber = 'Side nummer:';
$strPaperSize = 'Papirst�rrelse';
$strPartialText = 'Delvise tekster';
$strPassword = 'Password';
$strPasswordChanged = 'Kodeordet for %s blev korrekt udskiftet.';
$strPasswordEmpty = 'Der er ikke angivet noget password!';
$strPasswordNotSame = 'De to passwords er ikke ens!';
$strPdfDbSchema = 'Skematik for databasen "%s" - Side %s';
$strPdfInvalidPageNum = 'Udefineret PDF sidenummer!';
$strPdfInvalidTblName = 'Tabellen "%s" findes ikke!';
$strPdfNoTables = 'Ingen tabeller';
$strPerHour = 'pr. time';
$strPerMinute = 'pr minut';
$strPerSecond = 'pr sekund';
$strPhoneBook = 'telefonbog';
$strPhp = 'Fremstil PHP-kode';
$strPmaDocumentation = 'phpMyAdmin dokumentation';
$strPmaUriError = '<tt>$cfg[\'PmaAbsoluteUri\']</tt> direktivet SKAL v�re sat i konfigurationsfilen!';
$strPortrait = 'St�ende';
$strPos1 = 'Start';
$strPrevious = 'Forrige';
$strPrimary = 'Prim�r';
$strPrimaryKey = 'Prim�r n�gle';
$strPrimaryKeyHasBeenDropped = 'Prim�rn�glen er slettet';
$strPrimaryKeyName = 'Navnet p� prim�rn�glen skal v�re... PRIMARY!';
$strPrimaryKeyWarning = '("PRIMARY" <b>skal</b> v�re navnet p� og <b>kun p�</b> en prim�r n�gle!)';
$strPrint = 'Print';
$strPrintView = 'Vis (udskriftvenlig)';
$strPrintViewFull = 'Udskrift-visning (med fulde tekster)';
$strPrivDescAllPrivileges = 'Inkluderer alle privilegier p�n�r GRANT.';
$strPrivDescAlter = 'Tillader �ndring af strukturen p� eksisterende tabeller.';
$strPrivDescCreateDb = 'Tillader oprettelse af nye databaser og tabeller.';
$strPrivDescCreateTbl = 'Tillader oprettelse af nye tabeller.';
$strPrivDescCreateTmpTable = 'Tillader oprettelse af midlertidige tabeller.';
$strPrivDescDelete = 'Tillader sletning af data.';
$strPrivDescDropDb = 'Tillader at droppe databaser og tabeller.';
$strPrivDescDropTbl = 'Tillader at droppe tabeller.';
$strPrivDescExecute = 'Tillader k�rsel af gemte procedurer; Har ingen effekt i denne MySQL-version.';
$strPrivDescFile = 'Tillader import af data fra og eksport af data til filer.';
$strPrivDescGrant = 'Tillader oprettelse af brugere og privilegier uden at genindl�se privilegie-tabellerne.';
$strPrivDescIndex = 'Tillader at skabe og droppe indeks.';
$strPrivDescInsert = 'Tillader inds�ttelse og erstatning af data.';
$strPrivDescLockTables = 'Tillader l�sning af tabeller for nuv�rende tr�d.';
$strPrivDescMaxConnections = 'Begr�nser antallet af nye forbindelser brugeren m� �bne pr time.';
$strPrivDescMaxQuestions = 'Begr�nser antallet af foresp�rgsler brugeren m� sende til serveren pr time.';
$strPrivDescMaxUpdates = 'Begr�nser antallet af kommandoer som �ndrer enhver tabel eller database brugeren m� udf�re pr time.';
$strPrivDescProcess3 = 'Tillader at dr�be andre brugeres processer.';
$strPrivDescProcess4 = 'Tillader at se komplette foresp�rgsler i proceslisten.';
$strPrivDescReferences = 'Har ingen effekt i denne MySQL version.';
$strPrivDescReload = 'Tillader genindl�sning af serverindstillinger og t�mning af caches.';
$strPrivDescReplClient = 'Giver brugeren rettigheder til at sp�rge hvor Slaves / Masters er.';
$strPrivDescReplSlave = 'N�dvendigt for replikationsslaverne.';
$strPrivDescSelect = 'Tillader l�sning af data.';
$strPrivDescShowDb = 'Giver adgang til den fuldst�ndige liste over databaser.';
$strPrivDescShutdown = 'Tillader nedlukning af serveren.';
$strPrivDescSuper = 'Tillader forbindelse, selv hvis maksimalt antal forbindelser er n�et; N�dvendigt for de fleste administrative operationer som instilling af globale variabler eller dr�be andre brugeres tr�de.';
$strPrivDescUpdate = 'Tillader �ndring af data.';
$strPrivDescUsage = 'Ingen privilegier.';
$strPrivileges = 'Privilegier';
$strPrivilegesReloaded = 'Privilegierne blev korrekt genindl�st.';
$strProcesslist = 'Procesliste';
$strProperties = 'Egenskaber';
$strPutColNames = 'Inds�t feltnavne i f�rste r�kke';

$strQBE = 'Foresp. via eks.';
$strQBEDel = 'Del';
$strQBEIns = 'Ins';
$strQueryFrame = 'Foresp. vindue';
$strQueryFrameDebug = 'Debugging information';
$strQueryFrameDebugBox = 'Aktive variabler for foresp�rgsels-formularen:\nDB: %s\nTabel: %s\nServer: %s\n\nNuv�rende variabler for foresp�rgsels-formularen:\nDB: %s\nTabel: %s\nServer: %s\n\nOpener placering: %s\nFrameset placering: %s.';
$strQueryOnDb = 'SQL-foresp�rgsel til database <b>%s</b>:';
$strQuerySQLHistory = 'SQL-historik';
$strQueryStatistics = '<b>Foresp�rgselsstatistikker</b>: Siden opstarten er der blevet sendt %s foresp�rgsler til serveren.';
$strQueryTime = 'Forep�rgsel tog %01.4f sek';
$strQueryType = 'Foresp�rgselstype';
$strQueryWindowLock = 'Overskriv ikke denne foresp�rgsel fra udenfor vinduet';

$strReType = 'Skriv igen';
$strReceived = 'Modtaget';
$strRecords = 'Poster';
$strReferentialIntegrity = 'Check reference integriteten';
$strRelationNotWorking = 'De yderligere features for at arbejde med linkede tabeller er deaktiveret. For at se hvorfor, klik %sher%s.';
$strRelationView = 'Se Relationer';
$strRelationalSchema = 'Relationel skematik';
$strRelations = 'Relationer';
$strReloadFailed = 'Genstart af MySQL fejlede.';
$strReloadMySQL = 'Genstart MySQL';
$strReloadingThePrivileges = 'Genindl�s privilegierne';
$strRememberReload = 'Husk at indl�se serveren.';
$strRemoveSelectedUsers = 'Fjern valgte brugere';
$strRenameTable = 'Omd�b tabel til';
$strRenameTableOK = 'Tabellen %s er nu omd�bt til: %s';
$strRepairTable = 'Reparer tabel';
$strReplace = 'Erstat';
$strReplaceNULLBy = 'Erstat NULL med';
$strReplaceTable = 'Erstat data i tabellen med filens data';
$strReset = 'Nulstil';
$strResourceLimits = 'Ressourcebegr�nsninger';
$strRevoke = 'Tilbagekald';
$strRevokeAndDelete = 'Tilbagekald alle aktive privileiger fra brugerne og slet dem efterf�lgende.';
$strRevokeAndDeleteDescr = 'Brugerne vil stadig have USAGE privilegiet indtil privilegierne genindl�ses.';
$strRevokeGrant = 'Tilbagekald tildeling';
$strRevokeGrantMessage = 'Du har tilbagekaldt det tildelte privilegium for %s';
$strRevokeMessage = 'Du har tilbagekaldt privilegierne for %s';
$strRevokePriv = 'Tilbagekald privilegier';
$strRowLength = 'R�kke l�ngde';
$strRowSize = ' R�kke st�rrelse ';
$strRows = 'R�kker';
$strRowsFrom = 'r�kker startende fra';
$strRowsModeFlippedHorizontal = 'horisontalt (roterede overskrifter)';
$strRowsModeHorizontal = 'vandret';
$strRowsModeOptions = '%s og gentag overskrifter efter %s celler';
$strRowsModeVertical = 'lodret';
$strRowsStatistic = 'R�kke statistik';
$strRunQuery = 'Send foresp�rgsel';
$strRunSQLQuery = 'K�r SQL forsp�rgsel(er) p� database %s';
$strRunning = 'k�rer p� %s';
$strRussian = 'Russisk';

$strSQL = 'SQL';
$strSQLExportType = 'Eksporttype';
$strSQLOptions = 'SQL indstillinger';
$strSQLParserBugMessage = 'Det er muligt at du har fundet en fejl i SQL-parseren. Unders�g venligst din foresp�rgsel n�je, og check at anf�rselstegn er rigtige og ikke giver konflikter. Andre fejl�rsager kan v�re at du uploader en fil med bin�r udenfor et lukket tekstomr�de. Du kan ogs� pr�ve din foresp�rgsel i MySQL kommandolinie-interfacet. MySQL-serverens fejlmelding der f�lger herunder, hvis der er nogen, kan ogs� hj�lpe dig med at finde problemet. HVis du stadig har probemer eller hvis parseren fejler hvor kommandolinieinterfacet lykkes, reducer din SQL-foresp�rgselsinput til den ene foresp�rgsel der for�rsager problemet, og indsend en fejlrapport med datablokken i KLIP sektionen herunder:';
$strSQLParserUserError = 'Der ser ud til at v�re en fejl i din SQL-foresp�rgsel. MySQL-serverens fejlmelding der f�lger herunder, hvis der er nogen, kan ogs� hj�lpe dig med at finde problemet.';
$strSQLQuery = 'SQL-foresp�rgsel';
$strSQLResult = 'SQL resultat';
$strSQPBugInvalidIdentifer = 'Ugyldig Identifikator';
$strSQPBugUnclosedQuote = 'Ikke-lukket quote';
$strSQPBugUnknownPunctuation = 'Ukendt tegns�tnings-streng';
$strSave = 'Gem';
$strSaveOnServer = 'Gem p� serveren i mappen %s ';
$strScaleFactorSmall = 'Skaleringsfaktoren er for lille til at tilpasse skematikken til en side';
$strSearch = 'S�g';
$strSearchFormTitle = 'S�g i databasen';
$strSearchInTables = 'Indeni tabel(ler):';
$strSearchNeedle = 'Ord eller v�rdi(er) (jokertegn: "%"):';
$strSearchOption1 = 'mindst et af ordene';
$strSearchOption2 = 'alle ordene';
$strSearchOption3 = 'den n�jagtige s�tning';
$strSearchOption4 = 'som regul�rt udtryk';
$strSearchResultsFor = 'S�geresultater for "<i>%s</i>" %s:';
$strSearchType = 'Find:';
$strSecretRequired = 'Konfigurationsfilen skal nu bruge et hemmeligt kodeord (blowfish_secret).';
$strSelect = 'V�lg';
$strSelectADb = 'V�lg en database';
$strSelectAll = 'V�lg alle';
$strSelectFields = 'V�lg mindst eet felt:';
$strSelectNumRows = 'i foresp�rgsel';
$strSelectTables = 'V�lg Tabeller';       
$strSend = 'Send (download)';
$strSent = 'Sendt';
$strServer = 'Server %s';
$strServerChoice = 'Server valg';
$strServerStatus = 'Runtime Information';
$strServerStatusUptime = 'Denne MySQL-server har k�rt i %s. Den startede op den %s.';
$strServerTabProcesslist = 'Processer';
$strServerTabVariables = 'Variabler';
$strServerTrafficNotes = '<b>Servertraffik</b>: Disse tabeller viser netv�rkstrafik-statistikkerne for denne MySQL-server siden dens opstart.';
$strServerVars = 'Server-variabler og indstillinger';
$strServerVersion = 'Server version';
$strSessionValue = 'Sessionsv�rdi';
$strSetEnumVal = 'Hvis et felt er af typen "enum" eller "set", skal v�rdierne angives p� formen: \'a\',\'b\',\'c\'...<br />Skulle du f� brug for en backslash ("\") eller et enkelt anf�rselstegn ("\'") blandt disse v�rdier, s� tilf�j en ekstra backslash (fx \'\\\\xyz\' or \'a\\\'b\').';
$strShow = 'Vis';
$strShowAll = 'Vis alt';
$strShowColor = 'Vis farve';
$strShowCols = 'Vis kolonner';
$strShowDatadictAs = 'Data Dictionary format';
$strShowFullQueries = 'Vis fuldst�ndige foresp�rgsler';
$strShowGrid = 'Vis gitter';
$strShowPHPInfo = 'Vis PHP information';
$strShowTableDimension = 'Vis tabellernes dimensioner';
$strShowTables = 'Vis tabeller';
$strShowThisQuery = ' Vis foresp�rgslen her igen ';
$strShowingRecords = 'Viser poster ';
$strSimplifiedChinese = 'Simplifiveret Kinesisk';
$strSingly = '(enkeltvis)';
$strSize = 'St�rrelse';
$strSort = 'Sorter';
$strSortByKey = 'Sorteringsn�gle';
$strSpaceUsage = 'Pladsforbrug';
$strSplitWordsWithSpace = 'Ord adskilles af mellemrums-karakter (" ").';
$strStatCheckTime = 'Sidste check';
$strStatCreateTime = 'Oprettelse';
$strStatUpdateTime = 'Sidste opdatering';
$strStatement = 'Erkl�ringer';
$strStatus = 'Status';
$strStrucCSV = 'CSV-data';
$strStrucData = 'Struturen og data';
$strStrucDrop = 'Tilf�j \'DROP TABLE\'';
$strStrucExcelCSV = 'CSV til Ms Excel-data';
$strStrucOnly = 'Kun strukturen';
$strStructPropose = 'Foresl� tabelstruktur';
$strStructure = 'Struktur';
$strSubmit = 'Send';
$strSuccess = 'Din SQL-foresp�rgsel blev udf�rt korrekt';
$strSum = 'Sum';
$strSwedish = 'Svensk';
$strSwitchToTable = 'Skift til den kopierede tabel';

$strTable = 'Tabel';
$strTableComments = 'Tabel kommentarer';
$strTableEmpty = 'Intet tabelnavn!';
$strTableHasBeenDropped = 'Tabel %s er slettet';
$strTableHasBeenEmptied = 'Tabel %s er t�mt';
$strTableHasBeenFlushed = 'Tabel %s er blevet flushet';
$strTableMaintenance = 'Tabel vedligehold';
$strTableOfContents = 'Indholdsfortegnelse';
$strTableOptions = 'Tabel-indstillinger';
$strTableStructure = 'Struktur dump for tabellen';
$strTableType = 'Tabel type';
$strTables = '%s tabel(ler)';
$strTblPrivileges = 'Tabel-specifikke privilegier';
$strTextAreaLength = ' P� grund af feltets l�ngde,<br /> kan det muligvis ikke �ndres ';
$strThai = 'Thai';
$strTheContent = 'Filens indhold er importeret.';
$strTheContents = 'Filens indhold erstatter den valgte tabels r�kker for r�kker med identisk prim�r eller unik n�gle.';
$strTheTerminator = 'Felterne afgr�nses af dette tegn.';
$strThisHost = 'Denne Host';
$strThisNotDirectory = 'Dette var ikke en mappe';
$strThreadSuccessfullyKilled = 'Tr�d %s blev stoppet.';
$strTime = 'Tid';
$strToggleScratchboard = 'tegnebr�t til/fra';
$strTotal = 'total';
$strTotalUC = 'Total';
$strTraditionalChinese = 'Traditionelt Kinesisk';
$strTraffic = 'Trafik';
$strTransformation_application_octetstream__download = 'Viser et link til at downloade et felts bin�re data. F�rste mulighed er filnavnet p� den bin�re fil. Anden mulighed er et muligt feltnavn fra en tabelr�kke indeholdende filnavnet. Hvis du bruger anden mulighed, er feltet til den f�rste mulighed n�dt til at v�re sat til en tom streng.';
$strTransformation_text_plain__formatted = 'Bevarer original formattering af feltet. Der laves ikke nogen Escaping.';
$strTransformation_text_plain__unformatted = 'Viser HTML-kode som HTML-enheder. Der vises ingen HTML-formattering.';
$strTransformation_image_jpeg__link = 'Viser et link til dette billede (f.eks. direkte blob download).';
$strTransformation_image_jpeg__inline = 'Viser et klikbart minibilled; indstillinger: bredde,h�jde i pixel (bevarer det originale perspektiv)';
$strTransformation_image_png__inline = 'Se image/jpeg: inline';
$strTransformation_text_plain__dateformat = 'Tager et TIME, TIMESTAMP eller DATETIME-felt og formatterer det til dit lokale datoformat. F�rste parameter er offset (i timer) som l�gges til tidsstemplet (Default: 0). Andte parameter er et andet datoformat ud fra PHPs strftime() definition.';
$strTransformation_text_plain__substr = 'Viser kun en del af en streng. F�rste parameter er en offset for at definere hvor outputtet af din tekst starter (Default 0). Andet parameter er en offset for hvor meget tekst der returneres. Hvis tom returneres den tilbagev�rende tekst. Det tredie parameter definerer hvilke karakterer der skal f�jes til outputtet n�r en substring (understreng) returneres (Default: ...) .';
$strTransformation_text_plain__external = 'KUN LINUX: Starter en ekstern applikation og f�der feltdata via standard input. Returnerer standardoutputtet for applikationen. Default er Tidy, for korrekt printet HTML-kode. Af sikkerheds�rsager er du n�dt til manuelt at redigere filen libraries/transformations/text_plain__external.inc.php og inds�tte de v�rkt�jer du vil tillade k�rsel af. F�rste indstilling er s� nummeret p� det program du vil bruge og den anden indstilling er parametrene for det program. Tredie parameter, hvis sat til 1 vil konvertere outputtet vha. htmlspecialchars() (Default er 1). Et fjerde parameter, hvis sat til 1 vil s�tte et NOWRAP om cellens indhold s� hele outputtet bliver vist uden omformattering (Default 1)';
$strTransformation_text_plain__imagelink = 'Viser et billed og et link, feltet indeholder filnavnet; f�rste indstilling er et pr�fiks som "http://domain.com/", anden indstilling er bredde i pixel, tredie er h�jden.';
$strTransformation_text_plain__link = 'Viser et link, feltet indeholder filnavnet; f�rste indstilling er et pr�fiks som "http://domain.com/", anden indstilling er en titel p� linket.';
$strTruncateQueries = 'Trunk�r viste foresp�rgsler';
$strTurkish = 'Tyrkisk';
$strType = 'Datatype';                

$strUkrainian = 'Ukrainsk';
$strUncheckAll = 'Fjern alle m�rker';
$strUnicode = 'Unicode';
$strUnique = 'Unik';
$strUnknown = 'ukendt';
$strUnselectAll = 'Frav�lg alle';
$strUpdComTab = 'Se venligst Dokumentationen for oplysninger om hvordan du opdatere din Column_comments tabel';
$strUpdatePrivMessage = 'Du har opdateret privilegierne for %s.';
$strUpdateProfile = 'Opdater profil:';
$strUpdateProfileMessage = 'Profilen er blevet opdateret.';
$strUpdateQuery = 'Opdater foresp�rgsel';
$strUpgrade = 'Du burde opdatere til %s %s eller senere.';
$strUsage = 'Benyttelse';
$strUseBackquotes = 'Brug \'backquotes\' p� tabellers og felters navne';
$strUseHostTable = 'Brug Host Tabel';
$strUseTables = 'Benyt tabeller';
$strUseTextField = 'Brug tekstfelt';
$strUseThisValue = 'Brug denne v�rdi';
$strUser = 'Bruger';
$strUserAlreadyExists = 'Brugeren %s findes i forvejen!';
$strUserEmpty = 'Intet brugernavn!';
$strUserName = 'Brugernavn';
$strUserNotFound = 'Den valgte bruger blev ikke fundet i privilegietabellen.';
$strUserOverview = 'Brugeroversigt';
$strUsers = 'Brugere';
$strUsersDeleted = 'De valgte brugere er blevet korrekt slettet.';
$strUsersHavingAccessToDb = 'Brugere med adgang til &quot;%s&quot;';

$strValidateSQL = 'Valid�r SQL';
$strValidatorError = 'SQL-validatoren kunne ikke initialiseres. Check venligst at du har de n�dvendige php-udvidelser installeret som beskrevet i %sdokumentationen%s.';
$strValue = 'V�rdi';
$strVar = 'Variabel';
$strViewDump = 'Vis dump (skema) over tabel';
$strViewDumpDB = 'Vis dump (skema) af database';
$strViewDumpDatabases = 'Vis dump (skema) for databaser';

$strWebServerUploadDirectory = 'web-server upload mappe';
$strWebServerUploadDirectoryError = 'Mappen du har sat til upload-arbejde kan ikke findes';
$strWelcome = 'Velkommen til %s';
$strWestEuropean = 'Vesteurop�isk';
$strWildcard = 'jokertegn';
$strWindowNotFound = 'Det angivne browservindue kunne ikke opdateres. M�ske har du lukket det overliggende vindue eller din browser blokerer for tv�r-vindue opdateringer i sikkerhedsindstillingerne';
$strWithChecked = 'Med det markerede:';
$strWritingCommentNotPossible = 'Skrivning af kommentar ikke muligt';
$strWritingRelationNotPossible = 'Skrivning af relation ikke muligt';
$strWrongUser = 'Forkert brugernavn/kodeord. Adgang n�gtet.';

$strXML = 'XML';

$strYes = 'Ja';

$strZeroRemovesTheLimit = 'Bem�rk: Indstilling af disse v�rdier til 0 (nul) fjerner begr�nsningen.';
$strZip = '"zipped"';

?>
