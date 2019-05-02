<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medical card</title>
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
</head>
<body>
<h1>Medical card: {{ $medic_card['first_name'] }} {{ $medic_card['last_name'] }}</h1>
<table>
    <thead>
    <tr>
        <th scope="col">Birthday:</th>
        <th scope="col">Phone number:</th>
        <th scope="col">Postal address:</th>
        <th scope="col">Sex:</th>
        <th scope="col">Chronic disease:</th>
        <th scope="col">Allergy:</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            {{$medic_card['birthday']}}
        </td>
        <td>
            {{$medic_card['phone_number']}}
        </td>
        <td>
            {{$medic_card['postal_address']}}
        </td>
        <td>
            {{$medic_card['sex']}}
        </td>
        <td>
            {{$medic_card['chronic_disease']}}
        </td>
        <td>
            {{$medic_card['allergy']}}
        </td>
    </tr>
    </tbody>
</table>
<h2> Disease History:</h2>
<table>
    <tr>
        <th scope="col">Disease name</th>
        <th scope="col">Doctor name</th>
        <th scope="col">Analyzes</th>
        <th scope="col">Conclusion</th>
        <th scope="col">Treatment</th>
        <th scope="col">Symptoms</th>
    </tr>
    @for($i =0; $i<count($disease_history); $i++)
        <tr>
            <td>
                {{ $disease_history[$i]['disease_name'] }}
            </td>
            <td>
                {{ $disease_history[$i]['doctor_name'] }}
            </td>
            <td>
                {{ $disease_history[$i]['analyzes'] }}
            </td>
            <td>
                {{ $disease_history[$i]['conclusion'] }}
            </td>
            <td>
                {{ $disease_history[$i]['treatment'] }}
            </td>
            <td>
                {{ $disease_history[$i]['symptoms'] }}
            </td>
        </tr>
        @endfor
</table>
</body>
</html>