/* mb FAB */
jQuery.fn.makeFabButton =
    function (theElement,theFabItems,animationTime,callback) {

        jQuery(document).on('click', theElement, function () {
            theIcon=jQuery(this).data('icon');

            mbWidth = jQuery(theElement+' img').width();
            mbHeight = jQuery(theElement+' img').height();

            jQuery(theElement).css({'width':mbWidth,'height':mbHeight});

            if (theIcon == "1") {
                newStatus = "2";
                jQuery(this).data('icon', '2');
                jQuery(theElement+' .mb-fab-icon-2').removeClass('mbFabHide').addClass('mbFabShow');
                jQuery(theElement+' .mb-fab-icon-1').addClass('mbFabHide').removeClass('mbFabShow');
            } else {
                newStatus = "1";
                jQuery(this).data('icon', '1');
                jQuery(theElement+' .mb-fab-icon-2').addClass('mbFabHide').removeClass('mbFabShow');
                jQuery(theElement+' .mb-fab-icon-1').removeClass('mbFabHide').addClass('mbFabShow');
            }

            if(callback) {
                callback(newStatus);
            }

            if(newStatus =="1") {

                jQuery(theFabItems).animate({
                    height: 'hide',
                    opacity: 'hide'
                }, animationTime);
            } else {
                jQuery(theFabItems).animate({
                    height: 'show',
                    opacity: 'show'
                }, animationTime);
            }



        });



    };

