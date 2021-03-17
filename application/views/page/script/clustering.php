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

        $('#btn_generate').click(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('klastering/generate_stem')?>",
                data: {data: '123'},
                dataType: "JSON",
                success: function (response) {
                    if(response == 1){
                        alert('stem berhasil di perbarui!');
                    }
                    else{
                        alert('stem tidak dapat diperbarui');
                    }
                    console.log(response);
                }
            });
        });
        console.log('xixixi');
    });
</script>