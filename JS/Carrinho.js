 function adicionaAoCarrinho(produto) {
    //localStorage.removeItem("Carrinho");
    if(localStorage.getItem("Carrinho") == true){
    localStorage.setItem("Carrinho", JSON.stringify(new Array()));
    }
    
    var produtos = JSON.parse(localStorage.getItem("Carrinho"));
    if(existe(produtos, produto)){
        for (let i = 0; i < produtos.length; i++) {
            if(produtos[i][0] == produto){
                if(produtos[i][1] + 1 < 20)
                produtos[i][1] += 1;
                break;
            }
            
        }
    }else{
        var novo = new Array(produto, 1);
        produtos.push(novo);
        }
    localStorage.Carrinho = JSON.stringify(produtos);
    alert(localStorage.getItem("Carrinho"));
    
}

function tiraDoCarrinho(produto){
    var produtos = JSON.parse(localStorage.getItem("Carrinho"));
    if(existe(produtos, produto)){
        for (let i = 0; i < produtos.length; i++) {
            if(produtos[i][0] == produto){
                if(produtos[i][1] > 0){
                produtos[i][1] -= 1;
                }
                break;
            }
            
        }
    }
    localStorage.Carrinho = JSON.stringify(produtos);
    alert(produtos);
}
function existe(produtos, produto){
    for (let i = 0; i < produtos.length; i++) {
        if(produtos[i][0] == produto){
            return true;
            break;
        }
    }
    return false;
}