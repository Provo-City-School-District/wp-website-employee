
/*
=============================================================================================================
accordion
=============================================================================================================
*/
jQuery(".accordian-category").click( function(){
	jQuery(this).toggleClass("active");
	jQuery(this).next(".accordian-content").toggleClass("active");
});

/*
=============================================================================================================
Directory Live Page Search
=============================================================================================================
*/

jQuery(document).ready(function(){
    jQuery("#appfilter").keyup(function(){

        // Retrieve the input field text and reset the count to zero
        var filter = jQuery(this).val(), count = 0;

        // Loop through the post list
        jQuery(".approvedApps .post").each(function(){

            // If the list item does not contain the text phrase fade it out
            if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
                 //jQuery(this).addClass('hide');
                jQuery(this).fadeOut();

            // Show the list item if the phrase matches and increase the count by 1
            } else {
                jQuery(this).show();
                count++;
            }
        });
    });
});