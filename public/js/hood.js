function fnToastSuccess(message) {

    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 4000
    };
    toastr.success(message);

}

function fnToastError(message) {

    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 4000
    };
    toastr.error(message);

}

function ajaxError(xhr, status, error) {

    if (xhr.status == 401) {
        fnToastError("You are not logged in. please login and try again");
    } else if (xhr.status == 403) {
        fnToastError("You have not permission for perform this operations");
    } else if (xhr.responseJSON && xhr.responseJSON.message != "") {
        fnToastError(xhr.responseText);
    } else {
        fnToastError("Something went wrong , Please try again later.");
    }
}