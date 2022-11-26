function cards(produto, imagem,  preco, descricao){
let modelsJson= [
    {id: 1, name:produto[0], img:imagem[0], price:[preco[0], preco[0], preco[0]], sizes:['1', '2', '3'], description:  descricao[0]},
    {id: 2, name:produto[1], img:imagem[1], price:[preco[1], preco[1], preco[1]], sizes:['1', '2', '3'], description:  descricao[1]},
    {id: 3, name:produto[2], img:imagem[2], price:[preco[2], preco[2], preco[2]], sizes:['1', '2', '3'], description:  descricao[2]}

];
return modelsJson;
}