<?php
if (!function_exists('notify')) {
    function set_notify($type = 'success', $msg = null, $delay = 2)
    {
        Session::flash('notify', true);
        Session::flash('type', $type);
        Session::flash('msg', $msg);
        Session::flash('delay', $delay);
    }
}

if (!function_exists('sweetAlert')) {
    function sweetAlert()
    {
        if (Session::get('notify')) {
            return '
				<script type="text/javascript">
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener("mouseenter", Swal.stopTimer)
                            toast.addEventListener("mouseleave", Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: "' . Session::get('type') . '",
                        title: "' . Session::get('msg') . '",
                    })
                </script>';
        }
    }
}
