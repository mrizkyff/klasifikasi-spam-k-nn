<script type="text/javascript">
    $(document).ready(function () {
        showDataset();
        $('#tb_dataset').DataTable();


        // fungsi  untuk menampilkan data ke dataTable
        function showDataset(){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('dataset/get_all_dataset') ?>",
                dataType: "JSON",
                async: 'false',
                success: function (response) {
                    var html = '';
                    var i;
                    for (i=0; i<response.length; i++){
                        html += '<tr>'+
                                    '<td>'+(i+1)+'</td>'+
                                    '<td>'+response[i].id+'</td>'+
                                    '<td>'+response[i].teks+'</td>'+
                                    '<td>'+response[i].stem+'</td>'+
                                    '<td>'+response[i].cluster+'</td>'+
                                    '<td>'+response[i].tanggal+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="' + response[i].id + '" data-teks="' + response[i].teks + '" data-cluster="' + response[i].cluster + '">Edit</a>' + ' ' +
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="' + response[i].id + '" data-teks="' + response[i].teks + '">Delete</a>' +
                                    '</td>'+
                                '</tr>';
                    }
                    $('#show_dataset').html(html);
                }
            });
        }

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
                showDataset();
        });

        // fungsi untuk menampilkan modal hapus/delete
        $('#show_dataset').on('click', '.deleteRecord', function (e) { 
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
                    showDataset();
                }
            });
        });

        // fungsi untuk menampilkan modal edit/update
        $('#show_dataset').on('click', '.editRecord', function (e) { 
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
                    showDataset();
                }
            });
        });


    });

</script>