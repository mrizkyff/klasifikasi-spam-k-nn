<script type="text/javascript">
    // aksi untuk memproses query ke controller klastering
    $('#btn_cluster').click(function (e) { 
        e.preventDefault();
        // ambil dari form query di halaman depan
        var query = $('#query').val();
        // kirim ke kontroler klastering
        $.ajax({
            type: "post",
            url: "<?php echo base_url('klastering/proses_klastering')?>",
            data: {query: query},
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                // alert(response['kesimpulan']);
                if (response['kesimpulan'] == 'ekonomi'){
                    $('#query').addClass('is-valid');
                    $('#query').removeClass('is-invalid');
                    $('#pesan_valid').text(response['kesimpulan']);
                    $('#pesan_kategori').hide();
                }
                else if(response['kesimpulan'] == 'olahraga'){
                    $('#query').addClass('is-invalid');
                    $('#query').removeClass('is-valid');
                    $('#pesan_invalid').text(response['kesimpulan']);
                    $('#pesan_kategori').hide();

                }
            }
        });
    });
</script>