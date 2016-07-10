<?php
	ob_start();
	$link = "<a class='basicLink' href='http://seafight.com' target='_blank'>Seafight</a>";
	include '../../php/createImageLightbox.inc.php';
?>

<div>
	<p class="block">The <?php echo $link;?> game client written in <a href='https://en.wikipedia.org/wiki/ActionScript' target='_blank'>ActionScript 3.0</a> communicating with a Java based game server.</p>
	<?php echo createImageLightbox("img/sf-logo.gif", 460); ?>
	<?php echo createImageLightbox("img/bigpoint-logo.png", 460); ?>
	<p class="block">Seafight ingame view within the safe-haven</p>
	<?php echo createImageLightbox("img/sf-view.png", 460); ?>
	<p class="block">My typical work day facing my favorite terminal emulator! :)</p>
	<?php echo createImageLightbox("img/sf-typical-work-day.png", 460); ?>
	<p class="block">Cannon Equipment Window: Equip your cannons to make you stronger on the seas</p>
        <?php echo createImageLightbox("img/sf-cannon-equipment.png", 460); ?>
	<p class="block">Gem Configurator Window: Socket gems into your ship and pet slots</p>
        <?php echo createImageLightbox("img/sf-gem-configurator.png", 460); ?>
	<p class="block">Gem Crafting Window: Craft lower level gems into more valuable higher level gems</p>
        <?php echo createImageLightbox("img/sf-gem-crafting.png", 460); ?>
	<p class="block">Leagues Window: Pirates are classified in different leagues based on their experience and strength on the seas</p>
        <?php echo createImageLightbox("img/sf-league-window.png", 460); ?>
	<p class="block">Mateys Window: A list of all your mateys or friends you can communicate with and invite in minigame challenges</p>
        <?php echo createImageLightbox("img/sf-mateys-list.png", 460); ?>
	<p class="block">Cauldron Window: Throw mojos into the cauldron to get some random loot and bonus map pieces</p>
        <?php echo createImageLightbox("img/sf-cauldron.png", 460); ?>
	<p class="block">Map Editor: I have written in C++ which we use for creating and modifying the maps we have ingame</p>
        <?php echo createImageLightbox("img/sf-rcon-mapeditor.png", 460); ?>
	<p class="block">Tile Editor: Also written in C++ to specify which tiles are blocked</p>
        <?php echo createImageLightbox("img/sf-rcon-tile-editor.png", 460); ?>
</div>

<?php
	$pageTitle = "Seafight";
	$pageSubTitle = "Seafight";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>
