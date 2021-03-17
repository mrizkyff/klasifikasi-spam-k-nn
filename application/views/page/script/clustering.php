<script type="text/javascript">
    $(document).ready(function () {
        $('#tb_cluster1').DataTable({
            "pageLength": 150,
            "lengthChange": false,
            "searching": false
        });
        $('#tb_cluster2').DataTable({
            "pageLength": 150,
            "lengthChange": false,
            "searching": false
        });

        // $('#btn_hitung_cluster').click(function (e) { 
        //     var query = $('#query').val();
        //     $.ajax({
        //         type: "get",
        //         url: "<?php echo base_url('klastering/index')?>",
        //         data: {query: query},
        //         dataType: "JSON",
        //         success: function (response) {
        //             console.log(response);
        //             if (response['kesimpulan'] == 'ekonomi'){
        //                 $('#query').addClass('is-valid');
        //                 $('#pesan_valid').text(response['kesimpulan']);
        //                 $('#pesan_kategori').hide();
        //             }
        //             else if(response['kesimpulan'] == 'olahraga'){
        //                 $('#query').addClass('is-valid');
        //                 $('#pesan_invalid').text(response['kesimpulan']);
        //                 $('#pesan_kategori').hide();

        //             }
        //         }
        //     });
        // });
        console.log('xixixi');
    });
</script>