// Global variables
let chunckParams = [];

// Функция для получения выбранного элемента выпадающего списка
function GetSelectedItemId(_element) {
    let element = "#" + _element;
    return $(element + " option:selected").eq($(element).parent('li.selected').index()).val();
}

// Function to set cookie
function SetCookie(name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}
