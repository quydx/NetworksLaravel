/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.height = 600; 
	config.toolbar = [
                        ['Undo','Redo','-','Cut','Copy','Paste','PasteText','PasteFromWord','Find','-','SelectAll','RemoveFormat','HorizontalRule','Smiley','SpecialChar','-','Bold','Italic','Underline','Strike','-','Subscript','Superscript','-','NumberedList','BulletedList','Blockquote','Source','Maximize','Syntaxhighlight','Styles','Format','Font','FontSize','TextColor','BGColor','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Link','Unlink','Image','Table'],
                     ];
    config.filebrowserBrowseUrl = '/ckfinder/ckfinder.html';
 
	config.filebrowserImageBrowseUrl = '/ckfinder/ckfinder.html?type=Images';
	 
	config.filebrowserFlashBrowseUrl = '/ckfinder/ckfinder.html?type=Flash';
	 
	config.filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	 
	config.filebrowserImageUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	 
	config.filebrowserFlashUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
CKEDITOR.config.allowedContent = true;
