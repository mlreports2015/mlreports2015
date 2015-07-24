<?php


function  createxml($instruct){

$dom = new DOMDocument('1.0', "UTF-8");
$root = $dom->createElement('Expert');
$gmc= $dom->createAttribute('GMC');

// Value for the created attribute 1234567
$gmc->value = '6029484';
// Don't forget to append it to the element
$root->appendChild($gmc);

$claimant = $dom->createElement('Claimant');

$id = $dom->createElement('Id','145151');
$title = $dom->createElement('Title','Mr');
$forenames = $dom->createElement('Forenames', 'Test');
$lastname = $dom->createElement('Surname', 'Case');
$cdob = $dom->createElement('DateOfBirth','25-01-1999');
$addy1 = $dom->createElement('AddressLine1','Test Address');
$addy2 = $dom->createElement('AddressLine2','Walthamstow');
$addy3 = $dom->createElement('AddressLine3','London');
$pcode = $dom->createElement('PostCode1', 'CB5 8JE');
$telhome = $dom->createElement('TelephoneHome','01912862158');
$mobile = $dom->createElement('Mobile','07989359816');
$accidDt = $dom->createElement('AccidentDate','25-03-2015');
$accidTyp = $dom->createElement('AccidentType','rta');
$medAgent = $dom->createElement('MedicoLegalAgency','ML Doctors');
$agentRef = $dom->createElement('AgencyReferenceNo','MLD/30222');
$instruct = $dom->createElement('InstructingParty', 'Direct Referral');
$referenceNo = $dom->createElement('InstructingPartyReferenceNo','FS/4168/Haziraj');
$specialInst = $dom->createElement('SpecialInstructions','Some Special Instructions');
$medcoRef = $dom->createElement('medcoRef','1234/1');


$claimant->appendChild($id);
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
$claimant->appendChild($instruct);
$claimant->appendChild($referenceNo);
$claimant->appendChild($specialInst);
$claimant->appendChild($medcoRef);



$root->appendChild($claimant);
// Append it to the document itself
$dom->appendChild($root);

$xml_data = $dom->saveXML();


return $xml_data;
//echo $xml_data;
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

