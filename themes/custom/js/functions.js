/* global urlLoading, $ */
//window.onerror = function () {
//    return true;
//};
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
function preview(that, id) {
    var file = that.files[0];
    var reader = new FileReader();
    reader.addEventListener("load", function () {
        $('#' + id).html($('<img />').css('max-width', '100%').attr('src', reader.result));
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
}
function LoadCities(that, cityId, content, url) {
    var province_id = parseInt($(that).val());
    $(cityId).html('<option value="">' + content + '</option>');
    if (province_id) {
        ajaxget(url, {province_id}, function (result) {
            var cities = '<option value="">' + content + '</option>';
            $.each(result, function (id, title) {
                cities += '<option value="' + id + '">' + title + '</option>';
            });
            $(cityId).html(cities);
        });
    }
}
function toInt(val) {
    return parseInt(val) ? parseInt(val) : 0;
}
function toFloat(val) {
    return parseFloat(val) ? parseFloat(val) : 0;
}
//------------------------------------------------------------------------------
// Ajax
//------------------------------------------------------------------------------
var ajaxDoAjax = true;
function ajax(inUrl, inType, inData, inSuccess, inDataType, inError, inComplete) {
    if (ajaxDoAjax) {
        ajaxDoAjax = false;
        showloading();
        $.ajax({
            url: inUrl,
            type: inType,
            data: inData,
            dataType: inDataType ? inDataType : 'json',
            cache:false,
            contentType: false,
            processData: false,
            success: function () {
                ajaxDoAjax = true;
                if (typeof inSuccess === 'function') {
                    inSuccess.apply(this, arguments);
                }
            },
            error: function () {
                showmessage('خطا در ارسال اطلاعات', 'red', 'خطا');
                if (typeof inError === 'function') {
                    inError.apply(this, arguments);
                }
            },
            complete: function () {
                ajaxDoAjax = true;
                hideloading();
                if (typeof inComplete === 'function') {
                    inComplete.apply(this, arguments);
                }
            }
        });
    }
}
function ajaxpost(url, data, success, dataType, error, complete) {
    ajax(url, 'post', data, success, dataType, error, complete);
}
function ajaxget(url, data, success, dataType, error, complete) {
    ajax(url, 'get', data, success, dataType, error, complete);
}
function validResult(result) {
    var message = '';
    if (result.messages) {
        for (var i in result.messages) {
            message += result.messages[i] + '<br/>';
        }
        if (message !== '') {
            if (result.saved === true) {
                showmessage(message, 'green');
            } else {
                showmessage(message, 'red', 'خطا');
            }
        }
    }
    return result.saved === true;
}
function showmessage(message, type, title) {
//    $.alert({
//        title: title ? title : '',
//        content: message,
//        type: type,
//        buttons: {
//            ok: {
//                text: 'باشه'
//            }
//        }
//    });
}
function showConfirm(message, action, title, type) {
//    $.confirm({
//        title: title ? title : '',
//        content: message,
//        type: type ? type : 'blue',
//        buttons: {
//            ok: {text: 'بله', action},
//            no: {text: 'خیر'}
//        }
//    });
}
function showloading() {

}
function hideloading() {

}
//------------------------------------------------------------------------------
// Prototype
//------------------------------------------------------------------------------
String.prototype.toInt = function () {
    return toInt(this.valueOf());
};
Number.prototype.toInt = function () {
    return toInt(this.valueOf());
};
String.prototype.toFloat = function () {
    return toFloat(this.valueOf());
};
Number.prototype.toFloat = function () {
    return toFloat(this.valueOf());
};
String.prototype.replaceAll = function (search, replacement) {
    return this.valueOf().replace(new RegExp(search, 'g'), replacement);
};