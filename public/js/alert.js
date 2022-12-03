function notification(title, text, icon) {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
    });
}

function confirmation(title, text, icon, confirmBtnText, confirmTitle, confirmText, confirmIcon) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#DC3545',
        confirmButtonText: confirmBtnText
    }).then((result) => {
        if (result.isConfirmed) {
            this.notification(confirmTitle, confirmText, confirmIcon);
        }
    })
}
