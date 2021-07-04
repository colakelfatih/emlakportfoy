@extends('layouts.panel')
@section('style')
<style>

    .btn-lg,
    .btn-group-lg>.btn {
        font-size: 2.08rem;
    }

    .form-group label {
        font-size: 1.3rem;
        font-weight: 700;
    }

</style>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Portföy Girişi</h3>

                </div>
                <!--begin::Form-->
                @include('flash::message')

                {!!Form::open(['method'=>'POST','data-parsley-validate'=>"",
                "enctype"=>"multipart/form-data",'role'=>'form','route'=>'pages.portfoy.PortfoyGiris.store'])!!}
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" required>
                                <option value="">Seçiniz</option>
                                <option value="Satılık">SATILIK</option>
                                <option value="Kiralık">KİRALIK</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Portföy Tipi</label>
                            <select id="portfoytip" name="portfoytip" class="form-control" required>
                                <option value="">Seçiniz</option>
                                <option value="ARSA">ARSA/TARLA</option>
                                <option value="KONUT">KONUT</option>
                                <option value="DÜKKAN">DÜKKAN</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-lg-12">
                            <label>İlan Başlığı</label>
                            <input type="text" class="form-control" name="ilan_baslik"
                                placeholder="İlan Başlığı giriniz" required />
                        </div>

                        <div class="col-lg-12"><br>
                            <label>İlan Açıklama</label>
                            <textarea class="form-control" name="ilan_aciklama" rows="3"
                                placeholder="İlan açıklaması giriniz" required></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">

                        <div class="col-lg-4">
                            <label>İsim Soyisim</label>
                            <input type="text" class="form-control" name="isimsoyisim"
                                placeholder="İsim Soyisim giriniz" />
                        </div>
                        <div class="col-lg-4">
                            <label>Telefon Numarası</label>
                            <input type="number" class="form-control" name="telefon"
                                placeholder="Telefon numarası giriniz" />
                        </div>
                        <div class="col-lg-4">
                            <label>Notlar</label>
                            <input type="text" class="form-control" name="not" placeholder="Varsa not giriniz" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Mahalle</label>
                            <input type="text" class="form-control" name="mahalle" placeholder="Mahalle giriniz" />
                        </div>
                        <div class="col-lg-4">
                            <label>Fiyat</label>
                            <input type="number" class="form-control" name="fiyat" placeholder="Fiyat giriniz" />
                        </div>
                        <div class="col-lg-4">
                            <label>Metrekare(M²)</label>
                            <input type="number" class="form-control" name="metrekare"
                                placeholder="Metrekare giriniz" />
                        </div>
                    </div>
                    <div class="form-group row arsaForm">
                        <div class="col-lg-4">
                            <label>Ada</label>
                            <input type="number" class="form-control" name="ada" placeholder="Ada numarası" />
                        </div>
                        <div class="col-lg-4">
                            <label>Parsel</label>
                            <input type="number" class="form-control" name="parsel" placeholder="Parsel numarası" />
                        </div>
                    </div>
                    <div class="form-group row konutForm">
                        <div class="col-lg-4">
                            <label>Kat</label>
                            <input type="number" name="kat" class="form-control" placeholder="Kat sayısı giriniz" />
                        </div>

                        <div class="col-lg-4">
                            <label>Balkon</label>
                            <input type="number" name="balkon" class="form-control"
                                placeholder="Balkon sayısı giriniz" />
                        </div>
                        <div class="col-lg-4">
                            <label>Isınma</label>
                            <input type="text" name="isinma" class="form-control"
                                placeholder="Isınma bilgisi giriniz" />
                        </div>
                    </div>
                    <div class="form-group row konutForm dukkanForm">
                        <div class="col-lg-4 konutForm">
                            <label>Banyo</label>
                            <input type="number" name="banyo" class="form-control" placeholder="Banyo sayısı giriniz" />
                        </div>
                        <div class="col-lg-4 dukkanForm konutForm">
                            <label>Oda Sayısı</label>
                            <input type="number" class="form-control" name="oda" placeholder="Oda sayısı giriniz" />
                        </div>
                        <div class="col-lg-4 dukkanForm konutForm">
                            <label>Bina Yaşı</label>
                            <input type="number" class="form-control" name="bina" placeholder="Bina yaşı giriniz" />
                        </div>

                    </div>





                </div>
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                            <button type="reset" class="btn btn-secondary">İptal</button>
                        </div>

                    </div>
                </div>

                {!! Form::close()!!}
                <!--end::Form-->
            </div>
            <!--end::Card-->

        </div>
    </div>
</div>
@stop
@section('script')
<script>
    $('.arsaForm').hide();
    $('.konutForm').hide();
    $('.dukkanForm').hide();


    $(document).ready(function () {

        $('#portfoytip').on('change', function () {
            //alert(this.value);          

            if (this.value == "ARSA") {
                $('.konutForm,.dukkanForm').hide();
                $('.arsaForm').show();
            } else if (this.value == "KONUT") {
                $('.arsaForm,.dukkanForm').hide();
                $('.konutForm').show();

            } else if (this.value == "DÜKKAN") {
                $('.arsaForm,.konutForm').hide();
                $('.dukkanForm').show();

            } else {
                alert('Seçim yapınız');
            }
        });
    });
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $('#flash-overlay-modal').modal();

</script>
@stop
