document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("cronogramaForm");
  const resultado = document.getElementById("resultado");
  const listaResultado = document.getElementById("listaResultado");

  const formContainer = document.querySelector(".paineld");
  const resultadoContainer = document.querySelector(".resultado");

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    // animação do formulário sumindo
    formContainer.classList.add("fadeOutSmoke");

    setTimeout(() => {
      // esconde form de vez
      formContainer.style.display = "none";

      // agora gera o cronograma
      const metodo = document.getElementById("metodo").value;
      const horasSemana = parseInt(document.getElementById("horas").value);
      const selects = document.querySelectorAll("#disciplinas select");

      listaResultado.innerHTML = "";

      selects.forEach((sel) => {
        const materia = sel.dataset.materia;
        const dificuldade = parseInt(sel.value); // 1 a 5

        const horas = Math.round(
          (dificuldade / 5) * horasSemana / selects.length
        );

        const li = document.createElement("li");
        li.textContent = `${materia}: ${horas}h - Método: ${metodo}`;
        listaResultado.appendChild(li);
      });

      // mostra cronograma com efeito
      resultado.style.display = "block";
      resultadoContainer.classList.add("fadeInSmoke");
    }, 400); // tempo da animação
  });
});
