//////////////////////////////////////////////////////////////////
// Add Youtube button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.youtube', {  
        init : function(ed, url) {  
            ed.addButton('youtube', {  
                title : 'Add a Youtube video',  
                image : url+'/button-youtube.png',  
                onclick : function() {  
                     ed.selection.setContent('[youtube id="" width="600" height="350"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('youtube', tinymce.plugins.youtube);  
})();

//////////////////////////////////////////////////////////////////
// Add Vimeo button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.vimeo', {  
        init : function(ed, url) {  
            ed.addButton('vimeo', {  
                title : 'Add a Vimeo video',  
                image : url+'/button-vimeo.png',  
                onclick : function() {  
                     ed.selection.setContent('[vimeo id="" width="600" height="350"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('vimeo', tinymce.plugins.vimeo);  
})();

//////////////////////////////////////////////////////////////////
//Add SoundCloud button
//////////////////////////////////////////////////////////////////
(function() {  
 tinymce.create('tinymce.plugins.soundcloud', {  
     init : function(ed, url) {  
         ed.addButton('soundcloud', {  
             title : 'Add a SoundCloud widget',  
             image : url+'/button-soundcloud.gif',  
             onclick : function() {  
                  ed.selection.setContent('[soundcloud url="" comments="true" auto_play="false" color="ff7700" width="100%" height="81"]');  

             }  
         });  
     },  
     createControl : function(n, cm) {  
         return null;  
     },  
 });  
 tinymce.PluginManager.add('soundcloud', tinymce.plugins.soundcloud);  
})();

//////////////////////////////////////////////////////////////////
// Add Button button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.button', {  
        init : function(ed, url) {  
            ed.addButton('button', {  
                title : 'Add a button',  
                image : url+'/button-button.png',  
                onclick : function() {  
                     ed.selection.setContent('[button color="red" link=""]Text Here[/button]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('button', tinymce.plugins.button);  
})();

//////////////////////////////////////////////////////////////////
// Add Message Box button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.message_box', {  
        init : function(ed, url) {  
            ed.addButton('message_box', {  
                title : 'Add a Message Box',  
                image : url+'/button-message-box.png',  
                onclick : function() {  
                     ed.selection.setContent('[message_box color="red"]Message Here[/message_box]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('message_box', tinymce.plugins.message_box);  
})();


//////////////////////////////////////////////////////////////////
// Add Checklist button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.checklist', {  
        init : function(ed, url) {  
            ed.addButton('checklist', {  
                title : 'Add a checklist',  
                image : url+'/button-checklist.gif',  
                onclick : function() {  
                     ed.selection.setContent('[checklist]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/checklist]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('checklist', tinymce.plugins.checklist);  
})();

//////////////////////////////////////////////////////////////////
// Add Arrow button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.arrow', {  
        init : function(ed, url) {  
            ed.addButton('arrow', {  
                title : 'Add an arrow',  
                image : url+'/button-arrow.gif',  
                onclick : function() {  
                     ed.selection.setContent('[arrow]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/arrow]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('arrow', tinymce.plugins.arrow);  
})();

//////////////////////////////////////////////////////////////////
// Add Folder button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.folder', {  
        init : function(ed, url) {  
            ed.addButton('folder', {  
                title : 'Add a folder list',  
                image : url+'/button-folder.gif',  
                onclick : function() {  
                     ed.selection.setContent('[folder]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/folder]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('folder', tinymce.plugins.folder);  
})();

//////////////////////////////////////////////////////////////////
// Add Download button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.download', {  
        init : function(ed, url) {  
            ed.addButton('download', {  
                title : 'Add a download list',  
                image : url+'/button-download.gif',  
                onclick : function() {  
                     ed.selection.setContent('[download]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/download]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('download', tinymce.plugins.download);  
})();

//////////////////////////////////////////////////////////////////
// Add News button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.news', {  
        init : function(ed, url) {  
            ed.addButton('news', {  
                title : 'Add a news list',  
                image : url+'/button-news.gif',  
                onclick : function() {  
                     ed.selection.setContent('[news]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/news]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('news', tinymce.plugins.news);  
})();

//////////////////////////////////////////////////////////////////
// Add Attachment button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.attachment', {  
        init : function(ed, url) {  
            ed.addButton('attachment', {  
                title : 'Add an attachment list',  
                image : url+'/button-attachment.gif',  
                onclick : function() {  
                     ed.selection.setContent('[attachment]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/attachment]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('attachment', tinymce.plugins.attachment);  
})();

//////////////////////////////////////////////////////////////////
// Add Badlist button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.badlist', {  
        init : function(ed, url) {  
            ed.addButton('badlist', {  
                title : 'Add a badlist',  
                image : url+'/button-badlist.gif',  
                onclick : function() {  
                     ed.selection.setContent('[badlist]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/badlist]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('badlist', tinymce.plugins.badlist);  
})();
	

//////////////////////////////////////////////////////////////////
// Add One_half button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.one_half', {  
        init : function(ed, url) {  
            ed.addButton('one_half', {  
                title : 'Add a one_half column',  
                image : url+'/button-12.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_half last="no"]Content Here[/one_half]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_half', tinymce.plugins.one_half);  
})();

//////////////////////////////////////////////////////////////////
// Add One_half button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.one_third', {  
        init : function(ed, url) {  
            ed.addButton('one_third', {  
                title : 'Add a one_third column',  
                image : url+'/button-13.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_third last="no"]Content Here[/one_third]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_third', tinymce.plugins.one_third);  
})();

//////////////////////////////////////////////////////////////////
// Add Two_half button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.two_third', {  
        init : function(ed, url) {  
            ed.addButton('two_third', {  
                title : 'Add a two_third column',  
                image : url+'/button-23.png',  
                onclick : function() {  
                     ed.selection.setContent('[two_third last="no"]Content Here[/two_third]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('two_third', tinymce.plugins.two_third);  
})();

//////////////////////////////////////////////////////////////////
// Add one_fourth button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.one_fourth', {  
        init : function(ed, url) {  
            ed.addButton('one_fourth', {  
                title : 'Add a one_fourth column',  
                image : url+'/button-14.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_fourth last="no"]Content Here[/one_fourth]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_fourth', tinymce.plugins.one_fourth);  
})();

//////////////////////////////////////////////////////////////////
// Add three_fourth button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.three_fourth', {  
        init : function(ed, url) {  
            ed.addButton('three_fourth', {  
                title : 'Add a three_fourth column',  
                image : url+'/button-34.png',  
                onclick : function() {  
                     ed.selection.setContent('[three_fourth last="no"]Content Here[/three_fourth]');   
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('three_fourth', tinymce.plugins.three_fourth);  
})();