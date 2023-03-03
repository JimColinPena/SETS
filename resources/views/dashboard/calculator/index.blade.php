<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Calculator</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('src/css/app.css') }}">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script>
jQuery(document).ready(function() {
    jQuery('.waves-effect').click(function() {
        var add = 0;
        var sum = add + jQuery('.calculator-screen').val(jQuery(this).prop("value"));
        // console.log(sum);
    });
const calculator = {
  displayValue: '0',
  firstOperand: null,
  waitingForSecondOperand: false,
  operator: null,
};
function inputDigit(digit) {
  const { displayValue, waitingForSecondOperand } = calculator;
  if (waitingForSecondOperand === true) {
    calculator.displayValue = digit;
    calculator.waitingForSecondOperand = false;
  } else {
    calculator.displayValue = displayValue === '0' ? digit : displayValue + digit;
  }
}
function inputDecimal(dot) {
  // If the `displayValue` does not contain a decimal point
  if (!calculator.displayValue.includes(dot)) {
    // Append the decimal point
    calculator.displayValue += dot;
  }
}
function handleOperator(nextOperator) {
  const { firstOperand, displayValue, operator } = calculator
  const inputValue = parseFloat(displayValue);
  if (operator && calculator.waitingForSecondOperand)  {
    calculator.operator = nextOperator;
    return;
  }
  if (firstOperand == null) {
    calculator.firstOperand = inputValue;
  } else if (operator) {
    const currentValue = firstOperand || 0;
    const result = performCalculation[operator](currentValue, inputValue);
    calculator.displayValue = String(result);
    calculator.firstOperand = result;
  }
  calculator.waitingForSecondOperand = true;
  calculator.operator = nextOperator;
}
const performCalculation = {
  '/': (firstOperand, secondOperand) => firstOperand / secondOperand,
  '*': (firstOperand, secondOperand) => firstOperand * secondOperand,
  '+': (firstOperand, secondOperand) => firstOperand + secondOperand,
  '-': (firstOperand, secondOperand) => firstOperand - secondOperand,
  '=': (firstOperand, secondOperand) => secondOperand
};
function resetCalculator() {
  calculator.displayValue = '0';
  calculator.firstOperand = null;
  calculator.waitingForSecondOperand = false;
  calculator.operator = null;
}
function updateDisplay() {
  const display = document.querySelector('.calculator-screen');
  display.value = calculator.displayValue;
}
updateDisplay();
const keys = document.querySelector('.calculator-keys');
keys.addEventListener('click', (event) => {
  const { target } = event;
  if (!target.matches('button')) {
    return;
  }
  if (target.classList.contains('operator')) {
    handleOperator(target.value);
    updateDisplay();
    return;
  }
  if (target.classList.contains('decimal')) {
    inputDecimal(target.value);
    updateDisplay();
    return;
  }
  if (target.classList.contains('all-clear')) {
    resetCalculator();
    updateDisplay();
    return;
  }
  inputDigit(target.value);
  updateDisplay();
});
});
</script>
</head>
<body>

  <div class="sidebar">
    <a class="active"><p><strong>SETS</strong></p> <p>by: GROUP 3</p></a>
    <a href="{{ route('user.profile') }}">Home</a>
    <a href="{{ route('user.info') }}">Profile Information</a>
    <a href="{{ route('user.notes') }}">My Notes</a>
    <a href="{{URL('full-calendar') }}">Schedules</a>
    <nav class=" navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tools</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('search.index') }}">Dictionary</a>
                        <a class="dropdown-item" href="{{ url('/calculator') }}">Calculator</a>
                        <a class="dropdown-item" href="{{ route('unisharp.lfm.show') }}">File Manager</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <a href="{{ route('user.logout') }}">Logout</a>
</div>

<div  class="content">
    {{-- <nav class="navbar navbar-expand-xl navbar-light bg-light">
      <a class="navbar-brand"></a>
    </nav> --}}

    
<div class="calculator card">
  <input type="text" class="calculator-screen z-depth-1" value="" disabled />
  <div class="calculator-keys">
    <button type="button" class="operator btn btn-info" value="+">+</button>
    <button type="button" class="operator btn btn-info" value="-">-</button>
    <button type="button" class="operator btn btn-info" value="*">&times;</button>
    <button type="button" class="operator btn btn-info" value="/">&divide;</button>
    <button type="button" value="7" class="btn btn-light waves-effect">7</button>
    <button type="button" value="8" class="btn btn-light waves-effect">8</button>
    <button type="button" value="9" class="btn btn-light waves-effect">9</button>
    <button type="button" value="4" class="btn btn-light waves-effect">4</button>
    <button type="button" value="5" class="btn btn-light waves-effect">5</button>
    <button type="button" value="6" class="btn btn-light waves-effect">6</button>
    <button type="button" value="1" class="btn btn-light waves-effect">1</button>
    <button type="button" value="2" class="btn btn-light waves-effect">2</button>
    <button type="button" value="3" class="btn btn-light waves-effect">3</button>
    <button type="button" value="0" class="btn btn-light waves-effect">0</button>
    <button type="button" class="decimal function btn btn-secondary" value=".">.</button>
    <button type="button" class="all-clear function btn btn-danger btn-sm" value="all-clear">AC</button>
    <button type="button" class="equal-sign operator btn btn-default" value="=">=</button>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>