	 /* <![CDATA[  */   
	 
	var J = jQuery.noConflict();

	J(document).ready(function(){
					
		// Homepage Tabs
		J('#tabs div').hide();
		J('#tabs div:first').show();
		J('#tabs ul li:first').addClass('active');
		
		J('#tabs > ul li a').click(function(){
			J('#tabs ul li').removeClass('active');
			J(this).parent().addClass('active');
			var currentTab = J(this).attr('href');
			J('#tabs div').hide();
			J(currentTab).show();
			return false;
		});
	});
	/* ]]> */  