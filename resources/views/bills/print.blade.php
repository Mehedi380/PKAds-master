<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row mb-5 float-right">
            <div class="col-sm-12">
                <button type="button" onclick="printDiv('print-div')" class="btn btn-primary">Print</button>
            </div>
        </div>
        <div class="col-md-7" style="margin: 0 auto;" id="print-div">
            <div class="text-center">
                <h3 class="m-3">{{ config('app.name', 'PKAds') }}</h3>
            </div>
            <table class="table">
                <tr>
                    <th>Bill No</th>
                    <td>{{ $dsr->bill_no }}</td>
                </tr>
                <tr>
                    <th>Client Name</th>
                    <td>
                        @if($dsr->schedule_id && $dsr->schedule->client_id)
                        {{ $dsr->schedule->client->name }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Publishing Date</th>
                    <td>{{ $dsr->publishing_date }}</td>
                </tr>
                <tr>
                    <th>Advt. Size</th>
                    <td>
                        @if($dsr->schedule_id)
                        {{ $dsr->schedule->advt_size }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Mode</th>
                    <td>
                        @if($dsr->schedule_id)
                        {{ $dsr->schedule->mode }}
                        @endif
                    </td>
                </tr>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>
                        @if($dsr->schedule_id)
                        {{ $dsr->schedule->amount }}
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

    </script>
</body>

</html>
