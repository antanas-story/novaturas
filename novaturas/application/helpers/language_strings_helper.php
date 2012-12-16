<?php

/**
 * Function returns all strings for all pages for the given language
 * @param String Possible values from raw.csv file (lt,en,ru,lv,ee)
 */
function getLanguageStrings($language = "lt") {
    global $languageStrings;
    if(empty($languageStrings[$language])) {
        $strings = array();

        $fh = fopen(APPPATH."/language/raw.csv", "r");
        $header = fgetcsv($fh);
        $langIndex = array_search(strtoupper($language), $header);
        while(($row = fgetcsv($fh)) !== FALSE) {
            $page = $row[0];
            $codename = $row[1];
            $strings[$page][$codename] = $row[$langIndex];
        }
        fclose($fh);

        return $strings;
    } else {
        return $languageStrings[$language];
    }
}
?>
