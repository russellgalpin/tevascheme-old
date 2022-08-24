/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        // config.toolbar = 'Basic'
        
   config.filebrowserBrowseUrl = '/js/ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '/js/ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '/js/ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = '/js/ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = '/js/ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '/js/ckeditor/kcfinder/upload.php?type=flash'; 
   
   config.toolbar = 'MyToolbar';
   
   config.toolbar_MyToolbar =
   [   	
        { name: 'document', items : [ 'Source' ] },
        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
        { name: 'editing', items : [ 'Find','Replace','-','SelectAll' ] },
        { name: 'insert', items : [ 'Image','Table','HorizontalRule','SpecialChar'] },
        '/',
        { name: 'styles', items : [ 'Format' ] },        
        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
        { name: 'paragraph', items : [ 'NumberedList','BulletedList' ] },
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
        { name: 'tools', items : [ 'Maximize' ] }
   ]
};
