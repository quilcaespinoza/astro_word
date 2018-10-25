<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'count_to'        => array(
		'type'  => 'datetime-picker',
		'value' => '',
		'label' => esc_html__('Label', 'finvision'),
		'desc'  => esc_html__('Description', 'finvision'),
		'help'  => esc_html__('Help tip', 'finvision'),
		'datetime-picker' => array(
			'format'        => 'Y/m/d H:i', // Format datetime.
			'maxDate'       => false,  // By default there is not maximum date , set a date in the datetime format.
			'minDate'       => false,  // By default minimum date will be current day, set a date in the datetime format.
			'timepicker'    => true,   // Show timepicker.
			'datepicker'    => true,   // Show datepicker.
			'defaultTime'   => '12:00' // If the input value is empty, timepicker will set time use defaultTime.
		),
	)

);