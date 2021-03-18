<script type="text/javascript">
    $(document).ready(function () {
        $('#btn_precision').click(function (e) { 
            var c1 = $('#c1').val();
            var c2 = $('#c2').val();
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('precision/hitung')?>",
                data: {c1:c1, c2:c2},
                dataType: "JSON",
                success: function (response) {
                    $('#tp').html(response['tp']+' (TP)');
                    $('#fp').html(response['fp']+' (FP)');
                    $('#fn').html(response['fn']+' (FN)');
                    $('#tn').html(response['tn']+' (TN)');
                    $('#jml_positif').html(response['jml_positif']+' (P)');
                    $('#jml_negatif').html(response['jml_negatif']+' (N)');
                    $('#jml_data').html(response['jml_data']);
                    $('#n_precision').text(response['precision']+'%');
                    $('#n_recall').text(response['recall']+'%');
                    $('#c2').val(parseInt(c2)+1);
                }
            });
        });
    });
</script>