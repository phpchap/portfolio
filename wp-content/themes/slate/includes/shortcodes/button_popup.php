<?php
// this file contains the contents of the popup window
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shortcode Manager</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo includes_url('/js/tinymce/tiny_mce_popup.js'); ?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo $fscb_base_url; ?>includes/js/popup-tabs.js"></script>
<style type="text/css" src="<?php echo includes_url( '/js/tinymce/themes/advanced/skins/wp_theme/dialog.css'); ?>"></style>
<link rel="stylesheet" href="<?php echo $fscb_base_url; ?>/includes/css/friendly_buttons_tinymce.css" />

<script type="text/javascript">
 
 
// ****** Build Button Shortcode ****** // 

var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var url = jQuery('#button-dialog input#button-url').val();
		var text = jQuery('#button-dialog input#button-text').val();
		var color = jQuery('#button-dialog select#button-color').val();		 	  
		var output = '';
		
		// setup the output of our shortcode to show in the wp editor
		output = '[button ';
			output += 'color=' + color + ' ';
			
			// only insert if the url field is not blank
			if(url)
				output += ' url=' + url;
		// check to see if the TEXT field is blank
		if(text) {	
			output += ']'+ text + '[/button]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']'+ButtonDialog.local_ed.selection.getContent() + '[/button]';
		}
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);


// ****** Build Column Shortcode ****** //

var LayoutDialog = {
	local_ed : 'ed',
	init : function(ed) {
		LayoutDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertLayout(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var colcontent = jQuery('#layout-dialog input#column-content').val();
		var width = jQuery('#layout-dialog select#column-width').val();
		
		// setup the output of our shortcode
		output = '[column ';
			output += 'width=' + width + ' ';
				
		// check to see if the content field is blank
		if(colcontent) {	
			output += ']'+ colcontent + '[/column]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']'+LayoutDialog.local_ed.selection.getContent() + '[/column]';
		}
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(LayoutDialog.init, LayoutDialog);


// ****** Build Tooltip Shortcode ****** //

var TooltipDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TooltipDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTooltip(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var tooltext = jQuery('#tooltip-dialog input#tooltext').val();
		var popuptext = jQuery('#tooltip-dialog input#popuptext').val();
		
		// setup the output of our shortcode
		output = '[tooltip ';
			output += 'title="' + popuptext + '"';
				
		// check to see if the content field is blank
		if(tooltext) {	
			output += ']'+ tooltext + '[/tooltip]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']'+TooltipDialog.local_ed.selection.getContent() + '[/tooltip]';
		}
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TooltipDialog.init, TooltipDialog);


// ****** Build Message Shortcode ****** //

var MessageDialog = {
	local_ed : 'ed',
	init : function(ed) {
		MessageDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertMessage(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var messcontent = jQuery('#message-dialog input#message-content').val();
		var messtype = jQuery('#message-dialog select#message-type').val();
		
		// setup the output of our shortcode
		output = '[message ';
			output += 'class=' + messtype + ' ';
				
		// check to see if the content field is blank
		if(messcontent) {	
			output += ']'+ messcontent + '[/message]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']'+MessageDialog.local_ed.selection.getContent() + '[/message]';
		}
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(MessageDialog.init, MessageDialog);


// ****** Build Tab Shortcode ****** //

var TabDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TabDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTab(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		// setup the output of our shortcode
		output = '[tabgroup]<br/>[tab title="Tab 1"]Tab 1 content goes here.[/tab]<br/>[tab title="Tab 2"]Tab 2 content goes here.[/tab]<br/>[tab title="Tab 3"]Tab 3 content goes here.[/tab]<br/>[/tabgroup]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TabDialog.init, TabDialog);
 
</script>

</head>

<!-- html and forms for modal window --> 

<body>
	
	<div id="tabs" >
		<ul>
		 <li><a href="#tab-1">Buttons</a></li>
		 <li><a href="#tab-2">Layout</a></li>
		 <li><a href="#tab-3">Tooltip</a></li>
		 <li><a href="#tab-4">Message</a></li>
		 <li><a href="#tab-5">Tab Box</a></li>
		</ul>
		
		<div id="tab-1" class="tab">
		  	<div id="button-dialog">
				<form action="/" method="get" accept-charset="utf-8">
					<div>
						<label for="button-url">Button URL</label>
						<input type="text" name="button-url" value="" id="button-url" />
					</div>
					<div>
						<label for="button-text">Button Text</label>
						<input type="text" name="button-text" value="" id="button-text" />
					</div>
					<div>
						<label for="button-color">Color</label>
						<select name="button-color" id="button-color" size="1">
							<option value="dark-gray" selected="selected">Gray</option>
							<option value="pink"=>Pink</option>
							<option value="blue">Blue</option>
							<option value="green">Green</option>
							<option value="purple">Purple</option>
							<option value="orange">Orange</option>
							<option value="gray">Gray</option>
							<option value="black">Black</option>
							<option value="white">White</option>
						</select>
					</div>
					<div>	
						<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
					</div>
				</form>
			</div>
		</div>
		
		<div id="tab-2" class="tab">
			<div id="layout-dialog">
				<form action="/" method="get" accept-charset="utf-8">
					<div>
						<label for="column-content">Column Text</label>
						<input type="text" name="column-content" value="" id="column-content" />
					</div>
					<div>
						<label for="column-width">Column Width</label>
						<select name="column-width" id="column-width" size="1">
							<option value="one-third" selected="selected">3/4 Column</option>
							<option value="one-third-last">3/4 Column (Last)</option>
							<option value="one-half">1/2 Column</option>
							<option value="one-half-last">1/2 Column (Last)</option>
							<option value="one-quarter">1/4 Column</option>
							<option value="one-quarter-last">1/4 Column (Last)</option>
						</select>
					</div>
					
					<div>	
						<a href="javascript:LayoutDialog.insert(LayoutDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
					</div>
				</form>
			</div>
		</div>
		
		<div id="tab-3" class="tab">
		 	<div id="tooltip-dialog">
				<form action="/" method="get" accept-charset="utf-8">
					<div>
						<label for="tooltext">Text</label>
						<input type="text" name="tooltext" value="" id="tooltext" />
					</div>
					
					<div>
						<label for="popuptext">Popup Text</label>
						<input type="text" name="popuptext" value="" id="popuptext" />
					</div>
					
					<div>	
						<a href="javascript:TooltipDialog.insert(TooltipDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
					</div>
				</form>
			</div>
		</div>
		
		<div id="tab-4" class="tab">
		 	<div id="message-dialog">
				<form action="/" method="get" accept-charset="utf-8">
					<div>
						<label for="messcontent">Text</label>
						<input type="text" name="message-content" value="" id="message-content" />
					</div>
					
					<div>
						<label for="message-type">Message Type</label>
						<select name="message-type" id="message-type" size="1">
							<option value="red-message" selected="selected">Error Message</option>
							<option value="green-message"=>Success Message</option>
							<option value="yellow-message">Info Message</option>
							<option value="gray-message">Text Message</option>
						</select>
					</div>
					
					<div>	
						<a href="javascript:MessageDialog.insert(MessageDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
					</div>
				</form>
			</div>
		</div>
		
		<div id="tab-5" class="tab">
			<div id="tab-dialog">
				<form action="/" method="get" accept-charset="utf-8">
					<div>	
						<a href="javascript:TabDialog.insert(TabDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert Code</a>
					</div>
				</form>
			</div>
		</div>
	</div>
					 
	
</body>
</html>