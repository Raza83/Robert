jQuery(document).ready(function(jQuery) {
    jQuery('#myInput').on('keyup', function() {
        var filter = jQuery(this).val().toUpperCase();
        var divs = jQuery('.alpha');

        divs.each(function() {
            var ul = jQuery(this).find('.alpha-ul');
            var li = ul.find('.glossary-item');
            var noMatches = true;

            li.each(function() {
                var a = jQuery(this).find('a');
                var txtValue = a.text().toUpperCase();

                if (txtValue.indexOf(filter) > -1) {
                    jQuery(this).show();
                    noMatches = false;
                } else {
                    jQuery(this).hide();
                }
            });

            if (noMatches) {
                jQuery(this).hide();
            } else {
                jQuery(this).show();
            }
        });
    });
});
