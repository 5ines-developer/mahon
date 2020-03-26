/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.plugins =
        'about,' +
        'a11yhelp,' +
        'basicstyles,' +
        'bidi,' +
        'blockquote,' +
        'clipboard,' +
        'colorbutton,' +
        'colordialog,' +
        'copyformatting,' +
        'contextmenu,' +
        'dialogadvtab,' +
        'div,' +
        'elementspath,' +
        'enterkey,' +
        'entities,' +
        'filebrowser,' +
        'find,' +
        'flash,' +
        'floatingspace,' +
        'font,' +
        'format,' +
        'forms,' +
        'horizontalrule,' +
        'htmlwriter,' +
        'image,' +
        'iframe,' +
        'indentlist,' +
        'indentblock,' +
        'justify,' +
        'language,' +
        'link,' +
        'list,' +
        'liststyle,' +
        'magicline,' +
        'maximize,' +
        'newpage,' +
        'pagebreak,' +
        'pastefromgdocs,' +
        'pastefromword,' +
        'pastetext,' +
        'preview,' +
        'print,' +
        'removeformat,' +
        'resize,' +
        'save,' +
        'selectall,' +
        'showblocks,' +
        'showborders,' +
        'smiley,' +
        'sourcearea,' +
        'specialchar,' +
        'stylescombo,' +
        'tab,' +
        'table,' +
        'tableselection,' +
        'tabletools,' +
        'templates,' +
        'toolbar,' +
        'undo,' +
        'uploadimage,' +
        'youtube,' +
        'wysiwygarea'+
        'embed';

        config.allowedContent = true;
        config.extraAllowedContent = 'iframe(*)';

};