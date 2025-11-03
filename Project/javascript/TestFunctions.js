let fileName = window.location.pathname.split('/').pop();
if (fileName === "easyTest.php") {
   words = [
    "easy", "words" ,"go" , "in", "here"
  ];
} else {
   words = [ "hard", "words" ,"go" , "in", "here"]
}

//initialise variables//

const input = document.querySelector(".input");
const charSpan = [];
let count = 60;
let timerStarted = false;
let timer;
let currentString ='';
let correct = 0;



//randomises order of the words array and turns the array into a string//

function wordsRandom(words){
  let Randomwords = [];

  for (let i = 0; i<400; i++){
      let x = Math.floor(Math.random()* words.length);
      Randomwords[i] = words[x];
  };
  populateText(Randomwords.join(' '));
};

 //puts text into the text element//

 function populateText(str) {
  currentString = str;
  const text = document.querySelector(".text");

  text.innerHTML = '';
  charSpan.length = 0; 


  str.split("").forEach(letter => {
    const span = document.createElement("span");
    span.innerText = letter;
    text.appendChild(span);

    charSpan.push(span);
  });
 }


//User Results (WPM) Calculated after test finished//


 function Results() {
  let letters = input.value.split("");
  console.log(letters);

  for (let p = 0; p < letters.length; p++){
    if (letters[p] === currentString[p]){
      correct++;
      console.log("correct " + correct)
    }
  }


 
  let wordsTotal = Math.round(correct/5);


  console.log(correct);
  submitResults(wordsTotal);

  document.getElementById('WPM').innerHTML = 'WPM: ' + wordsTotal;
  wordsTotal = 0;
  correct = 0;
};

//User Results(WPM) is then sent to the server to be assigned as a server side variable//

function submitResults(WPM) {
  $.ajax({
    url: fileName,
    type: 'POST',
    data: {testWPM: WPM},
    success: function(data){
      console.log("success");
    }
  });
};



//timer//

 input.addEventListener("keyup", () => {

  if(!timerStarted) {
    timerStarted = true;
    timer = setInterval(function() {
      count--;
      document.getElementById('timer').innerHTML = 'Time: ' + count;
      console.log(count);

      if (count === 0) {

        clearInterval(timer);
        count = 60;
        timerStarted= false;
        document.getElementById('timer').innerHTML = 'Time: ' + count;
        input.blur();
        Results();
        resetCharSpan();
        wordsRandom(words);

        const text = document.querySelector(".text");
        text.scrollTo({
        top: 0,
        behavior: "smooth"
        });
        
        
        input.value ='';

      }
    },1000);

    
  }
 });

 //reset button//

 document.querySelector('.reset').addEventListener("click", () => {
  clearInterval(timer);
  count = 60;
  timerStarted = false;
  document.getElementById('timer').innerHTML = 'Time: ' + count;

  input.value ='';
  input.focus();
  correct = 0;


  wordsRandom(words);
  const text = document.querySelector(".text");
  text.scrollTo({
    top: 0,
    behavior: "smooth"
  });

 });

 //resets the correct and incorrect letters classes//

 function resetCharSpan(){
  charSpan.map(charSpan => {
    charSpan.classList.remove("correct");
    charSpan.classList.remove("wrong");
  });
 }


//checks user input and determines whether its correct of incorrect//

 input.addEventListener("keyup", () => {
  const val = input.value;
  resetCharSpan();
  
  val.split("").map((letter, i) => {
    if(letter === currentString[i]){
      charSpan[i].classList.add("correct");
    
    }else{
      charSpan[i].classList.add("wrong");
    }
  });

  
  
//auto scrolls whenever the user gets to the end of visible text//

  const visibleCharCount = Math.floor(document.querySelector(".text").offsetHeight / charSpan[0].offsetHeight); 
  const lastVisibleCharIndex = Math.min(visibleCharCount - 1, charSpan.length - 1);
  const currentCharIndex = val.length - 1;

  if (currentCharIndex >= lastVisibleCharIndex) {
    const nextChar = charSpan[currentCharIndex + 1];
    if (nextChar) {
      nextChar.scrollIntoView({
        behavior: "smooth",
        block: "nearest",
        inline: "nearest",
      });
    }
  }
});

wordsRandom(words);
