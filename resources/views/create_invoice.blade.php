<!-- Bootstrap Core Css -->
<link href="/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="/plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="/plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Bootstrap Material Datetime Picker Css -->
<link href="/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

<!-- Bootstrap DatePicker Css -->
<link href="/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

<!-- Wait Me Css -->
<link href="/plugins/waitme/waitMe.css" rel="stylesheet" />

<!-- Bootstrap Select Css -->
<link href="/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
                        <h2>CREATE INVOICE</h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('add-invoice') }}" id="form_validation" method="POST">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="kantor" class="form-control show-tick">
                                        <option value="">-- Pilih kantor --</option>
                                        <option value="1">Mayang Maharani Jaya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nama" required>
                                    <label class="form-label">Nama</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="alamat" required>
                                    <label class="form-label">Alamat</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="no_transaksi" required>
                                    <label class="form-label">No. Transaksi</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <div class="form-line" id="bs_datepicker_container">
                                    <input type="text" class="form-control" placeholder="">
                                    <label class="form-label">Tanggal Transaksi</label>
                                </div> -->
                                <div class="form-group">
                                    <!-- <div class="form-line" id="bs_datepicker_container"> -->
                                        <!-- <input name="tanggal_transaksi" type="text" class="form-control" placeholder="Tanggal Transaksi"> -->
                                        <!-- <label class="form-label">Tanggal Transaksi</label> -->
                                        <label class="form-label">Tanggal Transaksi</label>
                                        <input name="tanggal_transaksi" type="date" class="form-control" required>
                                    <!-- </div> -->
                                </div>
                            </div>
                            
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
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

<!-- Autosize Plugin Js -->
<script src="/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="/plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- Custom Js -->
<script src="/js/admin.js"></script>
<script src="/js/pages/forms/basic-form-elements.js"></script>

<!-- Demo Js -->
<script src="/js/demo.js"></script>