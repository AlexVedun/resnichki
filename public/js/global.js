// Global variables
let chunckParams = [];

// Функция для получения выбранного элемента выпадающего списка
function GetSelectedItemId(_element) {
    let element = "#" + _element;
    return $(element + " option:selected").eq($(element).parent('li.selected').index()).val();
}
