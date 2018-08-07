<?php

require "PaystackCharge.php";

// you can configure to use default charge (1.5% with a additional 100ngn if above 2500)
// or a negotiated charge
$pc = new PaystackCharge(); // use default
echo $pc->add_for_kobo(975000) . "\n";
$pc = new PaystackCharge(0.015, 0); // always 1.5% flat
echo $pc->add_for_kobo(985000) . "\n";
$pc = new PaystackCharge(0.015, 5000); // 1.5% with a additional 50ngn if above 2500ngn
echo $pc->add_for_kobo(980000) . "\n";
$pc = new PaystackCharge(0.039, 10000, 250000, 1000000000); // 3.9% with a additional 100ngn if above 2500ngn - 10Mngn charge cap (essentially infinite). This actually adds the charge as if it were a foreign transaction.
echo $pc->add_for_kobo(951000) . "\n";

// after configuring, you can add the charge to an ngn value or a kobo value by calling
// the appropriate function.
// will return the amount to request so Paystack will settle with the supplied amount
$toget1000 = $pc->add_for_ngn(1000);
$toget1000 = $pc->add_for_kobo(100000);

