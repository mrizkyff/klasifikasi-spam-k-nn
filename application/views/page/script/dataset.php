<script type="text/javascript">
    $(document).ready(function () {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
        var t = $("#tb_dataset").dataTable({
            // ganti bahasa datatable jadi bahasa indonesia
            "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
            },
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function(e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {"url": "<?php echo base_url('dataset/json')?>", "type": "POST"},
            columns: [
                {
                    "data": "id",
                    "orderable": false
                },
                {"data": "teks"},
                {"data": "stem"},
                {"data": "cluster"},
                {"data": "tanggal"},
                {"data": "aksi"},
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        // fungsi untuk simpan data ke database
        $('#btn_tambah_dataset').click(function (e) { 
            e.preventDefault();
                var teks = $('#teks_dataset').val();
                var cluster = $('#cluster_dataset').val();
                // console.log(teks+cluster);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('dataset/simpan')?>",
                    data: {teks:teks, cluster:cluster},
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                        if(response){
                            $('#teks_dataset').val('');
                            $('#clustser_dataset').val('');
                            alert('Data Berhasil disimpan!');
                            $('#modal_tambah_dataset').modal('hide');
                        }
                        else{
                            alert('Data Gagal disimpan!');
                        }
                    }
                });
                $('#tb_dataset').DataTable().ajax.reload();
        });

        // fungsi untuk menampilkan modal hapus/delete
        $('#tb_dataset').on('click', '.deleteRecord', function (e) { 
            e.preventDefault();
            // alert('halo');
            $('#modal_hapus_dataset').modal('show');
            $("#id_hapus").val($(this).data('id'));
            $("#teks_cluster").val($(this).data('teks'));
            $('#konfirmasi_hapus').text($(this).data("teks"));
        });
        // fungsi aksi hapus/delete
        $('#btn_hapus').click(function (e) { 
            e.preventDefault();
            var id = $('#id_hapus').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('dataset/hapus')?>",
                data: {id: id},
                dataType: "JSON",
                success: function (response) {
                    if(response){
                        $('#modal_hapus_dataset').modal('hide');
                        alert('Data Berhasil di hapus!');
                    }
                    else{
                        alert('Data Gagal di hapus!');
                    }
                    $('#tb_dataset').DataTable().ajax.reload();
                }
            });
        });

        // fungsi untuk menampilkan modal edit/update
        $('#tb_dataset').on('click', '.editRecord', function (e) { 
            e.preventDefault();
            $('#modal_edit_dataset').modal('show');
            $("#id_edit").val($(this).data('id'));
            $("#teks_dataset_edit").val($(this).data('teks'));
            $("#cluster_dataset_edit").val($(this).data('cluster'));
        });
        // fungsi aksi update/edit
        $('#btn_edit').click(function (e) { 
            e.preventDefault();
            var id = $('#id_edit').val();
            var teks = $('#teks_dataset_edit').val();
            var cluster = $('#cluster_dataset_edit').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('dataset/edit')?>",
                data: {id: id, teks:teks, cluster:cluster},
                dataType: "JSON",
                success: function (response) {
                    if(response){
                        alert('Data berhasil diupdate!');
                        $('#modal_edit_dataset').modal('hide');
                    }
                    else{
                        alert('Data gagal diupdate!');
                    }
                    $('#tb_dataset').DataTable().ajax.reload();
                }
            });
        });


    });

</script>