import Swal from 'sweetalert2';

export function successAlert(message, title = 'Success!') {
    Swal.fire({
        title: title,
        text: message,
        icon: 'success',
        confirmButtonText: 'OK'
    });
}

export function errorAlert(message, title = 'Error!') {
    Swal.fire({
        title: title,
        text: message,
        icon: 'error',
        confirmButtonText: 'OK'
    });
}

export function confirmAction(message, confirmCallback, cancelCallback) {
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, do it!',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            if (typeof confirmCallback === 'function') confirmCallback();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            if (typeof cancelCallback === 'function') cancelCallback();
        }
    });
}
