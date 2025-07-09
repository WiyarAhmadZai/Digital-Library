window.showSweetAlert = function (message) {
    Swal.fire({
        icon: "success",
        text: message,
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
};

// Show alert if session message exists in <body data-success-message="...">
document.addEventListener("DOMContentLoaded", function () {
    const successMsg = document.body.dataset.successMessage;
    if (successMsg) {
        showSweetAlert(successMsg);
    }

    // GLOBAL: Show alert if any AJAX request returns JSON success
    $(document).ajaxSuccess(function (event, xhr) {
        try {
            const res = xhr.responseJSON;
            if (res?.status === "success" && res?.message) {
                showSweetAlert(res.message);
            }
        } catch (e) {}
    });
});
