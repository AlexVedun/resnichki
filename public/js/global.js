// Global variables
let chunckParams = [];
let userRole = '';

// Функция для получения выбранного элемента выпадающего списка
function GetSelectedItemId(_element) {
    let element = "#" + _element;
    return $(element + " option:selected").eq($(element).parent('li.selected').index()).val();
}

// Get the value of selected item of the <select>
function GetSelectedItemValue(_element) {
    let element = "#" + _element;
    return $(element + " option:selected").val();
}

// Функция для установки элемента выпадающего списка
function SetSelectedItem(_element, _value) {
    let element = "#" + _element;
    $(element + ' option[value=' + _value + ']').prop({ selected: true });
    $(element).formSelect();
}

// Function to set cookie
function SetCookie(name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}

// Function to show modal window with errors
function ShowModalError(link, xhr) {
    let message = '';
    if (xhr.responseJSON.errors) {
        for (const error in xhr.responseJSON.errors) {
            if (xhr.responseJSON.errors.hasOwnProperty(error)) {
                const element = xhr.responseJSON.errors[error];
                if (Array.isArray(element)) {
                    for (const item of element) {
                        message += '<p>' + item + '</p>';
                    }
                }
                else {
                    message += '<p>' + element + '</p>';
                }

            }
        }
    }
    else {
        message = xhr.responseJSON.message;
    }
    $('#message-modal').find('.modal-content').find('h4').html('Ошибка!');
    $('#message-modal').find('.modal-content').find('#modal-message').html(message);
    $('#message-modal').find('#modalOk').attr('href', link);
    $('#message-modal').modal('open');
}

function ShowMessageBox(_title, _message, _link) {
    $('#message-modal').find('.modal-content').find('h4').html(_title);
    $('#message-modal').find('.modal-content').find('#modal-message').html(_message);
    $('#message-modal').find('#modalOk').attr('href', _link);
    $('#message-modal').modal('open');
}

function ShowYesNoModal (_title, _message, _link, _yesFunc) {
    $('#yesno-modal').find('.modal-content').find('h4').html(_title);
    $('#yesno-modal').find('.modal-content').find('#modal-message').html(_message);
    $('#yesno-modal').find('#modalNo').attr('href', _link);
    $('#yesno-modal').find('#modalOk').attr('href', _link);
    $('#yesno-modal').find('#modalOk').unbind("click");
    $('#yesno-modal').find('#modalOk').on("click", _yesFunc);
    $('#yesno-modal').modal('open');
}

function HandleError(_xhr, _chunck) {
    if (_xhr.status == 401) {
        location.hash = '#login';
    }
    else {
        ShowModalError(_chunck, xhr);
    }

}
