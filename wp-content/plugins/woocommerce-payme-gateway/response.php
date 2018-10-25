<?php 
// if ( ! defined( 'ABSPATH' ) ) { exit; }
error_reporting(0);
require('../../../wp-load.php');
// require('woocommerce-gateway-payme.php');
add_action('plugins_loaded', 'woocommerce_payme_init', 0);
add_filter('show_admin_bar', '__return_false');
get_header( 'home' );

$payme  = new WC_payme();


$keywallet = $payme->settings['ALIGNET_KEYWALLET'];
$acquirerId = $payme->settings['ALIGNET_IDACQUIRER'];
$idCommerce = $payme->settings['ALIGNET_IDCOMMERCE'];
$key = $payme->settings['ALIGNET_KEY'];

$authorizationResult = trim($_POST['authorizationResult']) == "" ? "-" : $_POST['authorizationResult'];
$authorizationCode = trim($_POST['authorizationCode']) == "" ? "-" : $_POST['authorizationCode'];
$errorCode = trim($_POST['errorCode']) == "" ? "-" : $_POST['errorCode'];
$errorMessage = trim($_POST['errorMessage']) == "" ? "-" : $_POST['errorMessage'];
$bin = trim($_POST['bin']) == "" ? "-" : $_POST['bin'];
$brand = trim($_POST['brand']) == "" ? "-" : $_POST['brand'];
$paymentReferenceCode = trim($_POST['paymentReferenceCode']) == "" ? "-" : $_POST['paymentReferenceCode'];
$reserved1 = trim($_POST['reserved1']) == "" ? "-" : $_POST['reserved1'];
$reserved3 = trim($_POST['reserved3']) == "" ? "-" : $_POST['reserved3'];
$reserved4 = trim($_POST['reserved4']) == "" ? "-" : $_POST['reserved4'];
$reserved10 = trim($_POST['reserved10']) == "" ? "-" : $_POST['reserved10'];

$fechaHora = date("d/m/Y");

$purchaseOperationNumber = $_POST['purchaseOperationNumber'];
// $purchaseOperationNumber = str_pad($purchaseOperationNumber, 5, "0", STR_PAD_LEFT);
$purchaseAmount = $_POST['purchaseAmount'];
$purchaseCurrencyCode = $_POST['purchaseCurrencyCode'];
$purchaseVerification = $_POST['purchaseVerification'];
if (isset($_POST['plan'])){
  $plan = $_POST['plan'];  
}else{
    $plan = "";
}

if (isset($_POST['cuota'])){
 $cuota = $_POST['cuota'];
}else{
   $cuota = "";
}


if (isset($_POST['montoAproxCuota'])){
$montoAproxCuota = $_POST['montoAproxCuota'];
}else{
  $montoAproxCuota ="";
}


 if ($authorizationResult == "00") {
$resultadoOperacion = "Transacción Autorizada.";

}else if ($authorizationResult == '03'){
 $resultadoOperacion = "Transacción Autorizada.";

}else if ($authorizationResult == '04'){

 $resultadoOperacion = "Transacción Autorizada.";
}else if ($authorizationResult == '05'){
  $resultadoOperacion = "Operación Rechazada.";
}
else if ($authorizationResult == '01'){
  $resultadoOperacion = "Operación Denegada.";
}



$numeroCip  = trim($_POST['numeroCip']) == "" ? "-" : $_POST['numeroCip'];
$messageOperacion = "";

$generedPurchaseVerification = '';
if (phpversion() >= 5.3) {
    $generedPurchaseVerification = openssl_digest(
    $acquirerId.$idCommerce.$purchaseOperationNumber.$purchaseAmount.$purchaseCurrencyCode
    .$_POST['authorizationResult'].$key,
    'sha512'
    );
} else {
    $generedPurchaseVerification = hash(
    'sha512',
    $acquirerId.$idCommerce.$purchaseOperationNumber.$purchaseAmount.$purchaseCurrencyCode
    .$_POST['authorizationResult'].$key
    );
}



?>

<p class="return-to-shop">
        <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
            <?php _e( 'Return To Shop', 'woocommerce' ) ?>
        </a>
    </p>

<?php

echo "<div class='content-area'>";


    $id  = $_POST['purchaseOperationNumber'];
    $order = new WC_Order($id);
    // $address    = $order->get_billing_address();
    $customer_id = get_current_user_id();



    add_action( 'woocommerce_email_before_order_table', array( $order, 'email_instructions' ), 10, 3 );

    $result = process_payment($id,$generedPurchaseVerification,$purchaseVerification,$authorizationResult);


     function process_payment( $order_id,$generedPurchaseVerification,$purchaseVerification,$authorizationResult ) {

            $order = wc_get_order( $order_id );

            $status = 'wc-' === substr( $order->order_status, 0, 3 ) ? substr( $order->order_status, 3 ) : $order->order_status;



            if ($generedPurchaseVerification == $purchaseVerification) {
                    if ($authorizationResult == "00") {
                        
                        $order->update_status( 'wc-completed', __(  'Transacción Completada', $order->domain ) );
                        $order->reduce_order_stock();
                        $resultadoOperacion = "Transacción Autorizada.";

                    }else if ($authorizationResult == '03'){
                         $resultadoOperacion = "Transacción Autorizada.";

                    }else if ($authorizationResult == '04'){

                         $resultadoOperacion = "Transacción Autorizada.";
                    }else if ($authorizationResult == '05'){
                         $order->update_status( 'Cancelado', __( 'La Transacción fue rechazada.', $order->domain ) );
                          $resultadoOperacion = "Operación Rechazada.";
                    }
                    else if ($authorizationResult == '01'){
                         $order->update_status( 'wc-failed', __( 'La Transacción fue denegada.', $order->domain ) );
                          $resultadoOperacion = "Operación Denegada.";
                    }
                    else {

                    }
          
                 
            }else{

                 $order->update_status( 'Failed', __( 'Transacción Invalida. Los datos fueron alterados en el proceso de respuesta. Contactarse con el comercio.', $order->domain ) );
    
            }

            WC()->cart->empty_cart();
            // $order->get_return_url( $order );
        }

echo 'Resultado de la Operación : '.$resultadoOperacion.'<br>';
echo 'Número de la Operación : '. $purchaseOperationNumber.'<br>';
echo 'Fecha Operación : '. $fechaHora.'<br>';
echo 'Monto : '. number_format($reserved4,2).'<br>';
echo 'Moneda : '. $reserved3.'<br>';
echo 'Tarjeta : '. $brand.'<br>';
echo 'Número Tarjeta : '. $paymentReferenceCode.'<br>';
echo "</div>";

        function email_instructions( $order, $sent_to_admin, $plain_text = false ) {
        
            if ( $this->instructions && ! $sent_to_admin && $this->id === $order->payment_method && $order->has_status( 'on-hold' ) ) {
                echo wpautop( wptexturize( $this->instructions ) ) . PHP_EOL;
            }
        }

// get_sidebar();
 get_footer(); 

 ?>
