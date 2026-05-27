const users = [
  { id: 1, name: "Дима" },
  { id: 2, name: "Ксюша" },
  { id: 3, name: "Аня" }
];

let namesArray = users.map(function(user) {
  return user.id;
});

console.log(namesArray); 
