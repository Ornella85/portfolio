/*
 * HOME PAGE
 */

/*
 * PrésentationEffect()
 */
$(function() {
    setTimeout(function() {
      $('.text-animation').removeClass('hidden');
    }, 500);
  }());

/*
 * typingEffect()
 */
function typingEffect() {
    const contactTexts = shuffleArray(['SYMFONY','PHP', 'TWIG','SQL','HTML', 'CSS']);
    const typedtext = document.getElementsByClassName("typedtext")[0];
    let removing = false;
    let idx = char = 0;

    setInterval(() => { // We define the interval of the typing speed

        // If we do not reach the limit, we insert characters in the html
        if (char < contactTexts[idx].length) typedtext.innerHTML += contactTexts[idx][char];

        // 15*150ms = time before starting to remove characters
        if (char == contactTexts[idx].length + 15) removing = true;

        // Removing characters, the last one always
        if (removing) typedtext.innerHTML = typedtext.innerHTML.substring(0, typedtext.innerHTML.length - 1);

        char++; // Next character

        // When there is nothing else to remove
        if (typedtext.innerHTML.length === 0) {

            // If we get to the end of the texts we start over
            if (idx === contactTexts.length - 1) idx = 0
            else idx++;

            char = 0; // Start the next text by the first character
            removing = false; // No more removing characters
        }

    }, 150); // Typing speed, 150 ms

}
typingEffect();
function shuffleArray(array) {
    let currentIndex = array.length,
        temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

/*
 * ADMIN
 */

/*
 * ajax button
 */
$(document).ready(function(){   
    $("#loadstudent").on("click", function(event){  
       $.ajax({  
          url:        '/ajax',  
          type:       'POST',   
          dataType:   'json',  
          async:      true,  
          
          success: function(data, status) {  
             var e = $('<tr><th>Nom</th><th>Prénom</th><th>N° de téléphone</th><th>Email</th><th>Message</th></tr>');  
             $('#student').html('');  
             $('#student').append(e);  
             
             for(i = 0; i < data.length; i++) {  
                student = data[i];  
                var e = $('<tr><td id = "firstname"></td><td id = "lastname"></td><td id = "phone"></td><td id = "email"></td><td id = "message"></td></tr>');
                
                $('#firstname', e).html(student['firstname']);  
                $('#lastname', e).html(student['lastname']);  
                $('#phone', e).html(student['phone']);  
                $('#email', e).html(student['email']);  
                $('#message', e).html(student['message']);  
                $('#student').append(e);  
             }  
          },  
          error : function(xhr, textStatus, errorThrown) {  
             alert('Ajax request failed.');  
          }  
       });  
    });  
 });  


/*
 * jQUERY GREETING Time / Clock
 */

var thehours = new Date().getHours();
	var themessage;
	var morning = ('Bonjour');
	var afternoon = ('Bon Ap-Midi');
	var evening = ('Bonne soirée');

	if (thehours >= 0 && thehours < 12) {
		themessage = morning; 

	} else if (thehours >= 12 && thehours < 17) {
		themessage = afternoon;

	} else if (thehours >= 17 && thehours < 24) {
		themessage = evening;
	}

	$('.greeting').append(themessage);

    /*
 * js Clock
 */

    var myVar = setInterval(function(){myTimer()}, 1000);

    function myTimer() {
        var d = new Date();
      
        var s = d.getSeconds();
        var m = d.getMinutes();
        var h = d.getHours();
        
        var sCircle = s/60*360;
        var mCircle = m/60*360;
        var hCircle = h/12*360;
        
        $('#secondes').css({'-webkit-transform':'rotate('+sCircle+'deg)'});
        $('#minutes').css({'-webkit-transform':'rotate('+mCircle+'deg)'});
        $('#heures').css({'-webkit-transform':'rotate('+hCircle+'deg)'});
    }