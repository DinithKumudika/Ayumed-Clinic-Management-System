function notification(title, text, icon) {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
    });
}

function confirmation(title, text, icon, confirmBtnText, cancelBtnText, confirmPath) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#DC3545',
        confirmButtonText: confirmBtnText,
        cancelButtonText: cancelBtnText
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = confirmPath;
        }
    })
}
