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
                                        '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="' + response[i].id + '">Edit</a>' + ' ' +
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="' + response[i].id + '">Delete</a>' +
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

    });

</script>