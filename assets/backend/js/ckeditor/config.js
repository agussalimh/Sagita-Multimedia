/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */


CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.filebrowserBrowseUrl=baseurl+'/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl=baseurl+'/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl=baseurl+'/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl=baseurl+'/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl=baseurl+'/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl=baseurl+'/kcfinder/upload.php?type=flash';
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';
	config.font_defaultLabel = 'Arial';
	config.fontSize_defaultLabel = '16px';
	config.extraPlugins = 'font,lineheight,justify';
};
