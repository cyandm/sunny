<?php
if (!class_exists('cyn_woocommerce')) {
    class cyn_woocommerce
    {
        function __construct()
        {


            add_filter('woocommerce_checkout_fields', [$this, 'unrequire_checkout_fields']);
            add_filter('woocommerce_checkout_fields', [$this, 'remove_checkout_fields'], 100);
            add_action('init', [$this, 'display_quantity_button_in_single_product']);
            add_filter('woocommerce_checkout_fields', [$this, 'override_billing_checkout_fields'], 20, 1);
        }


        //**************************************************************** remove field from checkout fields
        public function unrequire_checkout_fields($fields)
        {
            $fields['billing']['billing_company']['required'] = false;
            $fields['billing']['billing_country']['required'] = false;
            $fields['billing']['billing_address_1']['required'] = false;
            $fields['billing']['billing_address_2']['required'] = false;
            $fields['billing']['billing_postcode']['required'] = false;
            $fields['billing']['billing_email']['required'] = false;
            return $fields;
        }

        public function remove_checkout_fields($fields)
        {
            unset($fields['billing']['billing_company']);
            unset($fields['billing']['billing_country']);


            unset($fields['shipping']['shipping_company']);
            unset($fields['shipping']['shipping_country']);

            return $fields;
        }

        public function  display_quantity_button_in_single_product()
        {
            add_action('woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus');

            function bbloomer_display_quantity_plus()
            {

                echo '<button type="button" class="minus"><i class="icon-minus"></i></button>';
            }

            add_action('woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus');

            function bbloomer_display_quantity_minus()
            {
                echo '<button type="button" class="plus"><i class=" icon-plus"></i></button>';
            }

            // -------------
            // 2. Trigger update quantity script

            add_action('wp_footer', 'bbloomer_add_cart_quantity_plus_minus');

            function bbloomer_add_cart_quantity_plus_minus()
            {

                if (!is_product() && !is_cart()) return;

                wc_enqueue_js("   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   ");
            }
        }
        // ******************************************change label and placeholder checkout form
        public function override_billing_checkout_fields($fields)
        {
            $fields['billing']['billing_first_name']['placeholder'] = ' نام';
            $fields['billing']['billing_last_name']['placeholder'] = 'نام خانوادگی ';
            $fields['billing']['billing_phone']['placeholder'] = 'تلفن همراه';
            $fields['billing']['billing_phone']['label'] = 'تلفن همراه';
            $fields['billing']['billing_postcode']['placeholder'] = 'کد پستی';
            $fields['billing']['billing_postcode']['label'] = 'کد پستی( اختیاری)';
            $fields['billing']['billing_email']['label'] = ' ایمیل ( اختیاری)';
            $fields['billing']['billing_address_1']['placeholder'] = 'آدرس را وارد کنید ';
            $fields['billing']['billing_address_1']['label'] = 'آدرس خیابان';
            $fields['billing']['billing_address_2']['label'] = 'کوچه ، پلاک';


            return $fields;
        }
    }
}
