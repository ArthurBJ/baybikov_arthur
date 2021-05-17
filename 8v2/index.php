<?php
if (isset($_POST['send'])) {
    function calendar($month, $year) {
        $months = array(
            1 => 'Январь',
            2 => 'Февраль',
            3 => 'Март',
            4 => 'Апрель',
            5 => 'Май',
            6 => 'Июнь',
            7 => 'Июль',
            8 => 'Август',
            9 => 'Сентябрь',
            10 => 'Октябрь',
            11 => 'Ноябрь',
            12 => 'Декабрь'
        );

        $out = '<div class="calendar-item">
                    <div>'.$months[$month].' '.$year.'</div>
                    <table>
                    <tr>
                        <th>ПН</th>
                        <th>Вт</th>
                        <th>Ср</th>
                        <th>Чт</th>
                        <th>Пт</th>
                        <th>Сб</th>
                        <th>Вс</th>
                    </tr>';

        $day_week = date('N', mktime(0,0,0,$month,1,$year));
        $day_week--;

        $interval = new DateInterval('P1D');

        $out .= '<tr>';

        for ($x = 0; $x < $day_week; $x++) {
            $out .= '<td></td>';
        }

        $days_count = 0;
        $days_month = date('t', mktime(0,0,0,$month,1,$year));

        $period = new DatePeriod($_POST['month'], $interval, $days_month);

        foreach ($period as $day) {
            $day_num = (int) $day->format("d");
        }

        for ($day = 1; $day <= $days_month; $day++) {
            $out .= '<td>' . $day . '</td>';

            if ($day_week == 6) {
                $out .= '</tr>';
                if (($days_count + 1) != $days_month ) {
                    $out .= '<tr>';
                }
                $day_week = -1;
            }

            $day_week++;
            $days_count++;
        }

        $out .= '</tr></table></div>';
        return $out;
    }

    echo calendar($_POST['month'], date('Y'));
    echo "<link rel='stylesheet' href='style.css'>";
} else {
    include "index.html";
}