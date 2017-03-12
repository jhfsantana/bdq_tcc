function showDiv(select){
   if(select.value==5){

    document.getElementById('q1_pontos').value=2.0;
    document.getElementById('q2_pontos').value=2.0;
    document.getElementById('q3_pontos').value=2.0;
    document.getElementById('q4_pontos').value=2.0;
    document.getElementById('q5_pontos').value=2.0;


    document.getElementById('questaobox6').style.display = "none";
    document.getElementById('step7').style.display = "none";
    document.getElementById('step8').style.display = "none";
    document.getElementById('step9').style.display = "none";
    document.getElementById('step10').style.display = "none";
    document.getElementById('step11').style.display = "none";
    $('li#step7').not();
    $('li#step8').not();
    $('li#step9').not();
    $('li#step10').not();
    $('li#step11').not();

    document.getElementById('questao-area6').setAttribute("disabled","disabled");

    document.getElementById('questaobox7').style.display = "none";
    document.getElementById('questao-area7').setAttribute("disabled","disabled");

    document.getElementById('questaobox8').style.display = "none";
    document.getElementById('questao-area8').setAttribute("disabled","disabled");

    document.getElementById('questaobox9').style.display = "none";
    document.getElementById('questao-area9').setAttribute("disabled","disabled");

    document.getElementById('questaobox10').style.display = "none";
    document.getElementById('questao-area10').setAttribute("disabled","disabled");
    }if(select.value==6){
    
    document.getElementById('q1_pontos').value=1.0;
    document.getElementById('q2_pontos').value=1.0;
    document.getElementById('q3_pontos').value=2.0;
    document.getElementById('q4_pontos').value=2.0;
    document.getElementById('q5_pontos').value=2.0;
    document.getElementById('q6_pontos').value=2.0;

    document.getElementById('questaobox6').style.display = "block";
    document.getElementById('step7').style.display = "block";
    document.getElementById('step8').style.display = "none";
    document.getElementById('step9').style.display = "none";
    document.getElementById('step10').style.display = "none";
    document.getElementById('step11').style.display = "none";
    document.getElementById('questao-area6').removeAttribute("disabled");
    
    document.getElementById('questaobox7').style.display = "none";
    document.getElementById('questao-area7').setAttribute("disabled","disabled");

    document.getElementById('questaobox8').style.display = "none";
    document.getElementById('questao-area8').setAttribute("disabled","disabled");

    document.getElementById('questaobox9').style.display = "none";
    document.getElementById('questao-area9').setAttribute("disabled","disabled");

    document.getElementById('questaobox10').style.display = "none";
    document.getElementById('questao-area10').setAttribute("disabled","disabled");       
    }if(select.value==7){

    document.getElementById('q1_pontos').value=1.0;
    document.getElementById('q2_pontos').value=1.0;
    document.getElementById('q3_pontos').value=1.0;
    document.getElementById('q4_pontos').value=1.0;
    document.getElementById('q5_pontos').value=1.0;
    document.getElementById('q6_pontos').value=2.5;
    document.getElementById('q7_pontos').value=2.5;

    document.getElementById('questaobox6').style.display = "block";
    document.getElementById('step7').style.display = "block";
    document.getElementById('step8').style.display = "block";
    document.getElementById('step9').style.display = "none";
    document.getElementById('step10').style.display = "none";
    document.getElementById('step11').style.display = "none";
    document.getElementById('questao-area6').removeAttribute("disabled");

    document.getElementById('questaobox7').style.display = "block";
    document.getElementById('questao-area7').removeAttribute("disabled");
    
    document.getElementById('questaobox8').style.display = "none";
    document.getElementById('questao-area8').setAttribute("disabled","disabled");

    document.getElementById('questaobox9').style.display = "none";
    document.getElementById('questao-area9').setAttribute("disabled","disabled");

    document.getElementById('questaobox10').style.display = "none";
    document.getElementById('questao-area10').setAttribute("disabled","disabled");        
    }if(select.value==8){

    document.getElementById('q1_pontos').value=1.0;
    document.getElementById('q2_pontos').value=1.0;
    document.getElementById('q3_pontos').value=1.0;
    document.getElementById('q4_pontos').value=1.0;
    document.getElementById('q5_pontos').value=1.0;
    document.getElementById('q6_pontos').value=1.0;
    document.getElementById('q7_pontos').value=2.0;
    document.getElementById('q8_pontos').value=2.0;

    document.getElementById('questaobox6').style.display = "block";
    document.getElementById('step7').style.display = "block";
    document.getElementById('step8').style.display = "block";
    document.getElementById('step9').style.display = "block";
    document.getElementById('step10').style.display = "none";
    document.getElementById('step11').style.display = "none";
    document.getElementById('questao-area6').removeAttribute("disabled");

    document.getElementById('questaobox7').style.display = "block";
    document.getElementById('questao-area7').removeAttribute("disabled");

    document.getElementById('questaobox8').style.display = "block";
    document.getElementById('questao-area8').removeAttribute("disabled");

    document.getElementById('questaobox9').style.display = "none";
    document.getElementById('questao-area9').setAttribute("disabled","disabled");

    document.getElementById('questaobox10').style.display = "none";
    document.getElementById('questao-area10').setAttribute("disabled","disabled");       
    }if(select.value==9){

    document.getElementById('q1_pontos').value=1.0;
    document.getElementById('q2_pontos').value=1.0;
    document.getElementById('q3_pontos').value=1.0;
    document.getElementById('q4_pontos').value=1.0;
    document.getElementById('q5_pontos').value=1.0;
    document.getElementById('q6_pontos').value=1.0;
    document.getElementById('q7_pontos').value=1.0;
    document.getElementById('q8_pontos').value=1.0;
    document.getElementById('q9_pontos').value=2.0;

    document.getElementById('questaobox6').style.display = "block";
    document.getElementById('step7').style.display = "block";
    document.getElementById('step8').style.display = "block";
    document.getElementById('step9').style.display = "block";
    document.getElementById('step10').style.display = "block";
    document.getElementById('step11').style.display = "none";
    document.getElementById('questao-area6').removeAttribute("disabled");

    document.getElementById('questaobox7').style.display = "block";
    document.getElementById('questao-area7').removeAttribute("disabled");

    document.getElementById('questaobox8').style.display = "block";
    document.getElementById('questao-area8').removeAttribute("disabled");

    document.getElementById('questaobox9').style.display = "block";
    document.getElementById('questao-area9').removeAttribute("disabled"); 

    document.getElementById('questaobox10').style.display = "none";
    document.getElementById('questao-area10').setAttribute("disabled","disabled");      
    }
    if(select.value==10){

    document.getElementById('q1_pontos').value=1.0;
    document.getElementById('q2_pontos').value=1.0;
    document.getElementById('q3_pontos').value=1.0;
    document.getElementById('q4_pontos').value=1.0;
    document.getElementById('q5_pontos').value=1.0;
    document.getElementById('q6_pontos').value=1.0;
    document.getElementById('q7_pontos').value=1.0;
    document.getElementById('q8_pontos').value=1.0;
    document.getElementById('q9_pontos').value=1.0;
    document.getElementById('q10_pontos').value=1.0;

    document.getElementById('questaobox6').style.display = "block";
    document.getElementById('step7').style.display = "block";
    document.getElementById('step8').style.display = "block";
    document.getElementById('step9').style.display = "block";
    document.getElementById('step10').style.display = "block";
    document.getElementById('step11').style.display = "block";
    document.getElementById('questao-area6').removeAttribute("disabled");

    document.getElementById('questaobox7').style.display = "block";
    document.getElementById('questao-area7').removeAttribute("disabled");

    document.getElementById('questaobox8').style.display = "block";
    document.getElementById('questao-area8').removeAttribute("disabled");

    document.getElementById('questaobox9').style.display = "block";
    document.getElementById('questao-area9').removeAttribute("disabled"); 

    document.getElementById('questaobox10').style.display = "block";
    document.getElementById('questao-area10').removeAttribute("disabled");       
    }
}