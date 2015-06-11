<?php
$ping = `ping 10.100.4.24 && arp -a`;
echo nl2br($ping);
?>