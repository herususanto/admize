jQuery(document).ready(function(){ 
	// scroll	 
        jQuery(window).scroll(function(){
            if (jQuery(this).scrollTop() > 100) {
                jQuery('.scrollup').fadeIn();
            } else {
                jQuery('.scrollup').fadeOut();
            }
        }); 
 
        jQuery('.scrollup').click(function(){
            jQuery("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });	
	// dropdownmenu	 
		jQuery("<select />").appendTo("#top-menu"); 

		jQuery("<option />",{ 
			"selected": "selected", 
			"value"   : "", 
			"text"    : "Site Menu" // default <option> to display in dropdown 
		}).appendTo("#top-menu select"); 

		jQuery("#top-menu a").each(function() { 
			var el =  jQuery(this); 
			jQuery("<option />", { 
				"value"   : el.attr("href"), 
				"text"    : el.text() 
			}).appendTo("#top-menu select"); 
		});

		jQuery("#top-menu select").change(function() { 
			window.location = jQuery(this).find("option:selected").val();
	});
});