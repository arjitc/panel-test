<?php include('views/header/header.php'); ?>
<?php include('ping.php'); ?>
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand">CrownCloud Dedicated Panel</a>
    <ul class="nav">
      <li class="active"><a>Welcome back, <?php echo $_SESSION['user_name']; ?> </a></li>
      <li><a href="index.php?logout">Logout</a></li>
    </ul>
  </div>
</div>
<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#pane1" data-toggle="tab">My Server</a></li>
    <li><a href="#pane2" data-toggle="tab">My IP allocation</a></li>
    <li><a href="#pane3" data-toggle="tab">rDNS</a></li>
    <li><a href="#pane4" data-toggle="tab">Password Hash Generator</a></li>
    <li><a href="#pane5" data-toggle="tab">Version Changelog</a></li>
  </ul>
  <div class="tab-content">
    <div id="pane1" class="tab-pane active">
<div class="well well-large">
<table class="table table-bordered">
<tr>
<th colspan="2">Server Specs</th>
</tr>
<?php
 $con = $db->getDatabaseConnection();
 $query = "SELECT s.main_address, s.CPU, s.RAM, s.Disk, s.bandwidth FROM server s JOIN users u ON (s.iduser = u.iduser)
 WHERE u.user_name = '".$_SESSION['user_name']."'";
 $o = $con->query($query);
 $d = $o->fetch_object();
?>
<tr>
<td>CPU : <?php echo $d->CPU; ?></td>
<td>RAM : <?php echo $d->RAM; ?></td>
</tr>
<tr>
<td>Main IP :  <?php echo $d->main_address; ?></td>
<td>Disk :  <?php echo $d->Disk; ?></td>
</tr>
<tr>
<td>Bandwidth :  <?php echo $d->bandwidth; ?></td>
<td>Disk :  <?php echo $d->Disk; ?></td>
</tr>
</table>
<br>

<table class="table table-bordered">
<tr>
<th colspan="2">Online / Offline <a data-toggle="modal" href="#help1" class="btn-warning btn-mini">?</a></th>
</tr>
<tr>
<td>
<?php
$host = $d->main_address;
$ping = new Ping($host);
$latency = $ping->ping();
if ($latency) {
  print '<img src="arrow_up_16.png"> Server Online and Latency is ' . $latency . ' ms';
}
else {
  print '<img src="arrow_down_16.png"> Server Offline';
}
?>
</td>
</tr>
</table>
    </div></div>
    <div id="pane2" class="tab-pane">

<div class ="well">
To order more IPs open a ticket at the client area, do note, allocations larger than or equal to a /28 (13 IPs) will need IP use justification
</div>
<div class="well well-large">
<table class="table table-bordered">
<tr>
<th colspan="2">My IP allocation</th>
</tr>
<?php
$query = "SELECT ip.ipAddress, ip.reverseDNS FROM ip JOIN users u ON (ip.iduser = u.iduser)
 WHERE u.user_name = '".$_SESSION['user_name']."'";
  $o = $con->query($query);
  while ($d = $o->fetch_object()) {
      $addr[] = Array($d->ipAddress, $d->reverseDNS);
  }
 ?>
<tr>
<td><?php
foreach($addr as $out) {
  echo $out[0]. "<br>";
} ?> </td>
</tr>
</table>
<br>
</div>
    </div>
    <div id="pane3" class="tab-pane">
<div class ="well">
This feature is not yet finished, so for now, you'll have to open a ticket to get the rDNS modified
</div>
<div class ="well">
<table class="table table-bordered">
<tr>
<th colspan="2">rDNS</th>
</tr>
<tr>
<td>      <?php
foreach($addr as $out) {
  echo $out[0] . " : " . $out[1] . "<br>";
} 
?>
</tr>
</table>
</div>
</div>
    <div id="pane4" class="tab-pane">
<div class ="well">
Use this function to build a new password for your panel login ID, basically enter your <b>new</b> password into the box below and it'll 
give you the hash for your password, open a ticket in the Client/Billing area with the <b>hash</b> to have your panel password updated with it.
<br><br>
<b>*Warning*</b> Copy the entire hash as-is do not change any character from the hash, as any character change will resut in the password not working
</div>
<div class ="well">
<table class="table table-bordered">
<tr>
<th colspan="2">Temp</th>
</tr>
<tr>
<td>      <?php
foreach($addr as $out) {
  echo $out[0] . " : " . $out[1] . "<br>";
} 
?>
</tr>
</table>

</div>
    </div>
    <div id="pane5" class="tab-pane">
<div class="well well-large">
<table class="table table-bordered">
<tr>
<th colspan="2">Initial release (8th March 2013)</th>
</tr>
<tr>
<td>
<ul>
	<li>Major rewrite, special thanks to Manacit 
	<li>Added latency to "server up or down checker"
	<li>Added "rDNS" tab
</ul>
</td>
<tr>
<th colspan="2">Initial release (5th March 2013)</th>
</tr>
<tr>
<td>
<ul>
	<li>Added server info at main tab 
	<li>Added server up or down checker at main tab
	<li>Added "My IP allocation" at main tab 
</ul>
</td>
</tr>
</table>
<br>
</div>

    </div>
  </div><!-- /.tab-content -->
</div><!-- /.tabbable -->




<div class="divDemoBody">
			<div id="help1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="windowTitleLabel" aria-hidden="true">
				<div class="modal-header">
					<a href="#" class="close" data-dismiss="modal">&times;</a>
					<h3>Online / Offline</h3>
					</div>
				<div class="modal-body">
					<div class="divDialogElements">
						<?php
 						$con = $db->getDatabaseConnection();
 						$query = "SELECT s.main_address, s.CPU, s.RAM, s.Disk FROM server s JOIN users u ON (s.iduser = u.iduser)
 						WHERE u.user_name = '".$_SESSION['user_name']."'";
 						$o = $con->query($query);
 						$d = $o->fetch_object();
?>
						<p> The online / offline checker is "live" indicator of whether your server is online or offline and updated everytime you refresh the page </p>
						<p> The checker pings the server once to see if it replies back, if it replies back the server is listed as online, if it does not reply back it's listed as offline </p>
						<p> Also, the ping checker checks only the main IP of the server, basically it pings the IP <?php echo $d->main_address; ?> in your case </p>
						</div>
					</div>
				<div class="modal-footer">
				<a href="#" class="btn btn-primary" data-dismiss="modal">OK</a>  
					</div>
				</div>
			<div class="divButtons">
				
				</div>

<br>        
</div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>




<?php include('views/footer/footer.php'); ?>
