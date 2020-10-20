<?php

   /*  year (int) - 4 digit year (e.g. 2011).
    monthnum (int) - Month number (from 1 to 12).
    w (int) - Week of the year (from 0 to 53). Uses MySQL WEEK command. The mode is dependent on the "start_of_week" option.
    day (int) - Day of the month (from 1 to 31).
    hour (int) - Hour (from 0 to 23).
    minute (int) - Minute (from 0 to 60).
    second (int) - Second (0 to 60).
    m (int) - YearMonth (For e.g.: 201307).

    date_query (array) - Date parameters (available since Version 3.7).
        year (int) - 4 digit year (e.g. 2011).
        month (int) - Month number (from 1 to 12).
        week (int) - Week of the year (from 0 to 53).
        day (int) - Day of the month (from 1 to 31).
        hour (int) - Hour (from 0 to 23).
        minute (int) - Minute (from 0 to 59).
        second (int) - Second (0 to 59).
        after (string/array) - Date to retrieve posts after. Accepts strtotime()-compatible string, or array of 'year', 'month', 'day' values:
            year (string) Accepts any four-digit year. Default is empty.
            month (string) The month of the year. Accepts numbers 1-12. Default: 12.
            day (string) The day of the month. Accepts numbers 1-31. Default: last day of month.
        before (string/array) - Date to retrieve posts before. Accepts strtotime()-compatible string, or array of 'year', 'month', 'day' values:
            year (string) Accepts any four-digit year. Default is empty.
            month (string) The month of the year. Accepts numbers 1-12. Default: 1.
            day (string) The day of the month. Accepts numbers 1-31. Default: 1.
        inclusive (boolean) - For after/before, whether exact value should be matched or not'.
        compare (string) - See WP_Date_Query::get_compare().
        column (string) - Column to query against. Default: 'post_date'.
        relation (string) - OR or AND, how the sub-arrays should be compared. Default: AND. */
		
/* Returns posts dated December 12, 2012: */

$query = new WP_Query( 'year=2012&monthnum=12&day=12' );

/* to samo ale zapis tablicowy */
$args = array(
	'date_query' => array(
		array(
			'year'  => 2012,
			'month' => 12,
			'day'   => 12,
		),
	),
);
$query = new WP_Query( $args );

/* Returns posts for today: */

$today = getdate();
$query = new WP_Query( 'year=' . $today['year'] . '&monthnum=' . $today['mon'] . '&day=' . $today['mday'] );

/* to samo ale zapis tablicowy */

$today = getdate();
$args = array(
	'date_query' => array(
		array(
			'year'  => $today['year'],
			'month' => $today['mon'],
			'day'   => $today['mday'],
		),
	),
);
$query = new WP_Query( $args );

/*Returns posts for this week:  */
$week = date( 'W' );
$year = date( 'Y' );
$query = new WP_Query( 'year=' . $year . '&w=' . $week );


/* to samo ale zapis tablicowy */
$args = array(
	'date_query' => array(
		array(
			'year' => date( 'Y' ),
			'week' => date( 'W' ),
		),
	),
);
$query = new WP_Query( $args );

/* Return posts between 9AM to 5PM on weekdays */



$args = array(
	'date_query' => array(
		array(
			'hour'      => 9,
			'compare'   => '>=',
		),
		array(
			'hour'      => 17,
			'compare'   => '<=',
		),
		array(
			'dayofweek' => array( 2, 6 ),//od srody do soboty
			'compare'   => 'BETWEEN',
		),
	),
	'posts_per_page' => -1,//wzytskie posty na strone
);
$query = new WP_Query( $args );

/*Return posts from January 1st to February 28th  */

$args = array(
	'date_query' => array(
		array(
			'after'     => 'January 1st, 2013',//po wartosci podanej 
			'before'    => array(//przed data podana ponizej
				'year'  => 2013,
				'month' => 2,
				'day'   => 28,
			),
			'inclusive' => true,//For after/before, whether exact value should be matched or not'. 
		),
	),
	'posts_per_page' => -1,
);
$query = new WP_Query( $args );

/* Return posts made over a year ago but modified in the Last month */

$args = array(
	'date_query' => array(
		array(
			'column' => 'post_date_gmt',
			'before' => '1 year ago',
		),
		array(
			'column' => 'post_modified_gmt',
			'after'  => '1 month ago',
		),
	),
	'posts_per_page' => -1,
);
$query = new WP_Query( $args );


?>
