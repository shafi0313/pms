<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prescription</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha512-iy8EXLW01a00b26BaqJWaCmk9fJ4PsMdgNRqV96KwMPSH+blO82OHzisF/zQbRIIi8m0PiO10dpS0QxrcXsisw==" crossorigin="anonymous" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
        integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
        crossorigin="anonymous" /> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous"> --}}

    <style>
        .container {
            margin: 0 auto;
            width: 700px;
        }
        .pres_patient {
            padding-top:5px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            margin-bottom: 30px;
        }

        .pres_patient p {
            margin: 2px 0;
            font-size: 16px;
            font-weight: 600;
        }
        .doctor_info {
            margin-bottom: 30px;
        }

        .icon i {
            margin-left: 40px;
            font-size: 40px;
        }
        .medicin_area {
            text-align: left
        }
        .next_meet {
            font-size: 18px;
            font-weight: 600
        }

        .advice {
            margin-top: 50px;
            text-align: left;
            font-weight: 600;
            font-size: 18px;
        }

        .v_line {
            position: relative;
        }

        .v_line::before {
            content: "";
            position: absolute;
            background: red;
            width: 1px;
            height: 200%;
            top: 0;
            left: -20px;
        }

        .row {
            display: block;
        }
        .col_6 {
            width: 50%;
            display: inline-block;
        }
        .col_3 {
            width: 24%;
            display: inline-block;
            text-align: left;
        }
        .col_12{
            width: 100%;
        }
    </style>
</head>

<body class="print_page" id="print_page">
    <div class="container">
        <div class="row doctor_info" style="text-align: center">
            <div class="col-md-12 text-center">
                <h3 style="margin: 5px">{{$prescriptionInfo->doctor->name}}</h3>
                @foreach ($prescriptionInfo->specialistCat as $item)
                <li style="list-style: none;font-size:15px">{{$item->degree}}</li>
                @endforeach
                @foreach ($doctorDeg as $degree)
                <h4 style="margin: 5px">{{$degree->doctorDegree->specialist}}</h4>
                @endforeach
            </div>
        </div>

        <div class="row pres_patient">
            <div class="col_6">
                <p>Name: {{$prescriptionInfo->patient->name}}</p>
            </div>
            <div class="col_3"  style="text-align: right">
                <p>Age: {{$prescriptionInfo->patient->age}}</p>
            </div>
            <div class="col_3" style="text-align: right">
                <p>Data: {{ \Carbon\Carbon::parse($prescriptionInfo->date)->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="row" style="min-height: 180px">
            <div class="col_3" style="margin-left: 10px; width: 30%">
                <table class="table">
                    @php $x=1 @endphp
                    @forelse($patient_tests as $patient_test)
                    <tr>
                        <td>{{$x++}}. {{ $patient_test->medicalTest->name }}</td>
                    </tr>
                    @empty
                    @endforelse
                </table>
            </div>

            <div class="col_6 v_line" style="60%">
                <table class="medicin_area">
                    @forelse($prescriptionShows as $prescriptionShow)
                    <tr>
                        <td style="width:300px">{{ $prescriptionShow->medicines->name }}</td>
                        <td style="width: 50px">{{ $prescriptionShow->eating_time }}</td>
                        <td style="width: 150px">{{ $prescriptionShow->days }}</td>
                        <td>{{ $prescriptionShow->note }}</td>
                    </tr>
                    @empty
                    <tr>Medicine Not Found</tr>
                    @endforelse
                </table>
            </div>
        </div>
        <div class="row">
            <div>
                <p class="advice">Advice: {{ $prescriptionInfo->prescriptionInfo->advice }}</p>
                <p class="next_meet">Next meet: {{ $prescriptionInfo->prescriptionInfo->next_meet }}</p>
            </div>
        </div>
        <input class="print btn btn-info px-5" type="button" onclick="printDiv('print_page')" value="Print">

        <script>
            function printDiv(print_page) {
                var printContents = document.getElementById(print_page).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>

</body>
</html>
