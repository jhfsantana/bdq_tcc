function showDiv(select){
   if(select.value==5){

    document.getElementById('q1_pontos').value=2;
    document.getElementById('q2_pontos').value=2;
    document.getElementById('q3_pontos').value=2;
    document.getElementById('q4_pontos').value=2;
    document.getElementById('q5_pontos').value=2;


    document.getElementById('questaobox6').style.display = "none";
    document.getElementById('questaobox7').style.display = "none";
    document.getElementById('questaobox8').style.display = "none";
    document.getElementById('questaobox9').style.display = "none";
    document.getElementById('questaobox10').style.display = "none";
    }if(select.value==6){
    
    document.getElementById('q1_pontos').value=1;
    document.getElementById('q2_pontos').value=1;
    document.getElementById('q3_pontos').value=2;
    document.getElementById('q4_pontos').value=2;
    document.getElementById('q5_pontos').value=2;
    document.getElementById('q6_pontos').value=2;

    document.getElementById('questaobox6').style.display = "block";
    document.getElementById('questaobox7').style.display = "none";
    document.getElementById('questaobox8').style.display = "none";
    document.getElementById('questaobox9').style.display = "none";
    document.getElementById('questaobox10').style.display = "none";        
    }if(select.value==7){

    document.getElementById('q1_pontos').value=1;
    document.getElementById('q2_pontos').value=1;
    document.getElementById('q3_pontos').value=1;
    document.getElementById('q4_pontos').value=1;
    document.getElementById('q5_pontos').value=1;
    document.getElementById('q6_pontos').value=2.5;
    document.getElementById('q7_pontos').value=2.5;

    document.getElementById('questaobox6').style.display = "block";
    document.getElementById('questaobox7').style.display = "block";
    document.getElementById('questaobox8').style.display = "none";
    document.getElementById('questaobox9').style.display = "none";
    document.getElementById('questaobox10').style.display = "none";        
    }if(select.value==8){

    document.getElementById('q1_pontos').value=1;
    document.getElementById('q2_pontos').value=1;
    document.getElementById('q3_pontos').value=1;
    document.getElementById('q4_pontos').value=1;
    document.getElementById('q5_pontos').value=1;
    document.getElementById('q6_pontos').value=1;
    document.getElementById('q7_pontos').value=2;
    document.getElementById('q8_pontos').value=2;

    document.getElementById('questaobox6').style.display = "block";
    document.getElementById('questaobox7').style.display = "block";
    document.getElementById('questaobox8').style.display = "block";
    document.getElementById('questaobox9').style.display = "none";
    document.getElementById('questaobox10').style.display = "none";        
    }if(select.value==9){

    document.getElementById('q1_pontos').value=1;
    document.getElementById('q2_pontos').value=1;
    document.getElementById('q3_pontos').value=1;
    document.getElementById('q4_pontos').value=1;
    document.getElementById('q5_pontos').value=1;
    document.getElementById('q6_pontos').value=1;
    document.getElementById('q7_pontos').value=1;
    document.getElementById('q8_pontos').value=1;
    document.getElementById('q9_pontos').value=2;

    document.getElementById('questaobox6').style.display = "block";
    document.getElementById('questaobox7').style.display = "block";
    document.getElementById('questaobox8').style.display = "block";
    document.getElementById('questaobox9').style.display = "block";
    document.getElementById('questaobox10').style.display = "none";        
    }
    if(select.value==10){

    document.getElementById('q1_pontos').value=1;
    document.getElementById('q2_pontos').value=1;
    document.getElementById('q3_pontos').value=1;
    document.getElementById('q4_pontos').value=1;
    document.getElementById('q5_pontos').value=1;
    document.getElementById('q6_pontos').value=1;
    document.getElementById('q7_pontos').value=1;
    document.getElementById('q8_pontos').value=1;
    document.getElementById('q9_pontos').value=1;
    document.getElementById('q10_pontos').value=1;

    document.getElementById('questaobox6').style.display = "block";
    document.getElementById('questaobox7').style.display = "block";
    document.getElementById('questaobox8').style.display = "block";
    document.getElementById('questaobox9').style.display = "block";
    document.getElementById('questaobox10').style.display = "block";        
    }
}