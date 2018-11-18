//The Variables

var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{word: "snake", hint: "It's a reptile"},
            {word: "monkey", hint: "It's a mammal"}, 
            {word: "beetle", hint: "It's an insect"}];
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];


//Listener
//The check letter function went into the listener.  That sort of validation is done before
//the listener is used.
window.onload = startGame(),hideThem();
$(".letter").click(function () {
    //var buttonVal = $("#letter").val();
    checkLetter($(this).attr("id"));
    disableButton($(this));
})

$(".replayBtn").on("click", function() {
    location.reload();
}) 

$("#hintBtn").on("click", function () {
    $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    remainingGuesses -= 1;
    //console.log("wdfweq " + remainingGuesses);
    updateMan();
    disableButton($(this));
})


/*$("#letterBtn").click(function() {
    var boxVal = $("#letterBox").val();
    console.log("The value in the box is " + boxVal);
})*/


//The Functions
function startGame () {
    pickWord();
    initBoard();
    createLetters();
    updateBoard();
    console.log("start guesses " + remainingGuesses);
}

function pickWord() {
    var randomInt = Math.floor(Math.random()*words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

//Create the letters inside the letters div
function createLetters() {
    for( var letter of alphabet ) {
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
    }
}

function checkLetter (letter) {
    var positions = new Array();
    for (var i = 0; i < selectedWord.length; i++ ) {
        if ( letter == selectedWord[i] ) {
            positions.push(i);
        }
    }
    
    if (positions.length > 0 ) {
        updateWord(positions, letter);
        if (!board.includes('_')) {
            endGame(true);
        }
        
    } else {
        remainingGuesses -= 1;
        console.log("remaining guesses is " + remainingGuesses);
        updateMan();
    }
    
    if (remainingGuesses <= 0) {
        endGame(false);
    }
    
}

function updateWord(positions, letter) {
    for (var pos of positions ) {
        board[pos] = letter;
    }
    updateBoard();
}

function updateBoard() {
    //Empties the div ... right on.
    $("#word").empty();
    //for (var letter of board) {
        //document.getElementById("word").innerHTML += letter + " ";
    //}
    for (var i = 0; i < board.length; i++ ) {
        $("#word").append(board[i] + " ");
    }
    
    $("#word").append("<br/>");
    //$("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    
}

function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
    console.log("img/stick_" + (6 - remainingGuesses) + ".png");
}
            
function initBoard() {
    for (var letter in selectedWord) {
        board.push("_");
    }
}

function endGame(win){
    $("#letters").hide();
    
    if(win) {
        $("#won").show();
        displayGuessed();
    } else {
        $("#lost").show();
    }
}
          
function hideThem() {
    $("#won").hide();
    $("#lost").hide();
}

function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}

function displayGuessed() {
    

     $("#man").append(selectedWord);
        
}