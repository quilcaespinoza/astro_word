<?php
/*
Plugin Name: WooCommerce - Payme
Plugin URI: http://www.alignet.com
Description: La forma segura de pagar en linea
Version: 1.0
Author: Alignet
Author URI: http://www.alignet.com/
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

add_action('plugins_loaded', 'woocommerce_payme_init', 0);
define('PAYME_ASSETS', WP_PLUGIN_URL . "/" . plugin_basename(dirname(__FILE__)) . '/assets');

function woocommerce_payme_init(){
	if(!class_exists('WC_Payment_Gateway')) return;

    if( isset($_GET['msg']) && !empty($_GET['msg']) ){
        add_action('the_content', 'showpaymeMessages');
    }
    function showpaymeMessages($content){
            return '<div class="'.htmlentities($_GET['type']).'">'.htmlentities(urldecode($_GET['msg'])).'</div>'.$content;
    }

    /**
	 * PayU Gateway Class
     *
     * @access public
     * @param 
     * @return 
     */
	class WC_payme extends WC_Payment_Gateway{
		
		public function __construct(){
			global $woocommerce;
			$this->load_plugin_textdomain();
	        //add_action('init', array($this, 'load_plugin_textdomain'));

			$this->id 					= 'paymecheckout';
			$this->icon_default   		= $this->get_country_icon(false);
			$this->method_title 		= __('Payme - Alignet','payme-latam-woocommerce');
			$this->method_description	= __("Pay-me es el sistema integral de pagos en línea ofrecido por ALIGNET. Provee una plataforma de pagos para los comercios online. Pay-me interactúa con los componentes principales, los cuales aseguran el funcionamiento de la plataforma.",'payme-latam-woocommerce');
			$this->has_fields 			= false;
				    
			$this->init_form_fields();
			$this->init_settings();
			$this->language 		= get_bloginfo('language');

			$this->urltpv = "https://test2.alignetsac.com/VPOS2/faces/pages/startPayme.xhtml";
			$this->env = $this->settings['ALIGNET_URLTPV'];
			$this->testmode 		= "no";

			$this->merchant_id 		= ($this->testmode=='yes')?$this->testmerchant_id:'144';
			$this->account_id 		= ($this->testmode=='yes')?$this->testaccount_id:"";
			$this->apikey 			= ($this->testmode=='yes')?$this->testapikey:"";
			$this->redirect_page_id = "default";
			$this->endpoint 		= "";
			$this->payu_language 	= "ES";
			$this->taxes 			= 0;
			$this->tax_return_base 	= 0;
			$this->currency 		= ($this->is_valid_currency())?get_woocommerce_currency():'USD';

			$this->textactive 		= 0;
			$this->form_method 		='POST';

			$this->idacquirer = $this->settings['ALIGNET_IDACQUIRER'];
			$this->idcommerce = $this->settings['ALIGNET_IDCOMMERCE'];
			$this->key = $this->settings['ALIGNET_KEY'];
			$this->debug = $this->settings['ALIGNET_DEBUG'];
			$this->redir = $this->settings['ALIGNET_URLRPTA'];
			$this->idEntCommerce = $this->settings['ALIGNET_IDENTCOMMERCE'];
			$this->keywallet = $this->settings['ALIGNET_KEYWALLET'];



			$this->testmerchant_id	= '508029';
			$this->testaccount_id	= '512321';
			$this->testapikey		= '4Vj8eK4rloUd272L48hsrarnUA';
			$this->debug = "no";

			//$this->show_methods		= $this->settings['show_methods'];
			//$this->icon_checkout 	= $this->settings['icon_checkout'];

			$ALIGNET_IDACQUIRER = $this->settings['ALIGNET_IDACQUIRER'];

	  

        	if ($ALIGNET_IDACQUIRER == 29  ||	$ALIGNET_IDACQUIRER == 144  ||	$ALIGNET_IDACQUIRER == 84 || 	$ALIGNET_IDACQUIRER == 10) {
				 $logourl = WP_PLUGIN_URL . "/" . plugin_basename(dirname(__FILE__)) . '/assets/img/Forma_Pago_Pay-me_PST_PSP.PNG';
			}else{
				 $logourl = WP_PLUGIN_URL . "/" . plugin_basename(dirname(__FILE__)) . '/assets/img/Forma_Pago_Pay-me_BIZLINKS_ALTERNATIVO.PNG';
			}
		
		
			$this->title 			= "Payme";
			$this->description 		='<img src="'.$logourl.'">';
			$this->currency 		= ($this->is_valid_currency())?get_woocommerce_currency():'USD';
			$this->textactive 		= 0;
			$this->liveurl 			= 'https://gateway.payme.com/ppp-web-gateway/';
			$this->testurl 			= 'https://test2.alignetsac.com/VPOS2/faces/pages/startPayme.xhtml';


			$this->setting['ALIGNET_URLRPTA'] = get_site_url() . '/wp-content/plugins/woocommerce-payme-gateway/response.php';

			if ($this->testmode == "yes")
				$this->debug = "yes";

			add_filter( 'woocommerce_currencies', 'add_all_currency_payme' );
			add_filter( 'woocommerce_currency_symbol', 'add_all_symbol_payme', 10, 2);

			$this->msg['message'] 	= "";
			$this->msg['class'] 	= "";
			// Logs
			
				if(version_compare( WOOCOMMERCE_VERSION, '2.1', '>=')){
					$this->log = new WC_Logger();
				}else{
					$this->log = $woocommerce->logger();
				}
			
			
					
			add_action('payme_init', array( $this, 'payme_successful_request'));
			add_action( 'woocommerce_receipt_paymecheckout', array( $this, 'receipt_page' ) );
			//update for woocommerce >2.0
			add_action( 'woocommerce_api_' . strtolower( get_class( $this ) ), array( $this, 'check_payme_response' ) );
			
			if ( version_compare( WOOCOMMERCE_VERSION, '2.0.0', '>=' ) ) {
				/* 2.0.0 */
				add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( &$this, 'process_admin_options' ) );
			} else {
				/* 1.6.6 */
				add_action( 'woocommerce_update_options_payment_gateways', array( &$this, 'process_admin_options' ) );
			}
			
		}

	    public function load_plugin_textdomain()
	    {
			load_plugin_textdomain( 'payme-latam-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . "/languages" );
	    }

		/**
		 * Show payment metods by country
		 */
		
		public function get_country_icon($default=true){
			$country = '';
			if(!$default)
				$country = WC()->countries->get_base_country();

			$icon = PAYME_ASSETS.'/img/logo.png';
			return $icon;
		}
    	/**
		 * Check if Gateway can be display 
	     *
	     * @access public
	     * @return void
	     */
	    function is_available() {
			global $woocommerce;

			if ( $this->enabled=="yes" ) :
				
				// if ( !$this->is_valid_currency()) return false;
				
				if ( $woocommerce->version < '1.5.8' ) return false;

				// if ($this->testmode!='yes'&&(!$this->merchant_id || !$this->account_id || !$this->apikey )) return false;

				return true;
			endif;

			return false;
		}
		
    	/**
		 * Settings Options
	     *
	     * @access public
	     * @return void
	     */
	public function init_form_fields() {
    	$this->form_fields = array(
    		'enabled' => array(
				'title'       => __( 'Enable/Disable', 'payme-latam-woocommerce' ),
				'label'       => __( 'Enable Payme', 'payme-latam-woocommerce' ),
				'type'        => 'checkbox',
				'description' => __( 'Activar el modulo de pagos Payme' ),
				'default'     => 'yes',
				'desc_tip'    => true,
			),
    			// El combobox del ambiente
    			'ALIGNET_URLTPV' => array(
	    			'title'	=> __( 'Ambiente', 'payme-latam-woocommerce' ),
	    			'label' => __( 'Selecciona el tipo de entorno de la pasarela.', 'payme-latam-woocommerce' ),
	    			'type' => 'select',
	    			'class' => 'wc-enhanced-select',
	    			'desc_tip' => __( 'Selecciona el tipo de entorno de la pasarela.', 'payme-latam-woocommerce' ),
	    			'options' => array(
    				'Testing' => __( 'Testing ', 'payme-latam-woocommerce' ),
    				'Integracion' => __( 'Integracion ', 'payme-latam-woocommerce' ),
    				'Produccion' => __( 'Producción', 'payme-latam-woocommerce' )
    				)
	    		),
    			'ALIGNET_DEBUG' => array(
    				'title'		=> __( 'Activar Depuración', 'payme-latam-woocommerce' ),
    				'label'		=> __( 'Modo Depuración', 'payme-latam-woocommerce' ),
    				'type'		=> 'checkbox',
    				'description' => __( 'Activar esta funcionalidad para realizar pruebas. Cuando se activa, se muestran los valores enviados a la pasarela de pagos.', 'payme-latam-woocommerce' ),
    				'default'	=> 'no'
    			),

    			//datos configuracion de wallet
    			'FIELDSET_WALLET' => array(
    				'title' => __( 'CONFIGURACIÓN WALLET', 'payme-latam-woocommerce' ),
    				'type' => 'title',
    				'description' => '',
    				'default' => ''
    			),
    			'ALIGNET_IDENTCOMMERCE' => array(
    				'title'	=> __( 'ID Wallet :', 'payme-latam-woocommerce' ),
    				'type' => 'text',
    				'desc_tip' => __( 'Parámetro proporcionado por Alignet.', 'payme-latam-woocommerce' ),
    				'default' => __( '', 'payme-latam-woocommerce' )
    			),
    			// 'description' => array(
    			// 	'title'		=> __( 'Descripción :', 'payme-latam-woocommerce' ),
    			// 	'type'		=> 'textarea',
    			// 	'desc_tip'	=> __( 'Pon tu imagen aqui csm' ),
    			// 	'default'	=> __( 'Lucho marica', 'payme-latam-woocommerce' ),
    			// ),
    			'ALIGNET_KEYWALLET' => array(
    				'title'	=> __( 'Clave Wallet :', 'payme-latam-woocommerce' ),
    				'type' => 'text',
    				'desc_tip' => __( 'Parámetro proporcionado por Alignet.', 'payme-latam-woocommerce' ),
    				'default' => __( '', 'payme-latam-woocommerce' )
    			),

    			//Datos V-POS2
    			'FIELDSER_VPOS2' => array(
    				'title' => __( 'CONFIGURACIÓN V-POS2', 'payme-latam-woocommerce' ),
    				'type' => 'title',
    				'description' => '',
    				'default' => ''
    			),
    			'ALIGNET_IDACQUIRER' => array(
    				'title'	=> __( 'ID Adquiriente :', 'payme-latam-woocommerce' ),
    				'type' => 'text',
    				'desc_tip' => __( 'Parámetro proporcionado por Alignet.', 'payme-latam-woocommerce' ),
    				'default' => __( '', 'payme-latam-woocommerce' )
    			),
    			'ALIGNET_IDCOMMERCE' => array(
    				'title'	=> __( 'ID Comercio:', 'payme-latam-woocommerce' ),
    				'type' => 'text',
    				'desc_tip' => __( 'Parámetro proporcionado por Alignet.', 'payme-latam-woocommerce' ),
    				'default' => __( '', 'payme-latam-woocommerce' )
    			),

    			'ALIGNET_KEY' => array(
    				'title' => __( 'Clave V-POS2 :', 'payme-latam-woocommerce' ),
    				'type' => 'text',
    				'desc_tip' => __( 'Parámetro proporcionado por Alignet.', 'payme-latam-woocommerce' ),
    				'default' => __( '', 'payme-latam-woocommerce' )
    			),
    			'ALIGNET_URLRPTA' => array(
    				'title' => __( 'URL de Respuesta:', 'payme-latam-woocommerce' ),
    				'type' => 'text',
    				'desc_tip' => __( 'URL de respuesta para el proceso de pago.', 'payme-latam-woocommerce' ),
    				'default' => __( get_site_url() . '/wp-content/plugins/woocommerce-payme-gateway/response.php', 'payme-latam-woocommerce' )
    			),
    		);
	}
        /**
         * Generate Admin Panel Options
	     *
	     * @access public
	     * @return string
         **/
		public function admin_options(){
			echo '<img src="'.$this->get_country_icon().'" alt="PayU" width="80"><h3>'.__('Payme', 'payme-latam-woocommerce').'</h3>';
			echo '<p>'.__('Pay-me es el sistema integral de pagos en línea ofrecido por ALIGNET. Provee una plataforma de pagos para los comercios online. Pay-me interactúa con los componentes principales, los cuales aseguran el funcionamiento de la plataforma.','payme-latam-woocommerce').'</p>';
			echo '<table class="form-table">';
			// Generate the HTML For the settings form.
			$this->generate_settings_html();
			echo '</table>';
		}
        /**
		 * Generate the payme Payment Fields
	     *
	     * @access public
	     * @return string
	     */
		function payment_fields(){
			if($this->description) echo wpautop(wptexturize($this->description));
		}
		/**
		 * Generate the payme Form for checkout
	     *
	     * @access public
	     * @param mixed $order
	     * @return string
		**/
		function receipt_page($order){
			echo '<p>'.__('Usted está comprando vía payme').'</p>';
			echo $this->generate_payme_form($order);

		}
		/**
		 * Generate PayU POST arguments
	     *
	     * @access public
	     * @param mixed $order_id
	     * @return string
		**/
		function get_payme_args($order_id){
			global $woocommerce;
			$order = new WC_Order( $order_id );
			$txnid = $order->order_key.'-'.time();
			
			$redirect_url = ($this->redirect_page_id=="" || $this->redirect_page_id==0)?get_site_url() . "/":get_permalink($this->redirect_page_id);

			//For wooCoomerce 2.0
			$redirect_url = add_query_arg( 'wc-api', get_class( $this ), $redirect_url );
			$redirect_url = add_query_arg( 'order_id', $order_id, $redirect_url );
			$redirect_url = add_query_arg( '', $this->endpoint, $redirect_url );

// print_r($order );
// 			die();

			$productinfo = "Order $order_id";
			
				$str = "12547854";
				$hash = strtolower(md5($str));

			if ($this->idacquirer == 144 || $this->idacquirer == 29) {
			    $long = 5;
			} elseif ($this->idacquirer == 84 || $this->idacquirer == 10 || $this->idacquirer == 123
			    || $this->idacquirer == 23 || $this->idacquirer == 205 || $this->idacquirer == 35) {
			    $long = 9;
			}
			$purchaseOperationNumber = str_pad($order_id, $long, "0", STR_PAD_LEFT);
			$purchaseOperationNumber = $purchaseOperationNumber ;
			$purchaseAmount = floatval(str_replace('.','',number_format($order->order_total, 2, '.', '')));

			$purchaseAmountFormat = number_format(floatval($order->order_total), 2, '.', '');



			$commerceAssociated = '';
			if ($this->idacquirer == 144 || $this->idacquirer == 29) {
			    switch ($this->currency) {
			        case "PEN":
			            $commerceAssociated = 'MALL ALIGNET-PSP SOLES';
			            break;
			        case "USD":
			            $commerceAssociated = 'MALL ALIGNET-PSP DOLARES';
			            break;
			        case "068":
			            $commerceAssociated = '';
			            break;
			        default:
			            $commerceAssociated = 'MALL ALIGNET-PSP';
			            break;
			    }
			}

			// Asignar el  iso equivalente a la moneda ctual
			$isoCurrency = 0;
			switch ($this->currency){
				case 'PEN':
				$isoCurrency = '604';
				break;
			case 'USD':
				$isoCurrency = '840';
				break;
			case 'BOB':
				$isoCurrency = '068';
				break;
			case 'CRC':
				$isoCurrency = '188';
				break;
			}



			

			if (phpversion() >= 5.3) {
				    $registerVerification = openssl_digest(
				        $this->idEntCommerce . $this->merchant_id . $order->billing_email . $this->keywallet,
				        'sha512'
				    );
				    $purchaseVerification = openssl_digest(
				        $this->idacquirer.$this->idcommerce.$purchaseOperationNumber.$purchaseAmount.$isoCurrency.$this->key,
				        'sha512'
				    );
				} else {
				    $registerVerification = hash(
				        'sha512',
				        $this->idEntCommerce.$this->merchant_id.$order->billing_email.$this->keywallet
				    );
				    $purchaseVerification = hash('sha512',$this->idacquirer.$this->idcommerce.$purchaseOperationNumber.$purchaseAmount.$isoCurrency.$this->key);
			}
			
			$_reserved1 = '';
			$_reserved2 = '';
			$_reserved3 = '';
			$_reserved4 = '';
			$_reserved5 = '';
			$_reserved6 = '';
			$_reserved7 = '';
			$_reserved8 = '';
			$_reserved9 = '';
			$_reserved10 = '';
			$_reserved11 = '';
			$_reserved12 = '';

			$codAsoCardHolderWallet = '';

			switch ($this->env) {
			    case "Testing": // Testing
			        $wsdl = "https://test2.alignetsac.com/WALLETWS/services/WalletCommerce?wsdl";
			        break;
			    case "Integracion": // Integración
			        $wsdl = "https://integracion.alignetsac.com/WALLETWS/services/WalletCommerce?wsdl";
			        break;
			    case "Produccion": // Producción
			        $wsdl = "https://www.pay-me.pe/WALLETWS/services/WalletCommerce?wsdl";
			        break;
			}

			$client = new SoapClient($wsdl);
			$params = array(
			    'idEntCommerce' => (string) $this->idEntCommerce,
			    'codCardHolderCommerce' => (string) $this->merchant_id,
			    'names' => $order->billing_first_name,
			    'lastNames' => $order->billing_last_name,
			    'mail' => $order->billing_email,
			    'reserved1' => $_reserved1,
			    'reserved2' => $_reserved2,
			    'reserved3' => $_reserved3,
			    'registerVerification' => $registerVerification
			);

			$result = $client->RegisterCardHolder($params);
			$codAsoCardHolderWallet = $result->codAsoCardHolderWallet;

			
					
			$payme_args = array(
				'acquirerId' 		=> $this->idacquirer,
				'idCommerce' 		=> $this->idcommerce,
				'purchaseOperationNumber' => $purchaseOperationNumber,
				'purchaseAmount' 	=> $purchaseAmount,
				'purchaseCurrencyCode' => $isoCurrency,
				'language' 			=> $this->payu_language,
				'billingFirstName'		=> $order->billing_first_name,
				'billingLastName' 		=> $order->billing_last_name,
				'billingEmail' 		=> $order->billing_email,
				'billingAddress' 	=> $order->billing_address_1.' '.$order->billing_address_2,
				'billingZip' 		=> $order->billing_postcode,
				'billingState' 		=> $order->shipping_state,
				'billingCity' 	=> $order->billing_city,
				'billingCountry' 	=> $order->billing_country,
				'billingPhone' 			=> $order->billing_phone,
				'shippingFirstName'				=> $order->shipping_first_name,
				'shippingLastName'		=> $order->shipping_last_name,
				'shippingEmail' 		=> $order->billing_email,
				'shippingAddress' 	=> $order->shipping_address_1.' '.$order->shipping_address_2,
				'shippingZIP' 				=> $order->shipping_postcode,
				'shippingCity'		=> $order->shipping_city,
				'shippingState'			=> $order->shipping_state,
				'shippingCountry' 			=> $order->shipping_country,
				'shippingPhone' 			=> $order->billing_phone,
				'userCommerce' 			=> $this->merchant_id,
				'userCodePayme' 			=>  $codAsoCardHolderWallet,
				'descriptionProducts' 			=> $productinfo,
				'programmingLanguage' 			=> 'PHP' .phpversion(),
				'reserved1' 			=> $purchaseOperationNumber,
				'reserved2' 			=> $_reserved2,
				'reserved3' 			=> $this->currency,
				'reserved4' 			=> $purchaseAmountFormat,
				'reserved5' 			=> $_reserved5,
				'reserved6' 			=> $_reserved6,
				'reserved7' 			=> $_reserved7,
				'reserved8' 			=> $_reserved8,
				'reserved9' 			=> $_reserved9,
				'reserved10' 			=> $_reserved10,
				'reserved11' 			=> $_reserved11,
				'reserved12' 			=> $_reserved12,
				'purchaseVerification' 			=> $purchaseVerification
			);



			return $payme_args;
		}

		/**
		 * Generate the payme button link
	     *
	     * @access public
	     * @param mixed $order_id
	     * @return string
	    */
	    function generate_payme_form( $order_id ) {
			global $woocommerce;

			$order = new WC_Order( $order_id );

			if ( $this->testmode == 'yes' )
				$payulatam_adr = $this->testurl;
			else 
				$payulatam_adr = $this->liveurl;
			

			switch($this->env){
					case "Testing":
						$payme_adr= "https://test2.alignetsac.com/VPOS2/faces/pages/startPayme.xhtml";
						$payme_url = "https://test2.alignetsac.com/";
						break;
					case "Integracion":
						$payme_adr= "https://integracion.alignetsac.com/VPOS2/faces/pages/startPayme.xhtml";
						$payme_url = "https://integracion.alignetsac.com/";
						break;
					case "Produccion":
						$payme_adr= "https://vpayment.verifika.com/VPOS2/faces/pages/startPayme.xhtml";
						$payme_url = "https://vpayment.verifika.com/";
						break;
				}
// }

			$payme_args = $this->get_payme_args( $order_id );
			$payme_args_array = array();

			foreach ($payme_args as $key => $value) {
				$payme_args_array[] = '<input type="hidden" name="'.esc_attr( $key ).'" value="'.esc_attr( $value ).'" />';
			}
			// $code='jQuery("body").block({
			// 			message: "' . esc_js( __( 'Thank you for your order. We are now redirecting you to payme to make payment.', 'payme-latam-woocommerce' ) ) . '",
			// 			baseZ: 99999,
			// 			overlayCSS:
			// 			{
			// 				background: "#fff",
			// 				opacity: 0.6
			// 			},
			// 			css: {
			// 		        padding:        "20px",
			// 		        zindex:         "9999999",
			// 		        textAlign:      "center",
			// 		        color:          "#555",
			// 		        border:         "3px solid #aaa",
			// 		        backgroundColor:"#fff",
			// 		        cursor:         "wait",
			// 		        lineHeight:		"24px",
			// 		    }
			// 		});
			// 	jQuery("#submit_payme_payment_form").click();';

			// if (version_compare( WOOCOMMERCE_VERSION, '2.1', '>=')) {
			// 	 wc_enqueue_js($code);
			// } else {
			// 	$woocommerce->add_inline_js($code);
			// }
			  wp_enqueue_style( 'style-name', $payme_url . 'VPOS2/css/modalcomercio.css' );
			wp_enqueue_script('custom-script',$payme_url.'VPOS2/js/modalcomercio.js',array( 'jquery' ));

			return '<form action="" method="POST" id="payme_payment_form" target="_top" class="alignet-form-vpos2">
					' . implode( '', $payme_args_array) . '
					<input type="submit" class="button alt" onclick="javascript:AlignetVPOS2.openModal(\''.$payme_url.'\')" id="submit_payme_payment_form" value="' . __( 'Pagar Via Payme', 'payme-latam-woocommerce' ) . '" /> <a class="button cancel" href="'.esc_url( $order->get_cancel_order_url() ).'">'.__( 'Cancelar &amp; Orden', 'woocommerce' ).'</a>
				</form>';
		}

		/**
	     * Process the payment and return the result
	     *
	     * @access public
	     * @param int $order_id
	     * @return array
	     */
		function process_payment( $order_id ) {
			$order = new WC_Order( $order_id );
			$form_method = 'POST';

			if ($form_method == 'GET' ) {
				$payme_args = $this->get_payme_args( $order_id );
				$payme_args = http_build_query( $payme_args, '', '&' );
				// if ( $this->testmode == 'yes' ):
				// 	$payme_adr = $this->urltpv . '&';
				// else :
				// 	$payme_adr = $this->urltpv . '?';
				// endif;

				return array(
					'result' 	=> 'success',
					'redirect'	=> $payme_adr . $payme_args
				);
			} else {
				if (version_compare( WOOCOMMERCE_VERSION, '2.1', '>=')) {
					return array(
						'result' 	=> 'success',
						'redirect'	=> add_query_arg('order-pay', $order->id, add_query_arg('key', $order->order_key, get_permalink(woocommerce_get_page_id('pay' ))))
					);

				} else {
					return array(
						'result' 	=> 'success',
						'redirect'	=> add_query_arg('order', $order->id, add_query_arg('key', $order->order_key, get_permalink(woocommerce_get_page_id('pay' ))))
					);
				}

			}

		}
		/**
		 * Check for valid payu server callback
		 *
		 * @access public
		 * @return void
		**/
		function check_payme_response(){
			@ob_clean();
	    	if ( ! empty( $_REQUEST ) ) {
	    		header( 'HTTP/1.1 200 OK' );
	        	do_action( "payme_init", $_REQUEST );
			} else {
				wp_die( __("payme Request Failure", 'payme-latam-woocommerce') );
	   		}
		
		}

		/**
		 * Process Payu Response and update the order information
		 *
		 * @access public
		 * @param array $posted
		 * @return void
		 */
		function payme_successful_request( $posted ) {
			global $woocommerce;
			// print_r($posted);
			if ( ! empty( $posted['transactionState'] ) && ! empty( $posted['referenceCode'] ) ) {
				echo "return";
				$this->payme_return_process($posted);
			}
			if ( ! empty( $posted['state_pol'] ) && ! empty( $posted['reference_sale'] ) ) {
				$this->payme_confirmation_process($posted);

			}

			$redirect_url = $woocommerce->cart->get_checkout_url();
            //For wooCoomerce 2.0
            $redirect_url = add_query_arg( array('msg'=> urlencode(__( 'There was an error on the request. please contact the website administrator.', 'payme' )), 'type'=>$this->msg['class']), $redirect_url );

            //wp_redirect( $redirect_url );
            exit;
		}

		/*
		* Procesar pagina de respuesta
		*
		* 
		 */
		function payme_return_process($posted)
		{
			global $woocommerce;

		    $order = $this->get_payme_order( $posted );

	        $codes=array('4' => 'APPROVED' ,'6' => 'DECLINED' ,'104' => 'ERROR' ,'5' => 'EXPIRED','7' => 'PENDING' );

		     if ( 'yes' == $this->debug )
	        	$this->log->add( 'payme', 'Payme Found order #' . $order->id );


	        if ( 'yes' == $this->debug )
	        	$this->log->add( 'payme', 'Payme Transaction state: ' . $posted['transactionState'] );
	        

	        	$state=$posted['transactionState'];
	        	// We are here so lets check status and do actions
		        switch ( $codes[$state] ) {
		            case 'APPROVED' :
		            case 'PENDING' :

		            	// Check order not already completed
		            	if ( $order->status == 'completed' ) {
		            		 if ( 'yes' == $this->debug )
		            		 	$this->log->add( 'payme', __('Aborting, Order #' . $order->id . ' is already complete.', 'payme-latam-woocommerce') );
		            		 exit;
		            	}

						// Validate Amount
					    if ( $order->get_total() != $posted['TX_VALUE'] ) {
					    	$order->update_status( 'on-hold', sprintf( __( 'Validation error: payme amounts do not match (gross %s).', 'payme-latam-woocommerce'), $posted['TX_VALUE'] ) );

							$this->msg['message'] = sprintf( __( 'Validation error: payme amounts do not match (gross %s).', 'payme-latam-woocommerce'), $posted['TX_VALUE'] );
							$this->msg['class'] = 'woocommerce-error';	

					    }

					    // Validate Merchand id 
						if ( strcasecmp( trim( $posted['merchantId'] ), trim( $this->merchant_id ) ) != 0 ) {
					    	$order->update_status( 'on-hold', sprintf( __( 'Validation error: Payment in payme comes from another id (%s).', 'payme-latam-woocommerce'), $posted['merchantId'] ) );
							$this->msg['message'] = sprintf( __( 'Validation error: Payment in payme comes from another id (%s).', 'payme-latam-woocommerce'), $posted['merchantId'] );
							$this->msg['class'] = 'woocommerce-error';

						}

						 // Payment Details
		                if ( ! empty( $posted['buyerEmail'] ) )
		                	update_post_meta( $order->id, __('Payer payme email', 'payme-latam-woocommerce'), $posted['buyerEmail'] );
		                if ( ! empty( $posted['transactionId'] ) )
		                	update_post_meta( $order->id, __('Transaction ID', 'payme-latam-woocommerce'), $posted['transactionId'] );
		                if ( ! empty( $posted['trazabilityCode'] ) )
		                	update_post_meta( $order->id, __('Trasability Code', 'payme-latam-woocommerce'), $posted['trazabilityCode'] );
		                /*if ( ! empty( $posted['last_name'] ) )
		                	update_post_meta( $order->id, 'Payer last name', $posted['last_name'] );*/
		                if ( ! empty( $posted['lapPaymentMethodType'] ) )
		                	update_post_meta( $order->id, __('Payment type', 'payme-latam-woocommerce'), $posted['lapPaymentMethodType'] );

		                if ( $codes[$state] == 'APPROVED' ) {
		                	$order->add_order_note( __( 'payme payment approved', 'payme-latam-woocommerce') );
							$this->msg['message'] = $this->msg_approved;
							$this->msg['class'] = 'woocommerce-message';
		                	$order->payment_complete();
		                } else {
		                	$order->update_status( 'on-hold', sprintf( __( 'Payment pending: %s', 'payme-latam-woocommerce'), $codes[$state] ) );
							$this->msg['message'] = $this->msg_pending;
							$this->msg['class'] = 'woocommerce-info';
		                }

		            break;
		            case 'DECLINED' :
		            case 'EXPIRED' :
		            case 'ERROR' :
		                // Order failed
		                $order->update_status( 'failed', sprintf( __( 'Payment rejected via PayU Latam. Error type: %s', 'payme-latam-woocommerce'), ( $codes[$state] ) ) );
							$this->msg['message'] = $this->msg_declined ;
							$this->msg['class'] = 'woocommerce-error';
		            break;
		            default :
		                $order->update_status( 'failed', sprintf( __( 'Payment rejected via PayU Latam.', 'payme-latam-woocommerce'), ( $codes[$state] ) ) );
							$this->msg['message'] = $this->msg_cancel ;
							$this->msg['class'] = 'woocommerce-error';
		            break;
		        }

			$redirect_url = ($this->redirect_page_id=='default' || $this->redirect_page_id==""  || $this->redirect_page_id==0)?$order->get_checkout_order_received_url():get_permalink($this->redirect_page_id);
            //For wooCoomerce 2.0
            $redirect_url = add_query_arg( array('msg'=> urlencode($this->msg['message']), 'type'=>$this->msg['class']), $redirect_url );

            wp_redirect( $redirect_url );
            exit;
		}


		/*
		* Procesar pagina de confirmacion
		*
		* 
		 */
		function payme_confirmation_process($posted){
			global $woocommerce;
			    $order = $this->get_payme_order( $posted );

	        	$codes=array(
	        		'1' => 'CAPTURING_DATA' ,
	        		'2' => 'NEW' ,
	        		'101' => 'FX_CONVERTED' ,
	        		'102' => 'VERIFIED' ,
	        		'103' => 'SUBMITTED' ,
	        		'4' => 'APPROVED' ,
	        		'6' => 'DECLINED' ,
	        		'104' => 'ERROR' ,
	        		'7' => 'PENDING' ,
	        		'5' => 'EXPIRED'  
	        	);

			    if ( 'yes' == $this->debug )
		        	$this->log->add( 'payme', 'Found order #' . $order->id );

	        	$state=$posted['state_pol'];

		        if ( 'yes' == $this->debug )
		        	$this->log->add( 'payme', 'Payment status: ' . $codes[$state] );
	        
	        	// We are here so lets check status and do actions
		        switch ( $codes[$state] ) {
		            case 'APPROVED' :
		            case 'PENDING' :

		            	// Check order not already completed
		            	if ( $order->status == 'completed' ) {
		            		 if ( 'yes' == $this->debug )
		            		 	$this->log->add( 'payme', __('Aborting, Order #' . $order->id . ' is already complete.', 'payme-latam-woocommerce') );
		            		 exit;
		            	}

						// Validate Amount
					    if ( $order->get_total() != $posted['value'] ) {
					    	$order->update_status( 'on-hold', sprintf( __( 'Validation error: payme amounts do not match (gross %s).', 'payme-latam-woocommerce'), $posted['value'] ) );

							$this->msg['message'] = sprintf( __( 'Validation error: payme amounts do not match (gross %s).', 'payme-latam-woocommerce'), $posted['value'] );
							$this->msg['class'] = 'woocommerce-error';	
					    }

					    // Validate Merchand id 
						if ( strcasecmp( trim( $posted['merchant_id'] ), trim( $this->merchant_id ) ) != 0 ) {

					    	$order->update_status( 'on-hold', sprintf( __( 'Validation error: Payment in payme comes from another id (%s).', 'payme-latam-woocommerce'), $posted['merchant_id'] ) );
							$this->msg['message'] = sprintf( __( 'Validation error: Payment in payme comes from another id (%s).', 'payme-latam-woocommerce'), $posted['merchant_id'] );
							$this->msg['class'] = 'woocommerce-error';
						}

						 // Payment details
		                if ( ! empty( $posted['email_buyer'] ) )
		                	update_post_meta( $order->id, __('payme Client email', 'payme-latam-woocommerce'), $posted['email_buyer'] );
		                if ( ! empty( $posted['transaction_id'] ) )
		                	update_post_meta( $order->id, __('Transaction ID', 'payme-latam-woocommerce'), $posted['transaction_id'] );
		                if ( ! empty( $posted['reference_pol'] ) )
		                	update_post_meta( $order->id, __('Trasability Code', 'payme-latam-woocommerce'), $posted['reference_pol'] );
		                if ( ! empty( $posted['sign'] ) )
		                	update_post_meta( $order->id, __('Tash Code', 'payme-latam-woocommerce'), $posted['sign'] );
		                if ( ! empty( $posted['ip'] ) )
		                	update_post_meta( $order->id, __('Transaction IP', 'payme-latam-woocommerce'), $posted['ip'] );

		               	update_post_meta( $order->id, __('Extra Data', 'payme-latam-woocommerce'), 'response_code_pol: '.$posted['response_code_pol'].' - '.'state_pol: '.$posted['state_pol'].' - '.'payment_method: '.$posted['payment_method'].' - '.'transaction_date: '.$posted['transaction_date'].' - '.'currency: '.$posted['currency'] );
		                

		                if ( ! empty( $posted['payment_method_type'] ) )
		                	update_post_meta( $order->id, __('Payment type', 'payme-latam-woocommerce'), $posted['payment_method_type'] );

		                if ( $codes[$state] == 'APPROVED' ) {
		                	$order->add_order_note( __( 'payme payment approved', 'payme-latam-woocommerce') );
							$this->msg['message'] =  $this->msg_approved;
							$this->msg['class'] = 'woocommerce-message';
		                	$order->payment_complete();

			            	if ( 'yes' == $this->debug ){ $this->log->add( 'payme', __('Payment complete.', 'payme-latam-woocommerce'));}

		                } else {
		                	$order->update_status( 'on-hold', sprintf( __( 'Payment pending: %s', 'payme-latam-woocommerce'), $codes[$state] ) );
							$this->msg['message'] = $this->msg_pending;
							$this->msg['class'] = 'woocommerce-info';
		                }


		            break;
		            case 'DECLINED' :
		            case 'EXPIRED' :
		            case 'ERROR' :
		            case 'ABANDONED_TRANSACTION':
		                // Order failed
		                $order->update_status( 'failed', sprintf( __( 'Payment rejected via PayU Latam. Error type: %s', 'payme-latam-woocommerce'), ( $codes[$state] ) ) );
							$this->msg['message'] = $this->msg_declined ;
							$this->msg['class'] = 'woocommerce-error';
		            break;
		            default :
		                $order->update_status( 'failed', sprintf( __( 'Payment rejected via PayU Latam.', 'payme-latam-woocommerce'), ( $codes[$state] ) ) );
							$this->msg['message'] = $this->msg_cancel ;
							$this->msg['class'] = 'woocommerce-error';
		            break;
		        }
		}
		

		/**
		 *  Get order information
		 *
		 * @access public
		 * @param mixed $posted
		 * @return void
		 */
		function get_payme_order( $posted ) {
			$custom =  $posted['order_id'];
			
	    	// Backwards comp for IPN requests
	    	
		    	$order_id = (int) $custom;
		    	$reference_code = ($posted['referenceCode'])?$posted['referenceCode']:$posted['reference_sale'];
	    		$order_key = explode('-', $reference_code);
				$order_key = ($order_key[0])?$order_key[0]:$order_key;

			$order = new WC_Order( $order_id );

			if ( ! isset( $order->id ) ) {
				$order_id 	= woocommerce_get_order_id_by_order_key( $order_key );
				$order 		= new WC_Order( $order_id );
			}

			// Validate key
			if ( $order->order_key !== $order_key ) {
	        	if ( $this->debug=='yes' )
	        		$this->log->add( 'payme', __('Error: Order Key does not match invoice.', 'payme-latam-woocommerce') );
	        	exit;
	        }

	        return $order;
		}


		/**
		 * Check if current currency is valid for PayU Latam
		 *
		 * @access public
		 * @return bool
		 */
		function is_valid_currency() {
			if ( ! in_array( get_woocommerce_currency(), apply_filters( 'woocommerce_payme_supported_currencies', array( 'CLP', 'ARS', 'BRL', 'COP', 'MXN', 'PEN', 'USD','CRC' ) ) ) ) return false;

			return true;
		}
		
		/**
		 * Get pages for return page setting
		 *
		 * @access public
		 * @return bool
		 */
		function get_pages($title = false, $indent = true) {
			$wp_pages = get_pages('sort_column=menu_order');
			$page_list = array('default'=>__('Default Page','payme-latam-woocommerce'));
			if ($title) $page_list[] = $title;
			foreach ($wp_pages as $page) {
				$prefix = '';
				// show indented child pages?
				if ($indent) {
                	$has_parent = $page->post_parent;
                	while($has_parent) {
                    	$prefix .=  ' - ';
                    	$next_page = get_page($has_parent);
                    	$has_parent = $next_page->post_parent;
                	}
            	}
            	// add to page list array array
            	$page_list[$page->ID] = $prefix . $page->post_title;
        	}
        	return $page_list;
    		}
		}


		/**
		 * Add all currencys supported by PayU Latem so it can be display 
		 * in the woocommerce settings
		 *
		 * @access public
		 * @return bool
		 */
		function add_all_currency_payme( $currencies ) {
			$currencies['ARS'] = __( 'Argentine Peso', 'payme-latam-woocommerce');
			$currencies['BRL'] = __( 'Brasilian Real', 'payme-latam-woocommerce');
			$currencies['COP'] = __( 'Colombian Peso', 'payme-latam-woocommerce');
			$currencies['MXN'] = __( 'Mexican Peso', 'payme-latam-woocommerce');
			$currencies['CLP'] = __( 'Chile Peso', 'payme-latam-woocommerce');
			$currencies['PEN'] = __( 'Perubian New Sol', 'payme-latam-woocommerce');
			return $currencies;
		}

		/**
		 * funciión que retorna el equivalente iso de una moneda
		 * in the woocommerce settings
		 *
		 * @access public
		 * @return string
		 */
		function get_isoCurrency( $currency ) {

			switch($currency){
					case "PEN":
						$isoCurrency= 604;
						break;
					case "USD":
						$isoCurrency= 840 ;
						break;
				}

			return $isoCurrency;
		}

		/**
		 * Add simbols for all currencys in payme so it can be display 
		 * in the woocommerce settings
		 *
		 * @access public
		 * @return bool
		 */
		function add_all_symbol_payme( $currency_symbol, $currency ) {
			switch( $currency ) {
			case 'ARS': $currency_symbol = '$'; break;
			case 'CLP': $currency_symbol = '$'; break;
			case 'BRL': $currency_symbol = 'R$'; break;
			case 'COP': $currency_symbol = '$'; break;
			case 'MXN': $currency_symbol = '$'; break;
			case 'PEN': $currency_symbol = 'S/.'; break;
			}
			return $currency_symbol;
		}
		/**
		* Add the Gateway to WooCommerce
		**/
		function woocommerce_add_payme_gateway($methods) {
			$methods[] = 'WC_payme';
			return $methods;
		}

		add_filter('woocommerce_payment_gateways', 'woocommerce_add_payme_gateway' );
	}

	/**
	 * Filter simbol for currency currently active so it can be display 
	 * in the front end
     *
     * @access public
     * @param (string) $currency_symbol, (string) $currency
     * @return (string) filtered currency simbol
     */
	function frontend_filter_currency_sim( $currency_symbol, $currency ) {
		switch( $currency ) {
		case 'ARS': $currency_symbol = '$'; break;
		case 'CLP': $currency_symbol = '$'; break;
		case 'BRL': $currency_symbol = 'R$'; break;
		case 'COP': $currency_symbol = '$'; break;
		case 'MXN': $currency_symbol = '$'; break;
		case 'PEN': $currency_symbol = 'S/.'; break;
		}
		return $currency_symbol;
	}
	add_filter( 'woocommerce_currency_symbol', 'frontend_filter_currency_sim', 1, 2);