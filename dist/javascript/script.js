const regexPseudo = /^[a-zA-Z0-9]{5,15}$/;
const regexLivre = /^[a-zA-Z]([-'\s]?[a-zA-Z]){4,99}$/;
const regexNb = /^[0-9]{1,5}$/;
const regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const regexAsin = /^[A-Z0-9]{10}$/;




function verifierPseudo(pseudo) {
    let monChamp = document.getElementById('champPseudo');
    monChamp.innerText ='';

    if (!pseudo.value.match(regexPseudo)) {
        monChamp.innerText += 'Enter a username, between 2 and 10 caracters';
        document.getElementById('champPseudo').style.display = 'inline-block';
        return false;
    } else {
        document.getElementById('champPseudo').style.display = 'none';
        return true;
    }
}


function verifierNb(nombre, id) {
    var identifiant = "champNb";
    var champ = identifiant.concat(id)
    let monChamp = document.getElementById(champ);
    monChamp.innerText ='';
    if (!nombre.value.match(regexNb)) {
        monChamp.innerText += 'Enter a valid number';
        document.getElementById('champNb').style.display = 'inline-block';
        return false;
    } else {
        document.getElementById('champNb').style.display = 'none';
        return true;}
}


function verifierAsin(asin) {
    let monChamp = document.getElementById('champAsin');
    monChamp.innerText ='';
    if (!asin.value.match(regexAsin)) {
        monChamp.innerText += 'Enter a valid ASIN';
        document.getElementById('champAsin').style.display = 'inline-block';
        return false;
    } else {
        document.getElementById('champAsin').style.display = 'none';
        return true;}
}


function verifierEmail(email) {
    let monChamp = document.getElementById('champMail');
    monChamp.innerText ='';
 
    if (!email.value.match(regexEmail)) {
        monChamp.innerText += 'Enter a valid email address';
        document.getElementById('champMail').style.display = 'inline-block';
        return false;
    } else {
        document.getElementById('champMail').style.display = 'none';
        return true;
    }
}


function verifierChampsVide(donnee, id) {
    var identifiant = "champAremplir";
    var champ = identifiant.concat(id);
    let monChamp = document.getElementById(champ);
    let valeur = donnee.value;
    monChamp.innerText ='';
    if (valeur.trim() === '') {
        monChamp.innerText += 'Please fill in this field';
        document.getElementById('champAremplir').style.display = 'block';
        return false;
    } else {
        document.getElementById('champAremplir').style.display = 'none';
        return true;
    }
}



function checkPassword(password) {
    let correct = true;
    let monChamp = document.getElementById('champMdp');
    let mdp = password.value;
    monChamp.style.display = 'block';
    monChamp.innerText = '';

    // on teste la présence de chiffre et de lettres
    if (mdp.search(/\d/) !== -1 && mdp.search(/[a-zA-Z]/) !== -1) {
        document.getElementById('champMdp').style.display = 'none';
    } else {
        document.getElementById('champMdp').style.display = 'inline-block';
        correct = false;
    }

    // on teste la présence de caractère spécial
    if (mdp.search(/[!#$%&?+=()@*."]/) !== -1) {
        document.getElementById('champMdp').style.display = 'none';
    } else {
        document.getElementById('champMdp').style.display = 'inline-block';
        correct = false;
    }

    // on teste la longueur du mot de passe
    if (mdp.length >= 5 && mdp.length <= 15) {
        document.getElementById('champMdp').style.display = 'none';
    } else {
        document.getElementById('champMdp').style.display = 'inline-block';
        correct = false;
    }

    if (!correct) {
        monChamp.innerText += 'The password is too weak';
        document.getElementById('champMdp').style.display = 'block';
    }
    return correct;
}

function verifierMdp2() {
    let correct = true;
    let monChamp = document.getElementById('champMdp2');
    var mdpverif = document.getElementById('check-password').value;
    var mdp = document.getElementById('password').value;
    monChamp.style.display = 'block';
    monChamp.innerText = '';
 

    if (mdpverif === '') {
        correct = false;
        monChamp.innerText += 'Confirmation is mandatory';
    }

    else if (mdp !== mdpverif) {
        correct = false;
        monChamp.innerText += 'The passwords must be identical';
    }

    return correct;
}

