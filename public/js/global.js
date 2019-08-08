// Global variables
let chunckParams = [];

// Функция для получения выбранного элемента выпадающего списка
function GetSelectedItemId(_element) {
    let element = "#" + _element;
    return $(element + " option:selected").eq($(element).parent('li.selected').index()).val();
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
    $('.modal').find('.modal-content').find('#modal-message').html(message);
    $('.modal').find('#modalOk').attr('href', link);
    $('.modal').modal('open');
}
