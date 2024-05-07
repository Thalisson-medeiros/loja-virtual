function openMenu(){
    document.querySelector('.menu-hidden').classList.toggle('menu-active')
}

window.addEventListener('resize', closeMenu)

function closeMenu(){
    if(window.innerWidth > 520){
        document.querySelector('.menu-hidden').classList.remove('menu-active')
    }
}

async function addProductToCar(id, name, price, image){
    try{
        const response = await fetch(`/add_item?id=${id}&name_product=${name}&price=${price}&image=${image}`)
        const responseJson = await response.json()
        
        if(responseJson.status == 'ok'){
            updateCart()
            alert('Produto Adicionado com Sucesso!')
        }
    }catch(e){
        console.log(e)
    }
}

async function updateCart(){
    try{
        const response = await fetch('/updateCart')
        const responseJson = await response.json()
        
        document.querySelector('.cart-number').innerHTML = responseJson.quantity
    }catch(e){
        console.log(e)
    }
}

window.addEventListener('load', updateCart)


//implementar função para validar email