function convertDateToDateTime(date) {
    let m = new Date(date);
    return ("0" + m.getUTCDate()).slice(-2) + "/" +
        ("0" + (m.getUTCMonth() + 1)).slice(-2) + "/" +
        m.getUTCFullYear() + " " +
        ("0" + m.getUTCHours()).slice(-2) + ":" +
        ("0" + m.getUTCMinutes()).slice(-2);
}

function renderPagination(links) {
    links.forEach(function (each) {
        $('#pagination').append($('<li>').attr('class', `page-item ${each.active ? 'active' : ''}`)
            .append(`<a class="page-link" >${each.label}</a>`));
    })
}

function getParentName(parent_id, parents){
    let name = "Danh mục chính";
    parents.forEach(function (each) {
        if (parent_id === each.id) {
            name = each.name;
        }
    })
    return name;
}
function getParentName1(data){
    let name = "Danh mục chính";
    if (data.parent) {
        name=data.parent.name;
    }
    return name;
}

function notifySuccess(message = '') {
    $.toast({
        heading: 'Success',
        text: message,
        showHideTransition: 'slide',
        position: 'bottom-right',
        icon: 'success'
    });
}

function notifyError(message = '') {
    $.toast({
        heading: 'Error',
        text: message,
        showHideTransition: 'slide',
        position: 'bottom-right',
        icon: 'error'
    });
}


