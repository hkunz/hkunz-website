<?php
  ob_start(); //Buffer larger content areas like the main page content
?>

<div>
	<p>This website is still under construction.<br />Thank you for visiting.<br />Please do visit my blog at <a href="http://www.hkunz.com/blog/" target="_blank">my blog</a>.</p>
</div>

<?php
	$pageTitle = "hkunz.com";
	$pageSubTitle = "Home";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();

	include("php/master.inc.php");
	//FirePHP is distributed subject to the New BSD License on an "AS IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. USE AT YOUR OWN RISK. IN NO EVENT WILL ANY COPYRIGHT HOLDER OR ANY OTHER PARTY BE LIABLE TO YOU FOR DAMAGES. By using FirePHP you agree to all terms of the New BSD License. Software License Agreement (New BSD License) Copyright (c) 2006-2010, Christoph Dorn All rights reserved. Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met: * Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer. * Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution. * Neither the name of Christoph Dorn nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission. THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
?>