// const Clickbutton = document.querySelectorAll('.button');
// let carrito = []

// Clickbutton.forEach(btn => {
//     btn.addEventListener('click', addCarritoItem);
// })

// function addCarritoItem(e){
//     const button = e.target;
//     const item = button.closest('.modal');
//     const itemTitle = item.querySelector('.modal-title').textContent;
//     const itemDescription = item.querySelector('.descripcion').textContent;
//     const itemimg = item.querySelector('.imagen').src;
//     // const itemChanges = item.querySelector('.form-control cantidad').value;
    
//     const newItem = {
//         tittle: itemTitle,
//         descripcion: itemDescription,
//         img: itemimg,
//         cantidad: 1
//     }

//     addItemCarrito(newItem)

// }

// function addItemCarrito(newItem){
//     carrito.push(newItem)

//     renderCarrito()
// }

// function renderCarrito(){
//     console.log(carrito)
// }