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
/*
=============================================================================================================
Auto Link Detection
=============================================================================================================
*/

jQuery('.content ul li a').each(function(){
    if (jQuery(this).attr('href').match('.pdf')) {
        jQuery(this).parent().addClass('pdf');
    } else if(jQuery(this).attr('href').match('.xls')) {
        jQuery(this).parent().addClass('xls');
    } else if (jQuery(this).attr('href').match('provo.edu')) {
        jQuery(this).parent().addClass('int');
    } else {
        jQuery(this).parent().addClass('ext');
    }
});
/*
=============================================================================================================
sort list alpha by giving it the class sortList
=============================================================================================================
*/
jQuery(window).on("load", function() {
	var elem = jQuery('.sortList'); //replace this with your list selector
	sortList(elem);
	function sortList($elem) {
		var $li = $elem.find('li'),
			$listLi = jQuery($li,$elem).get();
		$listLi.sort(function(a, b){
			var keyA = jQuery(a).text().toUpperCase();
			var keyB = jQuery(b).text().toUpperCase();
			return (keyA < keyB) ? -1 : 1;
		});
		jQuery.each($listLi, function(index, row){
			$elem.append(row);
		});
	}
});


//inserts a link to the translation request form in the language switcher
window.onload = function () {
  var wrapper = document.querySelector(".trp-language-wrap");
  if (wrapper) {
    var newAnchor = document.createElement("a"); // create new anchor element
    newAnchor.href = "https://provo.edu/translations/"; // set href attribute
    newAnchor.textContent = "Request Translation"; // set link text
    wrapper.insertBefore(newAnchor, wrapper.children[1]); //insert new anchor before first child

    var targetElement = wrapper.querySelector(".trp-floater-ls-disabled-language.trp-ls-disabled-language"); // find the target element
    if (targetElement) {
      targetElement.textContent += " - Selected"; // append "current lang" to the existing text
    }
  }
  var parentElement = document.getElementById('trp-floater-ls-current-language'); // get the parent element by ID
  if (parentElement) {
    var targetElement = parentElement.querySelector('.trp-floater-ls-disabled-language.trp-ls-disabled-language'); // find the target element inside the parent
    if (targetElement) {
      var img = document.createElement('img'); // create new img element
      img.src = 'https://provo.edu/wp-content/uploads/2024/01/translate.png'; // set src attribute
      targetElement.innerHTML = ''; // clear the current content
      targetElement.appendChild(img); // append the new image
    }
  }
};

/*
=============================================================================================================
Collapsible Content
=============================================================================================================
*/
document.addEventListener("DOMContentLoaded", function () {
  var buttons = document.querySelectorAll(".collapsible-button");
  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
      var content = this.nextElementSibling;
      if (content.style.display === "none" || content.style.display === "") {
        content.style.display = "block";
        this.classList.add("exposed");
      } else {
        content.style.display = "none";
        this.classList.remove("exposed");
      }
    });
  });
});
