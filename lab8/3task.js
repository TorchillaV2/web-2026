function uniqueElements(arr) {
  let counts = {};

  for (let i = 0; i < arr.length; i++) {
    let key = String(arr[i]);
    if (counts[key] === undefined) {
      counts[key] = 1;
    } else {
      counts[key] = counts[key] + 1; 
    }
  }

  return counts;
}

console.log(uniqueElements(['привет', 'hello', 1, '1', 'Hey', 3, '7'])); 