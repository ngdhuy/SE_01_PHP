<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    class helper
    {
        static function validateDate($date, $format = 'd-m-Y H:i:s')
        {
            $d = DateTime::createFromFormat($format, $date);
            // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
            return $d && $d->format($format) === $date;
        }
    }
    
?>