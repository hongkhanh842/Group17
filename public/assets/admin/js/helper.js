function convertDateToDateTime(date) {
    let m = new Date(date);
    return ("0" + m.getUTCDate()).slice(-2) + "/" +
        ("0" + (m.getUTCMonth() + 1)).slice(-2) + "/" +
        m.getUTCFullYear() + " " +
        ("0" + m.getUTCHours()).slice(-2) + ":" +
        ("0" + m.getUTCMinutes()).slice(-2);
}
function convertDateToDateTimeAdd(date) {
    let m = new Date(date);
    m.setDate(m.getDate() + 3);
    return ("0" + m.getUTCDate()).slice(-2) + "/" +
        ("0" + (m.getUTCMonth() + 1)).slice(-2) + "/" +
        m.getUTCFullYear() + " " +
        ("0" + m.getUTCHours()).slice(-2) + ":" +
        ("0" + m.getUTCMinutes()).slice(-2);
}

function renderPagination(links) {
    links.forEach(function (each) {
        if (each.label !== "&laquo; Previous" && each.label !== "Next &raquo;")
        {
            $('#pagination').append($('<li>').attr('class', `page-item ${each.active ? 'active' : ''}`)
                .append(`<a class="page-link" >${each.label}</a>`));
        }
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

function getRoleByKey(key){
   if (key == 1)
   {
       return "Khách hàng"
   } else if (key == 2)
   {
       return "Quản lý"
   }

       return "Shipper"

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

function getPrice(x)
{
    return x.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
}

function getDetailByKey(use,cpu,ram,ssd)
{
    let detail = '';

    if (use == 1) detail += 'Laptop văn phòng: '
    else detail += 'Laptop gaming: '

    if (cpu == 0) detail += 'I5/'
    else if (cpu == 1) detail += 'I7/'
    else if (cpu == 2) detail += 'R5/'
    else if (cpu == 3) detail += 'R7/'
    else if (cpu == 4) detail += 'R9/'

    if (ram == 0) detail += '8GB/'
    else detail += '16GB/'

    if (ssd == 0) detail += '256GB'
    else if (ssd == 1) detail += '512GB'
    else if (ssd == 2) detail += '1TB'
    return detail;
}

