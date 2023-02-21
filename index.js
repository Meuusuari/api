function iniciar() {
    let novo = document.getElementById("form");
    novo.innerHTML = `   <form method="POST"> 
    <h2>Insira os dados</h2>
<input type="text" name="txtnome" id="txtnome" placeholder="Qual carro?" require>
<input type="text" name="txtplaca" id="txtplaca" placeholder="Qual a placa do carro?" require>
<input type="text" name="txtano" id="txtano" placeholder="Qual o ano do carro?" require>
<button class="vermel1" onclick="salvar()" type="submit" name="button">Salvar</button>
<button class="vermel" onclick="resetar()" type="" name="">Cancelar</button>
</form>`;
}

function resetar() {
    let rese = document.getElementById("form");
    rese.innerHTML = "";

}
