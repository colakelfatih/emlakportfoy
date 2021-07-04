@extends('layouts.panel')
@section('style')
<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" rel="stylesheet"
    type="text/css" />

@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Portföyler</h3>
                </div>
                <div class="card-body">
                    <table id="table" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Portföy Tip</th>
                                <th>İlan Başlık</th>
                                <th>İlan Açıklama</th>
                                <th>Mahalle</th>
                                <th>Ada</th>
                                <th>Parsel</th>
                                <th>Fiyat</th>
                                <th>Metrekare</th>
                                <th>Oda</th>
                                <th>Bina</th>
                                <th>Kat</th>
                                <th>Banyo</th>
                                <th>Balkon</th>
                                <th>Isınma</th>
                                <th>İsim Soyisim</th>
                                <th>Telefon</th>
                                <th>Not</th>
                                <th>Kayıt Tarihi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portfoys as $key=>$portfoy)
                            <tr>
                                <td>{{ $loop->index + 1}}</td>
                                <td>{{ $portfoy->kategori}}</td>
                                <td>{{ $portfoy->portfoy_tip}}</td>
                                <td>{{ $portfoy->ilan_baslik}}</td>
                                <td>{{ $portfoy->ilan_aciklama}}</td>
                                <td>{{ $portfoy->mahalle}}</td>
                                <td>{{ $portfoy->ada}}</td>
                                <td>{{ $portfoy->parsel}}</td>
                                <td>{{ $portfoy->fiyat}}</td>
                                <td>{{ $portfoy->metrekare}}</td>
                                <td>{{ $portfoy->oda}}</td>
                                <td>{{ $portfoy->bina}}</td>
                                <td>{{ $portfoy->kat}}</td>
                                <td>{{ $portfoy->banyo}}</td>
                                <td>{{ $portfoy->balkon}}</td>
                                <td>{{ $portfoy->isinma}}</td>
                                <td>{{ $portfoy->isimsoyisim}}</td>
                                <td>{{ $portfoy->telefon}}</td>
                                <td>{{ $portfoy->not}}</td>
                                <td>{{ $portfoy->created_at}}</td>

                            </tr>
                            @endforeach()

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Portföy Tip</th>
                                <th>İlan Başlık</th>
                                <th>İlan Açıklama</th>
                                <th>Mahalle</th>
                                <th>Ada</th>
                                <th>Parsel</th>
                                <th>Fiyat</th>
                                <th>Metrekare</th>
                                <th>Oda</th>
                                <th>Bina</th>
                                <th>Kat</th>
                                <th>Banyo</th>
                                <th>Balkon</th>
                                <th>Isınma</th>
                                <th>İsim Soyisim</th>
                                <th>Telefon</th>
                                <th>Not</th>
                                <th>Kayıt Tarihi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('script')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
            },

            dom: 'Bfrtip',
            buttons: [

                'copy', 'csv', 'excel',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                },
            ]
        });
    });

</script>
@stop
