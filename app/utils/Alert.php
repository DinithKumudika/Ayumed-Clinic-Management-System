<?php

namespace utils;

abstract class Alert
{
    // notification message types
    public const  MESSAGE_DANGER = "danger";
    public const  MESSAGE_WARNING = "warning";
    public const  MESSAGE_INFO = "info";
    public const  MESSAGE_SUCCESS = "success";

    public static function Notification($title, $text, $icon){
        return "<script type='text/javascript'>
            Swal.fire({
                icon: '".$icon."',
                title: '".$title."',
                text: '".$text."',
            });
            </script>";
    }

    public static function confirmation($title, $confirmText, $denyText, $icon){
        return "<script type='text/javascript'>
            Swal.fire({
                title: '". $title ."',
                icon: '". $icon ."',
                showDenyButton: true,
                confirmButtonText: '". $confirmText ."',
                denyButtonText: '". $denyText ."',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
            </script>";
    }
}