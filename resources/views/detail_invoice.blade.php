
<!-- Bootstrap Core Css -->
<link href="/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="/plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="/plugins/animate-css/animate.css" rel="stylesheet" />

<!-- JQuery DataTable Css -->
<link href="/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

<!-- Custom Css -->
<link href="/css/style.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="/css/themes/all-themes.css" rel="stylesheet" />

@extends('layout.template')

@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>DETAIL INVOICE</h2>
                    </div>
                    <div class="body">
                        <div class="button-demo">
                            <button id="add" type="button" class="btn btn-primary waves-effect">Add</button>
                            <!-- <div contenteditable id="myeditablediv" >10</div> -->
                        </div>
                        <div id="alert_message"></div>
                        <!-- <a href="/create-invoice" class="btn btn-block btn-lg bg-pink waves-effect">Add</a> -->
                        <table style='font-size:75%' id="table_detail" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Barang</th>
                                    <th>Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Potongan</th>
                                    <th>Total</th>
                                    <th>Ket.</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <!-- <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Spn.035</td>
                                    <td>Spandeck Chn 0,35 lebar 75 @ 6m </td>
                                    <td>Lembar</td>
                                    <td>875,00</td>
                                    <td>Rp. 66.500,00</td>
                                    <td>-</td>
                                    <td>Rp. 58.187.500,00</td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-danger waves-effect">Delete</button></td>
                                </tr>
                            </tbody> -->
                            <!-- <tfoot>
                                <tr>
                                    <th colspan="7" style="text-align:right;" >Jumlah Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->
    </div>
</section>

@endsection

<!-- Jquery Core Js -->
<script src="/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="/plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Custom Js -->
<script src="/js/admin.js"></script>
<script src="/js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="/js/demo.js"></script>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        // alert("{{ Request::segment(2) }}");
        fetch_data();

        function fetch_data()
        {
            var dataTable = $('#table_detail').DataTable({
                "processing" : true,
                "serverSide" : true,
                "searching" : false,
                "paging":   false,
                "ordering": false,
                "info":     false,
                // "order" : [],
                "ajax" : {
                    url:"{{ route('fetch-detail') }}",
                    type:"POST",
                    data:{
                            "_token": "{{ csrf_token() }}",
                            id_invoice: "{{ Request::segment(2) }}"
                        }
                }
            });
        }

        function update_data(id, column_name, value)
        {
            $.ajax({
            url:"{{ route('update-detail') }}",
            method:"POST",
            data:{
                    "_token": "{{ csrf_token() }}",
                    id:id,
                    column_name:column_name,
                    value:value
                },
            success:function(data)
            {
                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                $('#table_detail').DataTable().destroy();
                fetch_data();
            }
            });
            setInterval(function(){
                $('#alert_message').html('');
            }, 5000);
        }

        $('#add').click(function(){
            var html = '<tr>';
            html += '<td></td>';
            html += '<td contenteditable id="data_kode"></td>';
            html += '<td contenteditable id="data_barang"></td>';
            html += '<td contenteditable id="data_satuan"></td>';
            html += '<td contenteditable id="data_jumlah"></td>';
            html += '<td contenteditable id="data_harga"></td>';
            html += '<td contenteditable id="data_potongan">-</td>';
            html += '<td contenteditable id="data_total"></td>';
            html += '<td contenteditable id="data_ket">-</td>';
            html += '<td><button type="button" id="insert" class="btn btn-success waves-effect">Insert</button></td>';
            html += '</tr>';
            $('#table_detail tbody').prepend(html);
        });

        $(document).on('blur', '.update', function(){
            var id = $(this).data("id");
            var column_name = $(this).data("column");
            var value = $(this).text();
            update_data(id, column_name, value);
        });

        $(document).on('click', '#insert', function(){
            // alert("Hello! I am an alert box!!");
            var data_kode = $('#data_kode').text();
            var data_barang = $('#data_barang').text();
            var data_satuan = $('#data_satuan').text();
            var data_jumlah = $('#data_jumlah').text();
            var data_harga = $('#data_harga').text();
            var data_potongan = $('#data_potongan').text();
            var data_total = $('#data_total').text();
            var data_ket = $('#data_ket').text();

            // alert("data kode"+data_kode);

            $.ajax({
            url:"{{ route('add-detail') }}",
            method:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                data_kode:data_kode,
                data_barang:data_barang,
                data_satuan:data_satuan,
                data_jumlah:data_jumlah,
                data_harga:data_harga,
                data_potongan:data_potongan,
                data_total:data_total,
                data_ket:data_ket,
                id_invoice: "{{ Request::segment(2) }}"
            },
            success:function(data)
            {
                $('#alert_message').html('<div class="alert bg-teal alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');
                $('#table_detail').DataTable().destroy();
                fetch_data();
            }
            });
            setInterval(function(){
                $('#alert_message').html('');
            }, 5000);

        });

        $(document).on('click', '.delete', function(){
            var id = $(this).attr("id");
            // alert("gg");
            if(confirm("Are you sure you want to remove this?"))
            {
                $.ajax({
                    url:"{{ route('delete-detail') }}",
                    method:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id:id
                        },
                    success:function(data){
                        $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                        $('#table_detail').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function(){
                    $('#alert_message').html('');
                }, 5000);
            }
        });

        // $("#myeditablediv").keypress(function(e) {
        //     alert("sdf");
        //     if (isNaN(String.fromCharCode(e.which))) e.preventDefault();
        // });

    });
</script>