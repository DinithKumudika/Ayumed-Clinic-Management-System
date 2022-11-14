const firstNextBtn = document.getElementById('btn-next-1');
const secondNextBtn = document.getElementById('btn-next-2');

const firstBackBtn = document.getElementById('btn-back-1');
const secondBackBtn = document.getElementById('btn-back-2');

const signupBtn = document.getElementById('btn-signup');
const signupForm = document.getElementById('form-signup');

const progressText = document.getElementById('form-step-text');

const first = document.getElementById('first');
const second = document.getElementById('second');
const third = document.getElementById('third');

const progressBars = document.querySelectorAll('.step');

let progressCount = 1;
progressBars[0].style.backgroundColor = "#19A627";

// adding event listeners to form buttons
firstNextBtn.addEventListener('click', function(){
     first.style.display = "none";
     second.style.display = "block";
     progressCount = progressCount + 1;
     progressText.innerHTML = "step " + progressCount + " of 3";

     progressBars[0].style.backgroundColor = "#6C757D";
     progressBars[1].style.backgroundColor = "#19A627";
});

firstBackBtn.addEventListener('click', function(){
     first.style.display = "block";
     second.style.display = "none";
     progressCount = progressCount - 1;
     progressText.innerHTML = "step " + progressCount + " of 3";

     progressBars[0].style.backgroundColor = "#19A627";
     progressBars[1].style.backgroundColor = "#6C757D";
});


function validInputLength(inputField){
     if(inputField.value.length>=8 && inputField.value.length<=16){
          return true;
     }
     else{
          return false;
     }
}