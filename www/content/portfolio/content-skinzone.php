<?php
	$page->setPageTitle("SkinZone");
	$img = $page->getImagePath();
	$link = "<a class='basicLink' href='http://www.skinzoneskincare.com' target='_blank'>www.SkinZoneSkincare.com</a>"
?>
<p class="block">Phew... I must admit i suck at design but i still managed to develop a "nice" (it may not look nice to you:-P) flash-based website for a friend (who I owe lunch and dinner too because Marge and I kept a big secret from her which hurt her feelings:-P). The site can directly be viewed at <?php echo $link; ?>.</p><p class="block">The flash file in that site was created with mostly pure <a href='http://en.wikipedia.org/wiki/ActionScript#ActionScript_2.0' target='_blank'>ActionScript 2.0</a> implementing the <a class='basicLink' href='http://en.wikipedia.org/wiki/Object-oriented_programming' target="_blank">Object-Oriented Programming</a> (OOP) paradigm and the <a href='http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller' target='_blank'>MVC pattern</a> in its architectural design.</p>
<?php echo createImageLightbox($img . "SzHome.jpg", 460); ?>
<p class="block">This here page was my first attempt to get a page flipping module working. I think it was a successful attempt though not sure if the design fits.</p>
<?php echo createImageLightbox($img . "SzFlipPage.jpg", 460); ?>
<p class="block">I also created a class for handling the gallery of images. Images were retrieved through XML. I wasn't familiar yet with the JSON technology at the time i built this site. Based on my experience, JSON is the best format for keeping external data.</p>
<?php echo createImageLightbox($img . "SzGallery.jpg", 460); ?>
<p class="block">These are just some of the highlights of the site. There is still much more to see in the site. Please check out the site at <?php echo $link; ?>. It looks nicer with the animation.</p>