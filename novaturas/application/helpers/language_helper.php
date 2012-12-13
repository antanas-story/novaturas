<?php

function isLanguage($lang) {
    $allowed = array("lt", "en", "ru", "ee", "lv");
    return in_array($lang, $allowed);
}
