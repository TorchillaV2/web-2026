function countVowels(str) {
  if (typeof str !== 'string') return 0;
  
  let count = 0;
  let vowels = "аеёиоуыэюя";
  
  for (let char of str.toLowerCase()) {
    if (vowels.includes(char)) count++; 
  }
  
  return count;
}

console.log(countVowels("Привеееееееееееет, мир!"));