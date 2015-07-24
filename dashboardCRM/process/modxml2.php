<?php


function makexml($instructer,$cases){
//var_dump($instructer['sRef']);

//echo $instruct['sRef'];

$dom = new DOMDocument('1.0', "UTF-8");
$root = $dom->createElement('Expert');
$gmc= $dom->createAttribute('GMC');

// Value for the created attribute 1234567
$gmc->value = '6029484';
// Don't forget to append it to the element
$root->appendChild($gmc);

$claimant = $dom->createElement('Claimant');

$id = $dom->createElement('Id',$cases);
//claimant info
//$splitname = explode(" ", $instructer['name']);

$title = $dom->createElement('Title',$instructer['ttl']);
$forenames = $dom->createElement('Forenames', $instructer['fName']);
$lastname = $dom->createElement('Surname', $instructer['lName']);
$cdob = $dom->createElement('DateOfBirth',$instructer['cdob']);
$addy1 = $dom->createElement('AddressLine1',$instructer['addy1']);
$addy2 = $dom->createElement('AddressLine2',$instructer['addy2']);
$addy3 = $dom->createElement('AddressLine3',$instructer['addy2']);
$pcode = $dom->createElement('PostCode1', $instructer['pcode']);

$telhome = $dom->createElement('TelephoneHome',$instructer['tel']);
$mobile = $dom->createElement('Mobile','');
//accident
$accidDt = $dom->createElement('AccidentDate',$instructer['cdoa']);
$accidTyp = $dom->createElement('AccidentType','rta');
//agency
$medAgent = $dom->createElement('MedicoLegalAgency',$instructer['org']);
$agentRef = $dom->createElement('AgencyReferenceNo',$instructer['cRef']);
// solicitor
$instructp = $dom->createElement('InstructingParty', $instructer['solic']);
$referenceNo = $dom->createElement('InstructingPartyReferenceNo', $instructer['sRef']);
$specialInst = $dom->createElement('SpecialInstructions','No Special Instructions');
$medcoRef = $dom->createElement('medcoRef', $instructer['medco']);


// must be an exact appointment details contained within grip
/*
$appointment = $dom->createElement('Appointment');
$appDate = $dom->createElement('Date', '12-07-2015');
$appTme = $dom->createElement('Time', '15:00');
$appLen = $dom->createElement('AppointmentLength','15');

$locations = $dom->createElement('Location');
$locName = $dom->createElement('LocationName','Manchester');


$locAdd1 = $dom->createElement('AddressLine1', 'Holiday Inn' );
$locAdd2 = $dom->createElement('AddressLine2', 'Central Park');
$locAdd3 = $dom->createElement('AddressLine3','888 Oldham Road');
$locAdd4 = $dom->createElement('AddressLine4','Manchester');
$locPcode = $dom->createElement('PostCode', 'M40 2BS');
*/
			

/*
$locations->appendChild($locName);
$locations->appendChild($locAdd1);
$locations->appendChild($locAdd2);
$locations->appendChild($locAdd3);
$locations->appendChild($locAdd4);
$locations->appendChild($locPcode);

$appointment->appendChild($appDate);
$appointment->appendChild($appTme);
$appointment->appendChild($appLen);
$appointment->appendChild($locations);
*/

$claimant->appendChild($id);
//$claimant->appendChild($stats);
$claimant->appendChild($title);
$claimant->appendChild($forenames);
$claimant->appendChild($lastname);
$claimant->appendChild($cdob);
$claimant->appendChild($addy1);
$claimant->appendChild($addy2);
$claimant->appendChild($addy3);
$claimant->appendChild($pcode);
$claimant->appendChild($telhome);
$claimant->appendChild($accidDt);
$claimant->appendChild($accidTyp);
$claimant->appendChild($medAgent);
$claimant->appendChild($agentRef);
$claimant->appendChild($instructp);
$claimant->appendChild($referenceNo);
$claimant->appendChild($specialInst);
$claimant->appendChild($medcoRef);
//$claimant->appendChild($appointment);


$root->appendChild($claimant);
// Append it to the document itself
$dom->appendChild($root);

$xml_data = $dom->saveXML();

echo $xml_data;

 sendXML($xml_data);


}

function sendXML($xmldta){

// initialise the curl request
$request = curl_init("http://web.griptechnologies.co.uk/GRIPIntegrationServices");

// send a file
curl_setopt($request, CURLOPT_USERPWD, "integration123:testtest");
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($request, CURLOPT_POSTFIELDS, "$xmldta");

/*curl_setopt(
  /  $request,
    CURLOPT_POSTFIELDS,
    array(
      'file' => '@' . realpath('New Case.xml')
    ));
*/
// output the response
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
echo curl_exec($request);

// close the session
curl_close($request);


}


?>

