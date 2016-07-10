<?php
	ob_start();
	include '../../php/createImageLightbox.inc.php';
?>

<div>
	<p class="block">
	You may have wondered what the digits on your credit or debit card represent. The string of seemingly unique random digits reveal more than you may probably have thought. Here is a sample of how your credit card or debit card might look like:
	</p>
	<div class="block" style="outline:0;">
		<?php echo createImageLightbox("img/creditcard.jpg", 354); ?>
	</div>
	<p class="block">
	<b>[1.] Industry Identifier</b> - The first digit represents the category of the industry that issued the card. Most likely you will see a 4 or a 5 for VISA or MasterCard which means the card is issued from a financial industry. The American Express card uses number 3 because it is in the category of travel.
	</p>
	<p class="block">
	<b>[2.] Issuer Identifier</b> - The first 6 digits including the Industry Identifier number refer to the establishment that issued the card. VISA cards start with 4XXXXX while MasterCard cards start with 51XXXX - 55XXXX.
	</p>
	<p class="block">
	<b>[3.] Account Number</b> - The following digits except the last represent the owner's account number. Usually these are 9 digits but they can also range up to 12 digits for a possible combination range within the trillions.
	</p>
	<p class="block">
	<b>[4.] Check Sum</b> - This is the last digit of the card number and is used to validate the card number. You can check if your card is valid by using the Luhn Algorithm. It is simple. Start from the right and multiply every other number by 2. The numbers to be multiplied in above sample credit card are:<br/>
	</p>
	<p class="block">
	{4,0,5,2,9,2,1,5} x 2 = {8,0,10,4,18,4,2,10}
	</p>
	<p class="block">
	Now add all digits as single digits (so double digits are added separately 10=1+0 and 18=1+8) together with the rest of the digits that were not multiplied by 2:
	</p>
	<p class="block">
	{8+0+(1+0)+4+(1+8)+4+2+(1+0)} + {6+1+6+0+0+9+7+2} = 60.
	</p>
	<p class="block">
	If the value is divisible by 10 then the card is valid. This card is apparently valid but please don't use my card:-P lols. Kidding, i just made up the numbers. Try it!:-) I tried it with 3 of my credit and debit cards. 
	</p>
</div>

<?php
	$pageTitle = "Debit & Credit Card Numbers";
	$pageSubTitle = "Debit & Credit Card Numbers";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	include("../../php/master.inc.php");
?>
