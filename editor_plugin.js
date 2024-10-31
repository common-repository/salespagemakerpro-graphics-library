/**
 * SalesPageMakerPro GraphicsLibrary TinyMCE plugin loader
 * 
 */

(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('SalesPageMakerProGraphicsLibrary');

	tinymce.create('tinymce.plugins.SalesPageMakerProGraphicsLibrary', {
		
		init : function(ed, url) {
			
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('SalesPageMakerPro_GraphicsLibrary', function() {
				ed.windowManager.open({
				file 	: url + '/index.php?editor=tinymce&filter=image',
				width: 950,
				height: 650,
				inline: 0,
				maximizable: 1,
				close_previous: 0
				}, {
					plugin_url 		: url, // Plugin absolute URL
					browserType 	: 'images' // Custom argument
				});
			});
			
			// Register example button
			ed.addButton('SalesPageMakerPro_GraphicsLibrary', {
				title 	: 'SalesPageMakerPro Graphics Library',
				cmd 	: 'SalesPageMakerPro_GraphicsLibrary',
				image 	: url + '/img/png.png'
			});
		},

		
		createControl : function(n, cm) {
			return null;
		},

		
		getInfo : function() {
			return {
				longname 	: 'SalesPageMakerPro Graphics Library Plugin',
				author 		: 'SalesPageMakerPro.com',
				authorurl 	: 'http://www.SalesPageMakerPro.com',
				infourl 	: 'http://www.SalesPageMakerPro.com',
				version 	: "1.0"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('SalesPageMakerProGraphicsLibrary', tinymce.plugins.SalesPageMakerProGraphicsLibrary);
})();