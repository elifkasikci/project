var word = "";
var wordLength = "";
var writeField = new Array();
var wrong = 0;

    $.get("/hangman/index/getrandomword",function(wordLength){

      writeField = new Array(parseInt(wordLength)); //kelime uzunluğu kadar bir array oluşturulur

      for(var i = 0; i < writeField.length; i++){ //kelime uzunluğu kadar "_ " oluşturulur.
            writeField[i] = "_ ";
      }
    });

    function printRateword(){
          for (var i = 0; i < writeField.length; i++){
            var ratefield = document.getElementById("ratefield");
            var letter = document.createTextNode(writeField[i]);
            ratefield.appendChild(letter);
          }
    }

    function init(){
        printRateword();

    }

    //sayfa yüklenirken init fonksiyonunu çalıştır
    window.onload = init;

    $(document).ready(function(){

       $('.letter').on('click',function(){

           var letter = $(this).text();

           $.post("/hangman/index/check",{letter:letter},function(result){



           });



           return false;
       });

    });


////butona tıklandığında çalışır. girilen karakteri alır.
//var checkChar = function(){
//    var form = document.rateForm; //form seçilir
//    var rf = form.elements["rateChar"]; //formun harf girilen kısmı seçilir.
//    var character = rf.value; //harf alınır.
//
//    character = character.toUpperCase(); //seçilen karakterleri büyük yazdırı
//
//
//
//    for (var i = 0; i < word.length; i++){ //girilen karakter ile kelimenin harflerini karşılaştırır
//        if(word[i] === character){
//            writeField[i] = character + " ";
//            var hit = true;
//        }
//        rf.value ="";
//    }
//
//    if(!hit){
//        var wrongchar = document.getElementById("wrongchar");
//        var letter = document.createTextNode(" " + character);
//        wrongchar.appendChild(letter);
//        wrong++;
//
//        var hangman = document.getElementById("hangman");
//        hangman.src = "http://www.writteninpencil.de/Projekte/Hangman/hangman" + wrong + ".png";
//    }
//
//    //yeni kelime alanı oluşturmaması için "_ " karakteri boşluk olarak yenilenir.
//    var ratefield = document.getElementById("ratefield");
//    ratefield.innerHTML="";
//    printRateword();
//
//    var finish = true;
//    //harf=== "_" ise oyun bitmedi
//    for (var i = 0; i < writeField.length; i++){
//        if(writeField[i] === "_ "){
//            finish = false;
//        }
//    }
//    if(finish){
//        window.alert("Win!");
//    }
//
//    if(wrong === 6){
//        for(var i = 0; i <writeField.length; i++){
//            ratefield.innerHTML=word;
//        }
//        window.alert("Öldün!");
//    }
//}