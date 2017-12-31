var connection = Object.create(Form);
var inscription = Object.create(Form);
connection.useConnection.on();
inscription.useInscription.off();
document.getElementById("connection").addEventListener("click", connection.useConnection.on);
document.getElementById("inscription").addEventListener("click", inscription.useInscription.on);




