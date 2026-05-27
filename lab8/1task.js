function isPrime(num) {
  if (num <= 1) {
    return false;
  }
  for (let i = 2; i < num; i++) {
    if (num % i === 0) {
      return false; 
    }
  }
  return true;
}

function isPrimeNumber(data) {
  if (typeof data === 'number') {
    if (isPrime(data) === true) {
      console.log(data + " простое число");
    } else {
      console.log(data + " не простое число");
    }
  } 
  
  else if (Array.isArray(data)) {
    let primes = [];
    let notPrimes = [];

    for (let i = 0; i < data.length; i++) {
      let currentNumber = data[i];

      if (typeof currentNumber !== 'number') {
        console.log("Ошибка: в массиве есть не число!");
        return;
      }

      if (isPrime(currentNumber) === true) {
        primes.push(currentNumber);
      } else {
        notPrimes.push(currentNumber);
      }
    }

    let resultText = "";
    if (primes.length > 0) {
      resultText = resultText + primes.join(", ");
      if (primes.length === 1) {
        resultText = resultText + " простое число";
      } else {
        resultText = resultText + " простые числа";
      }
    }

    if (primes.length > 0 && notPrimes.length > 0) {
      resultText = resultText + ", ";
    }

    if (notPrimes.length > 0) {
      resultText = resultText + notPrimes.join(", ");
      
      if (notPrimes.length === 1) {
        resultText = resultText + " не простое число";
      } else {
        resultText = resultText + " не простые числа";
      }
    }

    console.log(resultText);
  } 
  
  else {
    console.log("Ошибка: нужно передать число или массив чисел");
  }
}

isPrimeNumber(3);               
isPrimeNumber(4);               
isPrimeNumber([3, 4, 5]);       