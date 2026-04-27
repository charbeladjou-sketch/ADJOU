// script.js : validation du formulaire

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
        const nom = document.getElementById("nom").value.trim();
        const prenom = document.getElementById("prenom").value.trim();

        let erreurs = [];

        if (nom === "") {
            erreurs.push("Le nom est obligatoire.");
        }

        if (prenom === "") {
            erreurs.push("Le prénom est obligatoire.");
        }

        if (erreurs.length > 0) {
            event.preventDefault(); // Empêche l’envoi
            alert(erreurs.join("\n")); // Affiche les erreurs
        }
    });
});
