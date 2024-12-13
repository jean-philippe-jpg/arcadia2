

     

    
let username = "";
let usernam= "";

//setTimeout qui exécute une fonction anonyme après 1 seconde en asynchrone

window.setTimeout(() => {
  username = "PeterParker"
}, 1000);

window.setTimeout(() => {
    usernam = "toto"
  }, 6000);

console.log('Bonjour ' + username); //affiche 'Bonjour', car exécuté en synchrone, directement après, username n’ayant pas encore été définie sur "PeterParker"

window.setTimeout(() => {
  console.log('Bonjour ' + username); //affiche 'Bonjour PeterParker' car exécuté en asynchrone 1 seconde après la fonction du setTimeout précédent
}, 2000);


window.setTimeout(() => {
    console.log('Bonjour ' + usernam); //affiche 'Bonjour PeterParker' car exécuté en asynchrone 1 seconde après la fonction du setTimeout précédent
  }, 7000);