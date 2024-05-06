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
        const json = await response.json()
        
        console.log(json)
    }catch(e){
        console.log(e)
    }
}
