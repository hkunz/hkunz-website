<?php
	ob_start();
	$link = "<a class='basicLink' href='https://www.commbank.com.au/' target='_blank'>Commonwealth Bank of Australia</a>";
	include '../../php/createImageLightbox.inc.php';
?>

<div>
	<p class="block"><b>SpyTech</b> is a technologically advanced mobile computer-controlled surveillance robot that gives surveillance technology a newer variation. It uses Radio Frequency technology to establish wireless robot control. The module that wirelessly transmits the control signals to the robot is connected through the serial port of the computer. It is electronically controlled through a user-friendly software that makes control possible through the keyboard. The robot’s capabilities exceed the features of stationary surveillance cameras</p>
	<?php echo createImageLightbox("img/spy-project.jpg", 460); ?>
	<?php echo createImageLightbox("img/spy-transmitter.jpg", 460); ?>
	<h4 class='heading'>Design Specifications</h4>

	<ul class="block" style="list-style-type:none;">
<li>* Robot Dimension: <b>16.5cm x 17cm x 10cm</b></li>
<li>* Wheel Diameter: <b>8.5cm x 3cm</b> thickness</li>
<li>* Robot Speed @ <b>6.0V: 0.20 sec/60°</b></li>
<li>* Robot Output Torque @ <b>6.0V: 3.7 kg-cm</b></li>
<li>* Camera Rotational Torque @ <b>4.8V: 1.4kg-cm</b></li>
<li>* Camera Rotational Speed @ <b>4.8V: 0.20 sec/60°</b></li>
<li>* Max Horizontal Camera Rotation: <b>180°</b></li>
<li>* Max Vertical Camera Rotation: <b>120°</b></li>
<li>* Max Camera Reception Range: <b>50 m</b></li>
<li>* Camera Capture/Record Resolution: <b>640 x 480px</b></li>
<li>* Max Robot Control Range: <b>30 m</b></li>
<li>* Robot Response time delay: <b>0.5 sec</b></li>
<li>* Application Software: <b>Visual Basic 6.0</b></li>
<li>* Instant Capture Rate: <b>2 pics per sec</b></li>
<li>* Video Speed: <b>1 frame per ms</b></li>
<li>* Battery Type: <b>11.1V</b> Lithium Polymer Battery Pack</li>
<li>* Average Robot Lifespan: <b>24-48 hours</b></li>
	</ul>
	<h4 class='heading'>System Block Diagram</h4>
	<p>Here is a general overview of how control signal are sent to the mobile surveillance robot and how it is wirelessly controlled by the computer</p>
	<?php echo createImageLightbox("img/spy-blockdiagram.jpg", 460); ?>
	<h4 class='heading'>Major Components</h4>
	<ul class="block" style="list-style-type:none;">
<li>* Notebook or Desktop Computer</li>
<li>* Application Software</li>
<li>* Microcontroller Firmware</li>
<li>* PT2262 Remote Control Encoder</li>
<li>* RF Transmitter Module</li>
<li>* RF Receiver Module</li>
<li>* PT2272 Remote Control Decoder</li>
<li>* PIC16F84A Microcontroller</li>
<li>* Wireless CCTV Camera + USB2.0 Receiver</li>
<li>* Micro Servo Motor</li>
<li>* High-torque Servo Motor Actuators</li>
	</ul>
	<h4 class='heading'>Flow Diagram</h4>
	<?php echo createImageLightbox("img/spy-flowdiagram.jpg", 460); ?>
	<p>This diagram setup is more detailed in the aspects of Radio Frequency transmission. The actual wave transmission is dependent to an IC called a Remote Control Encoder (PT2262) in charge of encoding the digital control signal from the PIC microcontroller into a serially-encoded waveform which is then sent through the RF transmitter module. The receiving process is similar to the transmitting process but only the reverse in that the waveform is received by the RF receiver module. The waveform is then decoded back to digital form by the counterpart of the encoder which is the Remote Control Decoder (PT2272). This digital control signal can then be processed by the robot’s microcontroller so that specific actions can be executed. The only robot electrical controls include the two servo motors of the two hind wheels and the two micro servo motors with one mounted on the other in a way that the camera attached to the assembly is able to see in both horizontal and vertical directions.</p>
	<p class="block">Quick Links Panel</p>
	<h4 class='heading'>AudoCAD Model</h4>
	<?php echo createImageLightbox("img/spy-autocad.png", 460); ?>
	<h4 class='heading'>Application Software</h4>
	<p>The Visual Basic 6 Program is capable of accepting keyboard inputs from the user for robotic control. Not only is the user able to control it through the keys but through mouse over actions as well. Since the software incorporates an SWF file at the right upper side of the GUI, the user may move the mouse over any robotic control and thus control the robot through mouse movement. It depends on the user whether what is more convenient to him to use.</p>
	<?php echo createImageLightbox("img/spy-software.png", 460); ?>
	<ul style="list-style-type:none;">
<li><b>[1]</b> Camera Display</li>
<li><b>[2]</b> Camera Control</li>
<li><b>[3]</b> Robot Directional Control</li>
<li><b>[4]</b> Video Operation</li>
	</ul>
	<h4 class='heading'>Team Members</h4>
	<ul class="block" style="list-style-type:none;">
<li>* Jay Duhaylungsod</li>
<li>* Harry Kunz</li>
<li>* Melvin Lester Tan</li>
<li>* Christian Loyd Tindugan</li>
	</ul>
	<?php echo createImageLightbox("img/spy-team.jpg", 460); ?>
</div>

<?php
	$pageTitle = "SpyTech School Project";
	$pageSubTitle = "SpyTech School Project";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	include("../../php/master.inc.php");
?>
