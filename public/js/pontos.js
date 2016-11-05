$(document).ready(function() {
    $('input:radio[name=op]').click(function() {
        var checkval = $('input:radio[name=op]:checked').val();
        $('#q1_pontos').prop('disabled', !(checkval == '1' || checkval == '2'));
        $('#q1_pontos').prop('disabled', (checkval == '2'));
    });

        $('input:radio[name=opq2]').click(function() {
        var checkval = $('input:radio[name=opq2]:checked').val();
        $('#q2_pontos').prop('disabled', !(checkval == '1' || checkval == '2'));
        $('#q2_pontos').prop('disabled', (checkval == '2'));
    });

        $('input:radio[name=opq3]').click(function() {
        var checkval = $('input:radio[name=opq3]:checked').val();
        $('#q3_pontos').prop('disabled', !(checkval == '1' || checkval == '2'));
        $('#q3_pontos').prop('disabled', (checkval == '2'));
    });

        $('input:radio[name=opq4]').click(function() {
        var checkval = $('input:radio[name=opq4]:checked').val();
        $('#q4_pontos').prop('disabled', !(checkval == '1' || checkval == '2'));
        $('#q4_pontos').prop('disabled', (checkval == '2'));
    });

        $('input:radio[name=opq5]').click(function() {
        var checkval = $('input:radio[name=opq5]:checked').val();
        $('#q5_pontos').prop('disabled', !(checkval == '1' || checkval == '2'));
        $('#q5_pontos').prop('disabled', (checkval == '2'));
    });

        $('input:radio[name=opq6]').click(function() {
        var checkval = $('input:radio[name=opq6]:checked').val();
        $('#q6_pontos').prop('disabled', !(checkval == '1' || checkval == '2'));
        $('#q6_pontos').prop('disabled', (checkval == '2'));
    });

        $('input:radio[name=opq7]').click(function() {
        var checkval = $('input:radio[name=opq7]:checked').val();
        $('#q7_pontos').prop('disabled', !(checkval == '1' || checkval == '2'));
        $('#q7_pontos').prop('disabled', (checkval == '2'));
    });

        $('input:radio[name=opq8]').click(function() {
        var checkval = $('input:radio[name=opq8]:checked').val();
        $('#q8_pontos').prop('disabled', !(checkval == '1' || checkval == '2'));
        $('#q8_pontos').prop('disabled', (checkval == '2'));
    });

        $('input:radio[name=opq9]').click(function() {
        var checkval = $('input:radio[name=opq9]:checked').val();
        $('#q9_pontos').prop('disabled', !(checkval == '1' || checkval == '2'));
        $('#q9_pontos').prop('disabled', (checkval == '2'));
    });

        $('input:radio[name=opq10]').click(function() {
        var checkval = $('input:radio[name=opq10]:checked').val();
        $('#q10_pontos').prop('disabled', !(checkval == '1' || checkval == '2'));
        $('#q10_pontos').prop('disabled', (checkval == '2'));
    });            
});