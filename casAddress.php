<?php

/*<Placemark id="p1">

    <address>23-43 Upper George St, Huddersfield, Kirklees HD1 4, UK</address>
    <AddressDetails Accuracy="8" xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
		<Country>
			<CountryNameCode>GB</CountryNameCode>
			<CountryName>United Kingdom</CountryName>
			
			<AdministrativeArea>
				<AdministrativeAreaName>Kirklees</AdministrativeAreaName>
				<SubAdministrativeArea>
					<SubAdministrativeAreaName>Kirklees</SubAdministrativeAreaName>
					<Locality>
						<LocalityName>Huddersfield</LocalityName>
						<Thoroughfare>
							<ThoroughfareName>23-43 Upper George St</ThoroughfareName>
						</Thoroughfare>
						<PostalCode>
							<PostalCodeNumber>HD1 4</PostalCodeNumber>
						</PostalCode>
					</Locality>
				</SubAdministrativeArea>
			</AdministrativeArea>
		</Country>
	</AddressDetails>
    
	<ExtendedData>
      <LatLonBox north="53.6494826" south="53.6431874" east="-1.7859554" west="-1.7922506" />
    </ExtendedData>

    <Point><coordinates>-1.7892618,53.6463280,0</coordinates></Point>
  </Placemark>*/


$csv=file_get_contents('http://maps.google.com/maps/geo?q='.$_GET['ll'].'&output=csv&sensor=false&key=ABQIAAAAYPZsBf6onOkX7jBPcG-eRhROQGNTnT49rb9sb017ZStsrScfERQHWJxzkUf9l3JYhKJdL6tJzOaFAw');

//200,8,"23-43 Upper George St, Huddersfield, Kirklees HD1 4, UK"

echo $csv;

?>