jQuery.fn.serializeData=
    function () {
        var formData=new FormData();
        var inputs=jQuery(this).find("input[name], textarea[name], select[name]");
        inputs.each(function (index) {

            if (inputs[index].getAttribute("type") == "file") {
                var value=inputs[index].files[0];
                formData.append(inputs[index].getAttribute("name"), value);
            } else if (inputs[index].getAttribute("type") == "checkbox") {
                if (inputs[index].checked) {
                    formData.append(inputs[index].getAttribute("name"), inputs[index].value);
                }
            } else if (inputs[index].getAttribute("type") == "radio") {
                if (inputs[index].checked) {
                    formData.append(inputs[index].getAttribute("name"), inputs[index].value);
                }
            } else if (inputs[index].type == "select-multiple" || inputs[index].type == "select-one") {
                opt="";
                for (var i=0, len=inputs[index].options.length; i<len; i++) {
                    opt=inputs[index].options[i];
                    if (opt.selected) {
                        formData.append(inputs[index].getAttribute("name"), opt.value);
                    }
                }
            } else if (inputs[index].type == "textarea") {

                if (inputs[index].className == "wp-editor-area") {
                    formData.append(inputs[index].getAttribute("name"), tmceGetContent(inputs[index].getAttribute('id')));
                } else {

                    if (inputs[index].className.indexOf("codemirror_area")>=0) {
                        formData.append(inputs[index].getAttribute("name"), codeMirrorVals[inputs[index].getAttribute('id')].codemirror.getValue());
                    } else {
                        formData.append(inputs[index].getAttribute("name"), inputs[index].value);
                    }

                }

            } else {
                formData.append(inputs[index].getAttribute("name"), inputs[index].value);
            }
        });

        var contentEditableItems=jQuery(this).find('[contenteditable=true]');
        contentEditableItems.each(function (index) {
            formData.append(contentEditableItems[index].getAttribute("name"), contentEditableItems[index].innerHTML);
        });

        return formData;
    };

jQuery.fn.magicRequest=
    function (options, params, callback, caller) {
        var defaultParams=
        {
            'type': "POST",
            'url': false,
            'element': false,
            'params': false,
            'eventListenerFunction': false,
            'loadingAnimate': true
        }

        if (params) {
            for (var index in params) {
                if (typeof params[index] != "undefined") defaultParams[index]=params[index];
            }
        }

        if (caller) {
            caller(defaultParams, callback, caller);
        }

        if (defaultParams['loadingAnimate'] == true) {
            jQuery('.mbProgress').css({width: 2 + '%'});
        }

        if (defaultParams['url'] == false) {

            var currHref=window.location.href;

            /*if (currHref.indexOf("?") != "-1") { } */
            var ex=currHref.split("/wp-admin");
            defaultParams['url']=ex[0] + "/wp-admin/admin-ajax.php";

        }

        var sendData=jQuery(defaultParams['element']).serializeData();
        jQuery.each(options, function (index, value) {
            sendData.append(index, value);
        });
        sendData.append("is_ajax", "true");

        return  jQuery.ajax({
            xhr: function () {
                var xhr=new window.XMLHttpRequest();
                xhr.upload.addEventListener("mbProgress", function (evt) {
                    if (evt.lengthComputable) {

                        var newWidth=Math.floor(evt.loaded / evt.total * 100);

                        if (isNaN(newWidth)) {
                            newWidth=1;
                        }
                        if (newWidth>100) {
                            newWidth=100;
                        }

                        jQuery(".mbProgress").attr('bar', newWidth);
                        jQuery(".mbProgress").css({
                            width: newWidth + '%'
                        });

                        if (defaultParams['eventListenerFunction']) {
                            defaultParams['eventListenerFunction'](evt);
                        }

                    }
                }, false);
                xhr.addEventListener("mbProgress", function (evt) {
                    if (evt.lengthComputable) {
                        var newWidth=Math.floor(evt.loaded / evt.total * 100);

                        if (isNaN(newWidth)) {
                            newWidth=1;
                        }
                        if (newWidth>100) {
                            newWidth=100;
                        }

                        jQuery(".mbProgress").attr('bar', newWidth);
                        jQuery(".mbProgress").css({
                            width: newWidth + '%'
                        });

                        if (defaultParams['eventListenerFunction']) {
                            defaultParams['eventListenerFunction'](evt);
                        }

                    }
                }, false);
                return xhr;
            },

            type: defaultParams['type'],
            url: defaultParams['url'],
            data: sendData,
            processData: false,
            contentType: false,
            success: function (response) {

                jQuery(".mbProgress").attr('bar', "0");
                jQuery(".mbProgress").animate({
                    width: 0 + '%',
                    duration: 2000
                }, 0);

                if (callback) {
                    callback(response, defaultParams);
                }

            }, error: function (r, t) {
                if (callback) {
                    callback({'result': 'fail', 'error': '500 Internal Server'}, defaultParams);
                }
                console.log('Opss :(');
            }
        });

    };

function tmceGetContent(editorId) {
    if (tinyMCE) {
        try {
            return tinyMCE.get(editorId).getContent();
        }
        catch(err) {
            return   jQuery('#' + editorId).val();
        }

    } else {
        return   jQuery('#' + editorId).val();
    }
}

