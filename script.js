// Validação simples usando DOM antes do envio
const form = document.getElementById("formLead");

form.addEventListener("submit", function(event) {
  const nome = document.getElementById("nome").value.trim();
  const email = document.getElementById("email").value.trim();
  const whatsapp = document.getElementById("whatsapp").value.trim();

  if (nome === "" || email === "" || whatsapp === "") {
    alert("⚠️ Por favor, preencha todos os campos!");
    event.preventDefault(); // impede o envio
  } else {
    alert("✅ Dados enviados com sucesso!");
  }
});
