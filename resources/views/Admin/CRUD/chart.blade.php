@extends('home')
@section('hasil-diagram')
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header">
                <div style="margin-bottom: 35px;">
                    <div id="container" style="width: 100%; height: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('diagram')
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Pengumpulan data berdasarkan Jumlah Stok'
            },
            xAxis: {
                categories: {!! json_encode($categories) !!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Stok'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Stok',
                data: {!! json_encode($data) !!}
            }]
        });
    </script>
@endsection