function setAsCodeMirror(idName,setMode) {
    if(typeof setMode =="undefined") {
        setMode = "text/html";
    }
    isMirrorred[idName]=1;
    mb_cm_settings.codemirror.mode = setMode;
    codeMirrorVals[idName] = wp.codeEditor.initialize(jQuery('#'+idName), mb_cm_settings);
    jQuery('#' + idName).addClass('codemirror_area');

}

function goThere(where, process, px) {

    var px=parseInt(px);
    if (isNaN(px)) {
        px=200;
    }
    px=parseInt(px);

    var element='html, body';

    if (process == "+") {
        jQuery(element).animate({
            scrollTop: jQuery(where).position().top + px
        }, 150);
    } else {
        jQuery(element).animate({
            scrollTop: jQuery(where).position().top - px
        }, 150);
    }
}

function justTextNumber(text) {
    return text.replace(/[^A-Za-z0-9]/g, '')
}

function copyToClipboard(element) {
    var temp=jQuery("<input>");
    jQuery("body").append(temp);
    temp.val(jQuery(element).text()).select();
    document.execCommand("copy");
    temp.remove();
}

function uniqCode() {
    return "mb_" + Date.now().toString(36) + Math.random().toString(36).substr(2);
}

function boxup(string, args, callback) {

    var defaultArray=
    {
        'confirm': false,
        'textOk': 'Ok',
        'textCancel': 'Cancel',
        'classs': "",
        'type': "alert",
        'close': 0
    }

    if (args) {
        for (var index in defaultArray) {
            if (typeof args[index] == "undefined") {
                args[index]=defaultArray[index];
            }
        }
    } else {
        args=defaultArray;
    }

    jQuery('.boxupOverlay').hide(200).remove();
    jQuery('.boxupOuter').hide(200).remove();
    jQuery('.boxupInner').hide(200).remove();
    jQuery('.boxupInner .boxupButtons').hide(200).remove();

    var aHeight=jQuery(document).height();
    var aWidth=jQuery(document).width();

    if (args['type'] == "alert") {
        jQuery('body').append('<div class="boxupOverlay"></div>');
        jQuery('.boxupOverlay').css('height', aHeight).css('width', aWidth).fadeIn(100);
    }

    jQuery('body').append('<div class="boxupOuter boxup-' + args['type'] + '"></div>');
    jQuery('.boxupOuter').append('<div class="boxupInner ' + args['classs'] + '"></div>');
    jQuery('.boxupInner').append('<div class="text"><p>' + string + '</p></div>');
    jQuery('.boxupInner').append('<div class="boxupButtons"></div>');

    if (args['type'] == "alert") {
        jQuery('.boxupOuter').css('top', '10%').fadeIn(200);
    }
    if (args['type'] == "notify") {
        jQuery('.boxupOuter').css('bottom', '2%').fadeIn(200);
    }

    if (args['confirm']) {
        jQuery('.boxupButtons').append('<button value="ok">' + args['textOk'] + '</button>');
        jQuery('.boxupButtons').append('<button value="cancel">' + args['textCancel'] + '</button>');
    } else {
        if (args['textOk']) {
            jQuery('.boxupButtons').append('<button value="ok">' + args['textOk'] + '</button>');
        } else {
            jQuery('.boxupButtons').append('<button value="ok">Ok</button>');
        }
    }

    jQuery(document).keydown(function (e) {

        if (jQuery('.boxupOverlay').is(':visible')) {

            if (e.keyCode == 13) {

                if (typeof jQuery('.boxupButtons button[value="cancel"]').html() == "undefined") {
                    jQuery('.boxupOverlay').fadeOut(100).remove();
                    jQuery('.boxupOuter').fadeOut(100).remove();
                    if (callback) {
                        callback(true);
                        callback=false;
                    }
                } else {
                    jQuery('.boxupButtons button[value="ok"]').click();
                }
            }

            if (e.keyCode == 27) {
                if (typeof jQuery('.boxupButtons button[value="cancel"]').html() == "undefined") {
                    jQuery('.boxupOverlay').fadeOut(100).remove();
                    jQuery('.boxupOuter').fadeOut(100).remove();
                    if (callback) {
                        callback(false);
                        callback=false;
                    }
                    return false;
                } else {
                    jQuery('.boxupButtons button[value="cancel"]').click();
                }

            }
        }
    });

    jQuery(document).on('click', '.boxupButtons > button', function () {

        jQuery('.boxupOverlay').fadeOut(100).remove();
        jQuery('.boxupOuter').fadeOut(100).remove();

        if (callback) {
            var wButton=jQuery(this).attr("value");
            if (wButton == 'ok') {
                if (args) {
                    callback(true);
                }
                else {
                    callback(true);
                }
            }
            else if (wButton == 'cancel') {
                callback(false);
            }
            callback=false;
        }
    });

    if (args['close']>0) {
        setTimeout(function () {
            jQuery('.boxupOverlay').fadeOut(100).remove();
            jQuery('.boxupOuter').fadeOut(100).remove();
        }, args['close']);
    }

}



