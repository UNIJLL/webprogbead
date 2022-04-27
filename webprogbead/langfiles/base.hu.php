<?php if(!defined('BASE_PATH')) exit('No direct script access allowed');

$lang['dict_login'] = 'Bejelentkezés / Regisztráció';
$lang['dict_login2'] = 'Bejelentkezés';
$lang['dict_cancel'] = 'Mégsem';
$lang['dict_back'] = 'Vissza';
$lang['dict_!'] = 'Figyelem!';
$lang['dict_delete'] = 'Törlés';
$lang['dict_pwchange'] = 'Jelszó módosítása';
/*
$lang['dict_tables'] = 'Táblák';
$lang['dict_testdatagenerator'] = 'Tesztadat generátor';
$lang['dict_run_sqlOnScreen'] = 'A kijelöltek futtatása - SQL kód képernyőre';
$lang['dict_run_sqlFile'] = 'SQL fájlba';
$lang['dict_run_ExcelSheet'] = 'Excel fájlba';
$lang['dict_displayCode'] = 'Kód megjelenítése';
$lang['dict_copyToClipboard'] = 'Másolás a vágólapra';

$lang['dict_projects'] = 'Projektek és jogosultságok';
$lang['dict_renameProject'] = 'Projekt átnevezése';
$lang['dict_rename'] = 'Átnevezés';
$lang['dict_rename2'] = 'Kérem adja meg az új nevet:';
$lang['dict_editdatabase'] = 'Projekt adatbázis szerkesztése';
$lang['dict_userdeputy'] = 'Projekt felhasználó helyettesítések';
$lang['dict_noSelectedProject'] = 'Nincs projekt kiválasztva';

$lang['dict_lists'] = 'Listák szerkesztése';
$lang['dict_testdatalists'] = 'Tesztadat listák szerkesztése';

$lang['dict_unidata'] = 'Adatok áttekintése';
$lang['dict_unidata_view'] = 'Adatok megtekintése';
$lang['dict_unidata_edit'] = 'Adatok szerkesztése';
$lang['dict_unidata_approve'] = 'Adatok jóváhagyása';
$lang['dict_noData'] = 'Nincs megjeleníthető adat!';

$lang['databaseProperties_versions'] = 'Verziók száma';

$lang['inputProperties_dataType'] = 'Adattípus';
$lang['inputProperties_min'] = 'Min';
$lang['inputProperties_max'] = 'Max';
$lang['inputProperties_step'] = 'Lépés';
$lang['inputProperties_required'] = 'Kötelező kitölteni';
$lang['inputProperties_summary'] = 'Összefoglalóban látható';
$lang['inputProperties_versions'] = 'Verziózott';
$lang['inputProperties_tasklist'] = 'Feladatlista';

$lang['datatype_text'] = 'szöveg';
$lang['datatype_email'] = 'email';
$lang['datatype_filename'] = 'fájlnév';
$lang['datatype_int'] = 'egész szám';
$lang['datatype_float'] = 'lebegőpontos';
$lang['datatype_date'] = 'dátum';
$lang['datatype_datetime'] = 'dátum és időpont';
$lang['datatype_dateminutes'] = 'perc';

$lang['dict_list'] = 'Lista';
$lang['dict_listElementUsed'] = 'Egy vagy több listaelem használatban van, nem törölhető.';
$lang['dict_tableUsed'] = 'Egy vagy több kijelölés nem törölhető, mert a tábla már tartalmaz adatot!';
$lang['dict_languages'] = 'Nyelvek';
$lang['dict_menuAdmin'] = 'Admin';
$lang['dict_syslog'] = 'Rendszernapló';
$lang['dict_karbantartas'] = 'Karbantartás';
$lang['dict_dbdoksi'] = 'Adatbázis szerkezet yEd export';
$lang['dict_classdoksi'] = 'Class yEd export';
$lang['dict_phpinfo'] = 'PHP Info';
$lang['dict_datamenu'] = 'Adatkezelés';
$lang['dict_pwchange'] = 'Jelszó módosítása';
$lang['dict_useredit'] = 'Új felhasználó';
$lang['dict_masterdata'] = 'Törzsadatok';
$lang['dict_contents'] = 'Tartalom';
$lang['dict_email_lists'] = 'Levelezési listák';
$lang['dict_required'] = '(kötelező)';

$lang['dict_excelExport'] = 'Excel export';
$lang['dict_file'] = 'File';
$lang['dict_creator'] = 'Létrehozta';
$lang['dict_createTime'] = 'Létrehozás ideje';
$lang['dict_save'] = 'Mentés';
$lang['dict_settings'] = 'Beállítások';
$lang['dict_mainpage'] = 'Főoldal';
$lang['dict_saveSelectedButton'] = 'A kijelöltek mentése';
$lang['dict_deleteSelectedButton'] = 'A kijelöltek törlése';
$lang['dict_recSaveButton'] = 'Mentés';
$lang['dict_saveCashCodeButton'] = 'Mentés';
$lang['dict_orderSaved'] = 'A sorrendet rögzítettük.';
$lang['dict_continueButton'] = 'Tovább';
$lang['dict_deleteEditArea'] = 'A szerkesztő terület törlése';
$lang['dict_newRecButton'] = 'Mentés új recordként';
$lang['dict_updateButton'] = 'A módosítás mentése';
$lang['dict_freeButton'] = 'Mentés ajándék termékként';
$lang['dict_deleteButton'] = 'Törlés az inputból';
$lang['dict_deleteRecButton'] = 'A record törlése';
$lang['dict_deleteDbButton'] = 'Törlés az adatabázisból';
$lang['dict_saveToInput'] = 'Mentés az inputba';
$lang['dict_saveToDbButton'] = 'Mentés az adatbázisba';
$lang['dict_saveToNewButton'] = 'Az input felvétele új törzsrecordként és azonosítás';
$lang['dict_saveToNewButton2'] = 'Mentés új törzsrecordként és azonosítás';
$lang['dict_saveToBothButton'] = 'Törzsrecord frissítése és azonosítás';
$lang['dict_saveToResultButton'] = 'Törzsrecord azonosítása az inputtal';
$lang['dict_editSpecDictRecord'] = 'Speciális azonosítás, később foglalkozunk vele';
$lang['dict_approveButton'] = 'Jóváhagyás';
$lang['dict_approveSelectedButton'] = 'A kijelöltek jóváhagyása';
$lang['dict_saveToCashButton'] = 'Készpénzes vásárló';
$lang['dict_saveToSpecTermekButton1'] = 'Nem figyelt termék';
$lang['dict_saveToSpecTermekButton2'] = 'Merial termék';

$lang['dict_orderSave'] = 'A sorrend rögzítése';
$lang['dict_modify'] = 'Módosítás';
$lang['dict_delete'] = 'Törlés';
$lang['dict_loginName'] = 'Belépési azonosító';
$lang['dict_loginSuccess'] = 'Sikeresen<br>bejelentkezett!';
$lang['dict_userName'] = 'Bejelentkezési név';
$lang['dict_loginUser'] = 'Bejelentkezve';
$lang['dict_langcode'] = 'Alapértelmezett nyelv';
$lang['dict_countrycode'] = 'Alapértelmezett ország';
$lang['dict_active'] = 'Aktív';
$lang['dict_notactive'] = 'Inaktív';
$lang['dict_system'] = 'Rendszer';
$lang['dict_admin'] = 'Adminisztrátor';
$lang['dict_sysadmin'] = 'Rendszer adminisztrátor';
$lang['dict_phone'] = 'Telefon';
$lang['dict_upload'] = 'Feltöltés';
$lang['dict_download'] = 'Letöltés';
$lang['dict_selectFile'] = 'A file kiválasztása';
$lang['dict_name'] = 'Név';
$lang['dict_title'] = 'Cím';
$lang['dict_fullName'] = 'Teljes név';
$lang['dict_monogram'] = 'Monogram';
$lang['dict_pw'] = 'Jelszó';
$lang['dict_lastLogin'] = 'Utolsó bejelentkezés';
$lang['dict_logout'] = 'Kijelentkezés';
$lang['dict_processed'] = 'feldolgozva';
$lang['dict_notProcessed'] = 'nincs feldolgozva';
$lang['dict_comment'] = 'Megjegyzés';
$lang['dict_filters'] = 'Szűrőfeltételek';
$lang['dict_countries'] = 'Országok';
$lang['dict_countryrights'] = 'Országjogosultságok';
$lang['dict_noCountry'] = 'nincs engedélyezett ország';
$lang['dict_users'] = 'Felhasználók';
$lang['dict_user'] = 'Felhasználó';

$lang['dict_anyUser'] = 'bármelyik felhasználó';
$lang['dict_unknownUser'] = 'még nem azonosított felhasználó';

$lang['dict_table_id'] = 'record azonosító';
$lang['dict_notDefined'] = 'nincs megadva';
$lang['dict_restore'] = 'Visszaállítás';
$lang['dict_deleteBackup'] = 'Backup törlése';
$lang['dict_deleteUnidata'] = 'Unidata táblák törlése';
$lang['dict_column'] = 'Oszlop';
$lang['dict_id'] = 'Azonosító';

$lang['dict_month'] = 'Hónap';
$lang['dict_customer'] = 'Vevő';
$lang['dict_quantity'] = 'Mennyiség';
$lang['dict_all'] = 'Összes';

$lang['dict_delSure'] = 'Biztosan törölni akarja?';
$lang['dict_delSure2'] = 'A törlés visszavonására nincsen lehetőség!';
$lang['dict_delSucc'] = 'A törlés megtörtént.';
$lang['dict_deletedIdInOutput'] = 'Törölt azonosító a kimeneten';
$lang['dict_specIdInOutput'] = 'Speciális azonosító a kimeneten';

$lang['dict_pwChangeMsg1'] = 'Kötelező biztonsági előírás';
$lang['dict_pwChangeMsg2'] = 'Kérem változtassa meg lejárt jelszavát!';

$lang['dict_goodMorning'] = 'Jó reggelt';
$lang['dict_goodDay'] = 'Szép napot';
$lang['dict_goodEvening'] = 'Szép estét';
$lang['dict_udv'] = 'Üdvözlöm';

$lang['dict_yes'] = 'Igen';
$lang['dict_no'] = 'Nem';

$lang['dict_404'] = '404-es hiba';
$lang['dict_404_msg'] = 'A keresett oldal nem található.';

$lang['dict_convertOK'] = 'Az adatbevitel rendben befejeződött';
$lang['dict_collectingOutputData'] = 'Kimeneti adatok összegyűjtése: ';
$lang['dict_writingOutputFiles'] = 'Kimeneti adatállományok írása';

$lang['dict_dbProcess'] = 'Adatfeldolgozás és adatbázis műveletek';
$lang['dict_defSearchProcess'] = 'Az inputhoz tartozó definíció keresése';
$lang['dict_defGenProcess'] = 'Konverter definíció módosítása vagy létrehozása';
$lang['dict_pasteProcess'] = 'Adatbevitel vágólap segítségével';
$lang['dict_refresh'] = 'Az ablak frissítése';
$lang['dict_aiRefreshProcess'] = 'AI memória tanítása, frissítése';
$lang['dict_convertProcess'] = ' record konvertálása és ellenőrzése definíció szerint';
$lang['dict_dictProcess'] = ' db törzstábla kulcs azonosítása a szótárak segítségével';
$lang['dict_searchProcess'] = 'Információgyűjtés törzstábla kulcs azonosításhoz';
$lang['dict_postprocessing'] = 'Eredménytábla utófeldolgozása és ellenőrzése';
$lang['dict_finishCheck'] = 'Speciális kódok és törölt adatok ellenőrzése';
$lang['dict_getProductInfoForCheck'] = 'Termék ár információk kigyűjtése az ellenőrzéshez';
$lang['dict_emptyIdFieldCegUpdate'] = 'Üres bi_extid1 mezők szerepeltek a feldolgozott adatban, részletek az "emptyIdFieldCegUpdate" file-ban.';

$lang['dict_twoMinsLeft'] = 'Az idő két perc múlva lejár!';
$lang['dict_warnings'] = 'Figyelmeztetések';
$lang['dict_line'] = 'Sor';
$lang['dict_converted'] = 'Konv.';
$lang['dict_new'] = 'Új';
$lang['dict_old'] = 'Régi';
$lang['dict_inputData'] = 'Input';
$lang['dict_database'] = 'db';
$lang['dict_dataSaved'] = 'Az adatokat rögzítettük';

$lang['dict_dailyFirstWrite'] = 'napi első írási művelet';
$lang['dict_tableDelete'] = 'a tábla törlése';
$lang['dict_tableRestore'] = 'a tábla visszaállítása';

$lang['dict_pendingButton'] = 'A művelet felfüggesztése';
$lang['dict_noSelectMsg'] = 'Választania kell a listából!';
$lang['dict_newListItem'] = 'Új listaelem';

$lang['dict_selectAll'] = 'Az összes kijelölése';
$lang['dict_deselectAll'] = 'A kijelölések megszüntetése';

$lang['dict_scrollTop'] = 'Ugrás az oldal tetejére';

$lang['dict_everythingIsOk'] = 'Minden rendben.';
$lang['dict_validatorError'] = 'Adatbázis elutasítás';

$lang['dict_pendingTasks'] = 'Hátralévő feladatok száma';
$lang['dict_actualTask'] = 'Aktuális feladat';
$lang['dict_pleaseWait'] = 'Kis türelmet kérünk!';
$lang['dict_serverIsWorking'] = 'A szerver dolgozik.';

$lang['dict_permissonDeined'] = 'Tiltott hozzáférés!';
$lang['dict_permissonUpload'] = 'file-ok feltöltése';

$lang['dict_checker'] = 'ellenőrzés';
$lang['dict_datainput'] = 'adatbevitel';
$lang['dict_dataview'] = 'lekérdezés';
$lang['dict_contentadmin'] = 'tartalom szerkesztés';

$lang['dict_softDeleteButton'] = 'Töröltnek jelölés';
$lang['dict_hardDeleteButton'] = 'Végleges törlés';

$lang['dict_table'] = 'Tábla';
$lang['dict_Code'] = 'Kód';
$lang['dict_Details'] = 'Részletek';

$lang['dict_editButton'] = 'Szerkesztés';
$lang['dict_okButton'] = 'Rendben';
$lang['dict_reactivateButton'] = 'Újraaktiválás';

$lang['dict_permissionErr'] = 'Nincs megfelelő jogosultsága';
/**/