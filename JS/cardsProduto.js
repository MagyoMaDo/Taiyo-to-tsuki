function cards(produto, imagem,  preco, descricao){
let array= [
    {id: 1, name:produto[0], img:imagem[0], price:[parseFloat(preco[0]), parseFloat(preco[0]), parseFloat(preco[0])], sizes:['1', '2', '3'], description:  descricao[0]},
    {id: 2, name:produto[1], img:imagem[1], price:[parseFloat(preco[1]), parseFloat(preco[1]), parseFloat(preco[1])], sizes:['1', '2', '3'], description:  descricao[1]},
    {id: 3, name:produto[2], img:imagem[2], price:[parseFloat(preco[2]), parseFloat(preco[2]), parseFloat(preco[2])], sizes:['1', '2', '3'], description:  descricao[2]},
    {id: 4, name:produto[3], img:imagem[3], price:[parseFloat(preco[3]), parseFloat(preco[3]), parseFloat(preco[3])], sizes:['1', '2', '3'], description:  descricao[3]},
    {id: 5, name:produto[4], img:imagem[4], price:[parseFloat(preco[4]), parseFloat(preco[4]), parseFloat(preco[4])], sizes:['1', '2', '3'], description:  descricao[4]},
    {id: 6, name:produto[5], img:imagem[5], price:[parseFloat(preco[5]), parseFloat(preco[5]), parseFloat(preco[5])], sizes:['1', '2', '3'], description:  descricao[5]},
    {id: 7, name:produto[6], img:imagem[6], price:[parseFloat(preco[6]), parseFloat(preco[6]), parseFloat(preco[6])], sizes:['1', '2', '3'], description:  descricao[6]},
    {id: 8, name:produto[7], img:imagem[7], price:[parseFloat(preco[7]), parseFloat(preco[7]), parseFloat(preco[7])], sizes:['1', '2', '3'], description:  descricao[7]},
    {id: 9, name:produto[8], img:imagem[8], price:[parseFloat(preco[8]), parseFloat(preco[8]), parseFloat(preco[8])], sizes:['1', '2', '3'], description:  descricao[8]},
    {id: 10, name:produto[9], img:imagem[9], price:[parseFloat(preco[9]), parseFloat(preco[9]),parseFloat(preco[9])], sizes:['1', '2', '3'], description:  descricao[9]},
    {id: 11, name:produto[10], img:imagem[10], price:[parseFloat(preco[10]), parseFloat(preco[10]), parseFloat(preco[10])], sizes:['1', '2', '3'], description:  descricao[10]},
    {id: 12, name:produto[11], img:imagem[11], price:[parseFloat(preco[11]), parseFloat(preco[11]),parseFloat(preco[11])], sizes:['1', '2', '3'], description:  descricao[11]},

];
let  modelsJson = [];
for (let i = 0; i < produto.length; i++) {
    if(produto[i] != ''){
        modelsJson[i] = array[i];
       
    }
    
}
return modelsJson;
}