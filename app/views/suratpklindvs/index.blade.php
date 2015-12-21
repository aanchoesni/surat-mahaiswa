@extends('layouts.master')

@section('asset')
    {{HTML::style("assets/css/select2-bootstrap.css")}} 
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
    <link rel="stylesheet" href="assets/bootstrapvalidator/css/bootstrapValidator.css"/>
@stop

@section('title')
	{{ $title }}
@stop

@section('breadcrumb')
	<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">@yield('title')</li>
@stop

@section('content')
<div class="row">    
    @include('suratpklindvs._form')
</div>
@stop

@section('script')
<script src="{{ asset('packages/select2/select2.min.js')}}"></script>
<script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
<script type="text/javascript" src="assets/bootstrapvalidator/js/bootstrapValidator.js"></script>
<script type="text/javascript">
    $(document).ready(function() { 
        $("#prodi").select2();
        $("#persetujuan").select2();
        $("#angkatan").select2();

        $('#pklindvs')
            .bootstrapValidator({
                fields: {
                    // jumlah_lamp: {
                    //     message: 'tidak valid',
                    //     validators: {
                    //         digits: {
                    //             message: 'Harus Angka'
                    //         }
                    //     }
                    // },
                    kepada: {
                        message: 'tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'Tujuan surat harus diisi'
                            }
                        }
                    },
                    // alamat: {
                    //     message: 'tidak valid',
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Alamat surat harus diisi'
                    //         }
                    //     }
                    // },
                    kota: {
                        message: 'tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'Kota Alamat surat harus diisi'
                            }
                        }
                    },
                    jadwal: {
                        message: 'tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'Jadwal pelaksanaan harus diisi'
                            }
                        }
                    },
                    nama: {
                        message: 'tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'Nama mahasiswa harus diisi'
                            }
                        }
                    },
                    nim: {
                        message: 'tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'NIM mahasiswa harus diisi'
                            },
                            digits: {
                                message: 'NIM harus berupa angka'
                            },
                            stringLength: {
                                min: 11,
                                max: 11,
                                message: 'NIM harus 11 angka'
                            }
                        }
                    },
                    prodi: {
                        message: 'tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'Prodi harus dipilih'
                            }
                        }
                    },
                    persetujuan: {
                        message: 'tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'Pesetujuan harus dipilih'
                            }
                        }
                    },
                }
            })
            .on('error.form.bv', function(e) {
            console.log('error.form.bv');
 
            // You can get the form instance and then access API
            var $form = $(e.target);
            console.log($form.data('bootstrapValidator').getInvalidFields());
 
            // If you want to prevent the default handler (bootstrapValidator._onError(e))
            // e.preventDefault();
            })
            .on('success.form.bv', function(e) {
                console.log('success.form.bv');
     
                // If you want to prevent the default handler (bootstrapValidator._onSuccess(e))
                // e.preventDefault();
            })
            .on('error.field.bv', function(e, data) {
                console.log('error.field.bv -->', data);
            })
            .on('success.field.bv', function(e, data) {
                console.log('success.field.bv -->', data);
            });
        // Validate the form manually
        $('#buatSurat').click(function() {
            // $('#defaultForm').bootstrapValidator('validate');
            //alert('berhasil');
            //console.log('berhasil');
            $text = $('')
        });
    // console.log('berhasil');   
 });
</script>
@stop