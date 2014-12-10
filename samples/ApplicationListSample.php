<?php

/* Software License Agreement (BSD License)
 * 
 * Copyright (c) 2010-2014, Rustici Software, LLC
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the <organization> nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL Rustici Software, LLC BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Application List Sample</title>
	
</head>

<body>
<?php
require_once('../ScormEngineService.php');
require_once('../ServiceRequest.php');
require_once('../ApplicationData.php');
require_once('config.php');
global $CFG;

$ServiceUrl = $CFG->scormcloudurl;
$AppId = $CFG->scormcloudappid;
$SecretKey = $CFG->scormcloudsecretkey;
$Origin = $CFG->scormcloudorigin;
$AppManagerId = $CFG->scormcloudappmanagerid;
$ManagerSecretKey = $CFG->scormcloudmanagersecretkey;

$ScormService = new ScormEngineService($ServiceUrl,$AppId,$SecretKey,$Origin, null, $AppManagerId, $ManagerSecretKey);
$appService = $ScormService->getApplicationService();

$allResults = $appService->GetAppList();



echo '<form action="CreateApplicationSample.php" method="GET">';
?>
<h3>Create New Application</h3>
Name: <input type="text" name="name" /><br/>
<?php
?>
<input type="submit" name="submit" value="Submit" />
</form>
<br/><br/>
<?php



echo '<table border="1" cellpadding="5">';
echo '<tr><td>App Id</td><td>Name</td><td>Create Date</td></tr>';
foreach($allResults as $result)
{
	echo '<td>';
	echo $result->getAppId();
	echo '</td><td>';
	echo $result->getName();
	echo '</td><td>';
	echo $result->getCreateDate();
	echo '</td></tr>';
}
echo '</table><br/><br/>';

?>
</body>
</html>
